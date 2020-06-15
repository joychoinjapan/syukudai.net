@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header label is-medium">プロフィール</div>
                    <div class="card-body">
                        <profile-form :user_id="{{Auth::user()->id}}"></profile-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
