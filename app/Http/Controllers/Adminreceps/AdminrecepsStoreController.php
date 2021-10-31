<?php

namespace App\Http\Controllers\Adminreceps;

use App\Http\Controllers\Controller;
use App\UseCases\Contracts\StoreAdminrecepsUseCaseInterface;
use Illuminate\Http\RedirectResponse;
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
     * @return RedirectResponse
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $this->storeAdminrecepsUseCase->handle($request);

        if ($request->input('role') == 'Receptionist') {
            return back()->with('adminrecepSuccess', 'Recepcionista registrado');
        }
        return redirect()->back()->with('adminrecepSuccess', 'Administrador registrado');
    }
}
