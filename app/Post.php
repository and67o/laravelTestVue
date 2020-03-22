<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Class Post
 * @package App
 * @property int id
 * @property int author_id
 * @property string title
 * @property string short_title
 * @property string img
 * @property string descr
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Post extends Model
{
    const TABLE = 'posts';

    protected $table = self::TABLE;


    protected $fillable = ['id', 'author_id', 'title', 'short_title', 'img', 'descr', 'created_at', 'updated_at'];

    protected $casts = [
        'id' => 'integer',
        'author_id' => 'integer',
    ];

    /**
     * @return HasOne
     */
    public function author()
    {
        return $this->hasOne(
            User::class,
            'id',
            'author_id'
        );
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setShortTitle(string $title) : void
    {
        $this->short_title = (Str::length($title) > 30)
            ? Str::substr($title, 0, 30) . '...'
            : $title;
    }

    /**
     * @return string
     */
    public function getShortTitle() : string
    {
        return $this->short_title;
    }

    /**
     * @return string
     */
    public function getDescr() : string
    {
        return $this->descr;
    }

    /**
     * @param $description
     */
    public function setDescr($description) : void
    {
        $this->descr = $description;
    }

    /**
     *
     */
    public function setAuthorId() : void
    {
        $this->author_id = Auth::user()
            ? Auth::user()->id
            : 0;
    }

    /**
     * @return string
     */
    public function getAuthorId() : string
    {
        return $this->author_id;
    }

    /**
     * @param $fileImg
     */
    public function setImg($fileImg) : void
    {
        $path = Storage::putFile('posts', $fileImg);
        $url = Storage::url($path);
        $this->img = $url;
    }

    /**
     * @return string
     */
    public function getImg() : string
    {
        return $this->img;
    }
}
