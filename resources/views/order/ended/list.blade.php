@extends('layouts.master')

@section('title', 'Listar Orçamentos')

@section('content')

<div class="row">
	<div class="col-sm-12">

<!-- 5. $DEFAULT_TABLES ============================================================================

		Default tables
-->
		<div class="panel">
			<div class="panel-heading">
				<span class="panel-title">Meus Pedidos Finalizados</span>
			</div>
			<div class="panel-body">
				<table class="table" id="budgets_table">
					<thead>
                        @if ($user->getUserType()->cod == 40)
                        <tr>
                            <th>Código</th>
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
                            <th>Código</th>
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
                        @if($user->getUserType()->cod == 10)
						@foreach($user->representant()->getEndedOrders() as $o)
                        <tr>
                            <td>{{$o->order_id}}</td>
                            <td><a href="http://deltafaucetrep.com/budget/edit/{{$o->representant_budget_id}}">{{$o->representant_budget_id}}</td>
                            <td><a href="http://deltafaucetrep.com/order/detail/{{$o->order_id}}">{{$o->title}}</a></td>
                            <td>{{$o->customer()->company_name}}</td>
                            <td>{{$o->paymentCondition()->description}}</td>
                            <td>{{$o->grand_total}}</td>
                            <td>{{$o->getStatus()->description}}</td>
                            <td>{{$o->updated_at}}</td>
                        </tr>
                        @endforeach
                        @elseif($user->getUserType()->cod == 20)
                        @foreach($user->manager()->getEndedOrders() as $o)
                        <tr>
                            <td>{{$o->order_id}}</td>
                            <td><a href="http://deltafaucetrep.com/budget/edit/{{$o->representant_budget_id}}">{{$o->representant_budget_id}}</td>
                            <td><a href="http://deltafaucetrep.com/order/detail/{{$o->order_id}}">{{$o->title}}</a></td>
                            <td>{{$o->customer()->company_name}}</td>
                            <td>{{$o->paymentCondition()->description}}</td>
                            <td>{{$o->grand_total}}</td>
                            <td>{{$o->getStatus()->description}}</td>
                            <td>{{$o->updated_at}}</td>
                        </tr>
                        @endforeach
                        @elseif($user->getUserType()->cod == 40)
                        @foreach($user->getAllEndedOrders() as $o)
                        <tr>
                            <td>{{$o->order_id}}</td>
                            <td><a href="http://deltafaucetrep.com/budget/edit/{{$o->representant_budget_id}}">{{$o->representant_budget_id}}</td>
                            <td><a href="http://deltafaucetrep.com/order/detail/{{$o->order_id}}">{{$o->title}}</a></td>
                            <td>{{$o->customer()->company_name}}</td>
                            <td>{{$o->representant() == null ? "Televendas" : ($o->representant()->user()->name . " " . $o->representant()->user()->surname)}}</td>
                            <td>{{$o->manager() == null ?"": ($o->manager()->user()->name . " " . $o->manager()->user()->surname)}}</td>
                            <td>{{$o->paymentCondition()->description}}</td>
                            <td>{{$o->grand_total}}</td>
                            <td>{{$o->getStatus()->description}}</td>
                            <td>{{$o->updated_at}}</td>
                        </tr>
                        @endforeach
                        @endif
					</tbody>
				</table>
			</div>
		</div>
<!-- /5. $DEFAULT_TABLES -->

	</div>
</div>

@endsection

@section('end')

<script type="text/javascript">
	$(document).ready(function () {
	    $('#budgets_table').DataTable();
	});
</script>

@endsection