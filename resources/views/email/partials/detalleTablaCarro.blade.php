<?php $subtotal = 0; ?>

@foreach ($productos as $producto)
<tr>
	<td style="width: 25%;">
		<img src="{{ 'https://sasi.cl/storage/' . $producto->imagen_producto }}" alt="{{ $producto->nombre_producto}}" style="
								width: 120px;
								height: 75px;
								border-radius: 5px;
								margin-bottom: 10px;
								">
	</td>
	<td style="width: 50%; font-size: 14px; font-weight: bold;">{{ $producto->nombre_producto}}</td>
	<td style="width: 25%; font-size: 14px; font-weight: bold; text-align: right">{{ formatoMoneda($producto->precio) }}</td>
	<?php $subtotal += $producto->precio; ?>

</tr>
@endforeach
<tr>
	<td style="width: 25%;"></td>
	<td style="width: 50%; font-size: 14px; font-weight: bold;">Subtotal</td>
	<td style="width: 25%; font-size: 14px; font-weight: bold; text-align: right">{{ formatoMoneda($subtotal) }}</td>

</tr>
