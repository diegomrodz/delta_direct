<div class="panel" style="margin:0px;">
    <div class="panel-heading">
        <span class="panel-ttile">Gerar Relatório de Comissões</span>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                <fieldset>
                    <legend>Emissor</legend>
                    <div class="form-group no-margin-hr">
                        <strong>Nome:</strong>
                        <span id="envoy_name">{{$user->name . " " . $user->surname}}</span>
                    </div>
                    <div class="form-group no-margin-hr">
                        <strong>Telefone:</strong>
                        <span id="envoy_phone">{{$user->representant() != null ? $user->representant()->phone : ($user->manager() != null ? $user->manager()->phone : " 11 3285-9020") }}</span>
                    </div>
                    <div class="form-group no-margin-hr">
                        <strong>Email:</strong>
                        <span id="envoy_email">{{$user->email}}</span>
                    </div>

                </fieldset>

                @if ($user->representant() != null)
                <fieldset>
                    <legend>Representante</legend>
                    <input type="hidden" id="representant_company_id" value="{{$user->representant() == null ? "" : $user->representant()->company()->representant_company_id}}">
                    <div class="form-group no-margin-hr">
                        <strong>Razão Social:</strong>
                        <span id="rep_company_name">{{$user->representant()->company()->name}}</span>
                    </div>
                    <div class="form-group no-margin-hr col-sm-6" style="padding-left:0px">
                        <strong>CNPJ:</strong>
                        <span id="rep_company_cnpj">{{$user->representant()->company()->cnpj}}</span>
                    </div>
                    <div class="form-group no-margin-hr col-sm-6">
                        <strong>IE:</strong>
                        <span id="rep_company_ie">{{$user->representant()->company()->ie}}</span>
                    </div>
                    <div class="form-group no-margin-hr col-sm-2" style="padding-left:0px">
                        <strong>UF:</strong>
                        <span id="rep_company_cnpj">{{$user->representant()->company()->state}}</span>
                    </div>
                    <div class="form-group no-margin-hr col-sm-6">
                        <strong>Cidade:</strong>
                        <span id="rep_company_ie">{{$user->representant()->company()->city}}</span>
                    </div>
                    <div class="form-group no-margin-hr col-sm-4">
                        <strong>CEP:</strong>
                        <span id="rep_company_ie">{{$user->representant()->company()->cep}}</span>
                    </div>
                    <div class="form-group no-margin-hr">
                        <strong>Endereço:</strong>
                        <span id="rep_company_address">{{$user->representant()->company()->address}}</span>
                    </div>
                    <hr style="margnin:0px;">
                    <div class="form-group no-margin-hr col-sm-6" style="padding-left:0px">
                        <strong>Banco:</strong>
                        <span id="rep_company_cnpj">{{$user->representant()->company()->bank_name}}</span>
                    </div>
                    <div class="form-group no-margin-hr col-sm-6">
                        <strong>Agência:</strong>
                        <span id="rep_company_cnpj">{{$user->representant()->company()->bank_agency}}</span>
                    </div>
                    <div class="form-group no-margin-hr">
                        <strong>Conta Corrente:</strong>
                        <span id="rep_company_cnpj">{{$user->representant()->company()->bank_cc}}</span>
                    </div>
                </fieldset>
                @else
                <input type="hidden" id="representant_company_id" value="{{$user->representant() == null ? "" : $user->representant()->company()->representant_company_id}}">
                @endif
            </div>
            
            <div class="col-sm-6">
                <fieldset>
                    <legend>Filtros</legend>
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Distribuidor</label>
                        <select class="form-control" name="filter_dist" id="filter_dist">
                                <option value="-">Todos</option>
                            @foreach($user->getAllDistribuitors() as $dist)
                                <option value="{{$dist->distribuitor_id}}">{{$dist->user()->name}}</option>
                            @endforeach
                        </select>
                        <label class="control-label">Status</label>
                        <select class="form-control" name="filter_status" id="filter_status">
                            <option value="0">Todos</option>
                            <option value="1">Comissão - Duplicatas pagas</option>
                            <option value="2">Pendente - Duplicatas não pagas</option>
                            <option value="3">Comissões Pagas</option>
                        </select>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Distribuidor</legend>
                    <div class="form-group no-margin-hr">
                        <strong>Razão Social:</strong>
                        <span id="dist_company_name"></span>
                    </div>
                    <div class="form-group no-margin-hr col-sm-6" style="padding-left:0px">
                        <strong>CNPJ:</strong>
                        <span id="dist_company_cnpj"></span>
                    </div>
                    <div class="form-group no-margin-hr col-sm-6">
                        <strong>IE:</strong>
                        <span id="dist_company_ie"></span>
                    </div>
                    <div class="form-group no-margin-hr col-sm-2" style="padding-left:0px">
                        <strong>UF:</strong>
                        <span id="dist_company_uf"></span>
                    </div>
                    <div class="form-group no-margin-hr col-sm-6">
                        <strong>Cidade:</strong>
                        <span id="dist_company_city"></span>
                    </div>
                    <div class="form-group no-margin-hr col-sm-4">
                        <strong>CEP:</strong>
                        <span id="dist_company_cep"></span>
                    </div>
                    <div class="form-group no-margin-hr">
                        <strong>Endereço:</strong>
                        <span id="dist_company_address"></span>
                    </div>
                </fieldset>
                <div class="form-group no-margin-hr">
                    <label class="control-label">NF de Serviço:</label>
                    <input type="file" id="nfe_file_att">
                </div>
            </div>
        </div>
        
            <div class="responsive-table">
                <table class="table table-striped" id="fee_report_table">
                    <thead>
                        <tr>
                            <th>Pedido</th>
                            <th>NF</th>
                            <th>Duplicata</th>
                            <th>Distribuidor</th>
                            <th>Base Comissão</th>
                            <th>Valor Comissão</th>
                            <th>Status</th>
                            <th>Emissão</th>
                            <th>Vencimento</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            @foreach($order->getInvoices() as $invoice)
                                @foreach($invoice->getInstallments() as $installment)
                                    @if ($installment->installment_status_id != 3)
                                        <tr class="installment" data-installment-id="{{$installment->installment_id}}">
                                            <td data-search="{{$installment->fee_is_paid == 's' ? 'fee_is_paid' : 'fee_has_not_been_paid'}}">{{$order->distribuitor()->delta_code . $order->order()->order_id}}</td>            
                                            <td>{{$invoice->code}}</td>
                                            <td>{{$installment->code}}</td>
                                            <td>{{$order->distribuitor()->user()->name}}</td>
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
                                    @endif
                                @endforeach
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
    <div class="panel-footer">
        <button id="btn_save_report" class="btn btn-success btn-flat">Salvar</button>
    </div>
