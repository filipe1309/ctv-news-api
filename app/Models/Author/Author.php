<?php

namespace App\Models\Author;

use App\Models\News\News;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Author
 * @package App\Models\Author
 */
class Author extends Model
{
    /**
     * @var string
     */
    protected $table = 'author';

    /**
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'genre',
        'active'
    ];

    /**
     * @var array
     */
    protected $hidden = [
        // 'password' // TODO: apply hash
    ];

    // public $timestamps = false; // disable create_at, updated_at

    /**
     * @var array
     */
    public array $rules = [
        'first_name' => 'required | min:2 | max:45 | alpha',
        'last_name' => 'required | min:2 | max:60 | alpha',
        'email' => 'required | email | max:100 | email:rfc,dns',
        'password' => 'required | between:6,12',
        'genre' => 'required | alpha | max:1'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function news()
    {
        return $this->hasMany(News::class);
    }
}
