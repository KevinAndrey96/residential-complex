<?php

namespace App\UseCases;

use App\Models\Adminrecep;
use App\UseCases\Contracts\StoreAdminrecepsUseCaseInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
     * @return void
     */
    public function handle(Request $request): void
    {
        $adminrecep = new Adminrecep();
        $adminrecep->name = $request->name;
        $adminrecep->phone = $request->phone;
        $adminrecep->email = $request->email;
        $adminrecep->document = $request->document_number;
        $adminrecep->role = $request->role;
        $adminrecep->password = Hash::make($request->password);
        $adminrecep->save();
        $user = Adminrecep::where('email', 'like', $request->email)->first();

        if ($request->role == 'Administrator') {
            $user->assignRole('Administrator');
        } else {
            $user->assignRole('Receptionist');
        }
    }
}
