<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchid\Screen\AsSource;

class Visitor extends Model
{
    use SoftDeletes, HasFactory, AsSource;

    protected $fillable = ['country', 'ip_address', 'device'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
