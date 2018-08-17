<?php

namespace App\Observers;

use App\Models\Topic;

class TopicObserver
{
    public function saving(Topic $topic)
    {
        $topic->body = clean($topic->body, 'user_topic_body');
        $topic->excerpt = make_excerpt($topic->body);
    }
}
