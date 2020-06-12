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
            <div class="col-md-4 row">
                <button class="button list-button is-light">
                    <div>
                        フォロワー
                    </div>
                    <strong>
                        {{$question->followers_count}}人
                    </strong>
                </button>
                <div class="read-block">
                    <p>閲覧数</p>
                    <strong>12,8773</strong>
                </div>
            </div>
            @if(Auth::check())
            <div class="col-md-12 question-main">
                <div class="field is-grouped is-pulled-left">
                        @if(Auth::user()->owns($question))
                            <p class="control">
                                <button class="button is-info is-outlined is-small"
                                        onclick="location.href='/questions/{{$question->id}}/edit'">
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
                                <question-follow-button question="{{$question->id}}"
                                                        user="{{Auth::id()}}">
                                </question-follow-button>
                                <button class="button is-link is-outlined ">
                                    答える
                                </button>
                                <question-comments-button
                                    id="{{$question->id}}"
                                    type="question"
                                    count="{{$question->comments()->count()}}"
                                    v-on:show="showCommentModal">
                                </question-comments-button>
                            </p>
                        @endif
                </div>
            </div>
            @endif
            <div class="col-md-8">
                <div class="card my-2">
                    @if(Auth::check())
                        <input v-model="question_id" hidden value="{{$question->id}}">
                        <div class="card-content answer-block">
                            <div class="media">
                                <div class="media-left">
                                    <figure class="image is-48x48">
                                        <img src="https://bulma.io/images/placeholders/96x96.png"
                                             alt="Placeholder image">
                                    </figure>
                                </div>
                                <div class="media-content">
                                    <p class="title is-4">{{Auth::user()->name}}</p>
                                    <p class="subtitle is-6">@johnsmith</p>
                                </div>
                            </div>
                                <div class="control edit-answer-area mb-3" id="ckeditor">
                                    <ckeditor v-model="editorData"></ckeditor>
                                </div>
                                <p class="help is-danger" v-if="content_e">内容は26文字以上にしてください</p>
                                <div class="field is-grouped">
                                    <div class="control">
                                        <button class="button is-link is-small" @click="sendAnswer({{$question->id}})">投稿</button>
                                    </div>
                                    <div class="control">
                                        <button class="button is-link is-light is-small">キャンセル</button>
                                    </div>
                                </div>
                        </div>
                    @else
                        <a href="{{url('login')}}" class="button is-success is-light ">ログインして回答する</a>
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
                                <user-profile-pop name="{{$answer->user->name}}"
                                                  user="{{$answer->user->id}}"
                                                  login="{{Auth::user()?Auth::user()->id:null}}"
                                                  field="Python">
                                </user-profile-pop>
                                <div class="content">
                                    {!!$answer->content!!}
                                    <br>
                                    <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                                </div>
                                <div class="vote-block">
                                    <user-vote-button votes_count="{{$answer->votes_count}}" answer_id="{{$answer->id}}"></user-vote-button>
                                    <answer-comments-button v-on:show="showCommentModal"
                                                              type="answer"
                                                              id="{{$answer->id}}">
                                    </answer-comments-button>
                                    <button class="button is-light is-success"><i class="fas fa-folder mr-1"></i>ストック</button>
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
            <comments v-show="displayComments"
                      v-on:close="closeCommentModal"
                      :type=type
                      :id=id
                      :lists=commentListing>
            </comments>
        </div>

    </div>
@endsection
@section('js')
    <script>
        // CKEDITOR.replace('content')
    </script>
@endsection
