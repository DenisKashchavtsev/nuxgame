<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\ImFeelingLuckyHistory;
use Illuminate\Database\Eloquent\Collection;

class ImFeelingLuckyHistoryRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = ImFeelingLuckyHistory::class;
    }

    public function getLastResults(int $take, int $userId): Collection
    {
        return $this->model::whereUserId($userId)
            ->orderBy('created_at', 'desc')
            ->take($take)
            ->get();
    }
}
