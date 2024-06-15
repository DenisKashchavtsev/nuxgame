<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Services\Pages\RegistrationService;
use App\Services\TemporaryLinkService;
use Illuminate\Contracts\View\View;

class RegistrationController extends Controller
{
    public function __construct(
        private readonly RegistrationService $registrationService,
        public readonly TemporaryLinkService $temporaryLinkService
    )
    {
    }

    public function create(): View
    {
        return view('register');
    }

    public function store(RegistrationRequest $registrationRequest): View
    {
        $user = $this->registrationService->registration($registrationRequest->all());

        return view('register_success', [
            'link' => $this->temporaryLinkService->generateLink($user)
        ]);
    }
}
