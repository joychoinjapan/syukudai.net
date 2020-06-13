@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <header class="card-content">
                        <div class="tabs">
                            <ul>
                                <li class="is-active"><a>おすすめ</a></li>
                                <li><a>フォロー</a></li>
                                <li><a>人気Ask</a></li>
                            </ul>
                        </div>
                    </header>
                @foreach($questions as $question)
                        <div class="card-content answer-block p-0">
                            <article class="media">
                                <figure class="media-left">
                                    <p class="image is-64x64">
                                        <img src="https://bulma.io/images/placeholders/128x128.png">
                                    </p>
                                </figure>
                                <div class="media-content">
                                    {{--質問の内容--}}
                                    <div class="content">
                                        <p>
                                            <strong class="small">{{$question->user->name}}</strong>
                                            <br>
                                            <a href="/questions/{{$question->id}}" class="is-hoverable">
                                                <strong>{{$question->title}}</strong>
                                                <br>
                                                <span class="limit-line">
                                             {{strip_tags($question->content)}}
                                        </span>
                                            </a>
                                            <br>
                                            <small><a>Like</a> · <a>Reply</a> · 3 hrs</small>
                                        </p>
                                    </div>
                                    {{--解答1--}}
                                    <article class="media">
                                        <figure class="media-left">
                                            <p class="image is-48x48">
                                                <img src="https://bulma.io/images/placeholders/96x96.png">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <div class="content">
                                                <p>
                                                    <strong>Sean Brown</strong>
                                                    <br>
                                                    Donec sollicitudin urna eget eros malesuada sagittis. Pellentesque
                                                    habitant
                                                    morbi tristique senectus et netus et malesuada fames ac turpis
                                                    egestas.
                                                    Aliquam blandit nisl a nulla sagittis, a lobortis leo feugiat.
                                                    <br>
                                                    <small><a>Like</a> · <a>Reply</a> · 2 hrs</small>
                                                </p>
                                            </div>

                                            <article class="media">
                                                Vivamus quis semper metus, non tincidunt dolor. Vivamus in mi eu lorem
                                                cursus
                                                ullamcorper sit amet nec massa.
                                            </article>

                                            <article class="media">
                                                Morbi vitae diam et purus tincidunt porttitor vel vitae augue. Praesent
                                                malesuada metus sed pharetra euismod. Cras tellus odio, tincidunt
                                                iaculis diam
                                                non, porta aliquet tortor.
                                            </article>
                                        </div>
                                    </article>
                                    {{--解答2--}}
                                    <article class="media">
                                        <figure class="media-left">
                                            <p class="image is-48x48">
                                                <img src="https://bulma.io/images/placeholders/96x96.png">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <div class="content">
                                                <p>
                                                    <strong>Kayli Eunice </strong>
                                                    <br>
                                                    Sed convallis scelerisque mauris, non pulvinar nunc mattis vel.
                                                    Maecenas
                                                    varius felis sit amet magna vestibulum euismod malesuada cursus
                                                    libero.
                                                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                                                    posuere
                                                    cubilia Curae; Phasellus lacinia non nisl id feugiat.
                                                    <br>
                                                    <small><a>Like</a> · <a>Reply</a> · 2 hrs</small>
                                                </p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4 col-md-offset-2">
                <div class="card mb-2">
                    <div class="card-header-title">
                       操作ブロック
                    </div>
                    <div class="card-content">
                        <p>プログラミングって独学でやると難しいでしゃうか</p>
                        <p>プログラミングって独学でやると難しいでしゃうか</p>
                        <p>プログラミングって独学でやると難しいでしゃうか</p>
                        <p>プログラミングって独学でやると難しいでしゃうか</p>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header-title">
                       データ分析
                    </div>
                    <div class="card-content">
                        <p>プログラミングって独学でやると難しいでしゃうか</p>
                        <p>プログラミングって独学でやると難しいでしゃうか</p>
                        <p>プログラミングって独学でやると難しいでしゃうか</p>
                        <p>プログラミングって独学でやると難しいでしゃうか</p>
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
