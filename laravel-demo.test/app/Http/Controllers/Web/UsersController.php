<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\UserFormRequest;

class UsersController extends Controller
{
    /**
     * 用户详情页
     *
     * @param Request $request
     * @param User $user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, User $user)
    {
        return view('web.users.show', compact('user'));
    }

    /**
     * 编辑
     *
     * @param Request $request
     * @param User $user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, User $user)
    {
        return view('web.users.edit', compact('user'));
    }

    public function update(
        UserFormRequest $request,
        User $user
    ) {
        $data = $request->all();

        if ($request->avatar) {
        }
        $user->update($data);

        return redirect()
            ->route('users.show', $user->id)
            ->with('success', '个人资料更新成功！');
    }
}
