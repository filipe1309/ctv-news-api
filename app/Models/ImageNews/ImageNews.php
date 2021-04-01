<?php

namespace App\Models\ImageNews;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ImageNews
 * @package App\Models\ImageNews
 */
class ImageNews extends Model
{
    /**
     * @var string
     */
    protected $table = 'image_news';

    /**
     * @var array
     */
    protected $fillable = [
        'news_id',
        'image',
        'description',
        'active'
    ];

    /**
     * @var array
     */
    public array $rules = [
        'news_id' => 'required | numeric',
        'image' => 'required',
        'description' => 'required | min:10 | max:255'
    ];
}
