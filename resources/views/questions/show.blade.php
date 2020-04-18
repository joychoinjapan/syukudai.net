@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <article class="message">
                    <div class="message-header">
                        <p>{{$question->title}}</p>
                    </div>
                    <div class="message-body">
                        {!!$question->content!!}
                    </div>
                </article>
            </div>
        </div>
</div>
    @endsection
