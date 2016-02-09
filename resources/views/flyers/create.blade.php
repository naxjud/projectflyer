@extends('layout')

@section('content')
  <h1>Selling your home? </h1>

    <form method="POST" action="{{URL::to('/flyers')}}" enctype="multipart/form-data">

      @include('flyers.form')

      @if(count($errors)>0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
      @endif

    </form>

@stop
