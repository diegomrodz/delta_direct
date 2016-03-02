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
				<span class="panel-title">Meus Orçamentos Finalizados</span>
			</div>
			<div class="panel-body">
				<table class="table" id="budgets_table">
					<thead>
						<tr>
							<th>Código</th>
							<th>Título</th>
							<th>Cliente</th>
                            <th>Forma de Pagamento</th>
                            <th>Valor Total</th>
                            <th>Status</th>
                            <th>Aualizado Em</th>
						</tr>
					</thead>
					<tbody>
                        @if ($user->getUserType()->cod == 10)
                            @foreach($user->representant()->getBudgetFinish() as $d)
                            <tr>
                                <td>{{$d->representant_budget_id}}</td>
                                <td><a href="http://deltafaucetrep.com/budget/edit/{{$d->representant_budget_id}}">{{$d->title}}</a></td>
                                <td>{{$d->customer()->company_name}}</td>
                                <td>{{$d->paymentCondition()->description}}</td>
                                <td>R$ {{$d->grand_total}}</td>
                                <td>Finalizado</td>
                                <td>{{$d->updated_at}}</td>
                            </tr>
                            @endforeach
                        @elseif ($user->getUserType()->cod == 20)
                            @foreach($user->manager()->getBudgetFinish() as $d)
                            <tr>
                                <td>{{$d->representant_budget_id}}</td>
                                <td><a href="http://deltafaucetrep.com/budget/edit/{{$d->representant_budget_id}}">{{$d->title}}</a></td>
                                <td>{{$d->customer()->company_name}}</td>
                                <td>{{$d->paymentCondition()->description}}</td>
                                <td>R$ {{$d->grand_total}}</td>
                                <td>Finalizado</td>
                                <td>{{$d->updated_at}}</td>
                            </tr>
                            @endforeach
                        @elseif ($user->getUserType()->cod == 40)
                            @foreach($user->getBudgetFinish() as $d)
                            <tr>
                                <td>{{$d->representant_budget_id}}</td>
                                <td><a href="http://deltafaucetrep.com/budget/edit/{{$d->representant_budget_id}}">{{$d->title}}</a></td>
                                <td>{{$d->customer()->company_name}}</td>
                                <td>{{$d->paymentCondition()->description}}</td>
                                <td>R$ {{$d->grand_total}}</td>
                                <td>Finalizado</td>
                                <td>{{$d->updated_at}}</td>
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