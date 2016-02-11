@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <h1>{!! $flyer->street !!}</h1>
            <h2>{!! $flyer->price !!}</h2>
            <hr>
            <div class="description">
                {!! nl2br($flyer->description) !!}
            </div>
        </div>


        <div class="col-md-8 gallery">
            <div class="row">
                @foreach ($flyer->photos->chunk(4) as $set)
                    @foreach ($set as $photo)
                        <div class="col-md-3 gallery__image">
                            <img src="{{URL::To($photo->thumbnail_path)}}" alt="" />
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>

    <hr>

    <h1>Add Your Photos</h1>

    <form
    id="addPhotosForm"
    action="{{route('store_photo_path',[$flyer->zip,$flyer->street])}}"
    method="post"
    class="dropzone" id="my-awesome-dropzone">
    {{ csrf_field()}}
</form>

@stop
