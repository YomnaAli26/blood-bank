<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(PostRepositoryInterface $postRepository)
    {
        $posts = $postRepository->all();
        return view('site.home',get_defined_vars());
    }
}
