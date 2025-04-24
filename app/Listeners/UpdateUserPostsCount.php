<?php
namespace App\Listeners;

use App\Events\PostCreated;
use App\Events\PostDeleted;
use App\Models\User;

class UpdateUserPostsCount
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle($event): void
    {
        if ($event instanceof PostCreated) {
            // \Illuminate\Support\Facades\Log::info('PostCreated Event Triggered', [
            //     'post_id' => $event->post->id,
            //     'user_id' => $event->post->user_id,
            // ]);

            $event->post->user()->increment('posts_count');
        }

        if ($event instanceof PostDeleted) {
            // \Illuminate\Support\Facades\Log::info('PostDeleted Event Triggered', [
            //     'post_id' => $event->post->id,
            //     'user_id' => $event->post->user_id,
            // ]);

            $event->post->user()->decrement('posts_count');
        }
    }
}
