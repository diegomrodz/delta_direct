@extends('layouts.master')

@section('title', 'Listar Pedidos')

@section('content')

<script type="text/javascript">

    window.document.body.className += " page-mail";
    
</script>

<div style="margin-left:0px;" class="mail-container">
	<div class="col-sm-12">
        
        <div class="mail-container-header">
			@if ($user->getUserType()->cod != 40)
                Meus Pedidos
            @else
                Pedidos
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
					<button id="btn_filter_in_progress" title="Filtrar em andamento" type="button" class="btn"><i class="fa fa fa-retweet"></i></button>
					<button id="btn_filter_ended" title="Filtrar finalizados" type="button" class="btn"><i class="fa fa-check"></i></button>
				</div>

			</div>

        </div>
        <div class="table-responsive">
            <table class="table table-striped" id="budgets_table">
                <thead>
                    @if ($user->getUserType()->cod == 40)
                    <tr>
                        <th>Pedido</th>
                        <th>Orçamento</th>
                        <th>Título</th>
                        <th>Cliente</th>
                        <th>Representante</th>
                        <th>Gerente</th>
                        <th>Forma de Pagamento</th>
                        <th>Valor Total</th>
                        <th>Status</th>
                        <th>Aualizado Em</th>
                    </tr>
                    @else
                    <tr>
                        <th>Pedido</th>
                        <th>Orçamento</th>
                        <th>Título</th>
                        <th>Cliente</th>
                        <th>Forma de Pagamento</th>
                        <th>Valor Total</th>
                        <th>Status</th>
                        <th>Aualizado Em</th>
                    </tr>
                    @endif
                </thead>
                <tbody>
                    @if($user->getUserType()->cod == 10) @foreach($user->representant()->getOrders() as $o)
                    <tr>
                        <td><a href="http://deltafaucetrep.com/order/detail/{{$o->order_id}}">{{$o->order_id}}</a></td>
                        <td><a href="http://deltafaucetrep.com/budget/edit/{{$o->representant_budget_id}}">{{$o->representant_budget_id}}</td>
                        <td>{{$o->title}}</td>
                        <td>{{$o->customer()->company_name}}</td>
                        <td>{{$o->paymentCondition()->description}}</td>
                        <td>{{$o->grand_total}}</td>
                        <td>{{$o->getStatus()->description}}</td>
                        <td>{{date_format($o->updated_at, "d/m/Y")}}</td>
                    </tr>
                    @endforeach @elseif ($user->getUserType()->cod == 20) @foreach($user->manager()->getOrders() as $o)
                    <tr>
                        <td><a href="http://deltafaucetrep.com/order/detail/{{$o->order_id}}">{{$o->order_id}}</a></td>
                        <td><a href="http://deltafaucetrep.com/budget/edit/{{$o->representant_budget_id}}">{{$o->representant_budget_id}}</td>
                        <td>{{$o->title}}</td>
                        <td>{{$o->customer()->company_name}}</td>
                        <td>{{$o->paymentCondition()->description}}</td>
                        <td>{{$o->grand_total}}</td>
                        <td>{{$o->getStatus()->description}}</td>
                        <td>{{date_format($o->updated_at, "d/m/Y")}}</td>
                    </tr>
                    @endforeach @elseif ($user->getUserType()->cod == 5) @foreach($user->distribuitor()->getOrders() as $o)
                    <tr>
                        <td><a href="http://deltafaucetrep.com/order/detail/{{$o->order_id}}">{{$o->order_id}}</a></td>
                        <td><a href="http://deltafaucetrep.com/budget/edit/{{$o->representant_budget_id}}">{{$o->representant_budget_id}}</td>
                        <td>{{$o->title}}</td>
                        <td>{{$o->customer()->company_name}}</td>
                        <td>{{$o->paymentCondition()->description}}</td>
                        <td>{{$o->grand_total}}</td>
                        <td>{{$o->getStatus()->description}}</td>
                        <td>{{date_format($o->updated_at, "d/m/Y")}}</td>
                    </tr>
                    @endforeach @else @foreach($user->getAllOrders() as $o)
                    <tr>
                        <td><a href="http://deltafaucetrep.com/order/detail/{{$o->order_id}}">{{$o->order_id}}</a></td>
                        <td><a href="http://deltafaucetrep.com/budget/edit/{{$o->representant_budget_id}}">{{$o->representant_budget_id}}</td>
                        <td>{{$o->title}}</td>
                        <td>{{$o->customer()->company_name}}</td>
                        <td>{{$o->representant() == null ? "Televendas" : ($o->representant()->user()->name . " " . $o->representant()->user()->surname)}}</td>
                        <td>{{$o->manager() == null ? "Delta" : ($o->manager()->user()->name . " " . $o->manager()->user()->surname)}}</td>
                        <td>{{$o->paymentCondition()->description}}</td>
                        <td>{{$o->grand_total}}</td>
                        @if ($o->order_status_id == 2 || $o->order_status_id == 7)
                            <td data-search="ended_order_filter">{{$o->getStatus()->description}}</td>
                        @else
                            <td data-search="in_progress_order_filter">{{$o->getStatus()->description}}</td>
                        @endif
                        <td>{{date_format($o->updated_at, "d/m/Y")}}</td>
                    </tr>
                    @endforeach @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('end')

<script type="text/javascript">
	$(document).ready(function () {
	    var table = $('#budgets_table').DataTable({
            sDom: "",
            paging: false
        });
        
        $("#search_input").keyup(function () {
            table.search($(this).val() == "" ? " " : $(this).val()).draw();
        });
        
        $("#btn_filter_in_progress").click(function () {
            table.search("in_progress_order_filter").draw();    
        });
        
        $("#btn_filter_ended").click(function () {
            table.search("ended_order_filter").draw();    
        });
        
        $("#btn_refresh_search").click(function () {
            table.search(" ").draw();    
        });
       
	});
</script>

@endsection