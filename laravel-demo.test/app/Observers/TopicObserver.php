<?php

namespace App\Observers;

use App\Jobs\TranslateJob;
use App\Models\Topic;

class TopicObserver
{
    public function saving(Topic $topic)
    {
        // XSS过滤
        $topic->body = clean($topic->body, 'user_topic_body');

        // 生成摘要
        $topic->excerpt = make_excerpt($topic->body);
    }

    public function saved(Topic $topic)
    {
        if (! $topic->slug) {
            dispatch(new TranslateJob($topic));
        }
    }
}
