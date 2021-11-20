@extends('layout')

@section('title', 'History')

@section('content')
<h1>History</h1>

{{--
    [▼
    "symbol" => "BTCBRL"
    "orderId" => 30184442
    "orderListId" => -1
    "clientOrderId" => "vzJFbgZ3fRGGbFaHgieJDS"
    "price" => "0.00000000"
    "origQty" => "0.00010000"
    "executedQty" => "0.00010000"
    "cummulativeQuoteQty" => "20.22420000"
    "status" => "FILLED"
    "timeInForce" => "GTC"
    "type" => "MARKET"
    "side" => "BUY"
    "stopPrice" => "0.00000000"
    "icebergQty" => "0.00000000"
    "time" => 1612486855312
    "updateTime" => 1612486855312
    "isWorking" => true
    "origQuoteOrderQty" => "0.00000000"
  ]
--}}
    <?php $total = 0;
    foreach ($transactions as $transaction)
        if($transaction['side'] == "BUY")
            $total = $total + doubleval($transaction['executedQty']);
        else
            $total = $total - doubleval($transaction['executedQty']);
    ?>
    <h1> Total: {{$total}} BTC </h1>


    <table id='myTable'>
        <thead>
            <th> Status </th>
            <th> Dinheiro investido </th>
            <th> Dinheiro obtido </th>
            <th> Tipo </th>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                @if($transaction['status'] === 'FILLED')
                    <tr>
                        <td> {{$transaction['status']}} </td>
                        <td> {{$transaction['cummulativeQuoteQty']}} </td>
                        <td> {{$transaction['executedQty']}} </td>
                        <td> Nós {{$transaction['side']}} </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                pageLength: 100
            });
        } );
    </script>
@endsection
