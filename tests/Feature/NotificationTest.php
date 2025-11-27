<?php

namespace Technobase\Alert\Tests\Feature;

use Illuminate\Support\Facades\Notification;
use Technobase\Alert\Notifications\TestTelegramNotification;
use Technobase\Alert\Tests\TestCase;

class NotificationTest extends TestCase
{
    /** @test */
    public function it_can_send_test_notification(): void
    {
        Notification::fake();

        Notification::route('telegram', config('alert.chat_id'))
            ->notify(new TestTelegramNotification('Test message'));

        Notification::assertSentTo(
            Notification::route('telegram', config('alert.chat_id')),
            TestTelegramNotification::class
        );
    }

    /** @test */
    public function test_notification_has_correct_channel(): void
    {
        $notification = new TestTelegramNotification();
        
        $this->assertContains('telegram', $notification->via(new \stdClass()));
    }
}
