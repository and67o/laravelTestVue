<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App
 * @property int id
 * @property int author_id
 * @property string title
 * @property string short_title
 * @property string img
 * @property string descr
 */
class Post extends Model
{
    protected $primaryKey = 'post_id';

    protected $table = 'posts';

    protected $fillable = ['id','author_id', 'title', 'short_title', 'img', 'descr'];

    protected $casts = [
        'id' => 'integer',
        'author_id' => 'integer',
    ];
}
