<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clientes</title>
</head>
<body>
    <h1>Customers</h1>
    <table>
        <tr>
            <td>DNI</td>
            <td>Nombre</td>
            <td>Dirección</td>
        </tr>
    @forelse ($data as $customer)
        <tr>
            <td>{{$customer['dni']}}</td>
            <td>{{$customer["name"]}} {{$customer["last_name"]}}</td>
            <td>{{$customer["address"]}}</td>
        </tr>
    @empty
        <tr>
            <td colspan="3">No hay datos</td>
        </tr>
    @endforelse
    </table>
</body>
</html>