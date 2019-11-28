@extends('admin', ['meeting'=>'active'])

@section('content')
    
    <div class="ui secondary menu">
      <a class="item active" data-tab="first">Meeting Package</a>
      <a class="item" data-tab="second">Meeting Room</a>
    </div>
    <div class="ui tab active" data-tab="first">
        <div class="ui form">
            <h1>Meeting Package</h1>
            <div class="ui breadcrumb">
              <a class="section">Menu</a>
              <div class="divider"> / </div>
              <a class="section">Meeting Package</a>
            </div>
            <div class="ui divider"></div>
            {!! Form::open(['url'=>'/admin/meeting/store', 'method'=>'post']) !!}
                {!! Form::hidden('type', 'Meeting Package', []) !!}

                <div class="two fields">
                    <div class="field">
                        <label>Nama</label>
                        {!! Form::text('nama', null, ['placeholder'=>'']) !!}
                    </div>
                </div>
                <div class="ui fields">
                    <div class="field">
                        <label>Harga</label>
                        {!! Form::text('harga', null, ['placeholder'=>'']) !!} 
                    </div>
                </div>
                <div class="field">
                    <label>Deskripsi</label>
                    {!! Form::textarea('deskripsi', null, ['id'=>'editor']) !!}
                </div>
                {!! Form::submit('Send', ['class'=>'ui primary button']) !!}

            {!! Form::close() !!}
        </div>

    </div>
    <div class="ui tab" data-tab="second">
        <div class="ui form">
            <h1>Meeting Room</h1>
            <div class="ui breadcrumb">
              <a class="section">Menu</a>
              <div class="divider"> / </div>
              <a class="section">Meeting Room</a>
            </div>
            <div class="ui divider"></div>
            {!! Form::open(['url'=>'/admin/meeting/store', 'method'=>'post']) !!}

                 {!! Form::hidden('type', 'Meeting Room', []) !!}
                <div class="two fields">
                    <div class="field">
                        <label>Nama</label>
                        {!! Form::text('nama', null, ['placeholder'=>'']) !!}
                    </div>
                </div>
                <div class="ui fields">
                    <div class="field">
                        <label>Harga</label>
                        {!! Form::text('harga', null, ['placeholder'=>'']) !!} 
                    </div>
                </div>
                <div class="field">
                    <label>Deskripsi</label>
                    {!! Form::textarea('deskripsi', null, ['id'=>'editor2']) !!}
                </div>
                {!! Form::submit('Send', ['class'=>'ui primary button']) !!}

            {!! Form::close() !!}
        </div>
    </div>

    
@stop

@push('scripts')
    {{ Html::script('ckeditor/ckeditor.js') }}
    
    <script type="text/javascript">
        CKEDITOR.replace('editor');
        CKEDITOR.replace('editor2');

        $('.menu .item')
          .tab()
        ;
    </script>
@endpush