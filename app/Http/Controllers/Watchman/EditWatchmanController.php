<?php

namespace App\Http\Controllers\Watchman;

use App\DTOs\WatchmanDTO;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Watchman\WatchmanRepositoryInterface;
use Illuminate\Http\Request;

class EditWatchmanController extends Controller
{
    private WatchmanRepositoryInterface $watchmanRepository;

    public function __construct(WatchmanRepositoryInterface $watchmanRepository)
    {
        $this->watchmanRepository = $watchmanRepository;
    }

    public function __invoke(int $id)
    {
        $user = $this->watchmanRepository->getRegisterByID($id);

        return view('watchman.edit', ['user' => $user]);
    }
}
