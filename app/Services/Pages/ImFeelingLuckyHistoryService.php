<?php

declare(strict_types=1);

namespace App\Services\Pages;

use App\Models\User;
use App\Repositories\ImFeelingLuckyHistoryRepository;
use Illuminate\Database\Eloquent\Collection;

final class ImFeelingLuckyHistoryService
{
    const LIMIT_HISTORY = 3;

    public function __construct(private readonly ImFeelingLuckyHistoryRepository $imFeelingLuckyHistoryRepository)
    {
    }

    public function getLastResults(User $user): Collection
    {
        return $this->imFeelingLuckyHistoryRepository->getLastResults(self::LIMIT_HISTORY, $user->id);
    }
}
