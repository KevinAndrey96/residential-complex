<?php

namespace App\Repositories\Contracts\Watchman;

use App\DTOs\WatchmanDTO;
use App\Models\User;

interface WatchmanRepositoryInterface
{
    public function save(WatchmanDTO $watchmanDTO): bool;
    public function getAll();
    public function getRegisterByID(int $id);
    public function update(User $user, WatchmanDTO $watchmanDTO):bool;
}
