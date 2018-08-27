<?php

namespace App\Observers;

use App\Models\Reply;
use App\Notifications\ReplyNotification;

class ReplyObserver
{
    /**
     * @param Reply $reply
     */
    public function creating(Reply $reply)
    {
        $reply->content = clean($reply->content, 'user_topic_body');
    }

    /**
     * @param Reply $reply
     */
    public function created(Reply $reply)
    {
        $reply->topic->increment('reply_count', 1);
        $reply->topic->user->notify(new ReplyNotification($reply));
    }

    /**
     * @param Reply $reply
     */
    public function deleted(Reply $reply)
    {
        $reply->topic->decrement('reply_count', 1);
    }
}
