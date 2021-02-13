@extends('layouts.app')
@section('titulo')Productos @endsection
@section('content')
<div class="m-grid m-grid--hor m-grid--root m-page">
	<div class="m-content">
		<div class="m-portlet">
			<div class="m-portlet__body m-portlet__body--no-padding">
				<div class="m-pricing-table-2" style="background-color: #fff">
					<div class="m-pricing-table-2__head" style="background-color: #fff">
						<br><br>
						<div class="m-pricing-table-2__title text-primary">
							<h1>Productos</h1>
						</div>
					</div>
					<div class="tab-content">
						<div class="tab-pane active show" id="m-pricing-table_content2" aria-expanded="false">
							<div class="m-pricing-table-2__content">
								<div class="m-pricing-table-2__container">
									<div class="m-pricing-table-2__items row">
										<div class="m-pricing-table-2__item col-lg-4">
											<div class="m-pricing-table-2__visual">
												<div class="m-pricing-table-2__hexagon"></div>
												<span class="m-pricing-table-2__icon m--font-info">
													<img src="{{ url('imagenes/1.png') }}" style="width:110px">
												</span>
											</div>
											<h2 class="m-pricing-table-2__subtitle">
												Dulces Rosas
											</h2>
											<div class="m-pricing-table-2__features">
												<span>
													Decoración de rosas, vino, chocolates ferrrero
												</span>
											</div>
											<span class="m-pricing-table-2__price">
												45.000
											</span>
											<span class="m-pricing-table-2__label">
												$
											</span>
											<div class="m-pricing-table-2__btn">
												<button type="button" class="ver btn m-btn--pill  btn-primary m-btn--wide m-btn--uppercase m-btn--bolder m-btn--lg" data-id="1" data-nombre="Dulces Rosas" data-descr="Decoración de rosas, vino, chocolates ferrrero" data-precio="$45.000">
													Ver
												</button>
											</div>
										</div>
										<div class="m-pricing-table-2__item col-lg-4">
											<div class="m-pricing-table-2__visual">
												<div class="m-pricing-table-2__hexagon"></div>
												<span class="m-pricing-table-2__icon m--font-info">
													<img src="{{ url('imagenes/2.png') }}" style="width:110px">
												</span>
											</div>
											<h2 class="m-pricing-table-2__subtitle">
												Mañanas Felices
											</h2>
											<div class="m-pricing-table-2__features">
												<span>
													Decoración con postre, avena, fruta, pan, jugo
												</span>
											</div>
											<span class="m-pricing-table-2__price">
												38.000
											</span>
											<span class="m-pricing-table-2__label">
												$
											</span>
											<div class="m-pricing-table-2__btn">
												<button type="button" class="ver btn m-btn--pill  btn-primary m-btn--wide m-btn--uppercase m-btn--bolder m-btn--lg" data-id="2" data-nombre="Mañanas Felices" data-descr="Decoración con postre, avena, fruta, pan, jugo" data-precio="$38.000">
													Ver
												</button>
											</div>
										</div>
										<div class="m-pricing-table-2__item col-lg-4">
											<div class="m-pricing-table-2__visual">
												<div class="m-pricing-table-2__hexagon"></div>
												<span class="m-pricing-table-2__icon m--font-info">
													<img src="{{ url('imagenes/3.png') }}" style="width:110px">
												</span>
											</div>
											<h2 class="m-pricing-table-2__subtitle">
												Breakfast Light
											</h2>
											<div class="m-pricing-table-2__features">
												<span>
													Decoración con postre, jugo, fruta, cereal
												</span>
											</div>
											<span class="m-pricing-table-2__price">
												60.000
											</span>
											<span class="m-pricing-table-2__label">
												$
											</span>
											<div class="m-pricing-table-2__btn">
												<button type="button" class="ver btn m-btn--pill  btn-primary m-btn--wide m-btn--uppercase m-btn--bolder m-btn--lg" data-id="3" data-nombre="Breakfast Light" data-descr="Decoración con postre, jugo, fruta, cereal" data-precio="$60.000">
													Ver
												</button>
											</div>
										</div>
									</div>
									<div class="m-pricing-table-2__items row">
										<div class="m-pricing-table-2__item col-lg-4">
											<div class="m-pricing-table-2__visual">
												<div class="m-pricing-table-2__hexagon"></div>
												<span class="m-pricing-table-2__icon m--font-info">
													<img src="{{ url('imagenes/4.png') }}" style="width:110px">
												</span>
											</div>
											<h2 class="m-pricing-table-2__subtitle">
												Fitness
											</h2>
											<div class="m-pricing-table-2__features">
												<span>
													Desayuno con jugo, pan, postre, galletas, salsas
												</span>
											</div>
											<span class="m-pricing-table-2__price">
												55.000
											</span>
											<span class="m-pricing-table-2__label">
												$
											</span>
											<div class="m-pricing-table-2__btn">
												<button type="button" class="ver btn m-btn--pill  btn-primary m-btn--wide m-btn--uppercase m-btn--bolder m-btn--lg" data-id="4" data-nombre="Fitness" data-descr="Desayuno con jugo, pan, postre, galletas, salsas" data-precio="$55.000">
													Ver
												</button>
											</div>
										</div>
										<div class="m-pricing-table-2__item col-lg-4">
											<div class="m-pricing-table-2__visual">
												<div class="m-pricing-table-2__hexagon"></div>
												<span class="m-pricing-table-2__icon m--font-info">
													<img src="{{ url('imagenes/5.png') }}" style="width:110px">
												</span>
											</div>
											<h2 class="m-pricing-table-2__subtitle">
												Vuelta al Sol
											</h2>
											<div class="m-pricing-table-2__features">
												<span>
													Decoración con postre, galletas, salsa, jamón,  globos
												</span>
											</div>
											<span class="m-pricing-table-2__price">
												35.000
											</span>
											<span class="m-pricing-table-2__label">
												$
											</span>
											<div class="m-pricing-table-2__btn">
												<button type="button" class="ver btn m-btn--pill  btn-primary m-btn--wide m-btn--uppercase m-btn--bolder m-btn--lg" data-id="5" data-nombre="Vuelta al Sol" data-descr="Decoración con postre, galletas, salsa, jamón,  globos" data-precio="$35.000">
													Ver
												</button>
											</div>
										</div>
										<div class="m-pricing-table-2__item col-lg-4">
											<div class="m-pricing-table-2__visual">
												<div class="m-pricing-table-2__hexagon"></div>
												<span class="m-pricing-table-2__icon m--font-info">
													<img src="{{ url('imagenes/6.png') }}" style="width:110px">
												</span>
											</div>
											<h2 class="m-pricing-table-2__subtitle">
												Chocolate
											</h2>
											<div class="m-pricing-table-2__features">
												<span>
													Decoración con jugo, postre de chocolate, frutos secos
												</span>
											</div>
											<span class="m-pricing-table-2__price">
												48.000
											</span>
											<span class="m-pricing-table-2__label">
												$
											</span>
											<div class="m-pricing-table-2__btn">
												<button type="button" class="ver btn m-btn--pill  btn-primary m-btn--wide m-btn--uppercase m-btn--bolder m-btn--lg" data-id="6" data-nombre="Chocolate" data-descr="Decoración con jugo, postre de chocolate, frutos secos" data-precio="$48.000">
													Ver
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--begin::Modal-->
	<div class="modal fade" id="modalDetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						Detalle de Producto
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">
							&times;
						</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="tab-content">
						<div class="tab-pane active" id="m_widget5_tab1_content" aria-expanded="true">
							<div class="m-widget5">
								<div class="m-widget5__item">
									<div class="m-widget5__content">
										<div class="m-widget5__pic">
											<img class="FotoProducto m-widget7__img" src="" alt="">
										</div>
										<div class="m-widget5__section">
											<h4 class="nombre m-widget5__title">
												Nombre
											</h4>
											<span class=" descripcion m-widget5__desc">
												Descripción
											</span>
											<div class="m-widget5__info">
												<div class="m-widget5__stats1">
													<span class="precio m-widget5__number">
														Precio
													</span>
													<br>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-9 col-sm-12 mx-auto">
									<div class="input-group bootstrap-touchspin">
										<input id="agregarItem" type="text" class="form-control" value="0" name="demo1" placeholder="Seleccione la cantidad" style="display: block;">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success">
						Agregar al carrito
					</button>
					<button type="button" class="btn btn-primary " data-dismiss="modal">
						Cerrar
					</button>
				</div>
			</div>
		</div>
	</div>
	<!--end::Modal-->
</div>
<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#agregarItem").TouchSpin({
			buttondown_class:"btn btn-secondary",
			buttonup_class:"btn btn-secondary",
			min:0,max:100,
			stepinterval:50,
			maxboostedstep:1e7})
		$(document).on('click', '.ver', function() {
			id = $(this).data('id');
			var baseUrl='{{url('/')}}';
			nombreImagen = baseUrl+'/imagenes/'+id+'.png';
			$('.FotoProducto').attr('src',nombreImagen);
			$('.nombre').html($(this).data('nombre'));
			$('.descripcion').html($(this).data('descr'));
			$('.precio').html($(this).data('precio'));
			$('#modalDetalle').modal('show');
		});
	});
	$(window).on('load', function() {
		$('body').removeClass('m-page--loading');         
	});
</script>
@endsection