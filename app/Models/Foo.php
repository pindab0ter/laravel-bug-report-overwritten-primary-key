<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foo extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'id',
    ];
}
