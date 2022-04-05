<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style>
		#cuerpo {
			text-align: justify;
			font-size: 20px;
		}

		#firma {
			margin-left: 28%;
			font-size: 25px;
		}

		#contactos {
			text-align: justify;
			font-size: 20px;
		}

		#description {
			text-align: justify;
			font-size: 20px;
		}

		.forma {
			margin-left: 35%;
		}
	</style>
</head>
<body class="hoja">
	<img class="forma" src="{{public_path('storage/images/logoakk.png')}}" alt="" width="200"><br><br><br><br><br>
	@foreach($solicitud as $iterator)
		<p id="cuerpo">Por medio de este documento se confirma que el usuario {{ $iterator->name }} {{ $iterator->apellidoPaterno }} {{ $iterator->apellidoMaterno }} perteneciente a {{ $iterator->empresa }} con correo {{ $iterator->email }} y número de telefono {{ $iterator->telefono }} a solicitado el servicio {{ $iterator->nombre }}.</p>
		<br><br>
		<p id="description">Descripción: {{ $iterator->description }}</p><br><br><br><br><br>


		<label id="firma">ATTE. AIRE KANAN KUXTAL</label><br><br><br><br><br>

		<p id="contactos">Para la realización del pago favor de comunicarse al siguiente correo: airekanankuxtal@gmail.com o al siguiente número telefonico: 7771554994</p>
	@endforeach
</body>
</html>