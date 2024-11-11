<?php

namespace App\Repositories\Eloquent;


use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    public function __construct(Post $post)
    {
        parent::__construct($post);
    }

    public function getCategoryPosts($category,$currentPostId): Collection
    {
        return Post::query()
            ->whereBelongsTo($category)
            ->where('id','!=',$currentPostId)
            ->get();
    }
}
