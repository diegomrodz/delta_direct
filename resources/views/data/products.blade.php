<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Delta Direct - @yield('title')</title>
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
    <link href="http://static.deltafaucetrep.com/assets/stylesheets/dataTables.responsive.css" rel="stylesheet" type="text/css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
</head>

<body>

    <body style="">

        <script>
            var init = [];
        </script>


        <table id="customers_table" class="table">
            <thead>
                <tr>
                    <th><input type="text" data-column-filter=0 class="input-filter form-control" placeholder="SKU"></th>
                    <th>Imagem</th>
                    <th><input type="text" data-column-filter=2 class="input-filter form-control" placeholder="Descrição"></th>
                    <th><input type="text" data-column-filter=3 class="input-filter form-control" placeholder="Série"></th>
                    <th><input type="text" data-column-filter=4 class="input-filter form-control" placeholder="Marca"></th>
                    <th><input type="text" data-column-filter=5 class="input-filter form-control" placeholder="Função"></th>
                    <th><input type="text" data-column-filter=6 class="input-filter form-control" placeholder="NCM"></th>
                    <th>Preço Revenda s/ IPI s/ ST</th>
                    <th>Preço Revenda c/ IPI s/ ST</th>
                    <th>Preço Consumidor</th>
                </tr>
            </thead>
        
            <tbody>
                @foreach($products as $product)
                    <tr data-product-id="{{$product->product_id}}">
                        <td><a href="#" onclick="productDetail({{$product->product_id}})" data-toggle="modal" data-target="#productDetailModal">{{$product->sku}}</a></td>
                        <td><img src="http://dfc.scene7.com/is/image/DFC/{{$product->sku}}-B1.tif?fmt=jpeg,rgb&amp;wid=70&amp;hei=51"></td>
                        <td style="min-width:200px;">{{$product->description_pt or "N.I"}}</td>
                        <td>{{$product->getSerie()->description or "N.I"}}</td>
                        <td>{{$product->getBrand()->description or "N.I"}}</td>
                        <td>{{$product->getFunction()->description or "N.I"}}</td>
                        <td>{{$product->ncm or "N.I"}}</td>
                        <td style="border-left: 1px solid black;">R$ {{$product->getResalePrice() != null ? number_format($product->getResalePrice()->value_s_ipi, 2, ",", ".") : "N.I"}}</td>
                        <td>R$ {{$product->getResalePrice() != null ? number_format($product->getResalePrice()->value_c_ipi, 2, ",", ".") : "N.I"}}</td>
                        <td style="border-left: 1px solid black;">R$ {{$product->getConsumerPrice() != null ? number_format($product->getConsumerPrice()->value_c_ipi, 2, ",",".") : "N.I"}}</td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
        
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
        
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
        <script src="http://static.deltafaucetrep.com/assets/javascripts/pixel-admin.min.js"></script>
        <script src="http://static.deltafaucetrep.com/assets/javascripts/jquery.dataTables.min.js"></script>
        <script src="http://static.deltafaucetrep.com/assets/javascripts/dataTables0.responsive.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.6/jquery.slimscroll.min.js"></script>
        <script src="//cdn.datatables.net/plug-ins/a5734b29083/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    
        <script type="text/javascript">
           
            var table = $("#customers_table").DataTable({
                paging: false,
                ordering: false,
                sDom: ""
            });
            
            $(".input-filter").each(function (key, value) {
                $(value).change(function () {
                    table.columns($(value).data("column-filter")).search($(this).val()).draw();
                });
            });
            
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
            
        </script>
        
    </body>

</html>