<?php

namespace Tests\Unit;

use App\Models\User;
use App\Services\TemporaryLinkService;
use Illuminate\Support\Facades\URL;
use PHPUnit\Framework\MockObject\MockObject;
use Tests\TestCase;

class TemporaryLinkServiceTest extends TestCase
{
    protected TemporaryLinkService $temporaryLinkService;
    private User|MockObject $userMock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->temporaryLinkService = app()->make(TemporaryLinkService::class);

        $this->mockUserModel();
    }

    protected function mockUserModel(): void
    {
        $this->userMock = $this->getMockBuilder(User::class)
            ->onlyMethods(['save'])
            ->getMock();

        $this->userMock->id = 1;
        $this->userMock->username = 'John Doe';
        $this->userMock->phonenumber = 911;
    }

    public function test_generate_link()
    {
        $link = $this->temporaryLinkService->generateLink($this->userMock);

        $this->assertStringStartsWith(
            URL::to('/dashboard', [
                'user' => $this->userMock->getAttribute('id')
            ]), $link);

        $this->assertStringContainsString('/' . $this->userMock->getAttribute('id'). '?expires=', $link);
    }

    public function test_deactivate_link()
    {
        $link = $this->temporaryLinkService->deactivateLink($this->userMock);

        $this->assertStringStartsWith(URL::to('/dashboard',[
            'user' => $this->userMock->getAttribute('id')
        ]), $link);

        $this->assertStringNotContainsString('expires=', $link);
    }
}
