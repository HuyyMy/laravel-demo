@extends('web.layouts.app')

@section('title', $user->name . ' 的个人中心')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg col-lg-3 col-md-3">
        <div class="card">
          <div class="card-body">
            <img class="card-img-top img-thumbnail"
                 src="http://pbfa6u6aq.bkt.clouddn.com/image/user/avatar/Ji3ohCho5Quov5UL.jpg"
                 width="300px" height="300px"
                 alt="个人头像">
            <hr>
            <h5 class="card-title">个人简介</h5>
            <p class="card-text">中国人民解放军炮兵指挥学院2018届新兵</p>
            <hr>
            <h5><strong>注册于</strong></h5>
            <p>3个月前</p>
          </div>
        </div>
      </div>
      <div class="col-lg col-lg-9 col-md-9 col-sm-12">
        <div class="card">
          <div class="card-body">
            Alphabeter
            <small>Alphabeter@qq.com</small>
          </div>
        </div>

        <div class="card mx-auto">
          <div class="card-body">
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a href="{{ route('users.show', $user->id) }}"
                   class="nav-link active">Ta 的话题</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('users.show', [$user->id, 'tab' => 'replies']) }}"
                   class="nav-link ">Ta 的回复</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
