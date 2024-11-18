<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PostService
{
    public function __construct(public PostRepositoryInterface $postRepository,public CategoryRepositoryInterface $categoryRepository)
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

    public function toggleFavouritePost($id): bool
    {
        $toggled = auth()->user()->posts()->toggle($id);
        if (in_array($id, $toggled['attached'])) {
            return true;
        }
        return false;

    }
    public function categoryPosts(Category $category,$postId): Collection
    {
       return $this->postRepository->getCategoryPosts($category,$postId);

    }



}
