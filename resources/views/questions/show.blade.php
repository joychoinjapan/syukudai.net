@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="my-3">
                    <h3 class="title my-2">{{$question->title}}</h3>
                    @foreach($topics as $topic)
                        <span class="tag is-info is-light is-rounded ">{{$topic->name}}</span>
                    @endforeach
                </div>
                <article class="message">
                    <div class="message-body">
                        {!!$question->content!!}
                    </div>
                </article>
            </div>
        </div>
</div>
    @endsection
