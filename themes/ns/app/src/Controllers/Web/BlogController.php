<?php
namespace App\Controllers\Web;

class BlogController {
    public function index( $request, $view ) {
        ob_start();

        $blog_id = get_option('page_for_posts');

        \WPEmerge\render( 'app/views/blog/loop.php', [
            'blog_title' => get_the_title( $blog_id )
        ] );

    	$content = ob_get_clean();

        return \WPEmerge\view( 'app/views/page.php' )->with( ['content' => $content] );
    }
}
