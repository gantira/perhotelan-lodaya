<!DOCTYPE html>
<html>
<head>
    <title>Resto Payment</title>
</head>
<body onload="window.print()">
<center>
    
    <div style="border: 1px solid black;width: 30%">
        
        <h2>Resto</h2>

        Room : <b>{{ $restopesanan->roomDetail->room->nama }} / No {{ $restopesanan->roomDetail->no }} / {{ $restopesanan->roomDetail->reservation->customer->first_name }}</b>
        
        <table width="100%">
            <thead>
                <td>Nama</td>
                <td>Harga</td>
            </thead>
            <tbody>
                @foreach ($restopesanan->restoPesananDetail as $row)
                <tr>
                    <td>{{ $row->resto->nama }}</td>
                    <td>{{ $row->resto->harga }}</td>
                </tr>

                @if ($loop->last)
                    <td>Total Bayar</td>
                    <td>{{ $total }}</td>
                @endif
                @endforeach
            </tbody>
        </table>
        
        <p>TERIMA KASIH</p>
        <small>{{Carbon\Carbon::now()->toFormattedDateString() }}</small>
    </div>


</center>

    <script type="text/javascript">
        setTimeout(function(){ 
            window.location.assign('{{ url('admin/resto') }}');
        }, 200);
    </script>   
        

</body>

</html>