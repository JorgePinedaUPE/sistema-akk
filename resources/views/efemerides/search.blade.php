<div class="col-xl-12">
	<form action=" {{ route('efemerides.index') }} " method="get">
		<div class="form-row">
			<div class="col-sm-5">
				<input type="text" class="form-control" name="texto" value="{{$texto}}">
			</div>
			<div class="col-auto my-2">
				<input type="submit" class="btn btn-primary" value="Buscar">
			</div>
		</div>
	</form>
</div>