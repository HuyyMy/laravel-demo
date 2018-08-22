@if(count($replies))

  <ul class="list-group">
    @foreach ($replies as $reply)
      <li class="list-group-item">
        <div>
          <a href="{{ $reply->topic->link(['#reply' . $reply->id]) }}">
            {{ $reply->topic->title }}
          </a>
        </div>
        <div>{!! $reply->content !!}</div>
        <div class="meta">
          <i class="fa fa-clock-o"></i> 回复于 {{ $reply->created_at->diffForHumans() }}
        </div>
      </li>
    @endforeach
  </ul>

@else
  <div class="alert alert-info" role="alert">暂无数据 ~_~</div>
@endif

{{-- 分页 S --}}
{!! $replies->appends(Request::except('page'))->render() !!}
{{-- 分页 E --}}
