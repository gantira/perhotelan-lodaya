@extends('admin', ['resto'=>'active'])

@section('content')
    <div class="ui form">
        <h1>Resto</h1>
        <div class="ui breadcrumb">
          <a class="section">Menu</a>
          <div class="divider"> / </div>
          <a class="section">Resto Hotel</a>
        </div>
        <div class="ui divider"></div>
        {!! Form::model($resto, ['url'=>'/admin/resto/'.$resto->id, 'method'=>'patch', 'files'=>true]) !!}
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