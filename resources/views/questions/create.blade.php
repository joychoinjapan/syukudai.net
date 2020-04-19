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
                            <select name="topics[]" class="js-example-placeholder-multiple js-example-data-ajax form-control" name="states[]" multiple="multiple">
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">内容</label>
                        <div class="control">
                            <textarea class="form-control" name="content" id="content">{{old("content")}}</textarea>
                        </div>
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
        CKEDITOR.replace('content')


        $(document).ready(function() {
            function formatTopic (topic) {
                return "<div class='select2-result-repository clearfix'>" +
                "<div class='select2-result-repository__meta'>" +
                "<div class='select2-result-repository__title'>" +
                topic.name ? topic.name : "Laravel"   +
                    "</div></div></div>";
            }
            function formatTopicSelection (topic) {
                return topic.name || topic.text;
            }
            $(".js-example-placeholder-multiple").select2({
                theme: 'bootstrap4',
                tags: true,
                placeholder: 'ジャンルを選択してください',
                minimumInputLength: 2,
                ajax: {
                    url: '/api/topics',
                    dataType: 'json',
                    delay: 650,
                    data: function (params) {
                        return {
                            q: params.term
                        };
                    },
                    processResults: function (data, params) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                },
                templateResult: formatTopic,
                templateSelection: formatTopicSelection,
                escapeMarkup: function (markup) { return markup; }
            });
        }
        )

    </script>
@endsection


