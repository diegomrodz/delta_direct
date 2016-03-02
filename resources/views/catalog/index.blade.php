<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Delta Direct - Catálogo de Produtos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <!-- Open Sans font from Google CDN -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&amp;subset=latin" rel="stylesheet" type="text/css">

    <!-- Pixel Admin's stylesheets -->
    <link href="http://static.deltafaucetrep.com/assets/stylesheets/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="http://static.deltafaucetrep.com/assets/stylesheets/pixel-admin.min.css" rel="stylesheet" type="text/css">
    <link href="http://static.deltafaucetrep.com/assets/stylesheets/widgets.min.css" rel="stylesheet" type="text/css">
    <link href="http://static.deltafaucetrep.com/assets/stylesheets/pages.min.css" rel="stylesheet" type="text/css">
    <link href="http://static.deltafaucetrep.com/assets/stylesheets/rtl.min.css" rel="stylesheet" type="text/css">
    <link href="http://static.deltafaucetrep.com/assets/stylesheets/themes.min.css" rel="stylesheet" type="text/css">


    <link href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
		<script src="assets/javascripts/ie.min.js"></script>
	<![endif]-->

    <link href="http://static.deltafaucetrep.com/assets/stylesheets/dataTables.responsive.css" rel="stylesheet" type="text/css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="http://static.deltafaucetrep.com/assets/javascripts/pixel-admin.min.js"></script>
    <script src="http://static.deltafaucetrep.com/assets/javascripts/jquery.dataTables.min.js"></script>
    <script src="http://static.deltafaucetrep.com/assets/javascripts/dataTables0.responsive.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.6/jquery.slimscroll.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/a5734b29083/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    
    <style type="text/css">
        @media print {
            .no-print,
            .no-print * {
                display: none !important;
            }
            
              a[href]:after {
                content: none !important;
              }
        }
        
    </style>
</head>
    
