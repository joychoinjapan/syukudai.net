@extends('layouts.app') @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="/questions" method="post">
                {{csrf_field()}}
                <div class="field">
                    <label class="label">タイトル</label>
                    <div class="control">
                        <input class="input" name="title" id="title" type="text" value="{{old("title")}}" placeholder="問題のタイトルをご入力ください">
                    </div>
                    @if($errors->has('title'))
                        <p class="help is-danger">{{$errors->first('title')}}</p>
                    @endif
                </div>
                <div class="field">
                    <label for="" class="label">トピックス</label>
                    <div class="control">
                        <select class="js-example-basic-multiple form-control" name="states[]" multiple="multiple">
                            <option value="AL">Alabama</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>
                </div>
                <div class="field">
                    <label class="label">内容</label>
                    <div class="control">
                         <textarea class="form-control" name="content" id="content" >{{old("content")}}</textarea>
                    </div>
                    @if($errors->has('content'))
                    <p class="help is-danger">{{$errors->first('content')}}</p>
                    @endif
                </div>
                 <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">提出</button>
                    </div>
                    <div class="control">
                        <button class="button is-link is-light">キャンセル</button>
                    </div>
                 </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace('content')
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
