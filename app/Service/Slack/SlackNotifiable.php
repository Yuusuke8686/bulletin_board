<?php

namespace App\Service\Slack;

use Illuminate\Notifications\Notifiable;
use App\Notifications\SlackNotification;
use Exception;
use Illuminate\Notifications\RoutesNotifications;

class SlackNotifiable
{
  //use RoutesNotifications;
  protected $slack;
  use Notifiable;

  protected function routeNotificationForSlack()
  {
    return config('slack.webhook_url');
  }
}