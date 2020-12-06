<?php

namespace App\Observers;

use App\Models\Link;

class LinkObserver
{
    /**
     * Handle the Link "deleted" event.
     *
     * @param Link $link
     * @return void
     */
    public function deleted(Link $link)
    {
        $link->stats()->forceDelete();
    }
}
