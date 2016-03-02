@extends('layouts.master') @section('title', 'Análise de Crédito') @section('content')

<div class="row">
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


                <form action="" class="panel form-horizontal">
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
                                    <td><a href="http://deltafaucetrep.com/file/open?p={{$ca->dre_filepath}}">Último Balanço + DRE</a>
                                    </td>
                                @endif
                            </tr>
                        </table>
                    </div>
            </div>

            <div class="col-sm-6" style="float:right;">
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">Crédito</span>
                    </div>
                    <div class="panel-body">
                        <div class="form-group no-margin-hr" style="margin-bottom:38px;">
                            <label class="control-label">Limite Aprovado</label>
                            <select id="approved_credit_analysis" class="form-control">
                                @foreach($ca->getRanges() as $r)
                                <option value="{{$r->customer_credit_analysis_range_id}}">{{$r->description}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button  onclick="endAnalysis({{$ca->customer_credit_analysis_id}}, {{$user->distribuitor()->distribuitor_id}})" class="btn btn-flat btn-lg btn-success"><span class="btn-label icon fa"></span>Finalizar</button>
                        <button  onclick="openAnalysisConversation({{$ca->customer_credit_analysis_id}}, {{$user->distribuitor()->distribuitor_id}})" data-toggle="modal" data-target="#distribuitorAnalysisConversationModal" class="btn btn-info btn-lg btn-flat"><span class="btn-label icon fa fa-comments"></span>
                        </button>
                    </div>
                </div>
            </div>
                
           <div class="col-sm-6">
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">Conclusão</span>
                    </div>
                    <div class="panel-body">
                        <textarea id="credit_analysis_conclusion" rows="8" class="form-control"></textarea>
                    </div>
                </div>
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

@endsection @section('end')

<script type="text/javascript">
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
    
    function endAnalysis(ca, dist) {
        
        var res = $.ajax({
            url: "http://deltafaucetrep.com/customer/credit_analysis/" + ca + "/from/" + dist + "/approved/"  + $("#approved_credit_analysis").val(),
            type: 'GET',
            dataType: 'json'
        });
        
        res.success(function (data) {
            console.log(data);
            window.location.href = "http://deltafaucetrep.com";
        });
    }
</script>

@endsection