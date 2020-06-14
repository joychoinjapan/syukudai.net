<nav class="navbar shadow" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ url('/') }}">
                {{ config('app.name', 'Ask.net') }}
            </a>
            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
               data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        @guest
                            <a class="button is-primary" href="{{ route('login') }}">
                                <strong>{{ __('ログイン') }}</strong>
                            </a>
                            @if (Route::has('register'))
                                <a class="button is-light" href="{{ route('register') }}">
                                    {{ __('新規登録') }}
                                </a>
                            @endif
                        @else
                            <message-drop-down login_user_id="{{Auth::user()->id}}"></message-drop-down>
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a id="navbarDropdown" class="navbar-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="navbar-dropdown">
                                    <a class="navbar-item" href="{{url('/questions')}}">
                                        ホーム
                                    </a>
                                    <a class="navbar-item" href="{{route('profile')}}">
                                        設定
                                    </a>
                                    <a class="navbar-item">
                                        <a class="navbar-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            {{ __('ログアウト') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </a>
                                </div>
                            </div>
                    </div>

                    @endguest
                </div>
            </div>
        </div>
    </div>
</nav>
