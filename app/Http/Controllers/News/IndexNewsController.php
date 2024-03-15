<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class IndexNewsController extends Controller
{
    public function __invoke()
    {
        $news = News::where('is_deleted', 0)->orderBy('created_at', 'desc')->get();

        return view('news.index', ['news' => $news]);
    }
}
