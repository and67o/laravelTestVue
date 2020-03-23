<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
            ->leftjoin('users', 'posts.author_id', '=', 'users.id')
            ->orderBy('posts.created_at', 'desc');

        if ($request->input('search')) {
            $search = str_replace('/', '', $request->input('search'));
            $posts = $posts
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('descr', 'like', '%' . $search . '%')
                ->orWhere('users.name', 'like', '%' . $search . '%');
        }
        return response()->json([
                'posts' => $posts->paginate(
                    self::COUNT_OF_PAGE,
                    ['*'],
                    'page',
                    (int) $request->input('page')
                )]
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
     * @return JsonResponse
     */
    public function store(PostRequest $request)
    {
        $title = $request->input('title');
        $description = $request->input('descr');

        $this->Post->setTitle($title);
        $this->Post->setShortTitle($title);
        $this->Post->setDescr($description);
        $this->Post->setAuthorId();

        if ($request->hasFile('img')) {
            $this->Post->setImg($request->file('img'));
        }
        $result = $this->Post->save();
        return response()->json([
            'id' => $this->Post->id,
            'result' => $result,
            'errors' => []
        ]);
    }
}
