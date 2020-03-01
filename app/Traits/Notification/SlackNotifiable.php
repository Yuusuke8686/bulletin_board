<?php
namespace App\Traits\Notification;

use Illuminate\Notifications\RoutesNotifications;

trait SlackNotifiable
{
    use RoutesNotifications;

    public function routeNotificationForSlack()
    {
        return config('slack.webhook_url');
    }
}