@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <answers-card-guest :questions="{{$questions}}"/>
            </div>
            <div class="col-md-4 col-md-offset-2">
                <div class="card mb-2">
                    <div class="card-header-title">
                       操作
                    </div>
                    <div class="card-content p-3">
                        <div class="columns has-text-centered is-centered">
                            <div class="column">
                                <a class="operation" href="{{url('/questions/create')}}">
                                    <i class="fas fa-chalkboard-teacher fa-2x m-1"></i>
                                    <p>質問する</p>
                                </a>
                            </div>
                            <div class="column">
                                <a class="operation" href="#">
                                    <i class="far fa-clipboard fa-2x m-1"></i>
                                    <p>答える</p>
                                </a>
                            </div>
                            <div class="column">
                                <a class="operation"  href="#">
                                    <i class="far fa-folder fa-2x m-1"></i>
                                    <p>ストック</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                        <div class="card-header-title">
                           注目されているユーザー
                        </div>
                        <div class="card-content p-3">
                            <article class="media">
                                <figure class="media-left">
                                    <p class="image is-48x48">
                                        <img src="https://bulma.io/images/placeholders/96x96.png">
                                    </p>
                                </figure>
                                <div class="media-content">
                                    <div class="content">
                                        <p>
                                            <strong>浩輔</strong>
                                            <span class="tag answer-rec ms-1">人気講師</span>
                                            <br>
                                            浩輔です。現在PHP入門コースは開講中です。
                                            <br>
                                            <small><a>いいね 112</a> · <a>ストック 21</a></small>
                                        </p>
                                    </div>
                                </div>
                            </article>
                            <article class="media">
                                <figure class="media-left">
                                    <p class="image is-48x48">
                                        <img src="https://bulma.io/images/placeholders/96x96.png">
                                    </p>
                                </figure>
                                <div class="media-content">
                                    <div class="content">
                                        <p>
                                            <strong>良太</strong>
                                            <span class="tag answer-rec ms-1">技術ブロガー</span>
                                            <br>
                                            良太です。現在はVue.jsについて執筆中です。
                                            <br>
                                            <small><a>いいね 34</a> · <a>ストック 20</a></small>
                                        </p>
                                    </div>
                                </div>
                            </article>
                        </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header-title">
                        書店、書評、求人、live、コース、プロジェクト
                    </div>
                    <div class="card-content">
                        <p>プログラミングって独学でやると難しいでしゃうか</p>
                        <p>プログラミングって独学でやると難しいでしゃうか</p>
                        <p>プログラミングって独学でやると難しいでしゃうか</p>
                        <p>プログラミングって独学でやると難しいでしゃうか</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
