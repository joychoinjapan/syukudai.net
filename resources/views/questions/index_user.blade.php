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
                       データ分析
                    </div>
                    <div class="card-content p-3">
                        <div class="columns has-text-centered is-centered">
                            <div class="column">
                                <h2>いいね</h2>
                                <h2 class="is-2 font-weight-bold">23</h2>
                                <p class="data-clip">前日比<i class="fas fa-long-arrow-alt-up"></i>1</p>
                            </div>
                            <div class="column">
                                <h2>閲覧</h2>
                                <h2 class="is-2 font-weight-bold">23</h2>
                                <p class="data-clip">前日比<i class="fas fa-long-arrow-alt-up"></i>1</p>
                            </div>
                        </div>
                        <div class="columns has-text-centered is-centered">
                             <div class="column">
                                    <h2>ストック</h2>
                                    <h2 class="is-2 font-weight-bold">23</h2>
                                    <p class="data-clip">前日比<i class="fas fa-long-arrow-alt-up"></i>1</p>
                                </div>
                             <div class="column">
                                    <h2>採用</h2>
                                    <h2 class="is-2 font-weight-bold">23</h2>
                                    <p class="data-clip">前日比<i class="fas fa-long-arrow-alt-up"></i>1</p>
                                </div>
                        </div>
                        <div class="columns has-text-centered is-centered">
                            <div class="column">
                                <h2>フォロー</h2>
                                <h2 class="is-2 font-weight-bold">23</h2>
                                <p class="data-clip">前日比<i class="fas fa-long-arrow-alt-up"></i>1</p>
                            </div>
                            <div class="column">
                                <h2>フォロワー</h2>
                                <h2 class="is-2 font-weight-bold">23</h2>
                                <p class="data-clip">前日比<i class="fas fa-long-arrow-alt-up"></i>1</p>
                            </div>
                            <div class="column">
                                <h2>Aポイント</h2>
                                <h2 class="is-2 font-weight-bold">200PT</h2>
                                <p class="data-clip">前日比<i class="fas fa-long-arrow-alt-up"></i>1</p>
                            </div>
                        </div>
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
