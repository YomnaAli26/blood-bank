<?php

namespace App\Services;

use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Http\Request;

class PostService
{
    public function __construct(public PostRepositoryInterface $postRepository)
    {
    }

    public function getPosts($filters = [])
    {

        return $this->postRepository->filter($filters, ['category'])->get();
    }

    public function showPost($id)
    {
        return $this->postRepository->find($id);

    }

    public function getFavouritePosts()
    {
        return auth()->user()->posts;

    }

    public function toggleFavouritePost(Request $request): bool
    {
        $request->validate([
            'post_id' => 'required|integer|exists:posts,id'
        ]);
        $postId = $request->post('post_id');
        $toggled = auth()->user()->posts()->toggle($postId);
        if (in_array($postId, $toggled['attached'])) {
            return true;
        }
        return false;

    }
}
