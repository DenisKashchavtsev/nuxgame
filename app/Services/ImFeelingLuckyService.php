<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use App\Repositories\ImFeelingLuckyHistoryRepository;

final class ImFeelingLuckyService
{
    const MIN_RANDOM_NUMBER = 1;
    const MAX_RANDOM_NUMBER = 1000;

    public function __construct(
        private readonly ImFeelingLuckyHistoryRepository $imFeelingLuckyHistoryRepository
    )
    {
    }

    public function imFeelingLucky(User $user): array
    {
        $randomNumber = $this->getRandomNumber();

        $result = [
            'user_id' => $user->id,
            'number' => $randomNumber,
            'result' => $this->getResult($randomNumber),
            'win_amount' => $this->getWinAmount($randomNumber),
        ];

        $this->imFeelingLuckyHistoryRepository->create($result);

        return $result;
    }

    private function getRandomNumber(): int
    {
        return rand(self::MIN_RANDOM_NUMBER, self::MAX_RANDOM_NUMBER);
    }

    private function getResult(int $randomNumber): string
    {
        return $randomNumber % 2 === 0 ? 'Win' : 'Lose';
    }

    private function getWinAmount(int $randomNumber): float
    {
        if ($randomNumber > 900) {
            $winAmount = 0.7 * $randomNumber;
        } elseif ($randomNumber > 600) {
            $winAmount = 0.5 * $randomNumber;
        } elseif ($randomNumber > 300) {
            $winAmount = 0.3 * $randomNumber;
        } else {
            $winAmount = 0.1 * $randomNumber;
        }

        return $winAmount;
    }
}
