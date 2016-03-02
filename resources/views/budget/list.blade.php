@extends('layouts.master')

@section('title', 'Listar Orçamentos')

@section('content')

<script type="text/javascript">

    window.document.body.className += " page-mail";
    
</script>

<div class="mail-container" style="margin-left:0px;">
	<div class="col-sm-12">


        <div class="mail-container-header">
			Meus Orçamentos

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
					<button id="btn_copy_selected" title="Copiar selecionados" type="button" class="btn"><i class="fa fa fa-copy"></i></button>
					<button data-target="#uidemo-modals-alerts-danger" data-toggle="modal" title="Excluir selecionados"type="button" class="btn"><i class="fa fa-trash-o"></i></button>
				</div>
                
				<div class="btn-group">
					<button id="btn_filter_drafts" title="Filtrar rascunhos" type="button" class="btn"><i class="fa fa fa-file-text-o"></i></button>
					<button id="btn_filter_ended" title="Filtrar finalizados" type="button" class="btn"><i class="fa fa-check"></i></button>
				</div>

                <div class="btn-group">
                	<button onclick="window.location.href='http://deltafaucetrep.com/budget/new';" title="Novo orçamento" type="button" class="btn"><i class="fa fa-plus"></i></button>
				</div>
                
			</div>

		</div>
		
        <div class="table-responsive">
            <table class="table table-striped" id="budgets_table">
            <thead>
                <tr>
                    <th>Item</th>
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
                @if ($user->getUserType()->cod == 10) @foreach($user->representant()->getBudgets() as $d)
                <tr data-budget-id="{{$d->representant_budget_id}}">
                    <td><input class="check_item" type="checkbox" data-budget-id="{{$d->representant_budget_id}}"></td>
                    <td>{{$d->representant_budget_id}}</td>
                    <td><a href="http://deltafaucetrep.com/budget/edit/{{$d->representant_budget_id}}">{{$d->title}}</a>
                    </td>
                    <td>{{$d->customer()->company_name}}</td>
                    <td>{{$d->paymentCondition()->description}}</td>
                    <td>R$ {{$d->grand_total}}</td>
                    <td>{{$d->is_draft == 's' ? 'Rascunho' : 'Finalizado'}}</td>
                    <td>{{date_format($d->updated_at, "d/m/Y")}}</td>
                </tr>
                @endforeach @elseif ($user->getUserType()->cod == 40) @foreach($user->getBudgets() as $d)
                <tr data-budget-id="{{$d->representant_budget_id}}">
                    <td><input class="check_item" type="checkbox" data-budget-id="{{$d->representant_budget_id}}"></td>
                    <td>{{$d->representant_budget_id}}</td>
                    <td><a href="http://deltafaucetrep.com/budget/edit/{{$d->representant_budget_id}}">{{$d->title}}</a>
                    </td>
                    <td>{{$d->customer()->company_name}}</td>
                    <td>{{$d->paymentCondition()->description}}</td>
                    <td>R$ {{$d->grand_total}}</td>
                    <td>{{$d->is_draft == 's' ? 'Rascunho' : 'Finalizado'}}</td>
                    <td>{{date_format($d->updated_at, "d/m/Y")}}</td>
                </tr>
                @endforeach @elseif($user->getUserType()->cod == 20) @foreach($user->manager()->getBudgets() as $d)
                <tr data-budget-id="{{$d->representant_budget_id}}">
                    <td><input class="check_item" type="checkbox" data-budget-id="{{$d->representant_budget_id}}"></td>
                    <td>{{$d->representant_budget_id}}</td>
                    <td><a href="http://deltafaucetrep.com/budget/edit/{{$d->representant_budget_id}}">{{$d->title}}</a>
                    </td>
                    <td>{{$d->customer()->company_name}}</td>
                    <td>{{$d->paymentCondition()->description}}</td>
                    <td>R$ {{$d->grand_total}}</td>
                    <td>{{$d->is_draft == 's' ? 'Rascunho' : 'Finalizado'}}</td>
                    <td>{{date_format($d->updated_at, "d/m/Y")}}</td>
                </tr>
                @endforeach @elseif($user->getUserType()->cod == 5) @foreach($user->distribuitor()->getBudgets() as $d)
                <tr data-budget-id="{{$d->representant_budget_id}}">
                    <td><input class="check_item" type="checkbox" data-budget-id="{{$d->representant_budget_id}}"></td>
                    <td>{{$d->representant_budget_id}}</td>
                    <td><a href="http://deltafaucetrep.com/budget/edit/{{$d->representant_budget_id}}">{{$d->title}}</a>
                    </td>
                    <td>{{$d->customer()->company_name}}</td>
                    <td>{{$d->paymentCondition()->description}}</td>
                    <td>R$ {{$d->grand_total}}</td>
                    <td>{{$d->is_draft == 's' ? 'Rascunho' : 'Finalizado'}}</td>
                    <td>{{date_format($d->updated_at, "d/m/Y")}}</td>
                </tr>
                @endforeach @endif
            </tbody>
        </table>
        </div>

	</div>
</div>

<div id="uidemo-modals-alerts-danger" class="modal modal-alert modal-warning fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fa fa-warning"></i>
            </div>
            <div class="modal-title">Atenção</div>
            <div class="modal-body">Os orçamentos selecionados ficarão inacessíveis, deseja continuar?</div>
            <div class="modal-footer">
                <button id="btn_exclude_selected" type="button" class="btn btn-danger" data-dismiss="modal">Sim</button>
                <button type="button" class="btn btn-outline" data-dismiss="modal">Não</button>
            </div>
        </div>
        <!-- / .modal-content -->
    </div>
    <!-- / .modal-dialog -->
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
        
        $("#btn_filter_drafts").click(function () {
            table.search("Rascunho").draw();    
        });
        
        $("#btn_filter_ended").click(function () {
            table.search("Finalizado").draw();    
        });
        
        $("#btn_refresh_search").click(function () {
            table.search(" ").draw();    
        });
        
        $("#btn_copy_selected").click(function () {
            $(".check_item").each(function (key, value) {
                if ($(value).prop('checked')) {
                    $.ajax({
                        url: "http://deltafaucetrep.com/budget/copy/" + $(value).attr('data-budget-id'),
                        method: 'get',
                        dataType: 'json'
                    });
                }
            });
            window.location.reload();
        });
        
        $("#btn_exclude_selected").click(function () {
            $(".check_item").each(function (key, value) {
                if ($(value).prop('checked')) {
                    $.ajax({
                        url: "http://deltafaucetrep.com/budget/delete/" + $(value).attr('data-budget-id'),
                        method: 'get',
                        dataType: 'json'
                    });
                    $("tr[data-budget-id="+ $(value).attr('data-budget-id') +"]").hide();            
                }
            });      
        });
        
        $("#btn_mark_rows").click(function () {
            var has_check = false;
            
            $(".check_item").each(function (key, value) { 
                if ($(value).prop('checked')) {
                    has_check = true;
                }
            });
            
            if (has_check) {
                $(".check_item").prop('checked', false);
            } else {
                $(".check_item").prop('checked', true);
            }
        });
	});
</script>

@endsection