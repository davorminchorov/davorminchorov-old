<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    /**
     * Append the fields which should be converted to Carbon instances.
     *
     * @var array
     */
    protected $dates = ['published_at'];
}
