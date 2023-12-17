<?php

namespace Modules\Rotas\Events;

use Illuminate\Queue\SerializesModels;

class AddDayoff
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $request;
    public $profile;
    public function __construct($request , $profile)
    {
        $this->request = $request;
        $this->profile = $profile;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
