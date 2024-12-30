<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotificationEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

    public $notification;
    public $userId;
    public function __construct($notification, $userId)
    {
        $this->notification = $notification;
        $this->userId = $userId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): Channel
    {
        return new PrivateChannel('notifications.' . $this->userId);
    }

    public function broadcastWith()
    {
        return [
            'id' => $this->notification['id'],
            'userId' => $this->userId,
            'body' => $this->notification['body'],
            'post_id' => $this->notification['post_id'],
            'created_at' => $this->notification['created_at'],
        ];
    }

    public function broadcastAs()
    {
        return 'NotificationEvent';
    }
}
