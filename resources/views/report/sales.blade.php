@extends('layouts.master')

@section('content')


<link href="http://amcharts.com/lib/3/plugins/export/export.css" rel="stylesheet" type="text/css">


<div class="panel">
    <div class="panel-heading">
        <span class="panel-title"><strong>Relatório de Vendas</strong>, Sistema</span>
    </div>
    <div class="panel-body">
        <div class="row">
            <fieldset>
                <legend>Vendas</legend>
            
                <div class="col-sm-12">
                   <div id="rawMonthlySalesPlot" style="width: 100%; height: 500px; background-color: #FFFFFF;" ></div>
                </div>
                
                <div class="col-sm-12">
                   <div id="totalSalesPlot" style="width: 100%; height: 500px; background-color: #FFFFFF;" ></div>
                </div>
                
                 <div class="col-sm-6">
                    <div id="2015UserTypeSales" style="width: 100%; height: 500px; background-color: #FFFFFF;"></div>
                </div>
                
                 <div class="col-sm-6">
                    <div id="2016UserTypeSales" style="width: 100%; height: 500px; background-color: #FFFFFF;"></div>
                </div>
                
            </fieldset>
        </div>
        
        <div class="row">
            <fieldset>
                <legend>Orçamentos</legend>
                
                <div class="col-sm-12">
                   <div id="BudgetsCreatedByMonth" style="width: 100%; height: 500px; background-color: #FFFFFF;" ></div>
                </div>
                
                <div class="col-sm-12">
                   <div id="BudgetsAvgTicketByMonth" style="width: 100%; height: 500px; background-color: #FFFFFF;" ></div>
                </div>
                
                <div class="col-sm-6">
                    <div id="2015UserTypeBudgets" style="width: 100%; height: 500px; background-color: #FFFFFF;"></div>
                </div>
                
                <div class="col-sm-6">
                    <div id="2016UserTypeBudgets" style="width: 100%; height: 500px; background-color: #FFFFFF;"></div>
                </div>
                
            </fieldset>
        </div>
        
        <div class="row">
            <fieldset>
                <legend>Clientes</legend>
                
                <div class="col-sm-6">
                    <div id="YTD2015CustomerTypeSales" style="width: 100%; height: 500px; background-color: #FFFFFF;"></div>
                </div>
                
                <div class="col-sm-6">
                    <div id="YTD2016CustomerTypeSales" style="width: 100%; height: 500px; background-color: #FFFFFF;"></div>
                </div>
                
                <div class="col-sm-6">
                    <table class="table">
                        <caption><strong>2015 - Top 15 Clientes</strong></caption>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cliente</th>
                                <th>Valor Total</th>
                                <th>Qtd. Pedidos</th>
                                <th>Ticket Médio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (collect($that->getYearTopCustomers(2015))->take(15) as $pos => $c)
                            <tr>
                                <td>{{$pos + 1}}</td>
                                <td><a target="_blank" href="http://deltafaucetrep.com/portfolio/detail/{{$c->customer_id}}">{{$c->fantasy_name}}</a></td>
                                <td>{{number_format($c->total, 2, ",", ".")}}</td>
                                <td>{{$c->orders}}</td>
                                <td>{{number_format($c->total / $c->orders, 2, ",", ".")}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="col-sm-6">
                    <table class="table">
                        <caption><strong>2016 - Top 15 Clientes</strong></caption>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cliente</th>
                                <th>Valor Total</th>
                                <th>Qtd. Pedidos</th>
                                <th>Ticket Médio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (collect($that->getYearTopCustomers(2016))->take(15) as $pos => $c)
                            <tr>
                                <td>{{$pos + 1}}</td>
                                <td>{{$c->fantasy_name}}</td>
                                <td>{{number_format($c->total, 2, ",", ".")}}</td>
                                <td>{{$c->orders}}</td>
                                <td>{{number_format($c->total / $c->orders, 2, ",", ".")}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                
            </fieldset>
        </div>
        
        <div class="row">
            <fieldset>
                <legend>Distribuidores</legend>
                
                <div class="col-sm-12">
                   <div id="SalesByDistribuitors" style="width: 100%; height: 500px; background-color: #FFFFFF;" ></div>
                </div>
                
                <div class="col-sm-6">
                   <div id="RatioSalesByDistribuitors2015" style="width: 100%; height: 500px; background-color: #FFFFFF;" ></div>
                </div>
                
                <div class="col-sm-6">
                   <div id="RatioSalesByDistribuitors2016" style="width: 100%; height: 500px; background-color: #FFFFFF;" ></div>
                </div>
                
            </fieldset>
        </div>
        
        <div class="row">
            <fieldset>
                <legend>Representações</legend>
                
                <div class="col-sm-12">
                   <div id="SalesByRepCompany" style="width: 100%; height: 500px; background-color: #FFFFFF;" ></div>
                </div>
                
                <div class="col-sm-6">
                   <div id="RatioSalesByRepCompany2015" style="width: 100%; height: 500px; background-color: #FFFFFF;" ></div>
                </div>
                
                <div class="col-sm-6">
                   <div id="RatioSalesByRepCompany2016" style="width: 100%; height: 500px; background-color: #FFFFFF;" ></div>
                </div>
                
            </fieldset>
        </div>
        
        <div class="row">
            <fieldset>
                <legend>Representantes</legend>
                
                <div class="col-sm-6">
                    <div id="YTD2015RepresentantProfileSales" style="width: 100%; height: 500px; background-color: #FFFFFF;"></div>
                </div>
                
                <div class="col-sm-6">
                    <div id="YTD2016RepresentantProfileSales" style="width: 100%; height: 500px; background-color: #FFFFFF;"></div>
                </div>
                
                <div class="col-sm-6">
                    <table class="table">
                        <caption><strong>2015 - Top Representantes</strong></caption>
                        <thead>
                            <tr>
                                <th>Representante</th>
                                <th>Valor Orçado</th>
                                <th>Valor Vendido</th>
                                <th>Qtd. Vendas</th>
                                <th>Ticket Médio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($that->getYearTopRepresentants(2015) as $rep)
                            <tr>
                                <td><a href="http://deltafaucetrep.com/profile/{{$rep['user_id']}}/detail">{{$rep["name"]}}</a></td>
                                <td>{{number_format($rep["budgets_total"], 2, ",", ".")}}</td>
                                <td>{{number_format($rep["sales_total"], 2, ",", ".")}}</td>
                                <td>{{number_format($rep["sales_qtd"], 0, "", "")}}</td>
                                <td>{{$rep["sales_qtd"] == 0 ? "0,00" : number_format($rep["sales_total"] / $rep["sales_qtd"], 2, ",", ".")}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="col-sm-6">
                    <table class="table">
                        <caption><strong>2016 - Top Representantes</strong></caption>
                        <thead>
                            <tr>
                                <th>Representante</th>
                                <th>Valor Orçado</th>
                                <th>Valor Vendido</th>
                                <th>Qtd. Vendas</th>
                                <th>Ticket Médio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($that->getYearTopRepresentants(2016) as $rep)
                            <tr>
                                <td><a href="http://deltafaucetrep.com/profile/{{$rep['user_id']}}/detail">{{$rep["name"]}}</a></td>
                                <td>{{number_format($rep["budgets_total"], 2, ",", ".")}}</td>
                                <td>{{number_format($rep["sales_total"], 2, ",", ".")}}</td>
                                <td>{{number_format($rep["sales_qtd"], 0, "", "")}}</td>
                                <td>{{$rep["sales_qtd"] == 0 ? "0,00" : number_format($rep["sales_total"] / $rep["sales_qtd"], 2, ",", ".")}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                
            </fieldset>
        </div>
        
        <div class="row">
            <fieldset>
                <legend>Produtos</legend>
                
                <div class="col-sm-6">
                    <table class="table">
                        <caption><strong>2015 - Top 10 Delta Função Vendidas</strong></caption>

                        <thead>
                            <tr>
                                <th>Função</th>
                                <th>Total Orçado</th>
                                <th>Total Vendido</th>
                                <th>Qtd. Vendida</th>
                                <th>Taxa de Conversão</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($that->getTopProductFunctionSales(2015) as $fun)
                            <tr>
                                <td>{{$fun["description"]}}</td>
                                <td>{{number_format($fun["budgets_total"], 2, ",", ".")}}</td>
                                <td>{{number_format($fun["sales_total"], 2, ",", ".")}}</td>
                                <td>{{$fun["qtd"]}}</td>
                                <td>{{$fun["sales_total"] == 0 ? 0 : number_format($fun["sales_total"] * 100 / $fun["budgets_total"], 2, ",", ".")}}%</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="col-sm-6">
                    <table class="table">
                        <caption><strong>2016 - Top 10 Delta Função Vendidas</strong></caption>

                        <thead>
                            <tr>
                                <th>Função</th>
                                <th>Total Orçado</th>
                                <th>Total Vendido</th>
                                <th>Qtd. Vendida</th>
                                <th>Taxa de Conversão</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($that->getTopProductFunctionSales(2016) as $fun)
                            <tr>
                                <td>{{$fun["description"]}}</td>
                                <td>{{number_format($fun["budgets_total"], 2, ",", ".")}}</td>
                                <td>{{number_format($fun["sales_total"], 2, ",", ".")}}</td>
                                <td>{{$fun["qtd"]}}</td>
                                <td>{{$fun["sales_total"] == 0 ? 0 : number_format($fun["sales_total"] * 100 / $fun["budgets_total"], 2, ",", ".")}}%</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </fieldset>
        </div>
        
        
    </div>
</div>

@endsection

@section('end')

<script type="text/javascript" src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script type="text/javascript" src="http://cdn.amcharts.com/lib/3/serial.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/pie.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/themes/light.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/amstock.js"></script>
<script type="text/javascript" src="http://amcharts.com/lib/3/plugins/export/export.js"></script>


<script type="text/javascript">
    
    var UserTypeSales2015 = {
                fill: function () {
            var req = $.ajax({
                url: "http://deltafaucetrep.com/report/sales/per_user_type/ratio/2015",
                type: "get",
                dataType: "json"
            }).done(function (data) {
                $("#2015UserTypeSales").html("");
                
                var chart = AmCharts.makeChart("2015UserTypeSales", {
                    "type": "pie",
                    "theme": "light",
                    "titles": [{
                        "text": "2015 - Vendas Por Tipo de Usuário",
                        "size": 15
                    }],
                    "dataProvider": data,
                    "valueField": "total",
                    "titleField": "user_type",
                    "balloon": {
                        "fixedPosition": true
                    },
                    "export": {
                        "enabled": true
                    }
                });
            });
        }       
    };
    
    var UserTypeSales2016 = {
                fill: function () {
            var req = $.ajax({
                url: "http://deltafaucetrep.com/report/sales/per_user_type/ratio/2016",
                type: "get",
                dataType: "json"
            }).done(function (data) {
                $("#2016UserTypeSales").html("");
                
                var chart = AmCharts.makeChart("2016UserTypeSales", {
                    "type": "pie",
                    "theme": "light",
                    "titles": [{
                        "text": "2016 - Vendas Por Tipo de Usuário",
                        "size": 15
                    }],
                    "dataProvider": data,
                    "valueField": "total",
                    "titleField": "user_type",
                    "balloon": {
                        "fixedPosition": true
                    },
                    "export": {
                        "enabled": true
                    }
                });
            });
        }       
    };
    
    var YTD2015RepresentantProfileSales = {
        fill: function () {
            var req = $.ajax({
                url: "http://deltafaucetrep.com/report/sales/rep_profile/ratio/2015",
                type: "get",
                dataType: "json"
            }).done(function (data) {
                $("#YTD2015RepresentantProfileSales").html("");
                
                var chart = AmCharts.makeChart("YTD2015RepresentantProfileSales", {
                    "type": "pie",
                    "theme": "light",
                    "titles": [{
                        "text": "2015 - Vendas Por Perfil de Representante",
                        "size": 15
                    }],
                    "dataProvider": data,
                    "valueField": "total",
                    "titleField": "profile",
                    "balloon": {
                        "fixedPosition": true
                    },
                    "export": {
                        "enabled": true
                    }
                });
            });
        }    
    };
    
    var YTD2016RepresentantProfileSales = {
        fill: function () {
            var req = $.ajax({
                url: "http://deltafaucetrep.com/report/sales/rep_profile/ratio/2016",
                type: "get",
                dataType: "json"
            }).done(function (data) {
                $("#YTD2016RepresentantProfileSales").html("");
                
                var chart = AmCharts.makeChart("YTD2016RepresentantProfileSales", {
                    "type": "pie",
                    "theme": "light",
                    "titles": [{
                        "text": "2016 - Vendas Por Perfil de Representante",
                        "size": 15
                    }],
                    "dataProvider": data,
                    "valueField": "total",
                    "titleField": "profile",
                    "balloon": {
                        "fixedPosition": true
                    },
                    "export": {
                        "enabled": true
                    }
                });
            });
        }    
    };
    
    var RatioSalesByRepCompany2016 = {
        fill: function () {
            var req = $.ajax({
                url: "http://deltafaucetrep.com/report/sales/rep_company/ratio/2016",
                type: "get",
                dataType: "json"
            }).done(function (data) {
                $("#RatioSalesByRepCompany2016").html("");
                
                var chart = AmCharts.makeChart("RatioSalesByRepCompany2016", {
                    "type": "pie",
                    "theme": "light",
                    "titles": [{
                        "text": "2016 - Vendas por Representação",
                        "size": 15
                    }],
                    "dataProvider": data,
                    "valueField": "total",
                    "titleField": "rep_company",
                    "balloon": {
                        "fixedPosition": true
                    },
                    "export": {
                        "enabled": true
                    }
                });
            });
        }
    }
    
    var RatioSalesByRepCompany2015 = {
        fill: function () {
            var req = $.ajax({
                url: "http://deltafaucetrep.com/report/sales/rep_company/ratio/2015",
                type: "get",
                dataType: "json"
            }).done(function (data) {
                $("#RatioSalesByRepCompany2015").html("");
                
                var chart = AmCharts.makeChart("RatioSalesByRepCompany2015", {
                    "type": "pie",
                    "theme": "light",
                    "titles": [{
                        "text": "2015 - Vendas por Representação",
                        "size": 15
                    }],
                    "dataProvider": data,
                    "valueField": "total",
                    "titleField": "rep_company",
                    "balloon": {
                        "fixedPosition": true
                    },
                    "export": {
                        "enabled": true
                    }
                });
            });
        }
    }
    
    var SalesByRepCompany = {
        fill: function () {
            var req = $.ajax({
                url: "http://deltafaucetrep.com/report/sales/rep_company/sales",
                type: "get",
                dataType: "json"
            }).done(function (data) {
                $("#SalesByRepCompany").html("");
        
                AmCharts.makeChart("SalesByRepCompany", {
                    "type": "serial",
                    "categoryField": "date",
                    "columnWidth": 0,
                    "dataDateFormat": "YYYY-MM",
                    "autoMarginOffset": 20,
                    "depth3D": 1,
                    "marginRight": 40,
                    "marginTop": 0,
                    "fontSize": 12,
                    "pathToImages": "http://cdn.amcharts.com/lib/3/images/",
                    "theme": "light",
                    "categoryAxis": {
                        "parseDates": false
                    },
                    "chartCursor": {},
                    "chartScrollbar": {},
                    "trendLines": [],
                    "graphs": data.graphs,
                    "guides": [],
                    "valueAxes": [
                        {
                        "id": "ValueAxis-1",
                        "title": "Resultado"
                        }
                    ],
                    "legend": {
                        "useGraphSettings": true,
                        "valueWidth" : 100
                    },
                    "export": {
                      "enabled": true
                    },
                    "allLabels": [],
                    "balloon": {},
                    "titles": [
                        {
                            "id": "Title-1",
                            "text": "Vendas por Representação"
                        }
                    ],
                    "dataProvider": data.data
                });
            
            });
        }
    }
    
     var RatioSalesByDistribuitors2016 = {
        fill: function () {
            var req = $.ajax({
                url: "http://deltafaucetrep.com/report/sales/distribuitor/ratio/2016",
                type: "get",
                dataType: "json"
            }).done(function (data) {
                $("#RatioSalesByDistribuitors2016").html("");
                
                var chart = AmCharts.makeChart("RatioSalesByDistribuitors2016", {
                    "type": "pie",
                    "theme": "light",
                    "titles": [{
                        "text": "2016 - Pedidos Destinados por Distribuidor",
                        "size": 15
                    }],
                    "dataProvider": data,
                    "valueField": "total",
                    "titleField": "dist",
                    "balloon": {
                        "fixedPosition": true
                    },
                    "export": {
                        "enabled": true
                    }
                });
            });
        }
    }
    
    var RatioSalesByDistribuitors2015 = {
        fill: function () {
            var req = $.ajax({
                url: "http://deltafaucetrep.com/report/sales/distribuitor/ratio/2015",
                type: "get",
                dataType: "json"
            }).done(function (data) {
                $("#RatioSalesByDistribuitors2015").html("");
                
                var chart = AmCharts.makeChart("RatioSalesByDistribuitors2015", {
                    "type": "pie",
                    "theme": "light",
                    "titles": [{
                        "text": "2015 - Pedidos Destinados por Distribuidor",
                        "size": 15
                    }],
                    "dataProvider": data,
                    "valueField": "total",
                    "titleField": "dist",
                    "balloon": {
                        "fixedPosition": true
                    },
                    "export": {
                        "enabled": true
                    }
                });
            });
        }
    }
    
    var SalesByDistribuitors = {
        fill: function () {
            var req = $.ajax({
                url: "http://deltafaucetrep.com/report/sales/distribuitor/sales",
                type: "get",
                dataType: "json"
            }).done(function (data) {
                $("#SalesByDistribuitors").html("");
        
                AmCharts.makeChart("SalesByDistribuitors", {
                    "type": "serial",
                    "categoryField": "date",
                    "columnWidth": 0,
                    "dataDateFormat": "YYYY-MM",
                    "autoMarginOffset": 20,
                    "depth3D": 1,
                    "marginRight": 40,
                    "marginTop": 0,
                    "fontSize": 12,
                    "pathToImages": "http://cdn.amcharts.com/lib/3/images/",
                    "theme": "light",
                    "categoryAxis": {
                        "parseDates": false
                    },
                    "chartCursor": {},
                    "chartScrollbar": {},
                    "trendLines": [],
                    "graphs": data.graphs,
                    "guides": [],
                    "valueAxes": [
                        {
                        "id": "ValueAxis-1",
                        "title": "Resultado"
                        }
                    ],
                    "legend": {
                        "useGraphSettings": true,
                        "valueWidth" : 100
                    },
                    "export": {
                      "enabled": true
                    },
                    "allLabels": [],
                    "balloon": {},
                    "titles": [
                        {
                            "id": "Title-1",
                            "text": "Pedidos destinados por Distribuidor"
                        }
                    ],
                    "dataProvider": data.data
                });
            
            });
        }
    }
    
    var rawMonthlySalesPlot = {
        fill: function () {
            var req = $.ajax({
                url: "http://deltafaucetrep.com/report/sales/raw_monthly",
                type: "get",
                dataType: "json"
            }).done(function (data) {
                $("#rawMonthlySalesPlot").html("");
                
                AmCharts.makeChart("rawMonthlySalesPlot", {
                    "type": "serial",
                    "categoryField": "date",
                    "columnWidth": 0,
                    "dataDateFormat": "YYYY-MM",
                    "autoMarginOffset": 20,
                    "depth3D": 1,
                    "marginRight": 40,
                    "marginTop": 0,
                    "fontSize": 12,
                    "pathToImages": "http://cdn.amcharts.com/lib/3/images/",
                    "theme": "light",
                    "categoryAxis": {
                        "parseDates": false
                    },
                    "chartCursor": {},
                    "chartScrollbar": {},
                    "trendLines": [],
                    "graphs": [
                        {
                            "balloonText": "Valor vendido [[value]]",
                            "bullet": "round",
                            "bulletAlpha": 0.13,
                            "bulletBorderAlpha": 1,
                            "bulletBorderThickness": 1,
                            "bulletSize": 13,
                            "id": "AmGraph-2",
                            "labelOffset": 4,
                            "lineThickness": 3,
                            "title": "Valor Vendido",
                            "valueField": "total"
                        }
                    ],
                    "guides": [],
                    "valueAxes": [
                        {
                        "id": "ValueAxis-1",
                        "stackType" : "regular",
                        "title": "Resultado"
                        }
                    ],
                    "legend": {
                        "useGraphSettings": true,
                        "valueWidth" : 100
                    },
                    "export": {
                      "enabled": true
                    },
                    "allLabels": [],
                    "balloon": {},
                    "titles": [
                        {
                            "id": "Title-1",
                            "text": "Pedidos enviados aos distribuidores"
                        }
                    ],
                    "dataProvider": data
                });
            });
        }
    }
    
    var Pie2015UserTypeBudgets = {
        fill: function () {
            var req = $.ajax({
                url: "http://deltafaucetrep.com/report/budgets/per_user_type/2015",
                type: "get",
                dataType: "json"
            }).done(function (data) {
                $("#2015UserTypeBudgets").html("");
                
                var chart = AmCharts.makeChart("2015UserTypeBudgets", {
                    "type": "pie",
                    "theme": "light",
                    "titles": [{
                        "text": "2015 - Orçamentos Processados por Tipo de Usuário",
                        "size": 15
                    }],
                    "dataProvider": data,
                    "valueField": "value",
                    "titleField": "type",
                    "balloon": {
                        "fixedPosition": true
                    },
                    "export": {
                        "enabled": true
                    }
                });
            });
        }
    }
    
    var Pie2016UserTypeBudgets = {
        fill: function () {
            var req = $.ajax({
                url: "http://deltafaucetrep.com/report/budgets/per_user_type/2016",
                type: "get",
                dataType: "json"
            }).done(function (data) {
                $("#2016UserTypeBudgets").html("");
                
                var chart = AmCharts.makeChart("2016UserTypeBudgets", {
                    "type": "pie",
                    "theme": "light",
                    "titles": [{
                        "text": "2016 - Orçamentos Processados por Tipo de Usuário",
                        "size": 15
                    }],
                    "dataProvider": data,
                    "valueField": "value",
                    "titleField": "type",
                    "balloon": {
                        "fixedPosition": true
                    },
                    "export": {
                        "enabled": true
                    }
                });
            });
        }
    }
    
    var BudgetsAvgTicketByMonth = {
        fill: function () {
            $("#BudgetsAvgTicketByMonth").html("");
            
            var req = $.ajax({
                url: "http://deltafaucetrep.com/report/budgets/monthly/avg-ticket",
                type: "get",
                dataType: "json"
            }).done(function (data) {
                    AmCharts.makeChart("BudgetsAvgTicketByMonth", {
                        "type": "serial",
                        "categoryField": "date",
                        "columnWidth": 0,
                        "dataDateFormat": "YYYY-MM",
                        "autoMarginOffset": 20,
                        "depth3D": 1,
                        "marginRight": 40,
                        "marginTop": 0,
                        "fontSize": 12,
                        "pathToImages": "http://cdn.amcharts.com/lib/3/images/",
                        "theme": "light",
                        "categoryAxis": {
                            "parseDates": false
                        },
                        "chartCursor": {},
                        "chartScrollbar": {},
                        "trendLines": [],
                        "graphs": [
                            {
                                "balloonText": "Ticket Médio [[value]]",
                                "bullet": "round",
                                "bulletAlpha": 0.13,
                                "bulletBorderAlpha": 1,
                                "bulletBorderThickness": 1,
                                "bulletSize": 13,
                                "id": "AmGraph-2",
                                "labelOffset": 4,
                                "lineThickness": 3,
                                "title": "Ticket Médio",
                                "valueField": "value"
                            }
                        ],
                        "guides": [],
                        "valueAxes": [
                            {
                            "id": "ValueAxis-1",
                            "stackType" : "regular",
                            "title": "Resultado"
                            }
                        ],
                        "legend": {
                            "useGraphSettings": true,
                            "valueWidth" : 100
                        },
                        "export": {
                          "enabled": true
                        },
                        "allLabels": [],
                        "balloon": {},
                        "titles": [
                            {
                                "id": "Title-1",
                                "text": "Ticket Médio dos Orçamentos Processados"
                            }
                        ],
                        "dataProvider": data
                    });

            });
        }
    }
    
    var BudgetsCreatedByMonth = {
        fill: function () {
            $("#BudgetsCreatedByMonth").html("");
            
             var req = $.ajax({
                url: "http://deltafaucetrep.com/report/budgets/monthly",
                type: "get",
                dataType: "json"
            }).done(function (data) {
                
                AmCharts.makeChart("BudgetsCreatedByMonth", {
                    "type": "serial",
                    "categoryField": "date",
                    "columnWidth": 0,
                    "dataDateFormat": "YYYY-MM",
                    "autoMarginOffset": 20,
                    "depth3D": 1,
                    "marginRight": 40,
                    "marginTop": 0,
                    "fontSize": 12,
                    "pathToImages": "http://cdn.amcharts.com/lib/3/images/",
                    "theme": "light",
                    "categoryAxis": {
                        "parseDates": false
                    },
                    "chartCursor": {},
                    "chartScrollbar": {},
                    "trendLines": [],
                    "graphs": [
                        {
                            "balloonText": "Criados [[value]]",
                            "columnWidth": 0.24,
                            "cornerRadiusTop": 8,
                            "dashLength": 4,
                            "fillAlphas": 0.51,
                            "gapPeriod": 0,
                            "id": "AmGraph-1",
                            "lineAlpha": 0.44,
                            "title": "Orçamentos Criados",
                            "type": "column",
                            "valueField": "Criados"
                        },
                        {
                            "balloonText": "Processados [[value]]",
                            "bullet": "round",
                            "bulletAlpha": 0.13,
                            "bulletBorderAlpha": 1,
                            "bulletBorderThickness": 1,
                            "bulletSize": 13,
                            "id": "AmGraph-2",
                            "labelOffset": 4,
                            "lineThickness": 3,
                            "title": "Orçamentos Processados",
                            "valueField": "Processados"
                        }
                    ],
                    "guides": [],
                    "valueAxes": [
                        {
                        "id": "ValueAxis-1",
                        "stackType" : "regular",
                        "title": "Resultado"
                        }
                    ],
                    "legend": {
                        "useGraphSettings": true,
                        "valueWidth" : 100
                    },
                    "export": {
                      "enabled": true
                    },
                    "allLabels": [],
                    "balloon": {},
                    "titles": [
                        {
                            "id": "Title-1",
                            "text": "Orçamentos Criados x Processados"
                        }
                    ],
                    "dataProvider": data
                });
            });
        }
    }
    
    var YTD2016CustomerTypeSales = {
        fill: function() {
            var req = $.ajax({
                url: "http://deltafaucetrep.com/report/sales/customer_type/2016",
                type: "get",
                dataType: "json"
            }).done(function(data) {
                $("#YTD2016CustomerTypeSales").html("");
                
                var chart = AmCharts.makeChart("YTD2016CustomerTypeSales", {
                    "type": "pie",
                    "theme": "light",
                    "titles": [{
                        "text": "2016 - Valor Total Vendido por Tipo de Cliente",
                        "size": 15
                    }],
                    "dataProvider": data,
                    "valueField": "total",
                    "titleField": "type",
                    "balloon": {
                        "fixedPosition": true
                    },
                    "export": {
                        "enabled": true
                    }
                });


            });
        }
    }
   
    var YTD2015CustomerTypeSales = {
        fill: function() {
            var req = $.ajax({
                url: "http://deltafaucetrep.com/report/sales/customer_type/2015",
                type: "get",
                dataType: "json"
            }).done(function(data) {
                $("#YTD2015CustomerTypeSales").html("");
                
                var chart = AmCharts.makeChart("YTD2015CustomerTypeSales", {
                    "type": "pie",
                    "theme": "light",
                    "titles": [{
                        "text": "2015 - Valor Total Vendido por Tipo de Cliente",
                        "size": 15
                    }],
                    "dataProvider": data,
                    "valueField": "total",
                    "titleField": "type",
                    "balloon": {
                        "fixedPosition": true
                    },
                    "export": {
                        "enabled": true
                    }
                });


            });
        }
    }
    
    var SalesByMonthController = {
        fill: function () {
            var req = $.ajax({
                url: "http://deltafaucetrep.com/report/sales/monthly",
                type: "get",
                dataType: "json"
            }).done(function (data) {
                $("#totalSalesPlot").html("");
                
                AmCharts.makeChart("totalSalesPlot", {
                    "type": "serial",
                    "categoryField": "date",
                    "columnWidth": 0,
                    "dataDateFormat": "YYYY-MM",
                    "autoMarginOffset": 20,
                    "depth3D": 1,
                    "marginRight": 40,
                    "marginTop": 0,
                    "fontSize": 12,
                    "pathToImages": "http://cdn.amcharts.com/lib/3/images/",
                    "theme": "light",
                    "categoryAxis": {
                        "parseDates": false
                    },
                    "chartCursor": {},
                    "chartScrollbar": {},
                    "trendLines": [],
                    "graphs": [
                        {
                            "balloonText": "Comissionado [[value]]",
                            "columnWidth": 0.24,
                            "cornerRadiusTop": 8,
                            "dashLength": 4,
                            "fillAlphas": 0.51,
                            "gapPeriod": 0,
                            "id": "AmGraph-3",
                            "lineAlpha": 0.44,
                            "title": "Comissões Pagas",
                            "type": "column",
                            "valueField": "Comissionado"
                        },
                        {
                            "balloonText": "Faturado [[value]]",
                            "columnWidth": 0.24,
                            "cornerRadiusTop": 8,
                            "dashLength": 4,
                            "fillAlphas": 0.51,
                            "gapPeriod": 0,
                            "id": "AmGraph-1",
                            "lineAlpha": 0.44,
                            "title": "Pedidos Faturados",
                            "type": "column",
                            "valueField": "Faturados"
                        },
                        {
                            "balloonText": "Pago [[value]]",
                            "bullet": "round",
                            "bulletAlpha": 0.13,
                            "bulletBorderAlpha": 1,
                            "bulletBorderThickness": 1,
                            "bulletSize": 13,
                            "id": "AmGraph-2",
                            "labelOffset": 4,
                            "lineThickness": 3,
                            "title": "Pedidos Pagos",
                            "valueField": "Pagos"
                        }
                    ],
                    "guides": [],
                    "valueAxes": [
                        {
                        "id": "ValueAxis-1",
                        "stackType" : "regular",
                        "title": "Resultado"
                        }
                    ],
                    "legend": {
                        "useGraphSettings": true,
                        "valueWidth" : 100
                    },
                    "export": {
                      "enabled": true
                    },
                    "allLabels": [],
                    "balloon": {},
                    "titles": [
                        {
                            "id": "Title-1",
                            "text": "Pedidos Faturados x Pagos x Comissões Pagas"
                        }
                    ],
                    "dataProvider": data
                });
            });
        }
    };
    
    rawMonthlySalesPlot.fill();
    SalesByMonthController.fill();
    UserTypeSales2015.fill();
    UserTypeSales2016.fill();
    YTD2015CustomerTypeSales.fill();
    YTD2016CustomerTypeSales.fill();
    BudgetsCreatedByMonth.fill();
    BudgetsAvgTicketByMonth.fill();
    Pie2015UserTypeBudgets.fill();
    Pie2016UserTypeBudgets.fill();
    SalesByDistribuitors.fill();
    RatioSalesByDistribuitors2016.fill();
    RatioSalesByDistribuitors2015.fill();
    SalesByRepCompany.fill();
    RatioSalesByRepCompany2015.fill();
    RatioSalesByRepCompany2016.fill();
    YTD2015RepresentantProfileSales.fill();
    YTD2016RepresentantProfileSales.fill();
    
</script>

@endsection