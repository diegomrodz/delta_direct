@extends('layouts.master') @section('title', 'Análise de Crédito') @section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Análise de Crédito: {{$ca->customer()->fantasy_name}}</span>
            </div>
            <div class="panel-body">
                <div class="col-sm-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title">Dados do cliente</span>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td><strong>Razão Social:</strong>
                                    </td>
                                    <td id="company_name" class="customer_attr">{{$ca->customer()->company_name}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Nome Fantasia:</strong>
                                    </td>
                                    <td id="fantasy_name" class="customer_attr">{{$ca->customer()->fantasy_name}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Tipo de Cliente:</strong>
                                    </td>
                                    <td>{{$ca->customer()->getType()->name}}</td>
                                </tr>
                                <tr>
                                    <td><strong>CNPJ/CPF:</strong>
                                    </td>
                                    <td id="cnpj" class="customer_attr">{{$ca->customer()->cnpj}}</td>
                                </tr>
                                <tr>
                                    <td><strong>IE:</strong>
                                    </td>
                                    <td id="ie" class="customer_attr">{{$ca->customer()->ie}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Cidade:</strong>
                                    </td>
                                    <td><span id="city_text" class="customer_attr">{{$ca->customer()->city_text}}</span>, {{$ca->customer()->getState()->uf}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Endereço:</strong>
                                    </td>
                                    <td>{{$ca->customer()->getAddress()->text}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Bairro:</strong>
                                    </td>
                                    <td>{{$ca->customer()->getAddress()->district}}</td>
                                </tr>
                                <tr>
                                    <td><strong>CEP:</strong>
                                    </td>
                                    <td>{{$ca->customer()->getAddress()->cep}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Telefone:</strong>
                                    </td>
                                    <td id="phone" class="customer_attr">{{$ca->customer()->phone}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Email:</strong>  <a href="mailto:{{$ca->customer()->email}}"><span class="btn-label icon fa fa-envelope-o"></span></a>
                                    </td>
                                    <td id="email" class="customer_attr">{{$ca->customer()->email}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Sede Própria:</strong>
                                    </td>
                                    <td>{{($ca->customer()->own_seat === 's') ? "Sim" : "Não"}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Contribuinte do ICMS:</strong>
                                    </td>
                                    <td>{{($ca->customer()->icms_taxpayer === 's') ? "Sim" : ($ca->customer()->icms_taxpayer === '?') ? "Indefinido" : "Não" }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Faturamento Anual:</strong>
                                    </td>
                                    <td id="annual_income" class="customer_attr">R$ {{$ca->customer()->annual_income}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                @if ($ca->representant() != null && $ca->representant()->manager() != null)
                <div class="col-sm-6">


                    <form action="" class="panel form-horizontal">
                        <div class="panel-heading">
                            <span class="panel-title">Gerente</span>
                        </div>
                        <div style="padding-top:5px;" class="panel-body">
                            <table class="table">
                                <tr>
                                    <td><strong>Nome:</strong>
                                    </td>
                                    <td>{{$ca->representant()->manager()->user()->name . " " . $ca->representant()->manager()->user()->surname}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Telefone:</strong>
                                    </td>
                                    <td>{{$ca->representant()->manager()->phone}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Email:</strong>
                                    </td>
                                    <td>{{$ca->representant()->manager()->user()->email}}</td>
                                </tr>
                            </table>
                        </div>
                    </form>

                </div>

                <div class="col-sm-6">


                    <form action="" class="panel form-horizontal">
                        <div class="panel-heading">
                            <span class="panel-title">Representante</span>
                        </div>
                        <div style="padding-top:5px;" class="panel-body">
                            <table class="table">
                                <tr>
                                    <td><strong>Nome:</strong>
                                    </td>
                                    <td>{{$ca->representant()->user()->name . " " . $ca->representant()->user()->surname}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Telefone:</strong>
                                    </td>
                                    <td>{{$ca->representant()->phone}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Email:</strong>
                                    </td>
                                    <td>{{$ca->representant()->user()->email}}</td>
                                </tr>
                            </table>
                        </div>
                    </form>

                </div>
                @elseif ($ca->representant() == null && $ca->manager() != null)
                <div class="col-sm-6">


                    <form action="" class="panel form-horizontal">
                        <div class="panel-heading">
                            <span class="panel-title">Gerente</span>
                        </div>
                        <div style="padding-top:5px;" class="panel-body">
                            <table class="table">
                                <tr>
                                    <td><strong>Nome:</strong>
                                    </td>
                                    <td>{{$ca->manager()->user()->name . " " . $ca->manager()->user()->surname}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Telefone:</strong>
                                    </td>
                                    <td>{{$ca->manager()->phone}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Email:</strong>
                                    </td>
                                    <td>{{$ca->manager()->user()->email}}</td>
                                </tr>
                            </table>
                        </div>
                    </form>

                </div>
                @elseif ($ca->representant() == null && $ca->manager() == null)
                 <div class="col-sm-6">


                    <form action="" class="panel form-horizontal">
                        <div class="panel-heading">
                            <span class="panel-title">Representante</span>
                        </div>
                        <div style="padding-top:5px;" class="panel-body">
                            <table class="table">
                                <tr>
                                    <td><strong>Nome:</strong>
                                    </td>
                                    <td>Televendas</td>
                                </tr>
                                <tr>
                                    <td><strong>Telefone:</strong>
                                    </td>
                                    <td>(11) 0800 740 7415</td>
                                </tr>
                                <tr>
                                    <td><strong>Email:</strong>
                                    </td>
                                    <td>sac@deltafaucet.com</td>
                                </tr>
                            </table>
                        </div>
                    </form>

                </div>
                @endif
                
                <div class="col-sm-6">


                    <form class="panel form-horizontal">
                        <div class="panel-heading">
                            <span class="panel-title">Documentos</span>
                        </div>
                        <div style="padding-top:9px;" class="panel-body">
                            <table class="table">
                                <tr>
                                    @if ($ca->cnpj_filepath != null)
                                        <td><a href="http://deltafaucetrep.com/file/open?p={{$ca->cnpj_filepath}}">CNPJ</a>
                                        </td>
                                    @endif
                                    @if ($ca->ie_filepath != null)
                                        <td><a href="http://deltafaucetrep.com/file/open?p={{$ca->ie_filepath}}">Inscrição Estadual</a>
                                        </td>
                                    @endif
                                </tr>
                                <tr>
                                    @if ($ca->social_contract_filepath != null)
                                        <td><a href="http://deltafaucetrep.com/file/open?p={{$ca->social_contract_filepath}}">Contrato Social</a>
                                        </td>
                                    @endif
                                    @if ($ca->dre_filepath != null)
                                        <td><a href="http://deltafaucetrep.com/file/open?p={{$ca->dre_filepath}}">Último Balanço + DRE / Serasa Credit Analysis</a>
                                        </td>
                                    @endif
                                </tr>
                            </table>
                        </div>
                </div>

                 <div style="float:right" class="col-sm-6">
                    <div class="panel form-horizontal">
                        <div class="panel-heading">
                            <span class="panel-title">Solcitação</span>
                        </div>
                        <div class="panel-body">
                            <div class="form-group no-margin-hr">
                                <strong>Crédito Solicitado:</strong> R$ {{$ca->credit_required}}
                            </div>
                            <div class="form-group no-margin-hr">
                                <strong>Primeiro Pedido:</strong> R$ {{$ca->first_order_value}}
                            </div>
                        </div>
                    </div>
                </div>
                 
                @if ($user->getUserType()->cod == 40)    
                <div style="{{ ($ca->representant() != null && $ca->representant()->manager() != null) ? "" : "float:right;" }}" class="col-sm-6">
                    <div class="panel form-horizontal">
                        <div class="panel-heading">
                            <span class="panel-title">Dsitribuidores</span>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                @foreach ($distribuitors as $d)
                                <tr>
                                    <th>
                                        <center>{{$d->fantasy_name}}</center>
                                    </th>
                                    <td>
                                        @if ($ca->customer_credit_analysis_status_id == 1 && $user->getUserType()->cod == 40)
                                            @if($ca->getRequest($d->distribuitor_id) == null)
                                            <center>
                                                <button onclick="sendAnalysisRequest({{$ca->customer_credit_analysis_id}}, {{$d->distribuitor_id}})" data-toggle="modal" data-target="#" class="btn btn-success btn-xs btn-flat"><span class="btn-label icon fa fa-envelope-o"></span>
                                                </button>
                                            </center>
                                            @elseif ($ca->getRequest($d->distribuitor_id)->customer_credit_analysis_request_status_id == 1)
                                            <center>
                                                <button onclick="openAnalysisConversation({{$ca->customer_credit_analysis_id}}, {{$d->distribuitor_id}})" data-toggle="modal" data-target="#distribuitorAnalysisConversationModal" class="btn btn-info btn-xs btn-flat"><span class="btn-label icon fa fa-comments"></span>
                                                </button>
                                            </center>
                                            @else
                                            <center>
                                                <button onclick="openAnalysisConversation({{$ca->customer_credit_analysis_id}}, {{$d->distribuitor_id}})" data-toggle="modal" data-target="#distribuitorAnalysisConversationModal" class="btn btn-xs btn-flat"><span class="btn-label icon fa fa-comments"></span>
                                                </button>
                                                <span style="margin-left:10px;">{{$ca->getRequest($d->distribuitor_id)->range()->description}}</span>
                                            </center>
                                            @endif
                                        @else
                                            @if($ca->getRequest($d->distribuitor_id) == null)    
                                            <center>
                                                <span>Não enviado.</span>
                                            </center>
                                            @else
                                            <center>
                                                <button onclick="openAnalysisConversation({{$ca->customer_credit_analysis_id}}, {{$d->distribuitor_id}})" data-toggle="modal" data-target="#distribuitorAnalysisConversationModal" class="btn btn-xs btn-flat"><span class="btn-label icon fa fa-comments"></span>
                                                </button>
                                                <span style="margin-left:10px;">{{$ca->getRequest($d->distribuitor_id)->range()->description}}</span>
                                            </center>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                @endif 
                @if ($ca->customer_credit_analysis_status_id != 1 || $user->getUserType()->cod == 40)
                <div style="{{ ($ca->representant() != null && $ca->representant()->manager() != null) ? "float:right;" : "float:left;" }}" class="col-sm-6">
                    <div class="panel form-horizontal">
                        <div class="panel-heading">
                            <span class="panel-title">Análise de Crédito</span>
                        </div>
                        <div class="panel-body">
                            <div class="form-group no-margin-hr" >
                                @if ($ca->customer_credit_analysis_status_id == 1)
                                    <label class="control-label">Limite Aprovado</label>
                                    <select id="approved_credit_analysis" class="form-control">
                                        @foreach($ca->getRanges() as $r)
                                            <option value="{{$r->customer_credit_analysis_range_id}}">{{$r->description}}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <label class="control-label">Limite Aprovado:</label>
                                    {{$ca->getRange()->description}}
                                @endif
                            </div>
                            <div class="form-group no-margin-hr">
                                <label class="control-label">Observações</label>
                                
                                @if ($ca->customer_credit_analysis_status_id == 1)
                                    <textarea id="credit_analysis_conclusion" rows="8" class="form-control"></textarea>
                                @else
                                    <textarea id="credit_analysis_conclusion" rows="8" class="form-control" readonly value="{{$ca->observation}}">{{$ca->observation}}</textarea>
                                @endif
                            </div>
                        </div>
                        <div class="panel-footer">
                            @if ($ca->customer_credit_analysis_status_id == 1)
                                <button onclick="endCreditAnalysis({{$ca->customer_credit_analysis_id}})" type="button" class="btn btn-flat btn-lg btn-success"><span class="btn-label icon fa"></span>Finalizar</button>
                            @endif
                            <button onclick="openRepAnalysisConversation({{$ca->customer_credit_analysis_id}})" data-toggle="modal" data-target="#repAnalysisConversationModal" class="btn btn-info btn-lg btn-flat"><span class="btn-label icon fa fa-comments"></span></button>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
</div>

<input id="_token" type="hidden" value="{{ csrf_token() }}">

<div id="distribuitorAnalysisConversationModal" class="modal fade">
    <div style="width:900px" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="distribuitor_analysis_conversation">
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>

<div id="repAnalysisConversationModal" class="modal fade">
    <div style="width:900px" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="rep_analysis_conversation">
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>

@endsection @section('end')

<script type="text/javascript">
    function sendAnalysisRequest(ca, dist) {
        var req = $.ajax({
            url: "http://deltafaucetrep.com/customer/credit_analysis/send/" + ca + "/to/" + dist,
            type: 'get'
        });

        req.success(function(data) {
            window.location.reload();
        });

        req.error(function(data) {
            alert("Erro!");
        });
    }

    function openAnalysisConversation(ca, dist) {
        var response = $.ajax({
            url: "http://deltafaucetrep.com/customer/credit_analysis/notes/" + ca + "/from/" + dist,
            type: 'GET',
            dataType: 'html'
        });

        response.done(function(data) {
            $("#distribuitor_analysis_conversation").html(data);
        });
    }
    
    function openRepAnalysisConversation(ca) {
        var response = $.ajax({
            url: "http://deltafaucetrep.com/customer/credit_analysis/" + ca + "/notes",
            type: 'GET',
            dataType: 'html'
        });

        response.done(function(data) {
            $("#rep_analysis_conversation").html(data);
        });
    }
    
    function endCreditAnalysis(ca) {
        var data = {};
        
        data.approved_credit_analysis = $("#approved_credit_analysis").val();
        data.credit_analysis_conclusion = $("#credit_analysis_conclusion").val();
        
        data._token = $("#_token").val();
        
        var response = $.ajax({
            url: "http://deltafaucetrep.com/customer/credit_analysis/" + ca + "/end",
            type: 'POST',
            data: data,
            dataType: 'json'
        });

        alert("Analise de Credito realizada com sucesso");
        window.location.reload();
    }
    
</script>

@endsection