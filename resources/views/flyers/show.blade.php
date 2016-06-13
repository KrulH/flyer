@extends('layout')

@section('content')
    <div class="row" >
        <div class="col-md-3">
            <h1>{{ $flyer->street }}</h1>
            <h1>{!! $flyer->price !!}</h1>
            <hr>
            <div class="description">
                <p>{!! nl2br($flyer->description) !!}</p>
            </div>
        </div>
        <div class="col-md-9">
            @foreach($flyer->photos as $photo)
                <img src="/{{ $photo->path }}" >
            @endforeach
        </div>
    </div>

    <hr>

    <h2>Add Photos</h2>

    <form id="addPhotosForm"
          action="{{ route('store_photo_path', [$flyer->zip,$flyer->street]) }}"
          method="POST"
          class="dropzone"
          id="my-awesome-dropzone"
            >
        {{ csrf_field() }}
    </form>
@stop

@section('scripts.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
    <script>
        Dropzone.options.addPhotosForm = {
            paramName: 'photo',
            maxFilesize: 3,   // in MB
            acceptedFiles: '.jpg, .jpeg, .png, .bmp'
        }
    </script>
@stop
