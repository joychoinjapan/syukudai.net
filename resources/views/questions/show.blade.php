@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="my-3">
                    <h3 class="title my-2">{{$question->title}}</h3>
                    @foreach($question->topics as $topic)
                        <span class="tag is-info is-light is-rounded ">{{$topic->name}}</span>
                    @endforeach
                </div>
                <article class="content">
                    {!!$question->content!!}
                </article>
            </div>
            <div class="col-md-4">
                <button>
                    <div>
                        フォロワー
                    </div>
                    <div>
                        2人
                    </div>
                </button>
            </div>
            <div class="col-md-12 question-main">
                <div class="field is-grouped is-pulled-left">
                    @if(Auth::check()&&Auth::user()->owns($question))
                        <p class="control">
                            <button class="button is-info is-outlined is-small" onclick="location.href='/questions/{{$question->id}}/edit'">
                                編集
                            </button>
                        </p>
                        <form action="/questions/{{$question->id}}" method="POST">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <p class="control">
                                <button class="button is-danger is-outlined is-small" type="submit">
                                    削除
                                </button>
                            </p>
                        </form>
                    @else
                        <p class="control">
                            <button class="button is-link is-outlined is-small">
                                答える
                            </button>
                        </p>
                    @endif
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-2">
                    @if(Auth::check())
                    <div class="card-content answer-block">
                        <div class="media">
                            <div class="media-left">
                                <figure class="image is-48x48">
                                    <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                </figure>
                            </div>
                            <div class="media-content">
                                <p class="title is-4">{{Auth::user()->name}}</p>
                                <p class="subtitle is-6">@johnsmith</p>
                            </div>
                        </div>
                        <form action="/question/{{$question->id}}/answer" method="post">
                            {{csrf_field()}}
                            <div class="control edit-answer-area mb-3">
                                <textarea class="textarea" placeholder="Textarea" name="content" id="content"></textarea>
                            </div>
                            <div class="field is-grouped">
                                <div class="control">
                                    <button class="button is-link is-small">投稿</button>
                                </div>
                                <div class="control">
                                    <button class="button is-link is-light is-small">キャンセル</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @else
                         <a href="{{url('login')}}" class="button is-success is-light">ログインして回答する</a>
                    @endif
                </div>
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            答えは{{$question->answers_count}}件あります
                        </p>
                        <a href="#" class="card-header-icon" aria-label="more options">
                          <span class="icon">
                            <i class="fas fa-arrows-alt-v"></i>
                          </span>
                            新しい順
                        </a>
                    </header>
                    @foreach($question->answers as $answer)
                     <div class="card-content answer-block">
                            <div class="media">
                                <div class="media-left">
                                    <figure class="image is-48x48">
                                        <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                    </figure>
                                </div>
                                <div class="media-content">
                                    <p class="title is-4">{{$answer->user->name}}</p>
                                    <p class="subtitle is-6">@johnsmith</p>
                                </div>
                            </div>
                            <div class="content">
                                {!!$answer->content!!}
                                <br>
                                <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                            </div>
                        </div>
                    @endforeach
                    <div class="card-content answer-block">
                        <div class="media">
                            <div class="media-left">
                                <figure class="image is-48x48">
                                    <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                </figure>
                            </div>
                            <div class="media-content">
                                <p class="title is-4">John Smith</p>
                                <p class="subtitle is-6">@johnsmith</p>
                            </div>
                        </div>
                        <div class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Phasellus nec iaculis mauris.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Phasellus nec iaculis mauris.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Phasellus nec iaculis mauris.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Phasellus nec iaculis mauris.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Phasellus nec iaculis mauris.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Phasellus nec iaculis mauris.
                            <br>
                            <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card ad-banner">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
                        </figure>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header-title">
                        関連性が高いQ&A
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
@section('js')
    <script>
        CKEDITOR.replace('content')
    </script>
@endsection
