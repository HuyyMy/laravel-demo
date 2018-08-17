<?php

namespace App\Observers;

use App\Handlers\TranslateHandler;
use App\Models\Topic;

class TopicObserver
{
    public function saving(Topic $topic)
    {
        // XSS过滤
        $topic->body = clean($topic->body, 'user_topic_body');

        // 生成摘要
        $topic->excerpt = make_excerpt($topic->body);

        if (! $topic->slug) {
            $topic->slug = app(TranslateHandler::class)->translateText($topic->title);
        }
    }
}
