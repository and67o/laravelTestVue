<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{

    const COUNT_OF_PAGE = 4;

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $posts = Post::query()
           ->leftJoin('users', 'author_id', '=', 'users.id')
            ->orderBy('posts.created_at', 'desc');

        if ($request->search) {
            $search = str_replace("/", "", $request->search);
            $posts = $posts
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('descr', 'like', '%' . $search . '%')
                ->orWhere('users.name', 'like', '%' . $search . '%');
        }
        return response()->json(
            [
                'posts' => $posts->paginate(
                    self::COUNT_OF_PAGE,
                    ['*'],
                    'page',
                    (int) $request->page
                )
            ]
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

    public function store(PostRequest $request)
    {
        $Post = new Post();
        $Post = $this->_getFieldParams($request, $Post);
        $Post->save();
    }

    /**
     * @param PostRequest $request
     * @param Post $Post
     * @return Post
     */
    private function _getFieldParams(PostRequest $request, Post $Post)
    {
        $Post->title = $request->toArray();
        $Post->short_title = (Str::length($request->title) > 30)
            ? Str::substr($request->title, 0, 30) . '...'
            : $request->title;
        $Post->descr = $request->descr;
        $Post->author_id = Auth::user()->id;

        if ($request->file('img')) {
            $path = Storage::putFile('public', $request->file('img'));
            $url = Storage::url($path);
            $Post->img = $url;
        }
        return $Post;
    }
}
