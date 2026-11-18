<?php

namespace App\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotificationSent implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $message;
    public $userId;  // Store the ID of the user who will receive the notification

    /**
     * Create a new event instance.
     */
    public function __construct($message, $userId)
    {
        $this->message = $message;
        $this->userId = $userId; // Set the user ID for the notification
   // Log the message and user ID
   \Log::info('NotificationSent event triggered', [
    'message' => $this->message,
    'user_id' => $this->userId,
]);
    }

    /**
     * Get the channels the event should broadcast on.
     */
    public function broadcastOn()
    {
        // Use private channel for the specific user
        return new PrivateChannel('notifications.' . $this->userId);
    }

    /**
     * Data to be broadcast.
     */
    public function broadcastWith()
    {
        return [
            'message' => $this->message,
        ];
    }
}
