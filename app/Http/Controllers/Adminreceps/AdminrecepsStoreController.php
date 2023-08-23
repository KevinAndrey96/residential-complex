<?php

namespace App\Http\Controllers\Adminreceps;

use App\Http\Controllers\Controller;
use App\UseCases\Contracts\StoreAdminrecepsUseCaseInterface;
use Illuminate\Http\Request;

class AdminrecepsStoreController extends Controller
{
    private StoreAdminrecepsUseCaseInterface $storeAdminrecepsUseCase;

    public function __construct(
        StoreAdminrecepsUseCaseInterface $storeAdminrecepsUseCase
    ) {
        $this->storeAdminrecepsUseCase = $storeAdminrecepsUseCase;
    }

    /**
     * @param Request $request
     */
    public function __invoke(Request $request)
    {
        $alreadyExist = $this->storeAdminrecepsUseCase->handle($request);

        if (! $alreadyExist) {

        if ($request->input('role') == 'Receptionist') {
            return redirect('/adminrecep')->with('adminrecepSuccess', 'Recepcionista registrado');
        }

        return redirect('/adminrecep')->with('adminrecepSuccess', 'Administrador registrado');
        }

        return redirect('/adminrecep')->with('adminrecepAlreadyExist', 'El usuario ya esta registrado');
    }
}
