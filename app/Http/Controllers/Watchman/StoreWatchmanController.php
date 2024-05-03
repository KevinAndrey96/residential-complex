<?php

namespace App\Http\Controllers\Watchman;

use App\DTOs\WatchmanDTO;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Watchman\WatchmanRepositoryInterface;
use Illuminate\Http\Request;

class StoreWatchmanController extends Controller
{
    private WatchmanRepositoryInterface $watchmanRepository;

    public function __construct(WatchmanRepositoryInterface $watchmanRepository)
    {
        $this->watchmanRepository = $watchmanRepository;
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function __invoke(Request $request)
    {
        //return $request;
        $fields = [
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string'
        ];

        $message = [
            'required'=>':attribute es requerido',
        ];

        $this->validate($request, $fields, $message);

        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $password = $request->input('password');

        $watchmanDTO = (new WatchmanDTO())
            ->setName($name)
            ->setEmail($email)
            ->setPhone($phone)
            ->setPassword($password);

        $storedWatchman = $this->watchmanRepository->save($watchmanDTO);

        if ($storedWatchman) {
            return redirect()->route('watchman.index')->with('successSave', 'Guardia de Seguridad registrado');
        }


    }


}
