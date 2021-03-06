@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar__brand navbar__mainLogo" href="/"></a>

        @if (Auth::check())
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-md-auto align-items-center">
              <li>
                <a class="btn btn-primary" href="/posts/new">投稿</a>
              </li>
              <li>
                <a class="nav-link commonNavIcon profile-icon" href="/users/{{ Auth::user()->id }}"></a> {{-- Auth::user()でログイン中のユーザーを取得できる --}}
              </li>
            </ul>
          </div>
        @else
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-md-auto align-items-center">
            <li>
              <a class="btn btn-primary" href="{{ route('login') }}">ログイン</a>
            </li>
          </ul>
        </div>
        @endif
      </div>
    </nav>
@endsection
