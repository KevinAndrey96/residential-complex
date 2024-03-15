<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateNewsController extends Controller
{
    public function __invoke()
    {
        return view('news.create');
    }
}
