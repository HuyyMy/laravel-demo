<?php

namespace App\Policies\Web;

use App\Models\User;
use App\Models\Topic;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicPolicy extends Policy
{
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * 是否是作者本人
     *
     * @param User $user
     * @param Topic $topic
     *
     * @return mixed
     */
    public function update(User $user, Topic $topic)
    {
        return $user->isAuthor($topic);
    }

    /**
     * @param User $user
     * @param Topic $topic
     *
     * @return mixed
     */
    public function destroy(User $user, Topic $topic)
    {
        return $user->isAuthor($topic);
    }
}
