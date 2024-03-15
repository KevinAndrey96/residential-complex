<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $title
 * @property mixed|string $url_image
 * @property mixed $description
 * @property bool|mixed $author
 */
class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'url_image',
        'author'
    ];
}
