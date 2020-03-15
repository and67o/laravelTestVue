<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    protected $primaryKey = 'post_id';

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
}
