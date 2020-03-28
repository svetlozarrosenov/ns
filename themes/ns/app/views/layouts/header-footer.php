<?php
\WPEmerge\render( 'header' ); 

if ( ! is_404() && ! is_page_template('templates/seo.php') && ! is_search() ) {
	the_post(); 
}

\WPEmerge\layout_content();

\WPEmerge\render( 'footer' );