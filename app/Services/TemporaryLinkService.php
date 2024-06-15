<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\URL;

final class TemporaryLinkService
{
    const ROUTE_NAME = 'dashboard';
    const EXPIRATION_DAYS = 7;

    public function generateLink(User $user): string
    {
        return URL::temporarySignedRoute(
            self::ROUTE_NAME, now()->addDays(self::EXPIRATION_DAYS), ['user' => $user->id]
        );
    }

    public function deactivateLink(User $user): string
    {
        return URL::temporarySignedRoute(
            self::ROUTE_NAME, 0, ['user' => $user->id]
        );
    }
}
