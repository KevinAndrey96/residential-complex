<?php

namespace App\Http\Controllers\Watchman;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Watchman\WatchmanRepositoryInterface;
use Illuminate\Http\Request;

class IndexWatchmanController extends Controller
{
    private WatchmanRepositoryInterface $watchmanRepository;

    public function __construct(WatchmanRepositoryInterface $watchmanRepository)
    {
        $this->watchmanRepository = $watchmanRepository;
    }

    public function __invoke()
    {
        $users = $this->watchmanRepository->getAll();

        return view('watchman.index', ['users' => $users]);
    }
}
