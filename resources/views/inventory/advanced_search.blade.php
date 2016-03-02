@extends('layouts.master')

@section('title', 'Busca Anvançada')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Busca Avançada</span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <fieldset>
                            <legend>Filtro Produto</legend>
                            <div class="form-group no-margin-hr">
                                <label class="control-label">Produto:</label>
                                <input placeholder="Código SKU" type="text" id="product_sku" class="form-control">
                            </div>

                        </fieldset>
                    </div>
                    
                    <div class="col-sm-6">
                        <fieldset>
                            <legend>Filtrar Estoques</legend>
                            <div class="col-sm-4">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Distribuidores:</label>
                                    <input id="dist_filter" type="checkbox">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Estoques Delta:</label>
                                    <input id="delta_filter" type="checkbox">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-sm-12">
                        <button id="btn_do_search" style="float:right;" class="btn btn-flat btn-sm btn-success"><span class="btn-label icon fa fa-search"></span>&nbsp;&nbsp;Pesquisar</button>
                    </div>
                </div>
                
                <div class="row">
                    <div class="table-responsive">
                        <table id="results_table" class="table table-striped">
                            <thead>
                                <th>SKU</th>
                                <th>Imagem</th>
                                <th>Descrição</th>
                                <th>Estoque</th>
                                <th>Saldo Atual</th>
                                <th>Preço de Venda</th>
                                <th>Ultima Atualização</th>
                            </thead>
                            <tbody id="tbody_results">
                            
                            </tbody>
                        </table>
                    </div>
                </div>
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


<input type="hidden" id="_token" value="{{csrf_token()}}">
@endsection

@section('end')

<script type="text/javascript">

    var table = $("#results_table").DataTable({
        paging: false,
        createdRow: function (row, data, index) {
            $('td', row).eq(1).html("").append(data[1]);
        }
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
    
    $("#btn_do_search").click(function () {
        var data = {};
        
        data.dist_filter = $("#dist_filter").prop("checked");
        data.delta_filter = $("#delta_filter").prop("checked");
        data.product_sku = $("#product_sku").val();
        
        data._token = $("#_token").val();
        
        $.ajax({
            url: "http://deltafaucetrep.com/inventory/advanced_search",
            type: "post",
            data: data,
            dataType: "json"
        }).success(function (e) {
            table.clear().draw();
            
            for (var i = 0; i < e.length; i += 1) {
                var row = [];
                
                row.push(e[i]["sku"]);
                
                var a = $(document.createElement("a"));
                            
                a.attr("onclick", "productDetail(" + e[i]["product_id"] + ");");
                a.attr("data-toggle", "modal");
                a.attr("data-target", "#productDetailModal");
                a.attr("style", "cursor: pointer;");

                var img = $(document.createElement("img"));

                img.attr("src", "http://dfc.scene7.com/is/image/DFC/" + e[i]["sku"].trim() + "-B1.tif?fmt=jpeg,rgb&wid=70&hei=51");

                a.append(img);

                row.push(a);
                
                row.push(e[i]["description"]);
                
                row.push(e[i]["inventory"]);
                
                row.push(e[i]["quantity"]);
                
                row.push(e[i]["sale_price"]);
                
                row.push(e[i]["last_update"]);
                
                table.row.add(row);
            }
            table.draw();
        });
    });
    
</script>

@endsection