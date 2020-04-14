@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="mb-3 mt-2">
					<a href="{{ url()->previous() }}" class="btn btn-primary mr-3"><i class="fa fa-chevron-left"></i> Volver</a>
				</div>
			</div>
			<div class="col-4">
				<div>
					<h2 class="mr-4 d-flex align-items-center font-weight-bold">{{ $oa->oa_title }}</h2>
					<h5>{{ $oa->taxonomy->tax_name }}</h5>
					<h6>{{ $oa->target->tar_description }}</h6>
					<p><b>{{ $oa->topic->top_name }}:</b> {{ $oa->oa_top_text }}</p>
				</div>
			</div>
			<div class="col-8">
				<div class="prev_content">
					{!! html_entity_decode($oa->oa_description, ENT_QUOTES, 'UTF-8') !!}
				</div>
			</div>
		</div>
	</div>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2>Accesibilidad</h2>
				</div>
			</div>
			@if ( $oaAccess !== null)
				<div class="row">
					<div class="col-4">
						<div class="card shadow rounded" style="width: 18rem;">
							<div class="card-body">
								<h5 class="card-title">Total elementos evaluados <span class="badge badge-success" data-toggle="tooltip" data-placement="right" title="Cantidad de OAs creados">{{ $oaAccess->statistics->totalelements }}</span></h5>
								<p class="card-text">
								</p>
							</div>
						</div>
					</div>
					<div class="col-8">
						<div class="container mt-3">
					        <div class="row">
					            <div class="col-4">
					                <div class="text-center alert alert-danger" role="alert">
					                	<i class="fa fa-2x fa-exclamation-circle"></i>
					                    <span class="fa-2x" id="perc-errors">{{ $oaAccess->categories->error->count }}</span>
					                    <h5>Errores</h5>
					                </div>
					            </div>
					            <div class="col-4">
					                <div class="text-center alert alert-warning" role="alert">
					                	<i class="fa fa-2x fa-exclamation-triangle"></i>
					                    <span class="fa-2x" id="perc-alerts">{{ $oaAccess->categories->alert->count }}</span>
					                    <h5>Advertencias</h5>
					                </div>
					            </div>
					            <div class="col-4">
					                <div class="text-center alert alert-success" role="alert">
					                	<i class="fa fa-2x fa-exclamation"></i>
					                    <span class="fa-2x" id="perc-features">{{ $oaAccess->categories->feature->count }}</span>
					                    <h5>Sugerencias</h5>
					                </div>
					            </div>
					            <div class="col-12">
					            	<div class="text-center alert alert-primary" role="alert">
					                	<i class="fa fa-2x fa-check"></i>
					                    <span class="fa-2x" id="perc-total">{{ $oa->oa_access_per }}%</span>
					                    <h5>Accesible</h5>
					                </div>
					            </div>
					        </div>
					    </div>
					</div>
				</div>
			@else
				<div class="row">
					<div class="col-12">
						<p>No se ha evaluado accesibilidad a este OA.</p>
					</div>
				</div>
			@endif
		</div>
@endsection

@section('aside')
	@parent
	Index Oas
@endsection