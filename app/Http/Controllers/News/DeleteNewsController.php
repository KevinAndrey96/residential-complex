<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class DeleteNewsController extends Controller
{
    public function __invoke($id)
    {
        $news = News::find($id);
        $news->is_deleted = true;
        $news->save();

        return redirect()->route('news.index')->with('successNewsDelete', 'Eliminación satisfatoría de noticia');


    }
}
