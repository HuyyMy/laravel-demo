<?php

namespace App\Policies\Web;

use App\Models\User;
use App\Models\Reply;

class ReplyPolicy extends Policy
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

    public function destroy(User $user, Reply $topic)
    {
        return $user->isAuthor($topic);
    }
}
