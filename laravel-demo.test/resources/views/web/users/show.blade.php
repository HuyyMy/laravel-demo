@extends('web.layouts.app')

@section('title', $user->name . ' 的个人中心')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg col-lg-3 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <img class="card-img-top img-thumbnail"
                             src="{{ $user->avatar }}"
                             width="300px" height="300px"
                             alt="个人头像">
                        <hr>
                        <h5 class="card-title">个人简介</h5>
                        <p class="card-text">{{ $user->introduction }}</p>
                        <hr>
                        <h5><strong>注册于</strong></h5>
                        <p>{{ $user->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg col-lg-9 col-md-9 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        {{ $user->name }}
                        <small>{{ $user->email }}</small>
                    </div>
                </div>

                <div class="card mx-auto">
                    <div class="card-body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="{{ route('users.show', $user->id) }}"
                                   class="nav-link {{ active_class(if_query('tab', null)) }}">Ta 的话题</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('users.show', [$user->id, 'tab' => 'replies']) }}"
                                   class="nav-link {{ active_class(if_query('tab', 'replies')) }}">Ta 的回复</a>
                            </li>
                        </ul>
                        @if (if_query('tab', 'replies'))
                            @include('web.users.partials.replies', ['replies' => $user->replies()->with('topic')->updateDesc()->paginate(5)])
                        @else
                            @include('web.users.partials.topics', ['topics' => $user->topics()->updateDesc()->paginate(5)])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
