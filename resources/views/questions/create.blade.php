@extends('layouts.app') @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="field">
                        <label class="label">タイトル</label>
                        <div class="control">
                            <input class="input" name="title" id="title" type="text" value="{{old("title")}}"
                                   v-model="questionTitle"
                                   placeholder="問題のタイトルをご入力ください"
                            >
                        </div>
                        <p class="help is-danger" v-if="title_e">タイトルは6文字以上にしてください</p>
                    </div>
                    <div class="field">
                        <label for="" class="label">トピックス</label>
                        <div class="control">
                            <selector ref="selectorData"></selector>
                        </div>
                        <p class="help is-danger" v-if="topic_e">トピックスを指定してください</p>
                    </div>
                    <div class="field">
                        <label class="label">内容</label>
                        <div class="control">
                            <ckeditor v-model="editorData"></ckeditor>
                        </div>
                        <p class="help is-danger" v-if="content_e">内容は26文字以上にしてください</p>
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-link" @click="sendQuestion">投稿</button>
                        </div>
                        <div class="control">
                            <button class="button is-link is-light">キャンセル</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>

    </script>
@endsection


