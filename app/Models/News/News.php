<?php

namespace App\Models\News;

use App\Models\ImageNews\ImageNews;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class News
 * @package App\Models\News
 */
class News extends Model
{
    use Sluggable;

    /**
     * @var string
     */
    protected $table = 'news';

    /**
     * @var array
     */
    protected $fillable = [
        'author_id',
        'title',
        'subtitle',
        'description',
        'published_at',
        'slug',
        'active'
    ];

    /**
     * @var array
     */
    public array $rules = [
        'author_id' => 'required | numeric',
        'title' => 'required | min:20 | max:100 | alpha_num',
        'subtitle' => 'required | min:20 | max:155 | alpha_num',
        'description' => 'required | min:100',
        'slug' => 'required | alpha_dash'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ImageNews::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['title', 'subtitle'],
                'onUpdate' => true
            ]
        ];
    }
}
