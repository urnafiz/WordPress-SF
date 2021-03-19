if( ! function_exists( 'post_read_time' ) ) :
	/*
	 * Prints HTML with meta information for post read time.
	 */
	function post_read_time( $display_meta ) {

		if( $display_meta == true && get_post_type() == 'post' ) {
            $post_id = get_the_ID();
            $post_object = get_post( $post_id );
            $content = $post_object->post_content;
            $word_count = str_word_count( strip_tags( $content ) );
            $per_min_words = absint( 240 );
            $total_time = round( ($word_count)/($per_min_words) );
            if( $total_time > 1 ) {
                $time_unit = esc_html__( ' minutes', 'wordpress-theme-name' );
            } else {
                $time_unit = esc_html__( ' minute', 'wordpress-theme-name' );
            }
            echo '<li class="read-time">' . esc_html__( 'Read Time: ', 'wordpress-theme-name' ) . '<span>' . esc_html( $total_time ) . esc_html( $time_unit ) . '</span></li>';
        }
	}
endif;
