@if(count($topics))

  <ul class="list-group">
    @foreach ($topics as $topic)
      <li class="list-group-item">
        <a href="{{ route('topics.show', $topic->id) }}">
          {{ $topic->title }}
        </a>
        <span class="meta pull-right">
          <i class="fa fa-reply"></i> {{ $topic->reply_count }}回复
          <span>&nbsp;•&nbsp;</span>
          <i class="fa fa-clock-o"></i> {{ $topic->created_at->diffForHumans() }}
        </span>
      </li>
    @endforeach
  </ul>

@else
  <div class="alert alert-info" role="alert">暂无数据 ~_~</div>
@endif

{{-- 分页 S --}}
{!! $topics->render() !!}
{{-- 分页 E --}}
