<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Roles\RoleRepositoryInterface;
use Illuminate\Http\Request;

class StoreRolesController extends Controller
{
    private RoleRepositoryInterface $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        $name = $request->input('name');
        $this->roleRepository->save($name);
        $roles = $this->roleRepository->getAll();

        return datatables()->collection($roles)->toJson();

    }
}
