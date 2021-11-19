<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
Dashboard

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

    <table>
        <thead>
            <th> Name </th>
            <th> Amount </th>
        </thead>
        <tbody>
            @foreach ($validCoins as $coin)
                <tr>
                    <td> {{$coin['name']}} </td>
                    <td> {{$coin['free']}} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
