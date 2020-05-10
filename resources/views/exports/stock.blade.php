<table>
    <thead>
    <tr>
        <th>Tienda</th>
        <th>Producto</th>
        <th>Saldo</th>
        <th>Creado</th>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        <tr>
            <td>{{ $item['store'] }}</td>
            <td>{{ $item['product'] }}</td>
            <td>{{ $item['saldo'] }}</td>
            <td>{{ $item['created_at'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>