<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(public PostService $postService)
    {
    }

    public function show($id)
    {
        $post = $this->postService->showPost($id);
        return view('site.post',$post);
    }

    public function toggle($id)
    {
        $toggled = $this->postService->toggleFavouritePost($id);
        return response()->json([
            'toggled' => $toggled
        ]);
    }
}
