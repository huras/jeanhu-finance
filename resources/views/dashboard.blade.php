@extends('layout')

@section('title', 'Dashboard')

@section('content')
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
@endsection
