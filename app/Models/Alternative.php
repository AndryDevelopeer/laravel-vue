<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchid\Screen\AsSource;

class Alternative extends Model
{
    use SoftDeletes, HasFactory, AsSource;

    protected $fillable = ['name', 'price'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
