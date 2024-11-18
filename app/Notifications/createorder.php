<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class createorder extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $order_id;
    public $user_create_order;
    public function __construct($order_id,$user_create_order)
    {
        $this->order_id=$order_id;
        $this->user_create_order=$user_create_order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }


    public function toDatabase(object $notifiable): array
    {
        return [
            'order_id'=>$this->order_id,
            'user_create_order'=>$this->user_create_order,
        ];
    }
}
