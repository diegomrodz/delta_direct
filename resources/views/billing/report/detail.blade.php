@extends('layouts.master')

@section('title', 'Relatórios de Comissão')

@section('content')

<div class="panel">
    <div class="panel-heading">
        <span class="panel-title"><strong>{{$report->fee_report_id}}</strong> - {{$report->company() == null ? "Geral" : $report->company()->name}} : {{date_format(date_create($report->cerated_at), "m/Y")}}</span>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                <fieldset>
                    <legend>Emissor</legend>
                    
                    <div class="form-group no-margin-hr">
                        <strong>Nome:</strong>
                        <span id="envoy_name"><a href="http://deltafaucetrep.com/profile/{{$report->resp() == null ? 2 : $report->resp()->user_id}}/detail">{{$report->resp() == null ? "Delta" : $report->resp()->user()->name . " " . $report->resp()->user()->surname}}</a></span>
                    </div>
                    <div class="form-group no-margin-hr">
                        <strong>Telefone:</strong>
                        <span id="envoy_phone">{{$report->representant() != null ? $report->representant()->phone : ($report->manager() != null ? $report->manager()->phone : "0800 740 7415")}}</span>
                    </div>
                    <div class="form-group no-margin-hr">
                        <strong>Email:</strong>
                        <span id="envoy_email"><a href="mailto:{{$report->resp() == null ? 'sac@deltafaucet.com' : $report->resp()->email}}">{{$report->resp() == null ? 'sac@deltafaucet.com' : $report->resp()->email}}</a></span>
                    </div>
                    
                </fieldset>
                
                @if ($report->company() != null)
                <fieldset>
                    <legend>Representante</legend>
                    <input type="hidden" id="representant_company_id" value="{{$report->company()->representant_company_id}}">
                    <div class="form-group no-margin-hr">
                        <strong>Razão Social:</strong>
                        <span id="rep_company_name">{{$report->company()->name}}</span>
                    </div>
                    <div class="form-group no-margin-hr col-sm-6" style="padding-left:0px">
                        <strong>CNPJ:</strong>
                        <span id="rep_company_cnpj">{{$report->company()->cnpj}}</span>
                    </div>
                    <div class="form-group no-margin-hr col-sm-6">
                        <strong>IE:</strong>
                        <span id="rep_company_ie">{{$report->company()->ie}}</span>
                    </div>
                    <div class="form-group no-margin-hr col-sm-2" style="padding-left:0px">
                        <strong>UF:</strong>
                        <span id="rep_company_cnpj">{{$report->company()->state}}</span>
                    </div>
                    <div class="form-group no-margin-hr col-sm-6">
                        <strong>Cidade:</strong>
                        <span id="rep_company_ie">{{$report->company()->city}}</span>
                    </div>
                    <div class="form-group no-margin-hr col-sm-4">
                        <strong>CEP:</strong>
                        <span id="rep_company_ie">{{$report->company()->cep}}</span>
                    </div>
                    <div class="form-group no-margin-hr">
                        <strong>Endereço:</strong>
                        <span id="rep_company_address">{{$report->company()->address}}</span>
                    </div>
                    <hr style="margnin:0px;">
                    <div class="form-group no-margin-hr col-sm-6" style="padding-left:0px">
                        <strong>Banco:</strong>
                        <span id="rep_company_cnpj">{{$report->company()->bank_name}}</span>
                    </div>
                    <div class="form-group no-margin-hr col-sm-6">
                        <strong>Agência:</strong>
                        <span id="rep_company_cnpj">{{$report->company()->bank_agency}}</span>
                    </div>
                    <div class="form-group no-margin-hr">
                        <strong>Conta Corrente:</strong>
                        <span id="rep_company_cnpj">{{$report->company()->bank_cc}}</span>
                    </div>
                </fieldset>
                @endif
            </div>
            
            
            <div class="col-sm-6">
                <fieldset>
                    <legend>Informações</legend>
                    
                    <div class="form-group no-margin-hr">
                        <strong>Emitido Em:</strong>
                        <span id="envoy_name">{{date_format(date_create($report->cerated_at), "d/m/Y")}}</span>
                    </div>
                    
                    <div class="form-group no-margin-hr">
                        <strong>Status:</strong>
                        <span id="envoy_name">{{$report->is_paid == 's' ? 'Pago' : 'Pendente'}}</span>
                    </div>
                    
                    <div class="form-group no-margin-hr">
                        <strong>Total:</strong>
                        <span id="envoy_name">R$ {{number_format($report->total(), 2, ".", ",")}}</span>
                    </div>
                </fieldset>
                
            @if ($report->distribuitor() != null)
                <fieldset>
                        <legend>Distribuidor</legend>
                        <div class="form-group no-margin-hr">
                            <strong>Razão Social:</strong>
                            <span id="dist_company_name">{{$report->distribuitor()->company_name}}</span>
                        </div>
                        <div class="form-group no-margin-hr col-sm-6" style="padding-left:0px">
                            <strong>CNPJ:</strong>
                            <span id="dist_company_cnpj">{{$report->distribuitor()->cnpj}}</span>
                        </div>
                        <div class="form-group no-margin-hr col-sm-6">
                            <strong>IE:</strong>
                            <span id="dist_company_ie">{{$report->distribuitor()->ie}}</span>
                        </div>
                        <div class="form-group no-margin-hr col-sm-2" style="padding-left:0px">
                            <strong>UF:</strong>
                            <span id="dist_company_uf">{{$report->distribuitor()->state}}</span>
                        </div>
                        <div class="form-group no-margin-hr col-sm-6">
                            <strong>Cidade:</strong>
                            <span id="dist_company_city">{{$report->distribuitor()->city_text}}</span>
                        </div>
                        <div class="form-group no-margin-hr col-sm-4">
                            <strong>CEP:</strong>
                            <span id="dist_company_cep">{{$report->distribuitor()->cep}}</span>
                        </div>
                        <div class="form-group no-margin-hr">
                            <strong>Endereço:</strong>
                            <span id="dist_company_address">{{$report->distribuitor()->address}}</span>
                        </div>
                    </fieldset>
                @endif
            
                <hr style="margin-top:3px;">
                
                <div class="form-group no-margin-hr">
                    <strong>Nota Fiscal de Serviço:</strong>
                    @if ($report->nfe_filepath == null)
                        <input type="file" id="nfe_file_att">
                    @else
                    <a href="http://deltafaucetrep.com/file/open?p={{$report->nfe_filepath}}">Clique aqui para baixá-la.</a>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="responsive-table">
                <table class="table table-striped" id="fee_report_table">
                    <thead>
                        <tr>
                            <th>Pedido</th>
                            <th>NF</th>
                            <th>Duplicata</th>
                            <th>Base Comissão</th>
                            <th>Valor Comissão</th>
                            <th>Status</th>
                            <th>Emissão</th>
                            <th>Vencimento</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($report->items() as $item)
                        <tr>
                            <td>{{$item->installment()->invoice()->order()->distribuitor()->delta_code . $item->installment()->invoice()->order()->order_id}}</td>
                            <td>{{$item->installment()->invoice()->code}}</td>
                            <td>{{$item->installment()->code}}</td>
                            <td>R$ {{number_format($item->installment()->invoice()->product_value,2,".",",")}}</td>
                            <td>R$ {{number_format(($item->installment()->invoice()->product_value / count($item->installment()->invoice()->getInstallments())) * 0.05, 2, ',', '.')}}</td>
                            <td>{{$item->status()->description}}</td>
                            <td>{{date_format(date_create($item->installment()->emission_date), "d/m/Y")}}</td>
                            <td>{{date_format(date_create($item->installment()->due_date), "d/m/Y")}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Totais:</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>R$ {{number_format($report->total(), 2, ".", ",")}}</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
        </div>
    </div>
</div>

@endsection

@section('end')

@endsection