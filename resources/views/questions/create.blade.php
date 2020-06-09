@extends('layouts.app') @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="/questions" method="post">
                    {{csrf_field()}}
                    <div class="field">
                        <label class="label">タイトル</label>
                        <div class="control">
                            <input class="input" name="title" id="title" type="text" value="{{old("title")}}"
                                   placeholder="問題のタイトルをご入力ください">
                        </div>
                        @if($errors->has('title'))
                            <p class="help is-danger">{{$errors->first('title')}}</p>
                        @endif
                    </div>
                    <div class="field">
                        <label for="" class="label">トピックス</label>
                        <div class="control">
                            <selector></selector>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">内容</label>
                        @if($errors->has('content'))
                            <p class="help is-danger">{{$errors->first('content')}}</p>
                        @endif
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-link">投稿</button>
                        </div>
                        <div class="control">
                            <button class="button is-link is-light">キャンセル</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>

    </script>
@endsection


