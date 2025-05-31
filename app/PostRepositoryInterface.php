<?php

namespace App;

use App\Models\Post;

interface PostRepositoryInterface
{
    public function getAll();
    public function create(array $data);
    public function update(Post $post, array $data);
    public function delete(Post $post);
}
