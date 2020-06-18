@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
               <profile-form :user_id="{{Auth::user()->id}}" avatar="{{Auth::user()->avatar}}"></profile-form>
            </div>
        </div>
    </div>
@endsection
