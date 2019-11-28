@extends('admin', ['kelas'=>'active'])

@section('content')
    <div class="ui form">
        <h1>Edit Kelas Hotel</h1>
        <div class="ui breadcrumb">
          <a class="section">Menu</a>
          <div class="divider"> / </div>
          <a class="section">Edit Kelas Hotel</a>
        </div>
        <div class="ui divider"></div>
        {!! Form::model($kelas, ['url'=>'/admin/kelas/'.$kelas->id.'/update', 'method'=>'patch', 'files'=>true]) !!}
            @include('kelas.form', ['button' => 'Update Kelas'])
        {!! Form::close() !!}
    </div>

@stop

@push('scripts')
    {{ Html::script('ckeditor/ckeditor.js') }}
    
    <script type="text/javascript">
        CKEDITOR.replace('editor');
    </script>
@endpush