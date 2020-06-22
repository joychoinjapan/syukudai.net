@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <answers-card :rec_questions="{{$rec_questions}}"
                              :following_questions="{{$following_questions}}"
                              :popular_questions="{{$popular_questions}}"/>
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
