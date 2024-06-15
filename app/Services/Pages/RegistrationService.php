<?php

declare(strict_types=1);

namespace App\Services\Pages;

use App\Models\User;
use App\Repositories\UserRepository;

final class RegistrationService
{
    public function __construct(
        private readonly UserRepository $userRepository
    )
    {
    }

    public function registration(array $data): User
    {
        return $this->userRepository->create($data);
    }
}
