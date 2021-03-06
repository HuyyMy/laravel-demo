<?php

namespace App\Http\Controllers\Web;

use App\Handlers\ImageHandler;
use App\Handlers\TranslateHandler;
use App\Http\Requests\Web\TopicFormRequest;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Access\HandlesAuthorization;
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

    /**
     * @param TopicFormRequest $request
     * @param Topic $topic
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TopicFormRequest $request, Topic $topic)
    {
        $topic->fill($request->all());
        $topic->user_id = Auth::id();
        $topic->save();

        return redirect()
            ->to($topic->link())
            ->with(['success' => '话题创建成功！']);
    }

    /**
     * 话题详情
     *
     * @param Request $request
     * @param Topic $topic
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function show(Request $request, Topic $topic)
    {
        if (! empty($topic->slug) && $topic->slug !== $request->slug) {
            return redirect($topic->link(), 301);
        }

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
        try {
            $this->authorize('update', $topic);
        } catch (AuthorizationException $e) {
        }
        $categories = Category::all();

        return view('web.topics.topic', compact(
            'topic',
            'categories'
        ));
    }

    /**
     * 更新话题
     *
     * @param TopicFormRequest $request
     * @param Topic $topic
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(TopicFormRequest $request, Topic $topic, TranslateHandler $translate)
    {
        try {
            $this->authorize('update', $topic);
        } catch (AuthorizationException $e) {

        }

        $topic->fill($request->all());
        $topic->slug = $translate->translateText($request->title);
        $topic->update($request->all());

        return redirect()
            ->to($topic->link())
            ->with(['success' => '话题更新成功！']);
    }

    /**
     * 删除话题
     *
     * @param Topic $topic
     */
    public function destroy(Topic $topic)
    {
        try {
            $this->authorize('destroy', $topic);
        } catch (AuthorizationException $e) {

        }
        $topic->delete();

        return redirect()
            ->route('topics.index')
            ->with(['success' => '话题删除成功！']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list(Request $request, Topic $topic)
    {
        return view('web.topics.list', compact('topic'));
    }

    /**
     * 上传话题图片
     *
     * @param Request $request
     * @param ImageHandler $handler
     *
     * @return array
     */
    public function upload(Request $request, ImageHandler $handler)
    {
        $data = [
            'status' => false,
            'msg'    => '上传失败',
            'path'   => '',
        ];

        if ($file = $request->uploader) {
            $result = $handler->upload($request->uploader, 'topics', Auth::id(), 1024);

            if ($result) {
                $data = [
                    'status' => true,
                    'msg'    => '上传成功',
                    'path'   => $result['path'],
                ];
            }
        }

        return $data;
    }
}
