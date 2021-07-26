<?php

namespace App\UseCases;

use App\Models\Adminrecep;
use App\Models\User;

use App\UseCases\Contracts\StoreAdminrecepsUseCaseInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * Class CreateStoryUseCase
 * @package App\UseCases
 */
class StoreAdminrecepsUseCase implements StoreAdminrecepsUseCaseInterface
{


    /**
     * CreateStoryUseCase constructor.
     */
    public function __construct(

    ) {

    }

    /**
     * Create the story and details
     * @param Request $request
     * @return Request
     */
    public function handle(Request $request):void
    {

        $user =  new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $user = User::where('email', 'like', $request->email)->first();
        $adminrecep = new Adminrecep();
        $adminrecep->document = $request->document_number;
        $adminrecep->role = $request->role;
        $adminrecep->user_id = $user->id;
        $adminrecep->save();

        if ($request->role == 'Administrator') {
            $user->assignRole('Administrator');
        } else {
            $user->assignRole('Receptionist');
        }
    }
}
