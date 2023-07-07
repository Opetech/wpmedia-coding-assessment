<?php


namespace App\Controllers;


use App\Service\PostService;
use App\Utils\SessionMessageUtil;

class PostController
{
    private PostService $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function getAll()
    {
        $posts = [];

        try {
            $posts = $this->postService->fetchPosts();
        } catch (\Exception $e) {
            SessionMessageUtil::set("error", true);
            SessionMessageUtil::set("message", $e->getMessage());
        }

        return $posts;
    }
}
