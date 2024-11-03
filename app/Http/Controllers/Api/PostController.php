<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\PostResource;
use App\Models\Client;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function App\Helpers\responseJson;

class PostController extends Controller
{
    public function __construct(public PostService $postService)
    {
    }

    public function index(Request $request): JsonResponse
    {
        $posts = $this->postService->getPosts($request->query());
        return responseJson(1, "success", PostResource::collection($posts));
    }

    public function show($id): JsonResponse
    {
        $post = $this->postService->showPost($id);
        return responseJson(1, "success", PostResource::make($post));

    }

    public function getFavouritePosts(): JsonResponse
    {
        $favourites =  $this->postService->getFavouritePosts();
        return responseJson(1, "success", PostResource::collection($favourites));

    }

    public function toggleFavouritePost(Request $request): JsonResponse
    {
        $toggled = $this->postService->toggleFavouritePost($request);

        if ($toggled) {
            return responseJson(message: "Post has been added to favorites");
        }
        else{
            return responseJson(message: "Post has been removed from favorites");

        }

    }
}
