<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{

    const COUNT_OF_PAGE = 4;

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function posts()
    {
        $posts = Post::join('users', 'author_id', '=', 'users.id')
            ->orderBy('posts.created_at', 'desc')
            ->paginate(self::COUNT_OF_PAGE);
        return response()->json(
            ['posts' => $posts]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $post = Post::join('users', 'author_id', '=', 'users.id')
            ->find($id);
        return response()->json(
            ['post' => $post]
        );

    }
}
