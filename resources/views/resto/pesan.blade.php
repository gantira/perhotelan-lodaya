@extends('admin', ['resto'=>'active'])

@section('submenu')
    <a href="{{ url('/admin/resto/create') }}" class="ui item"><i class="edit icon"></i>New</a>
    <a href="{{ url('/admin/resto/pesan') }}" class="ui item"><i class="call icon"></i>Pesan</a>
@stop

@section('content')
    <div class="ui form">
        <h1>Pemesanan</h1>
        <div class="ui breadcrumb">
            <a class="section">Resto</a>
            <div class="divider"> / </div>
            <a class="section">Pemesanan</a>
        </div>
    </div>
    
    <div class="ui divider"></div>
    
    <div class="ui form">
    {!! Form::open(['url'=>'/admin/resto/pesan/submit', 'method'=>'post']) !!}

        <div class="ui fields">
            <div class="field">
                <label>Room</label> 
                {!! Form::select('room_detail_id', $room, null, ['placeholder' => 'Pilih kamar', 'required', 'onchange' => 'reservation(this.value)']) !!}
            </div>

            {!! Form::hidden('reservation_id', null, ['id' => 'reservation_id']) !!}

            <div class="field">
                <label>&nbsp;</label>
                <a href="#" onclick="menu()">Pilih Menu<i class="food icon"></i></a>
            </div>
        </div>

        <div class="ui two fields">
            <div class="field">
                <label>Menu yang dipesan :</label>
                <table class="ui table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Harga</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($restoTemp as $row)
                            <tr>
                                <td>{{ $row->resto->nama }}</td>
                                <td>{{ $row->resto->jenis }}</td>
                                <td>{{ $row->resto->harga }}</td>
                                <td><a href="{{ url('admin/resto/pesan/'.$row->id.'/delete') }}"><i class="delete icon"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="ui field">
            {!! Form::submit('SUBMIT', ['class' => 'ui button']) !!}
        </div>

        {!! Form::close() !!}

    </div>

    {{-- Modal --}}
    <div class="ui modal">
      <i class="close icon"></i>
      <div class="header">
        Menu Pilihan
      </div>
      <div class="image content">
        <div class="image">
          <i class="icon" id="room"></i>
        </div>
        <div class="description">
        <p>
            <table class="ui table">
              <thead>
                  <tr>
                      <th>Nama Menu</th>
                      <th>Jenis</th>
                      <th>Harga</th>
                      <th>Add</th>
                  </tr>
              </thead>
              <tbody>
                    @foreach ($resto as $row)
                    <tr>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->jenis }}</td>
                        <td>{{ $row->harga }}</td>
                        <td><a href="javascript:void(0)" onclick="addTemp({{ $row->id }},{{ $row->harga }})"><i class="add icon"></i></a></td>
                    </tr>
                    @endforeach
              </tbody>
            </table>
            </p>
        </div>
      </div>
      <div class="actions">
       <div class="two fluid ui inverted buttons">
          {{-- <div class="ui cancel red basic inverted button">
            <i class="remove icon"></i>
            No
          </div> --}}
          <div class="ui ok green button">
            <i class="checkmark icon"></i>
            Selesai
          </div>
        </div>
      </div>
    </div>
   
@stop

@push('scripts')
    <script type="text/javascript">
        function addTemp(id,harga) {
            var dataString = { 
                resto_id : id,
                harga : harga,
                _token : '{{ csrf_token() }}'
            };

            $.ajax({
                url: "{{ URL('/admin/resto/pesan/addTemp') }}",
                type: "post",
                data: dataString,
                dataType: "json",
                cache: false,
                success: function(data){
                    alert('Pesanan ditambahkan');
                    
                    console.log(data);
                },
                error: function(data){
                    alert('Gagal pesan');
                    console.log(data);
                }
            });

        }

        function menu() {

            $('.ui.modal')
              .modal({
                closable  : true,
                onDeny    : function(){
                    return false;
                },
                onApprove : function() {
                    window.location.reload();
                    return true;
                }
              })
              .modal('setting', 'transition', 'fade')
              .modal('show')
            ;
        }


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

        function reservation(val) {
            var dataString = { 
                room_id : val,
                _token : '{{ csrf_token() }}'
            };
            
            $.ajax({
                url: "{{ URL('/admin/resto/customer') }}",
                type: "post",
                data: dataString,
                dataType: "json",
                cache: false,
                success: function(data){
                    document.getElementById("reservation_id").value = data.id;

                    console.log(data);
                }
            });
        }

        
    </script>
@endpush
