<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class EditNewsController extends Controller
{
    public function __invoke($id)
    {
        $news = News::find($id);

        return view('news.edit', ['news' => $news]);
    }
}
