<?php

namespace App\Http\Controllers\Watchman;

use App\DTOs\WatchmanDTO;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Watchman\WatchmanRepositoryInterface;
use Illuminate\Http\Request;

class UpdateWatchmanController extends Controller
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
        $fields = [
            'userID' => 'required|string',
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string',
        ];

        $message = [
            'required'=>':attribute es requerido',
        ];

        $this->validate($request, $fields, $message);

        $userID = $request->input('userID');

        $user = $this->watchmanRepository->getRegisterByID($userID);

        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $password = null;

        if (! is_null($request->input('password'))) {
            $password = $request->input('password');
        }

        $watchmanDTO = (new WatchmanDTO())
            ->setName($name)
            ->setPhone($phone)
            ->setEmail($email)
            ->setPassword($password);
        $updatedWatchman = $this->watchmanRepository->update($user, $watchmanDTO);

        if ($updatedWatchman) {
            return redirect()->route('watchman.index')->with('successUpdate', 'Celador modificado');
        }
    }
}
