<?php

namespace App\Notifications;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;

class Slack extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Exception $e)
    {
        $this->exception = $e;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    /**
     * @param $notifiable
     * @return $this
     */
    public function toSlack($notifiable)
    {
        $exception = $this->exception;

        return (new SlackMessage)
            ->from(config('slack.name'))
            ->to(config('slack.channel'))
            ->error()
            ->content('エラーを検知しました')
            ->attachment(function ($attachment) use ($exception) {
                $attachment
                    ->title(get_class($exception))
                    ->content($exception->getMessage());
            });
    }
}