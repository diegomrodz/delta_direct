@extends('layouts.master')

@section('content')

<div class="panel">
    <div class="panel-heading">
        <span class="panel-title"><strong>Relatório de Metas</strong></span>
    </div>

    <div class="panel-body">
    
        <fieldset>
            <legend>KPI por Representante</legend>
            
            <div class="row">
                <div class="col-sm-7"></div>
                <div class="col-sm-5">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Representante</label>
                        <select id="representant_sales_slt" class="form-control">
                            <option value="-" selected="">Selecione</option>
                            @foreach ($user->getAllRepresentants() as $rep)
                                <option value="{{$rep->representant_id}}">{{$rep->user()->name . " " . $rep->user()->surname}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan=2>Meta</th>
                            <th>Total</th>
                            <th>YTD</th>
                            <th>Janeiro</th>
                            <th>Fevereiro</th>
                            <th>Março</th>
                            <th>Abril</th>
                            <th>Maio</th>
                            <th>Junho</th>
                            <th>Julho</th>
                            <th>Agosto</th>
                            <th>Setembro</th>
                            <th>Outubro</th>
                            <th>Novembro</th>
                            <th>Dezembro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan=2>Vendas (Pedidos Enviados)</td>
                            <td><strong>Esperado</strong></td>
                            <td id="kpi_sales_total" rowspan=2 style="white-space: nowrap; vertical-align:middle;">R$ 120k</td>
                            <td id="ytd_kpi_sales_goal" style="white-space: nowrap; background-color:red;">R$ 20k</td>
                            <td id="kpi_sales_goal_1" style="white-space: nowrap; background-color:green;">R$ 10k</td>
                            <td id="kpi_sales_goal_2" style="white-space: nowrap; background-color:red;">R$ 10k</td>
                            <td id="kpi_sales_goal_3" style="white-space: nowrap;">R$ 10k</td>
                            <td id="kpi_sales_goal_4" style="white-space: nowrap;">R$ 10k</td>
                            <td id="kpi_sales_goal_5" style="white-space: nowrap;">R$ 10k</td>
                            <td id="kpi_sales_goal_6" style="white-space: nowrap;">R$ 10k</td>
                            <td id="kpi_sales_goal_7" style="white-space: nowrap;">R$ 10k</td>
                            <td id="kpi_sales_goal_8" style="white-space: nowrap;">R$ 10k</td>
                            <td id="kpi_sales_goal_9" style="white-space: nowrap;">R$ 10k</td>
                            <td id="kpi_sales_goal_10" style="white-space: nowrap;">R$ 10k</td>
                            <td id="kpi_sales_goal_11" style="white-space: nowrap;">R$ 10k</td>
                            <td id="kpi_sales_goal_12" style="white-space: nowrap;">R$ 10k</td>
                        </tr>
                    
                        <tr>
                            <td><strong>Obtido</strong></td>
                            <td id="ytd_kpi_sales" style="white-space: nowrap; background-color:red;">R$ 14.5k</td>
                            <td id="kpi_sales_actual_1" style="white-space: nowrap; background-color:green;">R$ 12k</td>
                            <td id="kpi_sales_actual_2" style="white-space: nowrap; background-color:red;">R$ 2.5k</td>
                            <td id="kpi_sales_actual_3" style="white-space: nowrap;">R$ -</td>
                            <td id="kpi_sales_actual_4" style="white-space: nowrap;">R$ -</td>
                            <td id="kpi_sales_actual_5" style="white-space: nowrap;">R$ -</td>
                            <td id="kpi_sales_actual_6" style="white-space: nowrap;">R$ -</td>
                            <td id="kpi_sales_actual_7" style="white-space: nowrap;">R$ -</td>
                            <td id="kpi_sales_actual_8" style="white-space: nowrap;">R$ -</td>
                            <td id="kpi_sales_actual_9" style="white-space: nowrap;">R$ -</td>
                            <td id="kpi_sales_actual_10" style="white-space: nowrap;">R$ -</td>
                            <td id="kpi_sales_actual_11" style="white-space: nowrap;">R$ -</td>
                            <td id="kpi_sales_actual_12" style="white-space: nowrap;">R$ -</td>
                        
                        </tr>
                        
                    </tbody>
                
                </table>
            
            </div>
            
        </fieldset>
        
    </div>
</div>

@endsection

@section('end')


<script type="text/javascript">
    
    function setDataToKPISales (data) {
        for (var i = 0; i < data.estimated.length; i += 1) {
            var goal = data.estimated[i];
            var actual = data.actuals[i];
            
            $("#kpi_sales_goal_" + (i + 1)).text("R$ " + goal);
            $("#kpi_sales_actual_" + (i + 1)).text("R$ " + goal);            
        }
    }
    
    $("#representant_sales_slt").change(function () {
        if ($(this).val() == "-") return;
        
        $.ajax({
            url: "http://deltafaucetrep.com/report/goals/representant/"+$(this).val()+"/sales_2016",
            type: "get",
            dataType: "json"
        }).done(function (data) {
            setDataToKPISales(data);
        });
    });

</script>

@endsection