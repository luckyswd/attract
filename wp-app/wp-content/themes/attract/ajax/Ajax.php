<?php

class Ajax
{
    public string $ajax_blocks_path;

    public function __construct()
    {
        $this->ajax_blocks_path = get_template_directory() . '/ajax-blocks/';
    }

    public function register(): void
    {
//        add_action('wp_ajax_example_kitchens', [$this, 'example_kitchens']);
//        add_action('wp_ajax_nopriv_example_kitchens', [$this, 'example_kitchens']);
    }
}