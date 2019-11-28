<!DOCTYPE html>
<html>
<head>
    <title>Laundry Payment</title>
</head>
<body onload="window.print()">
<center>
    
    <div style="border: 1px solid black;width: 30%">
        
        <h2>Laundry</h2>

        Customer : <b>{{ $laundry->roomDetail->reservation->customer->first_name }}</b>
        Room : <b>{{ $laundry->roomDetail->room->nama }} / No {{ $laundry->roomDetail->no }}</b>
        Selesai Tanggal : <b>{{ $laundry->tanggal_selesai }} {{ $laundry->jam_selesai }}</b>
        <table width="100%">
            <thead>
                <td>Nama</td>
                <td>Harga</td>
            </thead>
            <tbody>
                @foreach ($laundry->laundryDetail as $row)
                <tr>
                    <td>{{ $row->laundrySetting->jenis }}</td>
                    <td>{{ $row->harga }}</td>
                </tr>

                @if ($loop->last)
                    <td>Total Bayar</td>
                    <td>{{ $total }}</td>
                @endif
                
                @endforeach
            </tbody>
        </table>
        
        <p>TERIMA KASIH</p>
        <small>{{ Carbon\Carbon::now()->toFormattedDateString() }}</small>
    </div>


</center>

    <script type="text/javascript">
        setTimeout(function(){ 
            window.location.assign('{{ url('admin/laundry') }}');
        }, 200);
    </script>   
        

</body>

</html>