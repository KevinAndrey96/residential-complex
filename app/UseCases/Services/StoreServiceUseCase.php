<?php

namespace App\UseCases\Services;

use App\Models\Service;
use App\UseCases\Contracts\Services\StoreServiceUseCaseInterface;
use Httpful\Mime;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request as RequestAlias;

class StoreServiceUseCase implements StoreServiceUseCaseInterface
{
    public function handle(Request $request)
    {
        $service = new Service();
        $service->title = $request->input('title');
        $service->description = $request->input('description');
        $service->capacity = $request->input('capacity');
        $service->strip = $request->input('strip');
        $service->start = $request->input('start');
        $service->final = $request->input('final');
        if ($request->input('state') == 'enable') {
            $service->state = true;
        } else {
            $service->state = false;
        };
        if ($request->input('monday') == 'true') {
            $service->monday = true;
        } else {
            $service->monday = false;
        };
        if ($request->input('tuesday') == 'true') {
            $service->tuesday = true;
        } else {
            $service->tuesday = false;
        };
        if ($request->input('wednesday') == 'true') {
            $service->wednesday = true;
        } else {
            $service->wednesday = false;
        };
        if ($request->input('thursday') == 'true') {
            $service->thursday = true;
        } else {
            $service->thursday = false;
        };
        if ($request->input('friday') == 'true') {
            $service->friday = true;
        } else {
            $service->friday = false;
        };
        if ($request->input('saturday') == 'true') {
            $service->saturday = true;
        } else {
            $service->saturday = false;
        };
        if ($request->input('sunday') == 'true') {
            $service->sunday = true;
        } else {
            $service->sunday = false;
        };
        $service->save();
        $gallery = $request->gallery;
        for ($i = 0; $i < count($gallery); $i++) {
            $modifiedServiceTittle = str_replace(' ', '-', $service->title).$i;
            $pathName = 'services/'.$modifiedServiceTittle.'.png';
            Storage::disk('public')->put($pathName, file_get_contents($gallery[$i]));
            $client = new Client();
            $url = "https://portal.portoamericas.com/upload.php";
            $client->request(RequestAlias::METHOD_POST, $url, [
                'multipart' => [
                    [
                        'name' => 'image',
                        'contents' => fopen(
                            str_replace('\\', '/', Storage::path('public\services\\' .$modifiedServiceTittle . '.png')),'r'),
                    ],
                    [
                        'name' => 'path',
                        'contents' => 'services'
                    ]
                ]
            ]);
            $service->gallery .= '/storage/services/' . $modifiedServiceTittle . '.png;';
            $service->save();
            unlink(str_replace('\\', '/', storage_path('app/public/services/'.$modifiedServiceTittle.'.png')));
        }
    }
}
