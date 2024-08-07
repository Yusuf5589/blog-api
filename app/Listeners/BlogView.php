<?php

namespace App\Listeners;

use App\Events\Blog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BlogView
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
    public function handle(Blog $event): void
    {
            $event->blog->increment('view_count');
    }
}
