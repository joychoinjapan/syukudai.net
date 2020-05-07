<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="api-token" content="{{\Illuminate\Support\Facades\Auth::check()?'Bearer '.Auth::user()->api_token:'Bearer '}}">

    <title>{{ config('app.name', '宿題.net') }}</title>

    <!-- Scripts -->

{{--    <script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>--}}

{{--    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>--}}
    <script src={{asset("js/ckeditor4/ckeditor.js")}}></script>
    <script src={{asset("js/ckeditor4-vue/dist/ckeditor.js")}}></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
{{--    <link href="{{ asset('bulma/css/bulma.min.css') }}" rel="stylesheet">--}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
{{--    <link href="{{ asset('@ttskch/select2-bootstrap4-theme/dist/select2-bootstrap4.css') }}" rel="stylesheet">--}}

</head>
<body>
<div id="app">
        <nav class="navbar" role="navigation" aria-label="main navigation">
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
                                <div class="navbar-item has-dropdown is-hoverable">
                                    <a id="navbarDropdown" class="navbar-link dropdown-toggle" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <div class="navbar-dropdown">
                                        <a class="navbar-item">
                                            ホーム
                                        </a>
                                        <a class="navbar-item">
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
        </nav>

<div class="container">
    @include('flash::message')
</div>
<main class="py-4">
    @yield('content')
</main>
</div>
<script src="//code.jquery.com/jquery.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script>
    $('#flash-overlay-modal').modal();
</script>
@yield('js')
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
