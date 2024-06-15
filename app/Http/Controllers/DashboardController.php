<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\ImFeelingLuckyService;
use App\Services\Pages\ImFeelingLuckyHistoryService;
use App\Services\TemporaryLinkService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    public function __construct(
        private readonly TemporaryLinkService $temporaryLinkService,
        private readonly ImFeelingluckyHistoryService $imFeelingLuckyHistoryService,
        private readonly ImFeelingLuckyService $imFeelingLuckyService,
    )
    {
    }

    public function index(User $user): View
    {
        return view('dashboard.index', [
            'user' => $user
        ]);
    }

    public function generateLink(User $user): View
    {
        return view('dashboard.generate_link_success', [
            'link' => $this->temporaryLinkService->generateLink($user)
        ]);
    }

    public function deactivateLink(User $user): View
    {
        $this->temporaryLinkService->deactivateLink($user);

        return view('dashboard.deactivate_link_success');
    }

    public function history(User $user): View
    {
        return view('dashboard.history', [
            'history' => $this->imFeelingLuckyHistoryService->getLastResults($user)
        ]);
    }

    public function imFeelingLucky(User $user): RedirectResponse
    {
        return redirect()->route('dashboard', [
            'user' => $user
        ])->with([
            'luckyResult' => $this->imFeelingLuckyService->imFeelingLucky($user),
        ]);
    }
}
