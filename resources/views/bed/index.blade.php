@extends('admin', ['room'=>'active'])

@section('content')
    <div class="ui form">
        <h1>Extra Bed+</h1>
        <div class="ui breadcrumb">
          <a class="section">Menu</a>
          <div class="divider"> / </div>
          <a class="section">Bed</a>
        </div>
        <div class="ui divider"></div>
        {!! Form::open(['url'=>'/admin/bed', 'method'=>'patch', 'files'=>true]) !!}
            @include('bed.form', ['button' => 'Update'])
        {!! Form::close() !!}
    </div>

@stop
