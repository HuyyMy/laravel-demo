@extends('web.layouts.app')

@section('title', $topic->title)
@section('description', $topic->excerpt)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-lg-3 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text text-center">作者：{{ $topic->user->name }}</p>
                        <hr>
                        <img class="card-img-top img-thumbnail"
                             src="{{ $topic->user->avatar }}"
                             width="300px" height="300px"
                             alt="个人头像">
                    </div>
                </div>
            </div>

            <div class="col col-lg-9 col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">{{ $topic->title }}</h1>
                        <div class="article-meta text-center">
                            <i class="fa fa-clock-o"></i> {{ $topic->created_at->diffForHumans() }}
                            ⋅&nbsp;
                            <i class="fa fa-comments-o"></i> {{ $topic->reply_count }}
                        </div>
                        <div class="row topic-body">
                            <div class="col-md-12">{!! $topic->body !!}</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('topics.index') }}" class="btn btn-outline-primary">
                                    <i class="fa fa-backward"></i> 返回
                                </a>
                                @can('update', $topic)
                                    <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-outline-warning">
                                        <i class="fa fa-edit"></i> 编辑
                                    </a>
                                    <form action="{{ route('topics.destroy', $topic->id) }}" method="post" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger">
                                            <i class="fa fa-trash"></i> 删除
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row reply-list">
                            <div class="col col-md-12">
                                @includeWhen(Auth::check(), 'web.topics.partials.reply_box', ['topic'=>$topic])
                                @include('web.topics.partials.reply_list', ['replies' => $topic->replies()->with('user')->get()])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
