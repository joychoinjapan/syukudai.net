@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="my-3">
                    <h3 class="title my-2">{{$question->title}}</h3>
                    @foreach($question->topics as $topic)
                        <span class="tag is-info is-light is-rounded ">{{$topic->name}}</span>
                    @endforeach
                </div>
                <article class="message">
                    <div class="message-body">
                        {!!$question->content!!}
                    </div>
                </article>
                <div class="field is-grouped is-pulled-right">
                    @if(Auth::check()&&Auth::user()->owns($question))
                    <p class="control">
                        <button class="button is-info is-outlined is-small" onclick="location.href='/questions/{{$question->id}}/edit'">
                            編集
                        </button>
                    </p>
                    <p class="control">
                        <button class="button is-danger is-outlined is-small">
                            削除
                        </button>
                    </p>
                    @endif
                </div>
            </div>
        </div>
</div>
    @endsection
