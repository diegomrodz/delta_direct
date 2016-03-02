@extends('layouts.master')

@section('title', 'Pedidos sob Faturamento')

@section('content')

<script type="text/javascript">
    window.document.body.className += " page-mail";
</script>

<div class="mail-container" style="margin-left:0px;">
	<div class="col-sm-12">
        <div class="mail-container-header">
			Pedidos sob Faturamento

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

              
                
			</div>

		</div>
        
		<div class="table-responsive">
				<table class="table table-striped" id="budgets_table">
					<thead>
                        <tr>
                            @if ($user->getUserType()->cod == 40)
                                <th>Pedido</th>
                            @endif
                            <th>Código</th>
							<th>Cliente</th>
                            <th>Representante</th>
                            <th>Forma de Pagamento</th>
                            <th>Comissão</th>
                            <th>Valor Total</th>
                            <th>Criado Em</th>
						</tr>
					</thead>
					<tbody>
                        @foreach($orders as $o)
                            @if ($user->getUserType()->cod == 40)
                                <tr>
                                    <td><a href="/order/detail/{{$o->order_id}}">{{$o->order_id}}</a></td>
                                    <td><a href="/billing/detail/{{$o->sub_order_id}}">{{$o->distribuitor()->delta_code . $o->order_id}}</td>
                                    <td>{{$o->customer()->company_name}}</td>
                                    <td>{{$o->representant() == null ? "Delta" : $o->representant()->company()->name}}</td>
                                    <td>{{$o->paymentCondition()->description}}</td>
                                    <td>{{$o->representant_fee == null ? "0.00" : $o->representant_fee}}</td>
                                    <td>{{$o->grand_total}}</td>
                                    <td>{{date_format(date_create($o->created_at), "d/m/Y")}}</td>
                                </tr>
                            @elseif ($user->getUserType()->cod == 5)
                                @if ($o->distribuitor()->user_id == $user->user_id)
                                    <tr>
                                        <td><a href="/billing/detail/{{$o->sub_order_id}}">{{$o->distribuitor()->delta_code . $o->order_id}}</td>
                                        <td>{{$o->customer()->company_name}}</td>
                                        <td>{{$o->representant() == null ? "Delta" : $o->representant()->company()->name}}</td>
                                        <td>{{$o->paymentCondition()->description}}</td>
                                        <td>{{$o->representant_fee == null ? "0.00" : $o->representant_fee}}</td>
                                        <td>{{$o->grand_total}}</td>
                                        <td>{{date_format(date_create($o->created_at), "d/m/Y")}}</td>
                                    </tr>
                                 @endif
                            @elseif ($user->getUserType()->cod == 20)
                                @if ($o->manager_id == $user->manager()->manager_id || ($o->representant() != null && $o->representant()->manager_id == $user->manager()->manager_id))
                                    <tr>
                                        <td><a href="/billing/detail/{{$o->sub_order_id}}">{{$o->distribuitor()->delta_code . $o->order_id}}</td>
                                        <td>{{$o->customer()->company_name}}</td>
                                        <td>{{$o->representant() == null ? "Delta" : $o->representant()->company()->name}}</td>
                                        <td>{{$o->paymentCondition()->description}}</td>
                                        <td>{{$o->representant_fee == null ? "0.00" : $o->representant_fee}}</td>
                                        <td>{{$o->grand_total}}</td>
                                        <td>{{date_format(date_create($o->created_at), "d/m/Y")}}</td>
                                    </tr>
                                 @endif
                            @endif
                        @endforeach
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
            paging: false,
            sDom: ""
        });
        
        $("#search_input").keyup(function () {
            table.search($(this).val() == "" ? " " : $(this).val()).draw();
        });
        
        $("#btn_refresh_search").click(function () {
            table.search(" ").draw();    
        });
	});
</script>

@endsection