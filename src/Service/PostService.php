<?php


namespace App\Service;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class PostService
{
    public function fetchPosts(): array
    {
        $url = 'https://jsonplaceholder.typicode.com/posts?_limit=20';
        $posts = [];

        try {
            // Make a GET request to the API
            $httpClient = new Client();
            $response =  $httpClient->get($url);

            if ($response !== false) {
                $posts = json_decode($response->getBody(), true);
            }
        }catch (\Exception $e){
            throw new \Exception("Something went wrong while fetching posts. Please try again.");
        }

        return $posts;
    }
}
