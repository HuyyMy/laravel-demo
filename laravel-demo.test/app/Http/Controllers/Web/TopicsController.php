<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\Web\TopicFormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class TopicsController extends Controller
{
    /**
     * TopicsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * 话题列表页
     *
     * @param Request $request
     * @param Topic $topic
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, Topic $topic)
    {
        $topics = $topic->withOrder($request->order)->paginate(20);

        return view('web.topics.index', compact('topics'));
    }

    public function store(TopicFormRequest $request, Topic $topic)
    {
        $topic->fill($request->all());
        $topic->user_id = Auth::id();
        $topic->save();

        return redirect()
            ->to($topic->link())
            ->with(['message' => '话题创建成功！']);
    }

    /**
     * 话题页
     *
     * @param Request $request
     * @param Topic $topic
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, Topic $topic)
    {
        return view('web.topics.show', compact('topic'));
    }

    /**
     * 新建话题
     *
     * @param Topic $topic
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Topic $topic)
    {
        $categories = Category::all();

        return view('web.topics.topic', compact('topic', 'categories'));
    }

    /**
     * 编辑话题
     *
     * @param Topic $topic
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Topic $topic)
    {
        return view('web.topics.topic');
    }

    /**
     * 更新话题
     *
     * @param TopicFormRequest $request
     * @param Topic $topic
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(TopicFormRequest $request, Topic $topic)
    {
        return view();
    }

    /**
     * 删除话题
     *
     * @param Topic $topic
     */
    public function destroy(Topic $topic)
    {
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list(Request $request, Topic $topic)
    {
        return view('web.topics.list', compact('topic'));
    }
}
