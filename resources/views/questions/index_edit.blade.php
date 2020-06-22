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
                       操作
                    </div>
                    <div class="card-content p-3">
                        <div class="columns has-text-centered is-centered">
                            <div class="column">
                                <i class="fas fa-chalkboard-teacher fa-2x m-1"></i>
                                <p>答える</p>
                            </div>
                            <div class="column">
                                <i class="far fa-clipboard fa-2x m-1"></i>
                                <p>ノート</p>
                            </div>
                            <div class="column">
                                <i class="far fa-folder fa-2x m-1"></i>
                                <p>ストック</p>
                            </div>
                    </div>
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
