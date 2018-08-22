<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\Web\ReplyFormRequest;
use App\Models\Reply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RepliesController extends Controller
{
    /**
     * RepliesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 回复话题
     *
     * @param ReplyFormRequest $request
     * @param Reply $reply
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ReplyFormRequest $request, Reply $reply)
    {
        $attribute = 'content';
        $reply->content = $request->{$attribute};
        $reply->user_id = Auth::id();
        $reply->topic_id = $request->topic_id;

        $reply->save();

        return redirect()
            ->to($reply->topic->link())
            ->with('success', '回复成功！');
    }

    /**
     * 删除回复
     *
     * @param Request $request
     * @param Reply $reply
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Exception
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Request $request, Reply $reply)
    {
        $this->authorize('destroy', $reply);
        $reply->delete();

        return redirect()
            ->to($reply->tipic->link())
            ->with('success', '删除成功！');
    }
}
