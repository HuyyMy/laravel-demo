@extends('web.layouts.app')

@section('title', '我的通知')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1">
                <div class="card">

                    <div class="card-body">
                        <h3 class="text-center">
                            <i class="fa fa-bell-o"></i> 我的通知
                        </h3>
                    </div>
                    <hr>

                    @if ($notifications->count())
                        <div class="notifications-list">
                            @foreach ($notifications as $notification)
                                @include('web.notifications.types.' . snake_case(class_basename($notification->type)))
                            @endforeach
                            {!! $notifications->render !!}
                        </div>
                    @else
                        <div class="alert alert-warning" role="alert">暂无数据 ～</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
