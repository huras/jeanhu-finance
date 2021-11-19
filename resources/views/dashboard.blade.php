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
<h1>Dashboard</h1>

{{-- "coin" => "NEAR"
    "depositAllEnable" => true
    "withdrawAllEnable" => true
    "name" => "NEAR Protocol"
    "free" => "2"
    "locked" => "0"
    "freeze" => "0"
    "withdrawing" => "0"
    "ipoing" => "0"
    "ipoable" => "0"
    "storage" => "0"
    "isLegalMoney" => false
    "trading" => true --}}

    <table id='myTable'>
        <thead>
            <th> Name </th>
            <th> Coin </th>
            <th> Amount </th>
        </thead>
        <tbody>
            @foreach ($validCoins as $asset)
                <tr>
                    <td> {{$asset['name']}} </td>
                    <td> {{$asset['coin']}} </td>
                    <td> {{$asset['free']}} </td>
                </tr>
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
