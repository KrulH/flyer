@extends('layout')

@section('content')
    <h1>Selling Your Home?</h1>
    <hr>
    <div class="row">

        <form method="POST" action="/flyers" enctype="multipart/form-data" class="col-md-6">
            @include('flyers.form')
            @include('errors.list')
        </form>
    </div>

@stop


