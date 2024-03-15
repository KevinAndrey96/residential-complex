<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class UpdateNewsController extends Controller
{
    public function __invoke(Request $request)
    {
        $fields = [
            'title' => 'required|string',
            'image' => 'mimes:png,jpg,jpeg',
            'description' => 'required|string',
            'newsID' => 'required'
        ];

        $message = [
            'title.required' =>'El título es requerido',
            'description.required' =>'La descripción es requerida',
            'newsID.required' => 'El ID de la noticia es requerido ',
        ];

        $this->validate($request, $fields, $message);

        $news = News::find(intval($request->input('newsID')));
        $news->title = strval($request->input('title'));
        $news->description = strval($request->input('description'));
        $news->save();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'news_images';
            $fileName = strval($news->id);
            uploadFile($file, $fileName, $path);
        }

        return redirect()->route('news.index')->with('successNewsUpdate', 'Actualización satisfatoría de noticia');

    }
}
