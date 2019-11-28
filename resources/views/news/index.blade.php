@extends('admin', ['news'=>'active'])

@section('content')
    <div class="ui form">
        <h1>News</h1>
        <div class="ui breadcrumb">
          <a class="section">Menu</a>
          <div class="divider"> / </div>
          <a class="section">News</a>
        </div>
        <div class="ui divider"></div>
        {!! Form::open(['url'=>'/admin/news', 'method'=>'post', 'files'=>true]) !!}
            <div class="ui form">
            	<div class="form">
            		<div class="field">
            			<label>Title</label>
            			<input type="text" name="title" value="Breaking The Grid, Grabs Your Attention">
            		</div>
            		<div class="field">
            			<label>Deskripsi</label>
            			<textarea id="editor" name="deskripsi">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
            		</div>
                    <div class="field">
                    {!! Form::submit('Send', ['class'=>'ui primary button']) !!}
                    </div>
            	</div>
            </div>
        {!! Form::close() !!}
    </div>

@stop

@push('scripts')
    {{ Html::script('ckeditor/ckeditor.js') }}
    
    <script type="text/javascript">
        CKEDITOR.replace('editor');
    </script>
@endpush