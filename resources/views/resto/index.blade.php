@extends('admin', ['resto'=>'active'])

@section('submenu')
    <a href="{{ url('/admin/resto/create') }}" class="ui item"><i class="edit icon"></i>New</a>
    <a href="{{ url('/admin/resto/pesan') }}" class="ui item"><i class="call icon"></i>Pesan</a>
@stop

@section('content')
    <div class="ui form">
        <h1>Resto Hotel</h1>
        <div class="ui breadcrumb">
            <a class="section">Menu</a>
            <div class="divider"> / </div>
            <a class="section">Resto Hotel</a>
        </div>
    </div>
    
    <div class="ui divider"></div>
    
    @if (!count($resto))
        No item found
    @endif

    <div class="ui four cards">

        @foreach ($resto as $row)
            <a class="card {{ $row->id }}">

                <div class="ui dimmer {{ $row->id }}">
                    <div class="ui text loader">Loading</div>
                </div>

                <div class="content">
                    <div class="header">
                        {{ $row->nama }}
                    </div>
                </div>  
                <div class="image">
                    <img class="ui image" src="{{ asset($row->thumbnail) }}">
                </div>

                <div class="extra content">
                    <div class="ui form {{ $row->id }}">
                        Rp {{ $row->harga }}
                    </div>
                </div>
                <div class="ui three bottom attached buttons">
                    <div class="ui button" onclick="window.location.assign('{{ url('admin/resto/'.$row->id.'/edit') }}')">Edit</div>
                    <div class="ui button" onclick="hapus({{ $row->id }})">Delete</div>
                </div>
            </a>
        @endforeach
    </div>

@stop

@push('scripts')
    <script type="text/javascript">
        $('.save').popup({
            position : 'right center',
            transition: 'fade'
        });


        function hapus(id) {
            var dataString = { 
                resto_id : id,
                _token : '{{ csrf_token() }}'
            };
            
            $.ajax({
                url: "{{ URL('/admin/resto/destroy') }}",
                type: "post",
                data: dataString,
                dataType: "json",
                cache: false,
                success: function(data){
                    $(".card."+id).transition('fly right');
                    console.log(data);
                }
            });

            
        }

        $('.transition .card')
            .transition()
            .transition({
                animation : 'swing right',
                reverse   : false,
                interval  : 200
            })
        ;

        $('.field input')
            .popup({
                on: 'focus'
          })
        ;

        $('.statistic').popup();


    </script>
@endpush
