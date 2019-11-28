@extends('admin', ['kelas'=>'active'])

@section('content')
    <div class="ui form">
        <h1>Kelas Hotel</h1>
        <div class="ui breadcrumb">
          <a class="section">Menu</a>
          <div class="divider"> / </div>
          <a class="section">Kelas Hotel</a>
        </div>
        <div class="ui divider"></div>
        {!! Form::open(['url'=>'/admin/kelas', 'method'=>'post', 'files'=>true]) !!}
            @include('kelas.form', ['button' => 'Send'])
        {!! Form::close() !!}
    </div>

@stop

@push('scripts')
    {{ Html::script('ckeditor/ckeditor.js') }}
    
    <script type="text/javascript">
        CKEDITOR.replace('editor');
    </script>
@endpush