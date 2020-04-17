@extends('layouts.app') @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="/questions" method="post">
                {{csrf_field()}}
                <div class="field">
                    <label class="label">タイトル</label>
                    <div class="control">
                        <input class="input" name="title" type="text" placeholder="問題のタイトルをご入力ください">
                    </div>
                </div>
                <div class="field">
                    <label class="label">内容</label>
                    <div class="control">
                         <textarea class="form-control" name="content" id="content"></textarea>
                    </div>
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
@endsection
