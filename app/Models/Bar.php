<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bar extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'some_external_id';
    protected $keyType = 'string';
    protected $fillable = [
        'some_external_id',
    ];
}
