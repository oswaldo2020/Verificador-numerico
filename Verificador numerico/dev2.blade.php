@extends('layout')

@section('title', 'Prueba2')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-sm col-lg-6 mx-auto">
			<form class="bg-white shadow rounded py-3 px-4">
				<h1 class="display-6">Verifica los números repetidos y no repetidos </h1>
				<hr>
					<div class="form-group">
						<label for="numbers1"> Ingresa dos cadenas de números seperados por comas. Ejem. 14,2,8,3 </label>
							<input class="form-control bg-light shadow-sm "
							type="text"
							id="numbers1"
							name="numbers1">
					</div>
					<div class="form-group">
						<input
						class="form-control bg-light shadow-sm"
						type="text"
						id="numbers2"
						name="numbers2">
					</div>

					<div class="form-group">
						<select class="form-control bg-light shadow-sm"
						name="repit_numeric"
						id="repit_numeric" >
							<option disabled="disabled" selected="selected" value="selecciona"  >Selecciona</option>
							<option value="repetidos" >Números repetidos </option>
							<option value="no_repetidos">Números no repetidos</option>
						</select>
					</div>
					<button class="btn btn-primary btn-lg btn-block"
					type="submit"
					name="procesar"
					value="procesar"
					id="enviar" >Procesar
					</button><br><br>

					@isset($desaInt)
						@foreach($desaInt as $desaIntItem)
							<ul class="align-items-center">
								<li class="list-group-item border-0 mb-1 shadow-sm mx-auto">
										{{$desaIntItem}}
								</li>
							</ul>
						@endforeach
					@endisset
			</form>
		</div>
	</div>
</div>
@endsection