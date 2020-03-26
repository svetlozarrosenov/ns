<?php
namespace App\Controllers\Web;

class BlogController {
    private $blog_page_id;
    private $blog_page_title;

    public function index( $request, $view ) {
        $this->setBlogPageID();
        $this->setBlogPageTitle();

        ob_start();

        $this->getBlogIntro();		

        $this->getBlogLoop();

        \WPEmerge\render( 'app/views/common/callout.php' );

    	$content = ob_get_clean();

        return \WPEmerge\view( 'app/views/page.php' )->with( ['content' => $content] );
    }

    public function setBlogPageID() {
        $this->blog_page_id = get_option('page_for_posts');
    }

    public function setBlogPageTitle() {
        $this->blog_page_title = get_the_title( $this->blog_page_id );
    }

    public function getBlogIntro() {
        \WPEmerge\render( 'app/views/common/intro.php', [
            'intro' => [
                'title' => $this->blog_page_title
            ],
            'blog_page_id' => $this->blog_page_id,
        ] );
    }

    public function getBlogLoop() {
        \WPEmerge\render( 'app/views/blog/loop.php', [
            'blog_title' => $this->blog_page_title,
            'sidebar' => carbon_get_post_meta( $this->blog_page_id, 'crb_blog_sidebar' )
        ] );
    }
}
