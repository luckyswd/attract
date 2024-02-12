<?php

class Ajax
{
    public string $ajax_blocks_path;

    public function __construct()
    {
        $this->ajax_blocks_path = get_template_directory() . '/ajax-blocks/';
    }

    public function get_blog_posts () {
        check_ajax_referer( 'myajax-nonce', 'nonce' );
        get_template_part('modules/blog/blog');
        die;
    }

    public function register(): void
    {
       add_action('wp_ajax_get_blog_posts', [$this, 'get_blog_posts']);
       add_action('wp_ajax_nopriv_get_blog_posts', [$this, 'get_blog_posts']);
    }
}