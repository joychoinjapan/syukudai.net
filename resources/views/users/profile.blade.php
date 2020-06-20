@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
               <profile-form v-bind:user="{{Auth::user()}}">
               </profile-form>
            </div>
        </div>
    </div>
@endsection
