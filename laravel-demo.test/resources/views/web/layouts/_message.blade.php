<div class="container">
  @if(Session::has('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong><i class="fas fa-exclamation-circle"></i></strong> {{ Session::get('warning') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif

  @if(Session::has('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong><i class="fas fa-info-circle"></i></strong> {{ Session::get('info') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif

  @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="fas fa-check-circle"></i></strong> {{ Session::get('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif

  @if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong><i class="fas fa-times-circle"></i></strong> {{ Session::get('error') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif

  @if(Session::has('primary'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
      <strong><i class="fas fa-meh"></i></strong> {{ Session::get('primary') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
</div>
