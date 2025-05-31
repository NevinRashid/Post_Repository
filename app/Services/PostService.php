<?php

namespace App\Services;

use App\Models\Post;
use App\PostRepositoryInterface;

class PostService
{
    protected $postRepository;
    /**
     * Create a new class instance.
     */
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Get all posts from the database,
     *      
     * @return Post $postarray
     */

    public function getALLPosts(){
        try{
            return $this->postRepository->getAll();
        }catch(\Throwable $th){

        }
    }
    
    /**
     * Add new post to the database.
     * 
     * @param array $postdata
     * 
     * @return Post $post
     */
    public function addPost(array $data){
        try{
            return $this->postRepository->create($data);
        }catch(\Throwable $th){
            return response()->json(['errors'=> $th->getMessage()]);

        }
    }

    /**
     * Update the specified post in the database.
     * 
     * @param array $postdata
     * @param Post $post
     * 
     * @return Post $post
     */

    public function updatePost(array $data, Post $post){
        try{
            return $this->postRepository->update($post,$data);
        }catch(\Throwable $th){
            
        }
    }

    /**
     * Delete the specified post from the database.
     * 
     * @param Post $post
     * 
     */
    public function deletePost(Post $post){
        try{
            $this->postRepository->delete($post);
        }catch(\Throwable $th){

        }
    }
}
