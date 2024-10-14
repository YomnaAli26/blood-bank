<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\PostResource;
use App\Models\Client;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function App\Helpers\responseJson;

class PostController extends Controller
{

    public function index(Request $request): JsonResponse
    {
        $posts = Post::filter($request->query())->get();
        return responseJson(1, "success", PostResource::collection($posts));
    }

    public function show(Post $post): JsonResponse
    {
        return responseJson(1, "success", PostResource::make($post));

    }

    public function getFavouritePosts(): JsonResponse
    {
        $favourites = auth()->user()->posts;
        return responseJson(1, "success", PostResource::collection($favourites));

    }

    public function toggleFavouritePost(Request $request): JsonResponse
    {
        $request->validate([
            'post_id' => 'required|integer|exists:posts,id'
        ]);
        $postId = $request->post('post_id');
        $toggled = auth()->user()->posts()->toggle($postId);
        if (in_array($postId, $toggled['attached'])) {
            return responseJson(message: "Post has been added to favorites");
        }
        return responseJson(message: "Post has been removed from favorites");

    }
}
