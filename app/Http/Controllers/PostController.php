<?php

namespace App\Http\Controllers;

use App\Models\Mansion;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::where('private', '=', 0)
        ->orderBy('published_at', 'desc')
        ->get();

        return view('pages.posts', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post) {
        return view('pages.post', [
            'post' => $post
        ]);
    }
}
