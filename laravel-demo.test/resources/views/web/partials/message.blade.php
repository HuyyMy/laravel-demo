@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><i class="fa fa-hand-o-right"></i> 你的输入有一些问题：</strong>
        <hr>
        @foreach ($errors->all() as $error)
            <p><i class="fa fa-remove"></i> {{ $error }}</p>
        @endforeach
    </div>
@endif
