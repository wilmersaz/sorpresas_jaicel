@extends('layouts.app')
@section('titulo')Contáctanos @endsection
@section('content')
<style>
	input[type=number]::-webkit-inner-spin-button, 
	input[type=number]::-webkit-outer-spin-button { 
		-webkit-appearance: none; 
		margin: 0; 
	}
</style>
<div class="m-grid m-grid--hor m-grid--root m-page">
	<div class="card" style="padding: 30px;">
		<div style="padding-top: 7%" class="row">
			<div class="col-md-4 mx-auto shadow m-portlet m-portlet--tab">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<span class="m-portlet__head-icon m--hide">
								<i class="la la-gear"></i>
							</span>
							<h3 class="m-portlet__head-text">
								Contáctanos	
							</h3>
						</div>
					</div>
				</div>
				<form class="m-form m-form--fit m-form--label-align-right">
					<div class="m-portlet__body">
						<div class="col-md-12">
							<div class="form-group">
								<label >Nombre</label>
								<input class="form-control m-input" type="text">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Teléfono</label>
								<input class="blockNums form-control m-input" type="number">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Email</label>
								<input class="form-control m-input" type="email">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Observación</label>
								<textarea class="form-control m-input" id="exampleTextarea" rows="3"></textarea>
							</div>
						</div>
					</div>
					<div class="m-portlet__foot m-portlet__foot--fit">
						<div class="m-form__actions">
							<div class="row">
								<div class="col-2"></div>
								<div class="col-10">
									<button type="submit" class="btn btn-primary">
										Enviar
									</button>
									<button type="reset" class="btn btn-secondary">
										Cancelar
									</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection