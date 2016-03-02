@extends('layouts.master')

@section('content')

<link href="http://amcharts.com/lib/3/plugins/export/export.css" rel="stylesheet" type="text/css">

<div class="panel">
    <div class="panel-heading">
        <span class="panel-title"><strong>Relatório de Vendas</strong>, Sellout</span>
    </div>
    <div class="panel-body">
        <div class="row">
            <fieldset>
                <legend>Vendas</legend>
            
                <div class="col-sm-12">
                    <div id="totalSalesPlot" style="width: 100%; height: 500px; background-color: #FFFFFF;" ></div>
                </div>
                
                <div class="col-sm-6">
                    <div id="YTDSalesBySegmentPlot" style="width: 100%; height: 500px; background-color: #FFFFFF;" ></div>
                </div>
                
                <div class="col-sm-6">
                    <div id="YTD2014SalesBySegmentPlot" style="width: 100%; height: 500px; background-color: #FFFFFF;" ></div>
                </div>
            </fieldset>
        </div>
    
       <div class="row">
            <fieldset>
                <legend>Cliente</legend>
                
                <div class="col-sm-10">
                    <div id="salesByCustomers"  style="width: 100%; height: 500px; background-color: #FFFFFF;"></div>
                </div>
                
                <div class="col-sm-2">
                    <table class="table">
                        <caption>Legenda</caption>
                        <thead>
                            <tr>
                                <th>Cor</th>
                                <th>Classificação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user->getAllCustomerClassification() as $c)
                                <tr>
                                    <td><div style="width:25px;height:25px;background-color:{{$c->color}} !important"></div></td>
                                    <td>{{$c->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class=col-sm-6>
                    <div id="ShowroomTopSalesYTD">
                        <table class="table">
                            <caption><strong>Top 15 Showrooms & Retails - 2015 YTD</strong></caption>
                            <thead>
                                <tr>
                                    <th>Posição</th>
                                    <th>Showroom</th>
                                    <th>Valor Total</th>
                                    <th>Quantidade</th>
                                    <th>Ticket Médio</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach (collect($that->topYTDSelloutShowroomsSales())->take(15) as $key => $customer)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td><a style="cursor: hand;" target="_blank" href="http://deltafaucetrep.com/portfolio/detail/{{$customer->customer_id}}">{{$customer->name}}</a></td>
                                    <td>R$ {{number_format($customer->value, 2, ",", ".")}}</td>
                                    <td>{{$customer->volume}} unds.</td>
                                    <td>R$ {{number_format($customer->ticket, 2, ",", ".")}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>        
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div id="ShowroomTopSales2014YTD">
                        <table class="table">
                            <caption><strong>Top 15 Showrooms & Retails - 2014 YTD</strong></caption>
                            <thead>
                                <tr>
                                    <th>Posição</th>
                                    <th>Showroom</th>
                                    <th>Valor Total</th>
                                    <th>Quantidade</th>
                                    <th>Ticket Médio</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach (collect($that->top2014YTDSelloutShowroomsSales())->take(15) as $key => $customer)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td><a style="cursor: hand;" target="_blank" href="http://deltafaucetrep.com/portfolio/detail/{{$customer->customer_id}}">{{$customer->name}}</a></td>
                                    <td>R$ {{number_format($customer->value, 2, ",", ".")}}</td>
                                    <td>{{$customer->volume}} unds.</td>
                                    <td>R$ {{number_format($customer->ticket, 2, ",", ".")}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>        
                    </div>
                </div>
                
            </fieldset>
        </div>
    
        
        <div class="row">
            <fieldset>
                <legend>Distribuidor</legend>

            <div class="col-sm-12">
                <div id="distribuitorParticipationPlot" style="width: 100%; height: 500px; background-color: #FFFFFF;"></div>
            </div>
                
            <div class="col-sm-12">
                <div id="DistribuitorAvgTicketPlot" style="width: 100%; height: 500px; background-color: #FFFFFF;"></div>
            </div>
                
            <div class="col-sm-6">
                <div id="distribuitorParticipationYTDPlot" style="width: 100%; height: 500px; background-color: #FFFFFF;"></div>
            </div>
            <div class="col-sm-6">
                <div id="distribuitorParticipationAllPlot" style="width: 100%; height: 500px; background-color: #FFFFFF;"></div>
            </div>
            </fieldset>
        </div>

        <div class="row">
            <fieldset>
                <legend>Produto</legend>
            
                <div class="col-sm-12">
                    <center><strong>Vendas por Série</strong></center>
                    <div id="ProductSerieSalesPlot" style="width: 100%; height: 500px; background-color: #FFFFFF;"></div>
                </div>
                
                <div class="col-sm-6" style="margin-top:20px;">
                    <div id="ProductTop2015YTDSalesTable">
                        <table class="table">
                            <caption><strong>Top 10 Delta Função Vendidas - 2015 YTD</strong></caption>
                            <thead>
                                <tr>
                                    <th>Posição</th>
                                    <th>Função</th>
                                    <th>Valor Total</th>
                                    <th>Quantidade</th>
                                    <th>Ticket Médio</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach (collect($that->topYTDDeltaSelloutProductFunctionSales())->take(10) as $key => $function)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td><a style="cursor: hand;"  data-target="#serieByFunctionModal" data-toggle="modal" onclick="serieByFunction({{$function->product_function_id}}, 2015)">{{$function->function}}</a></td>
                                    <td>R$ {{number_format($function->value, 2, ",", ".")}}</td>
                                    <td>{{$function->volume}} unds.</td>
                                    <td>R$ {{number_format($function->ticket, 2, ",", ".")}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="col-sm-6" style="margin-top:20px;">
                    <div id="ProductTop2014YTDSalesTable">
                        <table class="table">
                            <caption><strong>Top 10 Delta Função Vendidas - 2014 YTD</strong></caption>
                            <thead>
                                <tr>
                                    <th>Posição</th>
                                    <th>Função</th>
                                    <th>Valor Total</th>
                                    <th>Quantidade</th>
                                    <th>Ticket Médio</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach (collect($that->top2014YTDDeltaSelloutProductFunctionSales())->take(10) as $key => $function)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td><a style="cursor: hand;" data-target="#serieByFunctionModal" data-toggle="modal"  onclick="serieByFunction({{$function->product_function_id}}, 2014)">{{$function->function}}</a></td>
                                    <td>R$ {{number_format($function->value, 2, ",", ".")}}</td>
                                    <td>{{$function->volume}} unds.</td>
                                    <td>R$ {{number_format($function->ticket, 2, ",", ".")}}</td>
                                </tr>  
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="col-sm-6" style="margin-top:20px;">
                    <div id="ProductTop2015YTDSalesTable">
                        <table class="table">
                            <caption><strong>Top 10 Brizo Função Vendidas - 2015 YTD</strong></caption>
                            <thead>
                                <tr>
                                    <th>Posição</th>
                                    <th>Função</th>
                                    <th>Valor Total</th>
                                    <th>Quantidade</th>
                                    <th>Ticket Médio</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach (collect($that->topYTDBrizoSelloutProductFunctionSales())->take(10) as $key => $function)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td><a style="cursor: hand;"  data-target="#serieByFunctionModal" data-toggle="modal" onclick="brizoSerieByFunction({{$function->product_function_id}}, 2015)">{{$function->function}}</a></td>
                                    <td>R$ {{number_format($function->value, 2, ",", ".")}}</td>
                                    <td>{{$function->volume}} unds.</td>
                                    <td>R$ {{number_format($function->ticket, 2, ",", ".")}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="col-sm-6" style="margin-top:20px;">
                    <div id="ProductTop2014YTDBrizoSalesTable">
                        <table class="table">
                            <caption><strong>Top 10 Brizo Função Vendidas - 2014 YTD</strong></caption>
                            <thead>
                                <tr>
                                    <th>Posição</th>
                                    <th>Função</th>
                                    <th>Valor Total</th>
                                    <th>Quantidade</th>
                                    <th>Ticket Médio</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach (collect($that->top2014YTDBrizoSelloutProductFunctionSales())->take(10) as $key => $function)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td><a style="cursor: hand;" data-target="#serieByFunctionModal" data-toggle="modal"  onclick="brizoSerieByFunction({{$function->product_function_id}}, 2014)">{{$function->function}}</a></td>
                                    <td>R$ {{number_format($function->value, 2, ",", ".")}}</td>
                                    <td>{{$function->volume}} unds.</td>
                                    <td>R$ {{number_format($function->ticket, 2, ",", ".")}}</td>
                                </tr>  
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="col-sm-6" style="margin-top:20px;">
                    <div id="ProductTop2014YTDBrizoSalesTable">
                        <table class="table">
                            <caption><strong>Top 10 Delta Vendas Showroom & Retail - 2015 YTD</strong></caption>
                            <thead>
                                <tr>
                                    <th>Posição</th>
                                    <th>Função</th>
                                    <th>Valor Total</th>
                                    <th>Quantidade</th>
                                    <th>Ticket Médio</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach (collect($that->topYTDDeltaSelloutProductShowroomSales())->take(10) as $key => $function)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td><a style="cursor: hand;" data-target="#serieByFunctionModal" data-toggle="modal"  onclick="deltaShowroomSerieByFunction({{$function->product_function_id}}, 2015)">{{$function->function}}</a></td>
                                    <td>R$ {{number_format($function->value, 2, ",", ".")}}</td>
                                    <td>{{$function->volume}} unds.</td>
                                    <td>R$ {{number_format($function->ticket, 2, ",", ".")}}</td>
                                </tr>  
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="col-sm-6" style="margin-top:20px;">
                    <div id="ProductTop2014YTDBrizoSalesTable">
                        <table class="table">
                            <caption><strong>Top 10 Delta Vendas Showroom & Retail - 2014 YTD</strong></caption>
                            <thead>
                                <tr>
                                    <th>Posição</th>
                                    <th>Função</th>
                                    <th>Valor Total</th>
                                    <th>Quantidade</th>
                                    <th>Ticket Médio</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach (collect($that->top2014YTDDeltaSelloutProductShowroomSales())->take(10) as $key => $function)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td><a style="cursor: hand;" data-target="#serieByFunctionModal" data-toggle="modal"  onclick="deltaShowroomSerieByFunction({{$function->product_function_id}}, 2014)">{{$function->function}}</a></td>
                                    <td>R$ {{number_format($function->value, 2, ",", ".")}}</td>
                                    <td>{{$function->volume}} unds.</td>
                                    <td>R$ {{number_format($function->ticket, 2, ",", ".")}}</td>
                                </tr>  
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                
            </fieldset>
        </div>
        
    </div>
</div>

<div id="serieByFunctionModal" class="modal fade">
    <div style="width:700px" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="serie_by_function">
            </div>
        </div>
    </div>
</div>

<div id="serieByFunctionSerieProductModal" class="modal fade">
    <div style="width:700px" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="product_serie_by_function">
            </div>
        </div>
    </div>
</div>

<div id="productDetailModal" class="modal fade">
    <div style="width:900px" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Detalhes do Produto</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="panel" id="product_detail_body">

                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>

@endsection

@section('end')

<script src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="http://www.amcharts.com/lib/3/serial.js"></script>
<script src="http://www.amcharts.com/lib/3/xy.js"></script>
<script src="http://www.amcharts.com/lib/3/pie.js"></script>
<script src="http://www.amcharts.com/lib/3/themes/light.js"></script>
<script src="http://www.amcharts.com/lib/3/amstock.js"></script>
<script src="http://amcharts.com/lib/3/plugins/export/export.js" type="text/javascript"></script>

<script type="text/javascript">

    var TotalSalesController = {       
        fill : function () {
            $.ajax({
                url: 'http://deltafaucetrep.com/report/sellout/all',
                type: "get",
                dataType: "json"
            }).done(function (data) {
            
                var chart = AmCharts.makeChart("totalSalesPlot", {
                    "type": "serial",
                    "theme": "light",
                    "marginRight": 20,
                    "autoMarginOffset": 20,
                    "dataDateFormat": "YYYY-MM-DD",
                    "titles": [{
                        "text": "Vendas Diárias",
                        "size": 15
                    }],
                    "valueAxes": [{
                        "id": "v1",
                        "axisAlpha": 0,
                        "position": "left"
                    }],
                    "balloon": {
                        "borderThickness": 1,
                        "shadowAlpha": 0
                    },
                    "graphs": [{
                        "id": "g1",
                        "bullet": "round",
                        "bulletBorderAlpha": 1,
                        "bulletColor": "#FFFFFF",
                        "bulletSize": 5,
                        "hideBulletsCount": 50,
                        "lineThickness": 2,
                        "type" : "smoothedLine",
                        "title": "red line",
                        "useLineColorForBulletBorder": true,
                        "valueField": "value",
                        "balloonText": "<div style='margin:5px; font-size:19px;'><span style='font-size:13px;'>[[category]]</span><br>[[value]]</div>"
                    }],
                    "chartScrollbar": {
                        "graph": "g1",
                        "oppositeAxis":false,
                        "offset":30,
                        "scrollbarHeight": 80,
                        "backgroundAlpha": 0,
                        "selectedBackgroundAlpha": 0.1,
                        "selectedBackgroundColor": "#888888",
                        "graphFillAlpha": 0,
                        "graphLineAlpha": 0.5,
                        "selectedGraphFillAlpha": 0,
                        "selectedGraphLineAlpha": 1,
                        "autoGridCount":true,
                        "color":"#AAAAAA"
                    },
                    "chartCursor": {
                        "pan": true,
                        "valueLineEnabled": true,
                        "valueLineBalloonEnabled": true,
                        "cursorAlpha":0,
                        "valueLineAlpha":0.2
                    },
                    "categoryField": "date",
                    "categoryAxis": {
                        "parseDates": true,
                        "dashLength": 1,
                        "minorGridEnabled": true
                    },
                    "export": {
                      "enabled": true
                    },
                    "dataProvider": data
                });

                chart.addListener("rendered", zoomChart);

                zoomChart();

                function zoomChart() {
                    chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
                }
            });
        }
    }
    
    var DistribuitorParticipationController = {
        fill: function () {
            $.ajax({
                url: "http://deltafaucetrep.com/report/sellout/distribuitor/participation",
                type: "get",
                dataType: "json"
            }).done(function (data) {
            
                var chart = AmCharts.makeChart("distribuitorParticipationPlot", {
                    "type": "serial",
                    "theme": "light",
                    "marginRight": 20,
                    "autoMarginOffset": 20,
                    "dataDateFormat": "YYYY-MM",
                    "titles": [{
                        "text": "Vendas Mensais por Distribuidor",
                        "size": 15
                    }],
                    "legend": {
                        "horizontalGap": 10,
                        "maxColumns": 1,
                        "position": "right",
                        "useGraphSettings": true,
                        "markerSize": 10
                    },
                    "valueAxes": [{
                        "id": "v1",
                        "axisAlpha": 0,
                        "position": "left"
                    }],
                    "balloon": {
                        "borderThickness": 1,
                        "shadowAlpha": 0
                    },
                    "graphs": [{
                        "id": "g1",
                        "bullet": "round",
                        "bulletBorderAlpha": 1,
                        "bulletColor": "#FFFFFF",
                        "bulletSize": 5,
                        "hideBulletsCount": 50,
                        "lineThickness": 2,
                        "title": "Apoio HBB",
                        "useLineColorForBulletBorder": true,
                        "valueField": "Apoio HBB",
                        "balloonText": "<div style='font-size:19px;'><span style='font-size:13px;'>[[title]]</span><br>[[value]]</div>"
                    },{
                        "id": "g2",
                        "bullet": "round",
                        "bulletBorderAlpha": 1,
                        "bulletColor": "#FFFFFF",
                        "bulletSize": 5,
                        "hideBulletsCount": 50,
                        "lineThickness": 2,
                        "title": "Mercury",
                        "useLineColorForBulletBorder": true,
                        "valueField": "Mercury",
                        "balloonText": "<div style='font-size:19px;'><span style='font-size:13px;'>[[title]]</span><br>[[value]]</div>"
                    },{
                        "id": "g3",
                        "bullet": "round",
                        "bulletBorderAlpha": 1,
                        "bulletColor": "#FFFFFF",
                        "bulletSize": 5,
                        "hideBulletsCount": 50,
                        "lineThickness": 2,
                        "title": "Nacional",
                        "useLineColorForBulletBorder": true,
                        "valueField": "Nacional",
                        "balloonText": "<div style='font-size:19px;'><span style='font-size:13px;'>[[title]]</span><br>[[value]]</div>"
                    },{
                        "id": "g4",
                        "bullet": "round",
                        "bulletBorderAlpha": 1,
                        "bulletColor": "#FFFFFF",
                        "bulletSize": 5,
                        "hideBulletsCount": 50,
                        "lineThickness": 2,
                        "title": "Navas",
                        "useLineColorForBulletBorder": true,
                        "valueField": "Navas",
                        "balloonText": "<div style='font-size:19px;'><span style='font-size:13px;'>[[title]]</span><br>[[value]]</div>"
                    }],
                    "chartScrollbar": {
                        "graph": "g1",
                        "oppositeAxis":false,
                        "offset":30,
                        "scrollbarHeight": 80,
                        "backgroundAlpha": 0,
                        "selectedBackgroundAlpha": 0.1,
                        "selectedBackgroundColor": "#888888",
                        "graphFillAlpha": 0,
                        "graphLineAlpha": 0.5,
                        "selectedGraphFillAlpha": 0,
                        "selectedGraphLineAlpha": 1,
                        "autoGridCount":true,
                        "color":"#AAAAAA"
                    },
                    "chartCursor": {
                        "pan": true,
                        "valueLineEnabled": true,
                        "valueLineBalloonEnabled": true,
                        "cursorAlpha":0,
                        "valueLineAlpha":0.2
                    },
                    "categoryField": "date",
                    "categoryAxis": {
                        "parseDates": true,
                        "dashLength": 1,
                        "minorGridEnabled": true
                    },
                    "export": {
                        "enabled": true
                    },
                    "dataProvider": data
                });

                chart.addListener("rendered", zoomChart);

                zoomChart();

                function zoomChart() {
                    chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
                }
            
            });
        }
    }
    
    var DistribuitorParticipationYTDController = {
        fill: function () {
            $.ajax({
                url: "http://deltafaucetrep.com/report/sellout/distribuitor/participation/ytd",
                dataType: "json",
                type: "get"
            }).done(function (data) {
                var chart = AmCharts.makeChart("distribuitorParticipationYTDPlot", {
                  "type": "pie",
                  "theme": "light",
                  "titles": [{
                        "text": "Participação Distribuidor YTD",
                        "size": 15
                   }],
                  "dataProvider": data,
                  "valueField": "value",
                  "titleField": "dist",
                   "balloon":{
                   "fixedPosition":true
                  },
                  "export": {
                    "enabled": true
                  }
                });
            });
        }
    }
    
    var DistribuitorParticipationAllController = {
        fill: function () {
            $.ajax({
                url: "http://deltafaucetrep.com/report/sellout/distribuitor/participation/all",
                dataType: "json",
                type: "get"
            }).done(function (data) {
                var chart = AmCharts.makeChart("distribuitorParticipationAllPlot", {
                  "type": "pie",
                  "theme": "light",
                  "titles": [{
                        "text": "Participação Distribuidor Desde 2011",
                        "size": 15
                   }],
                  "dataProvider": data,
                  "valueField": "value",
                  "titleField": "dist",
                   "balloon":{
                   "fixedPosition":true
                  },
                  "export": {
                    "enabled": true
                  }
                });
            });
        }
    }
    
    var YTDSalesBySegment = {
        fill: function() {
            $.ajax({
                url: "http://deltafaucetrep.com/report/sellout/segment/ytd?year=2015",
                dataType: "json",
                type: "GET"
            }).done(function(data) {
                var chart = AmCharts.makeChart("YTDSalesBySegmentPlot", {
                    "type": "pie",
                    "theme": "light",
                    "titles": [{
                        "text": "Vendas por Segmento YTD 2015",
                        "size": 15
                    }],
                    "dataProvider": data,
                    "valueField": "value",
                    "titleField": "segment",
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
    
    var YTD2014SalesBySegment = {
        fill: function() {
            $.ajax({
                url: "http://deltafaucetrep.com/report/sellout/segment/ytd?year=2014",
                dataType: "json",
                type: "GET"
            }).done(function(data) {
                var chart = AmCharts.makeChart("YTD2014SalesBySegmentPlot", {
                    "type": "pie",
                    "theme": "light",
                    "titles": [{
                        "text": "Vendas por Segmento YTD 2014",
                        "size": 15
                    }],
                    "dataProvider": data,
                    "valueField": "value",
                    "titleField": "segment",
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
    
    var ProductSerieSalesPlot = {
        fill: function() {
            $.ajax({
                url: "http://deltafaucetrep.com/report/sellout/product/serie",
                dataType: "json",
                type: "get"
            }).done(function (data) {
                var chart = AmCharts.makeChart("ProductSerieSalesPlot", {
                    type: "stock",
                    "theme": "light",
                    dataSets: data,
                    panels: [{
                            showCategoryAxis: false,
                            title: "Valor das Vendas",
                            percentHeight: 70,
                            stockGraphs: [{
                                id: "g1",

                                valueField: "value",
                                comparable: true,
                                compareField: "value",
                                balloonText: "[[title]]:<b>[[value]]</b>",
                                compareGraphBalloonText: "[[title]]:<b>[[value]]</b>"
                            }],
                            stockLegend: {
                                periodValueTextComparing: "[[percents.value.close]]%",
                                periodValueTextRegular: "[[value.close]]"
                            }
                        },
                        {
                            title: "Volume de Vendas",
                            percentHeight: 30,
                            stockGraphs: [{
                                valueField: "volume",
                                type: "column",
                                showBalloon: false,
                                fillAlphas: 1
                            }],
                            stockLegend: {
                                periodValueTextRegular: "[[value.close]]"
                            }
                        }
                    ],
                    chartScrollbarSettings: {
                        graph: "g1"
                    },
                    chartCursorSettings: {
                        valueBalloonsEnabled: true,
                        fullWidth: true,
                        cursorAlpha: 0.1,
                        valueLineBalloonEnabled: true,
                        valueLineEnabled: true,
                        valueLineAlpha: 0.5
                    },
                    periodSelector: {
                        position: "left",
                        periods: [{
                            period: "MM",
                            count: 1,
                            label: "1 month"
                        }, {
                            period: "YYYY",
                            count: 1,
                            label: "1 year"
                        }, {
                            period: "YTD",
                            label: "YTD"
                        }, {
                            period: "MAX",
                            selected: true,
                            label: "MAX"
                        }]
                    },
                    dataSetSelector: {
                        position: "left"
                    },
                    "export": {
                        "enabled": true
                    }
                });
            });
        }
    }
    
    var DistribuitorAvgTicketPlot = {
        fill: function () {
            $.ajax({
                url: "http://deltafaucetrep.com/report/sellout/distribuitor/avg_ticket",
                dataType: "json",
                type: "get"
            }).done(function (data) {
                 var chart = AmCharts.makeChart("DistribuitorAvgTicketPlot", {
                    "type": "serial",
                    "theme": "light",
                    "marginRight": 20,
                    "autoMarginOffset": 20,
                    "dataDateFormat": "YYYY",
                    "titles": [{
                        "text": "Ticket Médio por Distribuidor",
                        "size": 15
                    }],
                    "legend": {
                        "horizontalGap": 10,
                        "maxColumns": 1,
                        "position": "right",
                        "useGraphSettings": true,
                        "markerSize": 10
                    },
                    "valueAxes": [{
                        "id": "v1",
                        "axisAlpha": 0,
                        "position": "left"
                    }],
                    "balloon": {
                        "borderThickness": 1,
                        "shadowAlpha": 0
                    },
                    "graphs": [{
                        "id": "g1",
                        "bullet": "round",
                        "bulletBorderAlpha": 1,
                        "bulletColor": "#FFFFFF",
                        "bulletSize": 5,
                        "hideBulletsCount": 50,
                        "lineThickness": 2,
                        "title": "Apoio HBB",
                        "useLineColorForBulletBorder": true,
                        "valueField": "Apoio HBB",
                        "balloonText": "<div style='font-size:19px;'><span style='font-size:13px;'>[[title]]</span><br>[[value]]</div>"
                    },{
                        "id": "g2",
                        "bullet": "round",
                        "bulletBorderAlpha": 1,
                        "bulletColor": "#FFFFFF",
                        "bulletSize": 5,
                        "hideBulletsCount": 50,
                        "lineThickness": 2,
                        "title": "Mercury",
                        "useLineColorForBulletBorder": true,
                        "valueField": "Mercury",
                        "balloonText": "<div style='font-size:19px;'><span style='font-size:13px;'>[[title]]</span><br>[[value]]</div>"
                    },{
                        "id": "g3",
                        "bullet": "round",
                        "bulletBorderAlpha": 1,
                        "bulletColor": "#FFFFFF",
                        "bulletSize": 5,
                        "hideBulletsCount": 50,
                        "lineThickness": 2,
                        "title": "Nacional",
                        "useLineColorForBulletBorder": true,
                        "valueField": "Nacional",
                        "balloonText": "<div style='font-size:19px;'><span style='font-size:13px;'>[[title]]</span><br>[[value]]</div>"
                    },{
                        "id": "g4",
                        "bullet": "round",
                        "bulletBorderAlpha": 1,
                        "bulletColor": "#FFFFFF",
                        "bulletSize": 5,
                        "hideBulletsCount": 50,
                        "lineThickness": 2,
                        "title": "Navas",
                        "useLineColorForBulletBorder": true,
                        "valueField": "Navas",
                        "balloonText": "<div style='font-size:19px;'><span style='font-size:13px;'>[[title]]</span><br>[[value]]</div>"
                    }],
                    "chartCursor": {
                        "pan": true,
                        "valueLineEnabled": true,
                        "valueLineBalloonEnabled": true,
                        "cursorAlpha":0,
                        "valueLineAlpha":0.2
                    },
                    "categoryField": "date",
                    "categoryAxis": {
                        "parseDates": false,
                        "dashLength": 1,
                        "minorGridEnabled": true
                    },
                    "export": {
                        "enabled": true
                    },
                    "dataProvider": data
                });

                chart.addListener("rendered", zoomChart);

                zoomChart();

                function zoomChart() {
                    chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
                }        
            });
        }
    }
    
    var salesByCustomers = {
        fill: function () {
            $.ajax({
                url: "http://deltafaucetrep.com/report/sellout/customer/sales",
                type: "get",
                dataType: "json"
            }).done(function (data) {
                var chart = AmCharts.makeChart("salesByCustomers", {
                    "type": "xy",
                    "theme": "light",
                    "balloon": {
                        "fixedPosition": true,
                    },
                    "dataProvider": data,
                    "valueAxes": [{
                        "title" : "Vendas",
                        "position": "bottom",
                        "axisAlpha": 0
                    }, {
                        "title" : "Ticket Médio",
                        "minMaxMultiplier": 1.2,
                        "axisAlpha": 0,
                        "position": "left"
                    }],
                    "graphs": [{
                        "balloonText": "<b>[[customer]]</b> <br/> Total Vendido:<b>[[x]]</b><br/> Ticket Médio:<b>[[y]]</b><br>Volume Vendido:<b>[[value]]</b>",
                        "bullet": "circle",
                        "bulletBorderAlpha": 0.2,
                        "bulletAlpha": 0.8,
                        "lineAlpha": 0,
                        "fillAlphas": 0,
                        "colorField" : "color",
                        "valueField": "volume",
                        "xField": "value",
                        "yField": "ticket",
                        "maxBulletSize": 100
                    }],
                    "titles": [{
                        "id": "Title-1",
                        "text": "Vendas Acumuladas por Cliente"
                    }],
                    "chartCursor": {},
                    "marginLeft": 46,
                    "marginBottom": 35,
                    "export": {
                        "enabled": true
                    }
                });
            });
        }
    }
    
    function serieByFunction(fun, year) {
        var e = $("#serie_by_function").html("");
        
        $.ajax({
            url: "http://deltafaucetrep.com/report/sellout/product/delta/function/"+fun+"/serie?year="+year,
            dataType: "json",
            type: "get"
        }).done(function (data) {
            var table = document.createElement("table");
            
            table.className = "table table-striped";
            
            var tbody = document.createElement("tbody");
            var thead = document.createElement("thead");
            
            e.append(table);
            
            var tr = document.createElement("tr");
            
            var th1 = document.createElement("th");
            
            $(th1).html("Posição");
            
            var th2 = document.createElement("th");
            
            $(th2).html("Série");
            
            var th3 = document.createElement("th");
            
            $(th3).html("Valor Total");
            
            var th4 = document.createElement("th");
            
            $(th4).html("Quantidade");
            
            var th5 = document.createElement("th");
            
            $(th5).html("Ticket Médio");
            
            $(tr).append(th1);
            $(tr).append(th2);
            $(tr).append(th3);
            $(tr).append(th4);
            $(tr).append(th5);
            
            $(table).append(thead);
            $(table).append(tbody);
            
            $(thead).append(tr);
            
            $(data).each(function (key, value) {
                var tr = document.createElement("tr");
                
                var td1 = document.createElement("td");
                
                $(td1).html(key + 1);
                
                var td2 = document.createElement("td");
                
                var a = document.createElement("a");
                
                $(a).attr("onclick", "seriesProductByFunction("+value["product_function_id"]+","+value["product_serie_id"]+","+year+")");
                $(a).attr("data-target", "#serieByFunctionSerieProductModal");
                $(a).attr("data-toggle", "modal")
                $(a).html(value["serie"]);
                
                $(td2).append(a);
                
                var td3 = document.createElement("td");
                
                $(td3).html("R$ " + value["value"]);
                
                var td4 = document.createElement("td");
                
                $(td4).html(value["volume"]);
                
                var td5 = document.createElement("td");
                
                $(td5).html("R$ " + value["ticket"]);
                
                $(tr).append(td1);
                $(tr).append(td2);
                $(tr).append(td3);
                $(tr).append(td4);
                $(tr).append(td5);
                
                $(tbody).append(tr);
            });
            
        });
    }

    function seriesProductByFunction(fun, serie, year) {
        var e = $("#product_serie_by_function").html("");
        
        $.ajax({
            url: "http://deltafaucetrep.com/report/sellout/product/delta/function/"+fun+"/serie/"+serie+"/product?year="+year,
            dataType: "json",
            type: "get"
        }).done(function (data) {
            var table = document.createElement("table");
            
            table.className = "table table-striped";
            
            var tbody = document.createElement("tbody");
            var thead = document.createElement("thead");
            
            e.append(table);
            
            var tr = document.createElement("tr");
            
            var th1 = document.createElement("th");
            
            $(th1).html("Posição");
            
            var th2 = document.createElement("th");
            
            $(th2).html("Produto");
            
            var th3 = document.createElement("th");
            
            $(th3).html("Valor Total");
            
            var th4 = document.createElement("th");
            
            $(th4).html("Quantidade");
            
            var th5 = document.createElement("th");
            
            $(th5).html("Ticket Médio");
            
            $(tr).append(th1);
            $(tr).append(th2);
            $(tr).append(th3);
            $(tr).append(th4);
            $(tr).append(th5);
            
            $(table).append(thead);
            $(table).append(tbody);
            
            $(thead).append(tr);
            
             $(data).each(function (key, value) {
                var tr = document.createElement("tr");
                
                var td1 = document.createElement("td");
                
                $(td1).html(key + 1);
                
                var td2 = document.createElement("td");
                
                var a = document.createElement("a");
                
                $(a).attr("onclick", "productDetail("+value["product_id"]+")");
                $(a).attr("data-target", "#productDetailModal");
                $(a).attr("data-toggle", "modal")
                $(a).html(value["sku"]);
                
                $(td2).append(a);
                
                var td3 = document.createElement("td");
                
                $(td3).html("R$ " + value["value"]);
                
                var td4 = document.createElement("td");
                
                $(td4).html(value["volume"]);
                
                var td5 = document.createElement("td");
                
                $(td5).html("R$ " + value["ticket"]);
                
                $(tr).append(td1);
                $(tr).append(td2);
                $(tr).append(td3);
                $(tr).append(td4);
                $(tr).append(td5);
                
                $(tbody).append(tr);
            });
        });
    }
    
    
    function brizoSerieByFunction(fun, year) {
        var e = $("#serie_by_function").html("");
        
        $.ajax({
            url: "http://deltafaucetrep.com/report/sellout/product/brizo/function/"+fun+"/serie?year="+year,
            dataType: "json",
            type: "get"
        }).done(function (data) {
            var table = document.createElement("table");
            
            table.className = "table table-striped";
            
            var tbody = document.createElement("tbody");
            var thead = document.createElement("thead");
            
            e.append(table);
            
            var tr = document.createElement("tr");
            
            var th1 = document.createElement("th");
            
            $(th1).html("Posição");
            
            var th2 = document.createElement("th");
            
            $(th2).html("Série");
            
            var th3 = document.createElement("th");
            
            $(th3).html("Valor Total");
            
            var th4 = document.createElement("th");
            
            $(th4).html("Quantidade");
            
            var th5 = document.createElement("th");
            
            $(th5).html("Ticket Médio");
            
            $(tr).append(th1);
            $(tr).append(th2);
            $(tr).append(th3);
            $(tr).append(th4);
            $(tr).append(th5);
            
            $(table).append(thead);
            $(table).append(tbody);
            
            $(thead).append(tr);
            
            $(data).each(function (key, value) {
                var tr = document.createElement("tr");
                
                var td1 = document.createElement("td");
                
                $(td1).html(key + 1);
                
                var td2 = document.createElement("td");
                
                var a = document.createElement("a");
                
                $(a).attr("onclick", "brizoSeriesProductByFunction("+value["product_function_id"]+","+value["product_serie_id"]+","+year+")");
                $(a).attr("data-target", "#serieByFunctionSerieProductModal");
                $(a).attr("data-toggle", "modal")
                $(a).html(value["serie"]);
                
                $(td2).append(a);
                
                var td3 = document.createElement("td");
                
                $(td3).html("R$ " + value["value"]);
                
                var td4 = document.createElement("td");
                
                $(td4).html(value["volume"]);
                
                var td5 = document.createElement("td");
                
                $(td5).html("R$ " + value["ticket"]);
                
                $(tr).append(td1);
                $(tr).append(td2);
                $(tr).append(td3);
                $(tr).append(td4);
                $(tr).append(td5);
                
                $(tbody).append(tr);
            });
            
        });
    }

    function brizoSeriesProductByFunction(fun, serie, year) {
        var e = $("#product_serie_by_function").html("");
        
        $.ajax({
            url: "http://deltafaucetrep.com/report/sellout/product/brizo/function/"+fun+"/serie/"+serie+"/product?year="+year,
            dataType: "json",
            type: "get"
        }).done(function (data) {
            var table = document.createElement("table");
            
            table.className = "table table-striped";
            
            var tbody = document.createElement("tbody");
            var thead = document.createElement("thead");
            
            e.append(table);
            
            var tr = document.createElement("tr");
            
            var th1 = document.createElement("th");
            
            $(th1).html("Posição");
            
            var th2 = document.createElement("th");
            
            $(th2).html("Produto");
            
            var th3 = document.createElement("th");
            
            $(th3).html("Valor Total");
            
            var th4 = document.createElement("th");
            
            $(th4).html("Quantidade");
            
            var th5 = document.createElement("th");
            
            $(th5).html("Ticket Médio");
            
            $(tr).append(th1);
            $(tr).append(th2);
            $(tr).append(th3);
            $(tr).append(th4);
            $(tr).append(th5);
            
            $(table).append(thead);
            $(table).append(tbody);
            
            $(thead).append(tr);
            
             $(data).each(function (key, value) {
                var tr = document.createElement("tr");
                
                var td1 = document.createElement("td");
                
                $(td1).html(key + 1);
                
                var td2 = document.createElement("td");
                
                var a = document.createElement("a");
                
                $(a).attr("onclick", "productDetail("+value["product_id"]+")");
                $(a).attr("data-target", "#productDetailModal");
                $(a).attr("data-toggle", "modal")
                $(a).html(value["sku"]);
                
                $(td2).append(a);
                
                var td3 = document.createElement("td");
                
                $(td3).html("R$ " + value["value"]);
                
                var td4 = document.createElement("td");
                
                $(td4).html(value["volume"]);
                
                var td5 = document.createElement("td");
                
                $(td5).html("R$ " + value["ticket"]);
                
                $(tr).append(td1);
                $(tr).append(td2);
                $(tr).append(td3);
                $(tr).append(td4);
                $(tr).append(td5);
                
                $(tbody).append(tr);
            });
        });
    }
    
    function deltaShowroomSerieByFunction(fun, year) {
        var e = $("#serie_by_function").html("");
        
        $.ajax({
            url: "http://deltafaucetrep.com/report/sellout/product/delta/showroom/function/"+fun+"/serie?year="+year,
            dataType: "json",
            type: "get"
        }).done(function (data) {
            var table = document.createElement("table");
            
            table.className = "table table-striped";
            
            var tbody = document.createElement("tbody");
            var thead = document.createElement("thead");
            
            e.append(table);
            
            var tr = document.createElement("tr");
            
            var th1 = document.createElement("th");
            
            $(th1).html("Posição");
            
            var th2 = document.createElement("th");
            
            $(th2).html("Série");
            
            var th3 = document.createElement("th");
            
            $(th3).html("Valor Total");
            
            var th4 = document.createElement("th");
            
            $(th4).html("Quantidade");
            
            var th5 = document.createElement("th");
            
            $(th5).html("Ticket Médio");
            
            $(tr).append(th1);
            $(tr).append(th2);
            $(tr).append(th3);
            $(tr).append(th4);
            $(tr).append(th5);
            
            $(table).append(thead);
            $(table).append(tbody);
            
            $(thead).append(tr);
            
            $(data).each(function (key, value) {
                var tr = document.createElement("tr");
                
                var td1 = document.createElement("td");
                
                $(td1).html(key + 1);
                
                var td2 = document.createElement("td");
                
                var a = document.createElement("a");
                
                $(a).attr("onclick", "seriesShowroomProductByFunction("+value["product_function_id"]+","+value["product_serie_id"]+","+year+")");
                $(a).attr("data-target", "#serieByFunctionSerieProductModal");
                $(a).attr("data-toggle", "modal")
                $(a).html(value["serie"]);
                
                $(td2).append(a);
                
                var td3 = document.createElement("td");
                
                $(td3).html("R$ " + value["value"]);
                
                var td4 = document.createElement("td");
                
                $(td4).html(value["volume"]);
                
                var td5 = document.createElement("td");
                
                $(td5).html("R$ " + value["ticket"]);
                
                $(tr).append(td1);
                $(tr).append(td2);
                $(tr).append(td3);
                $(tr).append(td4);
                $(tr).append(td5);
                
                $(tbody).append(tr);
            });
            
        });    
    }
    
    function seriesShowroomProductByFunction(fun, serie, year) {
        var e = $("#product_serie_by_function").html("");
        
        $.ajax({
            url: "http://deltafaucetrep.com/report/sellout/product/delta/showroom/function/"+fun+"/serie/"+serie+"/product?year="+year,
            dataType: "json",
            type: "get"
        }).done(function (data) {
            var table = document.createElement("table");
            
            table.className = "table table-striped";
            
            var tbody = document.createElement("tbody");
            var thead = document.createElement("thead");
            
            e.append(table);
            
            var tr = document.createElement("tr");
            
            var th1 = document.createElement("th");
            
            $(th1).html("Posição");
            
            var th2 = document.createElement("th");
            
            $(th2).html("Produto");
            
            var th3 = document.createElement("th");
            
            $(th3).html("Valor Total");
            
            var th4 = document.createElement("th");
            
            $(th4).html("Quantidade");
            
            var th5 = document.createElement("th");
            
            $(th5).html("Ticket Médio");
            
            $(tr).append(th1);
            $(tr).append(th2);
            $(tr).append(th3);
            $(tr).append(th4);
            $(tr).append(th5);
            
            $(table).append(thead);
            $(table).append(tbody);
            
            $(thead).append(tr);
            
             $(data).each(function (key, value) {
                var tr = document.createElement("tr");
                
                var td1 = document.createElement("td");
                
                $(td1).html(key + 1);
                
                var td2 = document.createElement("td");
                
                var a = document.createElement("a");
                
                $(a).attr("onclick", "productDetail("+value["product_id"]+")");
                $(a).attr("data-target", "#productDetailModal");
                $(a).attr("data-toggle", "modal")
                $(a).html(value["sku"]);
                
                $(td2).append(a);
                
                var td3 = document.createElement("td");
                
                $(td3).html("R$ " + value["value"]);
                
                var td4 = document.createElement("td");
                
                $(td4).html(value["volume"]);
                
                var td5 = document.createElement("td");
                
                $(td5).html("R$ " + value["ticket"]);
                
                $(tr).append(td1);
                $(tr).append(td2);
                $(tr).append(td3);
                $(tr).append(td4);
                $(tr).append(td5);
                
                $(tbody).append(tr);
            });
        });
    }
    
    function productDetail(id) {
        var response = $.ajax({
            url: "http://deltafaucetrep.com/product/detail/" + id,
            type: 'GET',
            dataType: 'html'
        });

        response.done(function(data) {
            $("#product_detail_body").html(data);
        });
    }
    
    TotalSalesController.fill();
    DistribuitorParticipationController.fill();
    DistribuitorAvgTicketPlot.fill();
    DistribuitorParticipationYTDController.fill();
    DistribuitorParticipationAllController.fill();
    YTDSalesBySegment.fill();
    ProductSerieSalesPlot.fill();
    YTD2014SalesBySegment.fill();
    salesByCustomers.fill();
    
    
</script>

@endsection