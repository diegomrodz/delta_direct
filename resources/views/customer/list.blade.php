@extends('layouts.master')

@section('title', 'Listar Clientes')

@section('content')

<script type="text/javascript">

    window.document.body.className += " page-mail";
    
</script>

<div style="margin-left: 0px;" class="mail-container">
	<div class="col-sm-12">

        <div class="mail-container-header">
			Clientes Cadastrados

			<form action="#" class="pull-right" style="width: 300px;margin-top: 3px;">
				<div class="form-group input-group-sm has-feedback no-margin">
					<input id="search_input" type="text" placeholder="Busca" class="form-control">
					<span class="fa fa-search form-control-feedback" style="top: -1px"></span>
				</div>
			</form>
		</div>
        
        <div class="mail-controls clearfix">
			<div class="btn-toolbar wide-btns pull-left" role="toolbar">

				<div class="btn-group">
					<button id="btn_mark_rows" type="button" class="btn " ><i class="fa fa-check-square-o"></i>&nbsp;<i class="fa fa-caret-down"></i></button>
					<button id="btn_refresh_search" type="button" class="btn"><i class="fa fa-repeat"></i></button>
				</div>

                <div class="btn-group">
                	<button onclick="window.location.href='http://deltafaucetrep.com/portfolio/new';" title="Novo cliente" type="button" class="btn"><i class="fa fa-plus"></i></button>
				</div>
				
				@if ($user->getUserType()->cod == 40)
					<div class="btn-group">
						<button id="btn_attr_to_representant" data-toggle="modal" data-target="#attrToRepresentant" title="Atrinuir à Representante" type="button" class="btn"><i class="fa fa-user-plus"></i></button>
						<button id="btn_set_to_delta" title="Definir como televendas" type="button" class="btn"><i class="fa fa-user-times"></i></button>
						<button id="btn_unify_customers" title="Unificar clientes" type="button" class="btn"><i class="fa fa-group"></i></button>
					</div>
				@endif
                
			</div>

		</div>
        
			<div class="table-responsive">
				<table class="table table-striped" id="customers_table">
					<thead>
						<tr>
							<th>#</th>
							<th>Código</th>
                            <th>Razão Social</th>
                            <th>CNPJ</th>
                            <th>Gerente</th>
                            <th>Representante</th>
                            <th>Tipo</th>
							<th>Segmento</th>
							<th>Status</th>
                            <th>Estado</th>
                            <th>Cidade</th>
                            <th>Região</th>
                            <th>Classificação Oficial</th>
						</tr>
					</thead>
					<tbody>
						@foreach($customers as $c)
                        <tr>
							<td><input type="checkbox" class="customer_item" data-customer-id="{{$c->customer_id}}"></td>
                            <td>{{$c->customer_id}}</td>
                            <td><a href="http://deltafaucetrep.com/portfolio/detail/{{$c->customer_id}}">{{$c->fantasy_name}}</a></td>
                            <td>{{$c->cnpj}}</td>
                            <td>{{$c->representant() == null ? $c->getManager()["name"] : $c->representant()->manager()->user()->name}}</td>
                            <td>{{$c->representant() == null ? "Televendas" : $c->representant()->company()->name}}</td>
                            <td>{{$c->getType() == null ? "Indef" : $c->getType()->name}}</td>
                            <td>{{$c->getSegment()["name"]}}</td>
                            <td>{{$c->getStatus()["description"]}}</td>
                            <td>{{$c->getState()->uf}}</td>
                            <td>{{$c->city_text == null ? $c->getCity()["nome"] : $c->city_text}}</td>
                            <td>{{$c->getRegion()["description"]}}</td>
                            <td>{{$c->getOfficialClassification()["name"]}}</td>
                        </tr>
                        @endforeach
                    </tbody>
				</table>
			</div>

	</div>
</div>

<div id="attrToRepresentant" class="modal fade">
    <div style="width:700px" class="modal-dialog">
        <div class="modal-content">
			<div class="modal-body" id="attrToRepresentantBody">
				<table id="attrRepTable" class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Nome</th>
							<th>Representação</th>
							<th>Carteira Compartilhada?</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($user->getAllActiveRepresentants() as $r)
							<tr>
								<td>
									<button class="btnAttrRepresentant btn btn-xs btn-success" data-representant-id="{{$r->representant_id}}" type="button" ><i class="fa fa-plus"></i></button>
								</td>
								<td>{{$r->user()->name . " " . $r->user()->surname}}</td>
								<td>{{$r->company()->name}}</td>
								<td>{{$r->company()->has_shared_portfolio == 's' ? 'Sim' : 'Não'}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
            </div>
        </div>
    </div>
</div>


@endsection

@section('end')

<script type="text/javascript">
	$(document).ready(function () {
	    var table = $('#customers_table').DataTable({
            responsive: { details: true },
            paging: false,
            sDom: ""
        });
		
		$("#attrRepTable").DataTable();
        
        $("#search_input").keyup(function () {
            table.search($(this).val() == "" ? " " : $(this).val()).draw();
        });
        
        $("#btn_refresh_search").click(function () {
            table.search(" ").draw();    
        });
		
        
	});
</script>

@endsection