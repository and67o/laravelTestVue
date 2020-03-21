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

/**
 * Class PostController
 * @package App\Http\Controllers\Api
 */
class PostController extends Controller
{

    const COUNT_OF_PAGE = 4;
    /**
     * @var Post
     */
    private $Post;

    /**
     * PostController constructor.
     */
    public function __construct()
    {
        $this->Post = new Post();
    }

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

        if ($request->input('search')) {
            $search = str_replace('/', '', $request->input('search'));
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
                    (int) $request->input('page')
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
        return response()->json([
            'post' => Post::query()
                ->with('author')
                ->find($id)
        ]);
    }

    /**
     * @param PostRequest $request
     */
    public function store(PostRequest $request)
    {
        $Post = $this->_getFieldParams($request);
        $res = $Post->save();

    }

    /**
     * @param PostRequest $request
     * @return Post
     */
    private function _getFieldParams(PostRequest $request)
    {
        $this->Post->title = $request->title;
        $this->Post->short_title = (Str::length($request->title) > 30)
            ? Str::substr($request->title, 0, 30) . '...'
            : $request->title;
        $this->Post->descr = $request->descr;
        $this->Post->author_id = Auth::user() ? Auth::user()->id : 0;

        if ($request->hasFile('img')) {
            $path = Storage::putFile('posts', $request->file('img'));
            $url = Storage::url($path);
            $this->Post->img = $url;
        }
        return $this->Post;
    }
}
