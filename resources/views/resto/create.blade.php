@extends('admin', ['resto'=>'active'])

@section('submenu')
    <a href="{{ url('/admin/resto/create') }}" class="ui item"><i class="edit icon"></i>New</a>
    <a href="{{ url('/admin/resto/pesan') }}" class="ui item"><i class="call icon"></i>Pesan</a>
@stop

@section('content')
    <div class="ui form">
        <h1>Resto</h1>
        <div class="ui breadcrumb">
          <a class="section">Menu</a>
          <div class="divider"> / </div>
          <a class="section">Resto Hotel</a>
        </div>
        <div class="ui divider"></div>
        {!! Form::open(['url'=>'/admin/resto', 'method'=>'post', 'files'=>true]) !!}
            @include('resto.form', ['button' => 'Send'])
        {!! Form::close() !!}
    </div>

@stop

@push('scripts')
    {{ Html::script('ckeditor/ckeditor.js') }}
    
    <script type="text/javascript">
        CKEDITOR.replace('editor');
    </script>
@endpush