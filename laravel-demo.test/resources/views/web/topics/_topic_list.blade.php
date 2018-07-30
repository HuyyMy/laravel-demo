@if($topics->count())
    <ul class="list-unstyled">
        @foreach($topics as $topic)
            <li class="media">
                <img clas="mr-3 img-thumbnail" src="{{$topic->user->avatar}}" title="{{$topic->user->name}}"
                     style="width: 52px; height: 52px;" alt="User avatar">
                <div class="media-body">
                    <div class="mt-1 mb-2">
                        <a href="{{$topic->link()}}" title="{{$topic->title}}">{{$topic->title}}</a>
                        <div class="pull-right badge badge-secondary">{{ $topic->reply_count }}</div>
                    </div>
                    <div class="media-meta">
                        <a href="{{ route('categories.show', $topic->category->id) }}" title="{{ $topic->category->name }}">
                            <i class="fa fa-folder-open"></i> {{ $topic->category->name }}
                        </a>
                        <sapn>&nbsp;•&nbsp;</sapn>
                        <a href="{{ route('users.show', [$topic->user_id]) }}" title="{{ $topic->user->name }}">
                            <i class="fa fa-user"></i> {{ $topic->user->name }}
                        </a>
                        <sapn>&nbsp;•&nbsp;</sapn>
                        <i class="fa fa-clock-o"></i>
                        <span class="timeago" title="最后活跃于">{{ $topic->updated_at->diffForHumans() }}</span>
                    </div>
                </div>
            </li>

            @if(! $loop->last)
                <hr>
            @endif
        @endforeach
    </ul>
@else
    <div class="alert alert-warning" role="alert">暂无数据 ~_~</div>
@endif
