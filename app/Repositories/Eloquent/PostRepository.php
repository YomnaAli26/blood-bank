<?php

namespace App\Repositories\Eloquent;


use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    public function __construct(Post $post)
    {
        parent::__construct($post);
    }
}
