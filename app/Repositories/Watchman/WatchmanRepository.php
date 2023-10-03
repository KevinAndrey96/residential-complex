<?php

namespace App\Repositories\Watchman;

use App\DTOs\WatchmanDTO;
use App\Models\User;
use App\Repositories\Contracts\Watchman\WatchmanRepositoryInterface;

class WatchmanRepository implements WatchmanRepositoryInterface
{
    public function save(WatchmanDTO $watchmanDTO): bool
    {
        $user = new User();
        $user->name = $watchmanDTO->getName();
        $user->phone = $watchmanDTO->getPhone();
        $user->email = $watchmanDTO->getEmail();
        $user->password = bcrypt($watchmanDTO->getPassword());
        $user->role = 'Watchman';
        $user->save();
        $user->assignRole('Watchman');

        return true;
    }

    public function getAll()
    {
        return User::where('role', 'Watchman')->get();
    }

    public function getRegisterByID(int $id)
    {
        return User::find($id);
    }

    public function update(User $user, WatchmanDTO $watchmanDTO):bool
    {
        $user->name = $watchmanDTO->getName();
        $user->phone = $watchmanDTO->getPhone();
        $user->email = $watchmanDTO->getEmail();

        if (! is_null($watchmanDTO->getPassword())) {
            $user->password = bcrypt($watchmanDTO->getPassword());
        }

        $user->save();

        return true;
    }


}
