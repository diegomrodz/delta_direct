@extends('layouts.master')

@section('title', 'Comissões à Receber')

@section('content')

<script type="text/javascript">

    window.document.body.className += " page-mail";
    
</script>

<div class="mail-container" style="margin-left:0px;">
	
    <div class="col-sm-12">
        <div class="mail-container-header">
           @if ($user->getUserType()->cod == 10)
            Comissões à Receber: {{$user->representant()->company()->name}}
           @else
            Comissões à Receber
           @endif 
            <form action="#" class="pull-right" style="width: 350px;margin-top: 3px;">
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
                        <button id="btn_show_fee_report" style="width:130px;" data-toggle="modal" data-target="#feeReportModal" class="btn">Gerar Relatório</button>
                    </div>
                    
                </div>

        </div>

                <div class="table-responsive">
                    <table class="table" id="budgets_table">
                        <thead>
                            <tr>
                                <th>Pedido</th>
                                <th>NF</th>
                                <th>Duplicata</th>
                                @if ($user->getUserType()->cod == 40 || $user->getUserType()->cod == 20)
                                    <th>Representante</th>
                                @endif
                                <th>Distribuidor</th>
                                <th>Valor Total</th>
                                <th>Valor Comissão</th>
                                <th>Status Duplicata</th>
                                <th>Emitido Em</th>
                                <th>Vencimento Em</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                @foreach($order->getInvoices() as $invoice)
                                    @foreach($invoice->getInstallments() as $installment)
                                        <tr>
                                            <td><a href="http://deltafaucetrep.com/billing/detail/{{$order->sub_order_id}}">{{$order->distribuitor()->delta_code . $order->order()->order_id}}</a></td>            
                                            <td><a href="http://deltafaucetrep.com/file/open?p={{$invoice->filepath}}" target="_blank">{{$invoice->code}}</a></td>
                                            <td><a href="http://deltafaucetrep.com/file/open?p={{$installment->filepath}}" target="_blank">{{$installment->code}}</a></td>
                                            @if ($user->getUserType()->cod == 40 || $user->getUserType()->cod == 20)
												@if ($order->representant() != null)
                                                <td><a href="http://deltafaucetrep.com/profile/{{$order->representant()->user()->user_id}}/detail">{{$order->representant()->user()->name}}</a></td>
                                            	@else
												<td>N.I</td>
												@endif
											@endif
                                            <td><a href="http://deltafaucetrep.com/profile/{{$order->distribuitor()->user()->user_id}}/detail">{{$order->distribuitor()->user()->name}}</a></td>
                                            <td>R$ {{number_format($invoice->product_value,2, ',', '.')}}</td>
                                            <td>R$ {{number_format(($invoice->product_value / count($invoice->getInstallments())) * 0.05, 2, ',', '.')}}</td>
                                            @if ($installment->status()->installment_status_id != 1)
                                                <td>{{$installment->status()->description}}</td>
                                            @else
                                                @if (time() > strtotime($installment->due_date))
                                                    <td>Vencida</td>
                                                @else
                                                    <td>{{$installment->status()->description}}</td>
                                                @endif
                                            @endif
                                            <td>{{date_format(date_create($installment->emission_date), "d/m/Y")}}</td>
                                            <td>{{date_format(date_create($installment->due_date), "d/m/Y")}}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
    </div>
</div>

<div id="feeReportModal" class="modal fade" aria-hidden="true" style="display: none;">
    <div style="width:900px" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="padding:0px;" id="fee_report_body">
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>

<input type="hidden" id="_token" value="{{csrf_token()}}">

@endsection

@section('end')

<script type="text/javascript">
	$(document).ready(function () {
	    var table = $('#budgets_table').DataTable({ sDom: "", paging: false, responsive: { details: false } });
        
        $("#search_input").keyup(function () {
            table.search($(this).val() == "" ? " " : $(this).val()).draw();
        });
        
        
        $("#btn_refresh_search").click(function () {
            table.search(" ").draw();    
        });
	});
    
    $("#btn_show_fee_report").click(function () {
        $.ajax({
            url: "http://deltafaucetrep.com/billing/report/fee",
            type: 'get',
            dataType: 'html'
        }).done(function (data) {
            $("#fee_report_body").html(data);
        });
    });
</script>

@endsection