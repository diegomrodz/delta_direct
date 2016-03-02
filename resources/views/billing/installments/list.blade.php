@extends('layouts.master')

@section('title', 'Comissões à Receber')

@section('content')

<script type="text/javascript">

    window.document.body.className += " page-mail";
    
</script>

<div class="mail-container" style="margin-left:0px;">
    <div class="col-sm-12">
    
        <div class="mail-container-header">
           Faturamento de Duplicatas
            
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
                    <button id="btn_mark_rows" type="button" class="btn "><i class="fa fa-check-square-o"></i>&nbsp;<i class="fa fa-caret-down"></i>
                    </button>
                    <button id="btn_refresh_search" type="button" class="btn"><i class="fa fa-repeat"></i>
                    </button>
                </div>
                
                <div class="btn-group">
                    <button id="btn_filter_paid" title="Filtrar Pagas" type="button" class="btn "><i class="fa fa-check"></i></i>
                    </button>
                    <button id="btn_filter_unpaid" title="Filtrar sob Pagamento" type="button" class="btn"><i class="fa fa-spinner"></i>
                    </button>
                    <button id="btn_filter_dued" title="Filtrar Vencidas" type="button" class="btn"><i class="fa fa-exclamation"></i>
                    </button>
                </div>
            
                <div class="btn-group">
                    <button id="btn_pay_installments" title="Marcar como pago" type="button" class="btn"><i class="fa fa-check-circle"></i>
                    </button>
                </div>

            </div>

        </div>
        
        <div class="table-responsive">
            <table id="installment_table" class="table table-striped">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Pedido</th>
                        <th>Cliente</th>
                        <th>Fatura</th>
                        <th>Duplicata</th>
                        <th>Valor</th>
                        <th>Status</th>
                        <th>Emissão</th>
                        <th>Vencimento</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($installments as $installment)
                    <tr>
                        <td><input type="checkbox" class="installment_item" data-installment-id="{{$installment->installment_id}}"></td>
                        <td><a href="http://deltafaucetrep.com/billing/detail/{{$installment->invoice()->order()->sub_order_id}}">{{$installment->invoice()->order()->distribuitor()->delta_code . $installment->invoice()->order()->order_id}}</a></td>
                        <td><a href="http://deltafaucetrep.com/portfolio/detail/{{$installment->invoice()->order()->customer()->customer_id}}">{{$installment->invoice()->order()->customer()->fantasy_name}}</a></td>
                        <td><a href="http://deltafaucetrep.com/file/open?p={{$installment->invoice()->filepath}}">{{$installment->invoice()->code}}</a></td>
                        <td><a href="http://deltafaucetrep.com/file/open?p={{$installment->filepath}}">{{$installment->code}}</a></td>
                        <td>R$ {{number_format($installment->grand_total, 2, ".", ",")}}</td>
                        @if ($installment->status()->installment_status_id != 1)
                            <td>{{$installment->status()->description}}</td>
                        @else @if (time() > strtotime($installment->due_date))
                            <td>Vencida</td>
                        @else
                            <td>{{$installment->status()->description}}</td>
                        @endif @endif
                        <td>{{date_format(date_create($installment->emission_date), "d/m/Y")}}</td>
                        <td>{{date_format(date_create($installment->due_date), "d/m/Y")}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    
    </div>
</div>

@endsection

@section('end')


<script type="text/javascript">

     var table = $('#installment_table').DataTable({ sDom: "", paging: false, responsive: { details: false } });
        
        $("#search_input").keyup(function () {
            table.search($(this).val() == "" ? " " : $(this).val()).draw();
        });
        
        
        $("#btn_refresh_search").click(function () {
            table.search(" ").draw();    
        });
    
        $("#btn_filter_paid").click(function () {
            table.search("Pago").draw();    
        });
    
        $("#btn_filter_unpaid").click(function () {
            table.search("Aguardando Pagamento").draw();    
        });
    
        $("#btn_filter_dued").click(function () {
            table.search("Vencida").draw();    
        });
    
        $("#btn_pay_installments").click(function () {
            $(".installment_item").each(function (key, value) { 
                if ($(value).prop('checked')) {
                    $.ajax({
                        url: '/billing/installment/'+$(value).data('installment-id')+'/status/2',
                        type: 'get',
                        dataType: 'json'
                    });
                }
            });        
        });
    
        $("#btn_mark_rows").click(function () {
            var has_check = false;
            
            $(".installment_item").each(function (key, value) { 
                if ($(value).prop('checked')) {
                    has_check = true;
                }
            });
            
            if (has_check) {
                $(".installment_item").prop('checked', false);
            } else {
                $(".installment_item").prop('checked', true);
            }
        });
</script>

@endsection