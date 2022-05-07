<?php

namespace App\Events;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ApiRequestHit
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Request User.
     * @var User $user
     */
    public $user;

    /**
     * Request Time.
     * @var Carbon $time
     */
    public $time;

    /**
     * Create a new event instance.
     *
     * @param  User  $user
     * @param  Carbon  $time
     * @return void
     */
    public function __construct(User $user, Carbon $time)
    {
        $this->user = $user;
        $this->time = $time;
    }
}
