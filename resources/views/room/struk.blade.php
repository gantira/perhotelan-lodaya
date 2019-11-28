<!DOCTYPE html>
<html>
<head>
    <title>Hotel Payment</title>
</head>
<body onload="window.print()">
    
    <div style="border: 1px solid black;width: 30%">
        
        <h2>Hotel Checkout</h2>
        
        <hr>
        <b>Customer : {{ $reservation->customer->first_name }} {{ $reservation->customer->last_name }}</b>
        <br>
        <b>Checkout : {{ $reservation->checkout }}</b>

        <hr>
        <b>Hotel :</b>
        <table width="100%">
            <thead>
                <tr>
                    <td>Room</td>
                    <td>No</td>
                    <td>Extrabed</td>
                    <td>Subtotal</td>
                </tr>
                <tr>
                    <td>{{ $reservation->roomDetail->room->nama }}</td>
                    <td>{{ $reservation->roomDetail->no }}</td>
                    <td>{{ $reservation->extrabed }}</td>
                    <td>{{ $reservation->total }}</td>
                </tr>
            </thead>
        </table>
        
        @if ($reservation->laundry)
            <hr>
            <b>Laundry :</b>
            <table width="100%">
                <thead>
                    <td>Nama</td>
                    <td>Jumlah</td>
                    <td>Harga</td>
                    <td>Subtotal</td>
                </thead>
                <tbody>
                   @foreach ($reservation->laundry->laundryDetail as $row)
                   <tr>
                       
                       <td>{{ $row->laundrysetting->jenis }}</td>
                       <td>{{ $row->jumlah }}</td>
                       <td>{{ $row->harga }}</td>
                       <td>{{ $row->subtotal }}</td>
                   </tr>
                   @endforeach
                </tbody>
            </table>
        @endif

        @if ($reservation->restoPesanan)
            <hr>
            <b>Resto :</b>
            <table width="100%">
                <thead>
                    <td>Nama</td>
                    <td>Harga</td>
                </thead>
                <tbody>
                   @foreach ($reservation->restoPesanan->restoPesananDetail as $row)
                   <tr>
                       <td>{{ $row->resto->nama }}</td>
                       <td>{{ $row->resto->harga }}</td>
                   </tr>
                   @endforeach
                </tbody>
            </table>
        @endif
        
        <p>TERIMA KASIH</p>
    </div>



    <script type="text/javascript">
        setTimeout(function(){ 
            window.location.assign('{{ url('admin/room') }}');
        }, 200);
    </script>   
        

</body>

</html>