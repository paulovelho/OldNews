<?php
/*
Plugin Name: Old News Recent Posts
Plugin URI: http://www.100anosatras.com.br
Description: Recent Posts for 100 anos atrás
Tags: widget, posts, plugin, recent, recent posts, shortcode, thumbnail, thumbnails, categories, content, featured image, Taxonomy
Version: 0.3
Author: Platypus Technology
Author URI: http://platypusweb.com.br
License: GPLv2 or later
*/


/**
-------------------------------------- Small Thumbnails Widget --------------------------------------
**/

// Creating the widget with fluid images
class oldnews_recent_posts_thumbnails_widget extends WP_Widget {

    function __construct() {

		$widget_ops = array('classname' => 'oldnews_recent_posts_thumbnails_widget', 'description' => __( "Your site&#8217;s most recent Posts. Displays small thumbnails, post date and title.", 'oldnews_recent_posts_domain') );
		parent::__construct('oldnews-thumbnails-recent-posts', __('Old News Recent Posts', 'oldnews_recent_posts_domain'), $widget_ops);
		$this->alt_option_name = 'oldnews_widget_thumbnails_recent_entries';

		add_action( 'save_post', array($this, 'flush_widget_cache') );
		add_action( 'deleted_post', array($this, 'flush_widget_cache') );
		add_action( 'switch_theme', array($this, 'flush_widget_cache') );

    }

    // Creating widget front-end
    // This is where the action happens
	public function widget($args, $instance) {
		$cache = array();
		if ( ! $this->is_preview() ) {
			$cache = wp_cache_get( 'oldnews_recent_posts_thumbnails_widget', 'widget' );
		}

		if ( ! is_array( $cache ) ) {
			$cache = array();
		}

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();

		$show_widget_title = isset( $instance['show_widget_title'] ) ? $instance['show_widget_title'] : true;
		$exclude_current_post = isset( $instance['exclude_current_post'] ) ? $instance['exclude_current_post'] : true;

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts', 'oldnews_recent_posts_domain' );

		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {$number = 5;}

		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : true;

		$show_post_title = isset( $instance['show_post_title'] ) ? $instance['show_post_title'] : true;

		$locale = isset( $instance['locale'] ) ? $instance['locale'] : 'en';


        /* don't show post in recent if it shows in page */
        global $post;
        if (!empty($post) ) { $exclude_post = array( $post->ID ); }

        $cat = get_the_category($post->ID);
        $cat_id = $cat[0]->cat_ID;

        /* @TODO */
        /* exclude some post IDs, defined in admin area */
        $filters = array(
			'cat'					=> $cat_id,
			'posts_per_page'      	=> $number,
			'no_found_rows'       	=> true,
			'post_status'         	=> 'publish',
			'ignore_sticky_posts' 	=> true,
            'post__not_in'        	=> $exclude_post
		);

		$r = new WP_Query( apply_filters( 'widget_posts_args', $filters) );

		if ($r->have_posts()) :

?>
		<?php echo $args['before_widget']; ?>
		<?php if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>
		<ul class="oldnews-recent-posts-thumbnails-widget">
		<?php while ( $r->have_posts() ) : $r->the_post(); ?>
			<li>
                <div class="oldnews-post-small-thumbnail">
                    <?php if ( has_post_thumbnail() ) { echo '<a href="<?php the_permalink(); ?>" class="oldnews-thumbnail-link">'; the_post_thumbnail( array(100, 100) ); echo '</a>'; } ?>
                    <div class="oldnews-post-header">
	     	    		<span class="oldnews-post-date"><?php echo formatDatePost(get_the_time("Y-m-d")) ?></span><br/>
        		    	<a href="<?php the_permalink(); ?>" class="oldnews-header-link"><?php get_the_title() ? the_title() : the_ID(); ?></a>
                    </div>
                </div>
			</li>
		<?php endwhile; ?>
		</ul>
		<?php echo $args['after_widget']; ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;

		if ( ! $this->is_preview() ) {
			$cache[ $args['widget_id'] ] = ob_get_flush();
			wp_cache_set( 'oldnews_recent_posts_thumbnails_widget', $cache, 'widget' );
		} else {
			ob_end_flush();
		}
	}

    /* --------------------------------- Widget Backend --------------------------------- */
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) { $title = esc_attr( $instance[ 'title' ]) ; }
        else { $title = __( 'Recent posts', 'oldnews_recent_posts_domain' ); }

        if ( isset( $instance[ 'number' ] ) ) { $number = absint( $instance[ 'number' ] ); }
        else { $number = 5; }

        // Widget admin form
        ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'oldnews_recent_posts_domain' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:', 'oldnews_recent_posts_domain' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

        </p>
        <?php
    }

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['oldnews_widget_thumbnails_recent_entries']) )
			delete_option('oldnews_widget_thumbnails_recent_entries');

		return $instance;
	}

	public function flush_widget_cache() {
		wp_cache_delete('oldnews_recent_posts_thumbnails_widget', 'widget');
	}

} // Class wpb_widget ends here

// Register and load the widget
function oldnews_recent_posts_load_widget() {
	register_widget( 'oldnews_recent_posts_thumbnails_widget' );
}
add_action( 'widgets_init', 'oldnews_recent_posts_load_widget' );


?>
