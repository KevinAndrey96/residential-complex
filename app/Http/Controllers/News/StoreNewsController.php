<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreNewsController extends Controller
{
    public function __invoke(Request $request)
    {
        $fields = [
            'title' => 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg',
            'description' => 'required|string',
        ];

        $message = [
            'title.required' =>'El título es requerido',
            'description.required' =>'La descripción es requerida',
            'image.required' => 'La imagen es requerida',
        ];

        $this->validate($request, $fields, $message);

        $news = new News();
        $news->title = strval($request->input('title'));
        $news->url_image = '';
        $news->description = strval($request->input('description'));
        $news->author = strval(Auth::user()->name);
        $news->save();

        $file = $request->file('image');
        $path = 'news_images';
        $fileName = strval($news->id);
        uploadFile($file, $fileName, $path);
        $news->url_image = '/storage/' . $path . '/' . $fileName . '.png';
        $news->save();

        return redirect()->route('news.index')->with('successNewsStore', 'Creación satisfatoría de noticia');
    }
}
