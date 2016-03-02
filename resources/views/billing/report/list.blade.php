@extends('layouts.master')

@section('title', 'Relatórios de Comissão')

@section('content')

<script type="text/javascript">
    window.document.body.className += " page-mail";
</script>

<div class="mail-container" style="margin-left:0px;">
	<div class="col-sm-12">

        <div class="mail-container-header">
			Meus Relatórios de Comissão

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
                    <button id="btn_mark_rows" type="button" class="btn "><i class="fa fa-check-square-o"></i>&nbsp;<i class="fa fa-caret-down"></i>
                    </button>
                    <button id="btn_refresh_search" type="button" class="btn"><i class="fa fa-repeat"></i>
                    </button>
                </div>

            </div>
        </div>
        
        <div class="table-responsive">
            <table id="reports_table" class="table table-striped">
                <thead>
                    <tr>
                        <th>Pagamento</th>
                        <th>Anexo</th>
                        <th>Código</th>
                        <th>Representante</th>
                        <th>Emissor</th>
                        <th>Valor Total</th>
                        <th>Data Emissão</th>
                    </tr>
                </thead>    
                <tbody>
                    @foreach($reports as $report)
                        <tr>
                            <td><span class="nfe_paid_status" data-fee-report-id="{{$report->fee_report_id}}">{{$report->is_paid == 's' ? "Pago" : "Pendente"}}</span></td>
                            @if ($report->nfe_filepath != null)
                                <td><a href="http://deltafaucetrep.com/file/open?p={{$report->nfe_filepath}}">Enviado</a></td>
                            @else
                                <td><a href="#" class="feeReportAtt" data-fee-report-id="{{$report->fee_report_id}}" data-toggle="modal" data-target="#sendNfeModal"><i class="fa fa-paperclip"></i></a></td>
                            @endif
                            <td><a href="http://deltafaucetrep.com/billing/fee_report/{{$report->fee_report_id}}/detail">{{$report->fee_report_id}}</a></td>
                            <td>{{$report->company() == null ? "Geral" : $report->company()->name}}</td>
                            <td>{{$report->resp() == null ? "Delta" : $report->resp()->user()->name . " " . $report->resp()->user()->surname}}</td>
                            <td>R$ {{number_format($report->total(), 2, ".", ",")}}</td>
                            <td>{{date_format(date_create($report->created_at), "d/m/Y")}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

<div id="sendNfeModal" class="modal fade" style="display: none;">
    <div style="width:450px;" class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Selecione o documento a ser enviado</h4>
            </div>
            <div class="modal-body">
                <p>Não faça o upload de arquivos maiores que 1.5mb.</p>
                
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Arquivo:</label>
                        <input  type="file" id="nfe_file_att">
                    </div>
                </div>
                <div class="col-sm-6">
                    <button id="upload_nfe" style="float:right;margin-top:15px;" href="#" class="btn btn-info"><i class="fa fa-upload"></i>&nbsp;&nbsp;Fazer Upload</button>
                </div>
            </div>
        </div>
        <!-- / .modal-content -->
    </div>
    <!-- / .modal-dialog -->
</div>

<input type="hidden" id="_token" value="{{ csrf_token() }}">

@endsection

@section('end')

<script type="text/javascript" src="http://static.deltafaucetrep.com/assets/javascripts/editable.js"></script>

<script type="text/javascript">
	$(document).ready(function () {
	    
        var feeReportId = 0;
        
        $('#reports_table').DataTable({
            sDom: "",
            responsive: {details: false},
            paging: false
        });
        
        $(".nfe_paid_status").each(function (key, value) {
            $(value).editInPlace({
                url: "#",
                select_options: [
                    ["Pago", "s"],
                    ["Pendente", "n"]
                ],
                field_type: "select",
                callback: function(original_element, html, original) {

                    $.ajax({
                        url: 'http://deltafaucetrep.com/billing/fee_report/' + $(value).data("fee-report-id") + '/change_status/' + html,
                        type: 'get'
                    });

                    return html == 's' ? 'Pago' : 'Pendente';
                }
            });    
        });
        
        $(".feeReportAtt").click(function () {
            feeReportId = $(this).data("fee-report-id");        
        });
        
        $("#upload_nfe").click(function () {
            var data = new FormData();
            var file = $("#nfe_file_att").prop('files')[0];
            
            if (file) {
                data.append("nfe_att", file, file.name);
            } else {
                alert("Por favor, insira um documento para fazer upload!");
                return;
            }
            
            data.append('_token', $("#_token").val());
            
            $.ajax({
                url: "http://deltafaucetrep.com/billing/fee_report/" + feeReportId + "/send_nfe",
                type: "POST",
                data: data,
                dataType: "json",
                cache: false,
                processData: false, // Don't process the files
                contentType: false
            });
            
            window.location.reload();
        });
	});
</script>

@endsection