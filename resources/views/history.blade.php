<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
</head>
<body>
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
</body>
</html>
