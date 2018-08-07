@if (count($errors) > 0)
    <?php dd($errors) ?>
    <div class="alert alert-danger">
        <p>你的输入有一些问题：</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li><i class="fa fa-remove"></i> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