<body class="theme-dust main-menu-animated main-navbar-fixed main-menu-fixed animate-mm-sm animate-mm-md animate-mm-lg" style="background-color: white;">

    <script type="text/javascript">
        var init = [];
    </script>

        <div id="loadingModal"  data-backdrop="static" data-keyboard="false" class="modal modal-alert modal-info fade" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <i id="loadingSpinner" class="fa fa-spinner fa-pulse"></i>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <span>Carregado Guia de Especificação Online da Delta<span id="loadingSight"></span></span>
                        </div>
                        <br><br>
                        <div class="row">
                            <span>O tempo de espera é proporcional a velocidade de sua conexão. Caso esteja demorando mais do que 5 minutos
                            por favor entre em contato com a Delta.</span>
                        </div>
                        <br><br>
                    </div>
                </div>
                <!-- / .modal-content -->
            </div>
            <!-- / .modal-dialog -->
        </div>    
    
    <script type="text/javascript">
    
        $("#loadingModal").modal("toggle");
    
        $(document).ready(function() {

            $("#loadingModal").modal("toggle");

            $("#btn_filter").click(function() {
                var sku = $("#product_sku_filter").val();
                
                $(".catalog_category_row").each(function (i, category) {
                    var has_any_at_this_category = false;
                    
                    $(".catalog_serie_row[data-product-category='" + $(category).data("product-category") + "']").each(function (j, serie) {
                        var has_any_at_this_serie = false; 
                        
                        $(".catalog_product_row[data-product-serie='" + $(serie).data("product-serie") + "']").each(function (k, product) {
                            var contains = false;

                            if (sku !== "") {
                                if ($(product).data("product-sku").toString().indexOf(sku) >= 0) {
                                    contains = true;
                                }
                            }
                            
                            if (contains) {
                                has_any_at_this_serie = true;
                                has_any_at_this_category = true;
                            } else {
                                $(product).hide();
                            }        
                        });
                        
                        if ( ! has_any_at_this_serie) {
                            $(".catalog_serie_row[data-product-serie='" + $(serie).data("product-serie").toString() + "']").hide();
                        }
                    });
                    
                    if ( ! has_any_at_this_category) {
                        $(".catalog_category_row[data-product-category='" + $(category).data("product-category").toString() + "']").hide();
                    }
                });
                
            });
        });
        
    </script>
    
    
    <div class="row no-print">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title"><strong>Catálogo de Produtos</strong></span>
            </div>

            <div class="panel-body">
                
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">SKU (Código do Produto):</label>
                            <input id="product_sku_filter" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                
            </div>
            
            <div class="panel-footer">
                <button id="btn_filter" class="btn btn-flat btn-md btn-success">Filtrar</button>
                <button id="btn_clear_filter" class="btn btn-flat btn-md btn-info">Limpar Filtro</button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 page-invoice">
            <table class="table invoice-table" style="margin-left:5px;">
                @foreach($catalog as $category => $items)
                    <tr class="catalog_row catalog_category_row" data-product-category="{{$category}}">
                        <th colspan=4><center><h2>{{$category}}</h2></center></th>
                    </tr>
                    @foreach(collect($items)->groupBy("product_serie_id") as $serie => $products)
                        <tr class="catalog_row catalog_serie_row" data-product-category="{{$category}}" data-product-serie="{{$serie}}">
                            <td colspan=4><h3>{{$products[0]->getSerie()["description"]}}</h3></td>
                        </tr>
                        @foreach($products as $product)
                            <tr class="catalog_row catalog_product_row" data-product-sku="{{$product->sku}}" data-product-category="{{$category}}" data-product-serie="{{$serie}}" data-product-id="{{$product->product_id}}"  style="border-bottom: 2px solid #CCC;">
                                <td style="vertical-align: text-top;"><h4>{{$product->sku}}</h4> <br><br>
                                
                                    <center>
                                        <img src="http://dfc.scene7.com/is/image/DFC/{{$product->sku}}-B1.tif?fmt=jpeg,rgb&amp;wid=140&amp;hei=100">
                                    </center>
                                
                                </td>
                                <td>
                                    <strong>Descrição:</strong> {{$product->description_pt}} <br>
                                    <strong>Marca:</strong> {{$product->getBrand()["description"]}} <br>
                                    
                                    <br><br>
                                    
                                    <strong>Notas de especificação:</strong>
                                    
                                    <br>
                                    
                                    <ul>
                                        @if ($product->flow_rate != null)
                                            <li>{{$product->flow_rate}}</li>
                                        @endif
                                    </ul>
                                    
                                    <br>
                                    
                                    <strong>Recursos Inteligentes:</strong>
                                    
                                    <br>
                                    
                                    <ul>
                                        
                                        @if ($product->isEletronics())
                                        <li>
                                            <img src="http://static.deltafaucetrep.com/technologies/eletronics.png"> Torneiras eletrônicas
                                        </li>
                                        @endif
                                        
                                        @if ($product->hasTouchTechnology())
                                        <li>
                                            <a href="http://www.deltafaucet.com.br/smart-solutions/touch2o-technology.html" target="_blank">
                                                <img src="http://static.deltafaucetrep.com/technologies/touch2O.png"> Tecnologia Touch2O
                                            </a>        
                                        </li>
                                        @endif
                                        
                                        @if ($product->hasDiamondSealTechnology())
                                        <li>
                                            <a href="http://www.deltafaucet.com.br/smart-solutions/diamond-seal-technology.html" target="_blank">
                                                <img src="http://static.deltafaucetrep.com/technologies/diamond-seal.png"> Tecnologia de Vedação DIAMOND
                                            </a>        
                                        </li>
                                        @endif
                                        
                                        @if ($product->hasTouchCleanTechnology())
                                        <li>
                                            <a href="http://www.deltafaucet.com.br/smart-solutions/touch-clean.html" target="_blank">
                                                <img src="http://static.deltafaucetrep.com/technologies/touch-clean.png"> Tecnologia Touch Clean
                                            </a>        
                                        </li>
                                        @endif
                                        
                                        @if ($product->hasBrillianceTechnology())
                                        <li>
                                            <a href="http://www.deltafaucet.com.br/smart-solutions/brilliance-anti-tarnish-finishes.html" target="_blank">
                                                <img src="http://static.deltafaucetrep.com/technologies/brilliance.png"> Acabamento Brilliance
                                            </a>        
                                        </li>
                                        @endif
                                    </ul>
                                    
                                    <br>
                                    
                                    @if ($product->needsDSTAdapter())
                                    
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <center><img src="http://dfc.scene7.com/is/image/DFC/{{$product->DSTAdapter()->sku}}-B1.tif?fmt=jpeg,rgb&amp;wid=140&amp;hei=100"></center> 
                                            </div>
                                            
                                            <div class="col-sm-8">
                                                <strong>SKU: </strong> {{$product->DSTAdapter()->sku}} <br>
                                                <strong>Preço Revenda: </strong> R$ {{number_format($product->DSTAdapter()->getResalePrice()->value_c_ipi, 2, ",",".")}} <br>
                                                <strong>Preço Consumidor: </strong> R$ {{number_format($product->DSTAdapter()->getConsumerPrice()->value_c_ipi, 2, ",",".")}} <br>
                                                
                                                <br><br>
                                                
                                                <strong>Na compra deste produto deve-se especificar o adaptador DST.</strong>
                                            </div>
                                        </div>
                                    
                                    @endif
                                    
                                </td>
                                <td>{{$product->getFinish()->description}}</td>
                                <td>
                                    Revenda:    <span style="white-space:nowrap;">R$ {{$product->getResalePrice() != null ? number_format($product->getResalePrice()->value_c_ipi, 2, ",",".") : "N.I"}}</span>
                                   <br>
                                   <br>
                                    Consumidor:  <span style="white-space:nowrap;">R$ {{$product->getConsumerPrice() != null ? number_format($product->getConsumerPrice()->value_c_ipi, 2, ",",".") : "N.I"}}</span>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                @endforeach
            </table>
        </div>
    </div>

    
    <!-- Pixel Admin's javascripts -->
    
    <script type="text/javascript">
        window.PixelAdmin.start(init);
    
    </script>

</body>

</html>