</div>

<script type="text/javascript">

    $("#btn_save_report").click(function () {
        var data = new FormData();
        var file = $("#nfe_file_att").prop('files');
        
        data.append("representant_company_id", $("#representant_company_id").val());
        data.append("distribuitor_id", $("#filter_dist").val());
        data.append("filter_status", $("#filter_status").val());
        data.append("_token", $("#_token").val());
        
        var installments = [];
        
        $(".installment").each(function (key, value) {
            installments.push($(value).data("installment-id"));
        });
        
        data.append("installments[]", installments);
        
        if (file[0]) {
            data.append("nfe_file_att", file[0], file[0].name);
        }
        
        $.ajax({
            url: "http://deltafaucetrep.com/billing/report/fee",
            type: "post",
            cache: false,
            data: data,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false
        }).done(function (chunk) {
            window.location.href="http://deltafaucetrep.com/billing/fee_report/list";        
        });
    });
    
    var dtable = $("#fee_report_table").DataTable({
        sDom: '',
        paging: false,
        ordering: false
    });
    
    function filter() {
        var that = $("#filter_dist :selected");

        if (that.text() != "Todos") {
            $.ajax({
                url: "http://deltafaucetrep.com/distributor/find/" + that.val(),
                type: "get",
                dataType: 'json'
            }).done(function(data) {
                $("#dist_company_name").text(data.company_name);
                $("#dist_company_cnpj").text(data.cnpj);
                $("#dist_company_ie").text(data.ie == null ? "Não Informado" : data.ie);
                $("#dist_company_uf").text(data.state);
                $("#dist_company_city").text(data.city_text);
                $("#dist_company_cep").text(data.cep);
                $("#dist_company_address").text(data.address);
            });

            if ($("#filter_status").val() == "0") {
                dtable.search(that.text());
            } else if ($("#filter_status").val() == "1") {
                dtable.search(that.text() + " fee_has_not_been_paid Pago");
            } else if ($("#filter_status").val() == "2") {
                dtable.search(that.text() + " fee_has_not_been_paid Vencida");
            } else {
                dtable.search(that.text() + " fee_is_paid");
            }
        } else {

            $("#dist_company_name").text("");
            $("#dist_company_cnpj").text("");
            $("#dist_company_ie").text("");
            $("#dist_company_uf").text("");
            $("#dist_company_city").text("");
            $("#dist_company_cep").text("");
            $("#dist_company_address").text("");

            if ($("#filter_status").val() == "0") {
                dtable.search(" ");
            } else if ($("#filter_status").val() == "1") {
                dtable.search("fee_has_not_been_paid Pago");
            } else if ($("#filter_status").val() == "2") {
                dtable.search("fee_has_not_been_paid Vencida");
            } else {
                dtable.search("fee_is_paid");
            }
        }
        
        dtable.draw();
    }
    
    $("#filter_dist").change(filter);
    $("#filter_status").change(filter);
    
</script>