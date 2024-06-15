<?php

namespace Tests\Unit;

use App\Models\User;
use App\Repositories\ImFeelingLuckyHistoryRepository;
use App\Services\ImFeelingLuckyService;
use PHPUnit\Framework\MockObject\MockObject;
use Tests\TestCase;

class ImFeelingLuckyServiceTest extends TestCase
{
    private User|MockObject $userMock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mockUserModel();
    }

    protected function mockUserModel(): void
    {
        $this->userMock = $this->getMockBuilder(User::class)->onlyMethods(['save'])->getMock();
        $this->userMock->id = 1;
        $this->userMock->username = 'John Doe';
        $this->userMock->phonenumber = 911;
    }

    public function testImFeelingLuckyService()
    {
        $mockRepository = $this->mock(ImFeelingLuckyHistoryRepository::class);
        $mockRepository->shouldReceive('create')->once();

        $imFeelingLuckyService = new ImFeelingLuckyService($mockRepository);
        $result = $imFeelingLuckyService->imFeelingLucky($this->userMock);

        $this->assertArrayHasKey('user_id', $result);
        $this->assertArrayHasKey('number', $result);
        $this->assertArrayHasKey('result', $result);
        $this->assertArrayHasKey('win_amount', $result);

        $mockRepository->shouldHaveReceived('create', [$result])->once();
    }
}
