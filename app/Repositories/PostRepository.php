<?php

namespace App\Repositories;

use App\Models\Post;
use App\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    protected $post;
    /**
     * Create a new class instance.
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * this method to get all posts from database
     */
    public function getAll(){
        return $this->post->all();
    }

    /**
     * this method to add post in database
     */
    public function create(array $data){
        return $this->post->create($data);
    }

    /**
     * this method to update post in database
     */
    public function update(Post $post, array $data){
        $post->update(array_filter($data));
        return $post;
    }

    /**
     * this method to delete post from database
     */
    public function delete(Post $post){
        $post->delete();
    }

}
