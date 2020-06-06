<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="api-token"
          content="{{\Illuminate\Support\Facades\Auth::check()?'Bearer '.Auth::user()->api_token:'Bearer '}}">
    <title>{{ config('app.name', '宿題.net') }}</title>
    <script src={{asset("js/ckeditor4/ckeditor.js")}}></script>
    <script src={{asset("js/ckeditor4-vue/dist/ckeditor.js")}}></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/3da8d3546b.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
          integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    {{--    <link href="{{ asset('@ttskch/select2-bootstrap4-theme/dist/select2-bootstrap4.css') }}" rel="stylesheet">--}}

</head>
<style>
    /**:not(path):not(g) {*/
    /*    color:                    hsla(210, 100%, 100%, 0.9) !important;*/
    /*    background:               hsla(210, 100%,  50%, 0.5) !important;*/
    /*    outline:    solid 0.15rem hsla(210, 100%, 100%, 0.5) !important;*/

    /*    box-shadow: none !important;*/
    /*}*/

    .card{
        background-color: transparent;
        border-color:#fff;
        color:#fff;
    }

    .card-header{
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-bottom-color: #fff;
    }

    .col-form-label{
        padding-left: 0;
        padding-right: 0;
    }

    .column{
        padding:2rem;
    }

</style>
<body>
<div id="app">
{{--        <div class="container">--}}
{{--            @include('flash::message')--}}
{{--        </div>--}}
    <main>
{{--        .hero--}}
        <section class="hero is-medium has-background-white">
            <div class="hero-head">
                @include('layouts.navbar')
            </div>
            <div class="hero-body pb-lg-1">
                <div class="container site-description">
                   <div class="columns">
                       <div class="column">
                           <h1 class="title is-size-1">
                               Ask
                           </h1>
                           <h2 class="subtitle">
                               プログラミング学習は
                               <br>
                               うまく進まない時に、声をかけてください
                           </h2>
                           <div>
                               <button class="button is-primary">もっと詳しく...</button>
                           </div>
                       </div>
                       <div class="column">
                           <figure class="image center">
                               <img class="bannberPh" src="{{asset('/img/bannerpic.gif')}}">
                           </figure>
                       </div>
                   </div>
                </div>
            </div>
        </section>
{{--        /.hero--}}
        <section class="section has-background-light">
            <div class="container description-container">
                <div class="has-text-centered is-centered mb-lg-4">
                  <img src="{{asset('/img/prog-11.png')}}" width="128" height="128">
                </div>
                <div class="has-text-centered is-centered">
                    <h2 class="title mb-1">
                       あなたはプログラミングを独習していますか?
                    </h2>
                    <p>
                       独習者は挫折しがちです。あなたは以下の問題を直面しているかもしれません:
                    </p>
                    <div class="description-list">
                        <ul class="list-wrap">
                            <li class="list-difficult">環境構築は手順通りに進まない</li>
                            <li class="list-difficult">一緒に勉強する仲間はいない</li>
                            <li class="list-difficult">エラーメッセージは読めなくて...周りにエンジニアいなくて質問できない</li>
                            <li class="list-difficult">自分の作品を作りたいけど、どこから着手するかわからない</li>
                        </ul>
                    </div>
                    <h3>
                        自由に質問できる環境、一緒に頑張れる仲間、プロジェクトに得られた実経験...がほしい！
                    </h3>
                    <h3>
                        独習で頑張っているあなたを、<strong>Ask</strong>は全力でサポートします！
                    </h3>
                </div>
            </div>
        </section>
        <section class="section has-background-white-bis">
            <div class="container description-container">
                <div class="has-text-centered is-centered my-2">
                    <h2 class="title mb-1">
                        黙々と講座を受講するだけじゃない！
                    </h2>
                    <p>
                       多人数プロジェクトに参加、実務経験は手に入る！
                    </p>
                </div>
                <div class="columns my-2">
                    <div class="column mr-1">
                        <img src="{{asset('/img/school.png')}}" width="128" height="128">
                    </div>
                    <div class="column mr-1">
                        <img src="{{asset('/img/team.png')}}" width="128" height="128">
                    </div>
                    <div class="column mr-1">
                        <img src="{{asset('/img/monitor.png')}}" width="128" height="128">
                    </div>
                    <div class="column">
                        <img src="{{asset('/img/data.png')}}" width="128" height="128">
                    </div>
                </div>
            </div>
        </section>
        <section class="section has-background-light">
            <div class="container description-container">
                <div class="columns">
                    <div class="column is-center has-text-centered vertical">
                        <h2 class="title mb-1">
                            質問投稿掲示板
                        </h2>
                        <div class="description-list">
                            <ul>
                                <li>類似問題は検索可能、他人の解決策をシェアできる</li>
                                <li>難解問題はチャットでその場で解決</li>
                                <li>更に、質問投稿と回答でAポイントを獲得、有料講座をポイントで実質無料に視聴できる</li>
                            </ul>
                        </div>
                    </div>
                    <div class="column">
                        <div class="shadow is-centered my-2">
                                <img src="{{asset('/img/keiji.png')}}" width="512" height="400">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer">
            <div class="content has-text-centered">
                <p>
                    <strong>Ask</strong> by <a href="https://jgthms.com">Joy cho</a>. The source code is licensed
                    <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
                    is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
                </p>
            </div>
        </footer>
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
