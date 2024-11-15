<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(public PostService $postService)
    {
    }
    public function index()
    {
        $posts = $this->postService->getPosts();
        return view('site.posts.index',get_defined_vars());
    }
    public function show($id)
    {
        $post = $this->postService->showPost($id);
        $categoryPosts = $this->postService->categoryPosts($post->category,$post->id);
        return view('site.posts.show',get_defined_vars());
    }

    public function toggle($id)
    {
        $toggled = $this->postService->toggleFavouritePost($id);
        return response()->json([
            'toggled' => $toggled
        ]);
    }


}
