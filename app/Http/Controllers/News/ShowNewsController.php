<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class ShowNewsController extends Controller
{
    public function __invoke()
    {
        $news = News::where('is_deleted', false)->orderBy('created_at', 'desc')->get();

        return view('news.show', ['news' => $news]);
    }
}
