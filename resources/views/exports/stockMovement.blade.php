<table>
    <thead>
    <tr style="center">
        <th>Número de movimiento</th>
        <th>Tienda</th>
        <th>Proveedor</th>
        <th>Número de orden</th>
        <th>Descripción</th>
        <th>Valor</th>
        <th>Saldo</th>
        <th>Creado</th>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        <tr>
            <td>{{ $item['id'] }}</td>
            <td>{{ $item['store'] }}</td>
            <td>{{ $item['provider'] }}</td>
            <td>{{ $item['order'] }}</td>
            <td>{{ $item['description'] }}</td>
            <td>{{ $item['value'] }}</td>
            <td>{{ $item['saldo'] }}</td>
            <td>{{ $item['created_at'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>