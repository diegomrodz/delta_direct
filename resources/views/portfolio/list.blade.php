@extends('layouts.master')

@section('title', 'Carteira de Clientes')

@section('content')

<script type="text/javascript">

    window.document.body.className += " page-mail";

</script>

<div style="margin-left:0px;" class="mail-container">
	<div class="col-sm-12">
        <div class="mail-container-header">
			@if ($user->getUserType()->cod != 40)
                Meus Clientes
            @else
                Clientes
            @endif

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
                    <button id="btn_refresh_search" type="button" class="btn"><i class="fa fa-repeat"></i></button>
				</div>
				
				<div class="btn-group">
				    <div class="btn-group">
						<button title="Filtrar por tipo de pedido" type="button" class="btn dropdown-toggle" data-toggle="dropdown">Tipo&nbsp;<i class="fa fa-caret-down"></i></button>
						<ul class="dropdown-menu" role="menu">
						    @foreach($user->getAllCustomerTypes() as $type)
                                <li><a href="#" onclick="filterByType('customer_type_{{$type->customer_type_id}}')">{{$type->name}}</a></li>
                            @endforeach
                        </ul>
					</div>
                </div>

			</div>

		</div>
        
        
        <div class="table-responsive">
            <table class="table" id="portfolio_table">
                <thead>
                    <tr>
                        <th>Cod</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>CNPJ</th>
                        <th>Estado</th>
                        <th>Cidade</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($user->getUserType()->cod == 10) @foreach($user->representant()->getPortfolio() as $c)
                    <tr>
                        <td>{{$c->customer_id}}</td>
                        <td><a href="/portfolio/detail/{{$c->customer_id}}">{{$c->getCustomer()->fantasy_name}}</a>
                        </td>
                        <td data-search="customer_type_{{is_null($c->getCustomer()->getType()) ? 'indef' : $c->getCustomer()->getType()->customer_type_id}}">{{is_null($c->getCustomer()->getType()) ? "" : $c->getCustomer()->getType()->name}}</td>
                        <td><a href="mailto:{{$c->getCustomer()->email}}">{{$c->getCustomer()->email}}</a>
                        </td>
                        <td>{{$c->getCustomer()->phone}}</td>
                        <td>{{$c->getCustomer()->cnpj}}</td>
                        <td>{{$c->getCustomer()->getState()->nome}}</td>
                        <td>{{$c->getCustomer()->getCity() == null ? $c->getCustomer()->city_text : $c->getCustomer()->getCity()->nome}}</td>
                    </tr>
                    @endforeach @elseif ($user->getUserType()->cod == 20) @foreach($user->manager()->getPortfolio() as $c)
                    <tr>
                        <td>{{$c->customer_id}}</td>
                        <td><a href="/portfolio/detail/{{$c->customer_id}}">{{$c->fantasy_name}}</a>
                        </td>
                        <td data-search="customer_type_{{is_null($c->getType()) ? 'indef' : $c->getType()->customer_type_id}}">{{is_null($c->getType()) ? "" : $c->getType()->name}}</td>
                        <td><a href="mailto:{{$c->email}}">{{$c->email}}</a>
                        </td>
                        <td>{{$c->phone}}</td>
                        <td>{{$c->cnpj}}</td>
                        <td>{{$c->getState()->nome}}</td>
                        <td>{{$c->getCity() == null ? $c->city_text : $c->getCity()->nome}}</td>
                    </tr>
                    @endforeach @elseif ($user->getUserType()->cod == 5) @foreach($user->distribuitor()->getPortfolio() as $c)
                    <tr>
                        <td>{{$c->customer_id}}</td>
                        <td><a href="/portfolio/detail/{{$c->customer_id}}">{{$c->fantasy_name}}</a>
                        </td>
                        <td data-search="customer_type_{{is_null($c->getType()) ? 'indef' : $c->getType()->customer_type_id}}">{{is_null($c->getType()) ? "" : $c->getType()->name}}</td>
                        <td><a href="mailto:{{$c->email}}">{{$c->email}}</a>
                        </td>
                        <td>{{$c->phone}}</td>
                        <td>{{$c->cnpj}}</td>
                        <td>{{$c->getState()->nome}}</td>
                        <td>{{$c->getCity() == null ? $c->city_text : $c->getCity()->nome}}</td>
                    </tr>
                    @endforeach @endif
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
	    var table = $('#portfolio_table').DataTable({
            responsive: { details: false },
            sDom: "",
            paging: false
        });
        
        $("#search_input").keyup(function () {
            table.search($(this).val() == "" ? " " : $(this).val()).draw();
        });
        
        $("#btn_refresh_search").click(function () {
            table.search(" ").draw();    
        });
        
	});
    
    function filterByType(type) {
        $('#portfolio_table').DataTable().search(type).draw();
    }
</script>

@endsection