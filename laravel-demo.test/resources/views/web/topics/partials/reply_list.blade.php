<ul class="list-unstyled">
  @foreach($replies as $index => $reply)
    <li class="media">
      <a href="{{ route('users.show', [$reply->user_id]) }}">
        <img src="{{ $reply->user->avatar }}" title="{{ $reply->user->name }}"
             alt="{{ $reply->user->name }}" class="mr-3 img-thumbnail"
             style="width: 48px; height: 48px;">
      </a>
      <div class="media-body">
        <div class="mt-1 mb-2">
          <a href="{{ route('users.show', [$reply->user_id]) }}" title="{{ $reply->user->name }}">
            <i class="fa fa-user"></i> {{ $reply->user->name }}
          </a>
          <span>&nbsp;•&nbsp;</span>
          <span title="最后活跃于" class="timeago">
            <i class="fa fa-clock-o"></i> {{ $reply->created_at->diffForHumans() }}
          </span>
          @can('destroy', $reply)
            <form action="{{ route('replies.destroy', $reply->id) }}" method="post" style="display: inline;">
              @csrf
              @method('DELETE')
              <span class="pull-right">
                <button type="submit" class="btn btn-outline-danger btn-sm">
                  <i class="fa fa-trash"></i>
                </button>
              </span>
            </form>
          @endcan
        </div>
        <div class="media-meta">{!! $reply->content !!}</div>
      </div>
    </li>
    <hr>
  @endforeach
</ul>
