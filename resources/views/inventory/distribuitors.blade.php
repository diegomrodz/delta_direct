@extends('layouts.master') @section('title', 'Estoque nos distribuidores') @section('content')


<div class="row">
    <div class="col-sm-12">

        <!-- 5. $DEFAULT_TABLES ============================================================================

		Default tables
-->
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Estoque nos distribuidores</span>
                
                <div class="panel-heading-controls">
                    <select class="form-control input-sm" onchange="changeDistribuitor($(this).val())">
                            <option value="-" selected>-</option>
                        @foreach($distribuitors as $d)
                            <option class="list-group-item" value="{{$d->distribuitor_id}}">{{$d->company_name}}</option>
					    @endforeach
                    </select>
                </div>
            </div>
            <div class="panel-body">
                <div class="col-sm-12">
                
                    <table id="products_table" class="table">
                        <thead>
                            <tr>
                                <th>SKU</th>
                                <th>Imagem</th>
                                <th>Descrição</th>
                                <th>Saldo Atual</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <!-- /5. $DEFAULT_TABLES -->

    </div>
</div>

<div id="productDetailModal" class="modal fade">
  <div style="width:900px" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Detalhes do Produto</h4>
      </div>
      <div class="modal-body">
        <div class="row">
	        <div class="panel" id="product_detail_body">
               
			</div>
		</div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection @section('end') 
<script type="text/javascript">

    var table = $("#products_table").DataTable({
        responsive : {details: false},
        
        createdRow : function (row, data, index) {
            $('td', row).eq(0).html("").append(data[0]);
            $('td', row).eq(1).html("").append(data[1]);
            $('td', row).eq(2).html("").append(data[2]);
            $('td', row).eq(4).html("").append(data[4]);
        }
        
    });
    
    function changeDistribuitor(dist_id) {
        table.clear().draw();
        
        var req = $.ajax({
            url : "http://deltafaucetrep.com/inventory/distribuitor/get/" + dist_id,
            type: 'get',
            dataType: 'json'
        });
        
        req.done(function (data) {
            for (var i = 0; i < data.length; i += 1) {
                var row = [];
                
                var a = document.createElement("a");
                
                $(a).attr("onclick", "productDetail(" + data[i]["product_id"] + ");");
                $(a).attr("data-toggle", "modal");
                $(a).attr("data-target", "#productDetailModal");
                $(a).attr("style", "cursor: pointer;");
                $(a).text(data[i]["sku"]);
                
                row.push(a);
                
                 var img = $(document.createElement("img"));
                
                img.attr("src", "http://dfc.scene7.com/is/image/DFC/" + data[i]["sku"].trim() + "-B1.tif?fmt=jpeg,rgb&wid=70&hei=51");
                
                row.push(img);
                
                row.push(data[i]["description_pt"]);
                
                row.push(data[i]["quantity"]);
                
                table.row.add(row);
            }
            
            table.draw();
        });
    };
    
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
@endsection

