@extends('layouts.master')

@section('title', 'Pedidos à Faturar')

@section('content')

<script type="text/javascript">
    window.document.body.className += " page-mail";
</script>

<div class="mail-container" style="margin-left:0px;">
	<div class="col-sm-12">
        <div class="mail-container-header">
			Produtos à Faturar

			<form action="#" class="pull-right" style="width: 300px;margin-top: 3px;">
				<div class="form-group input-group-sm has-feedback no-margin">
					<input id="search_input" type="text" placeholder="Busca" class="form-control">
					<span class="fa fa-search form-control-feedback" style="top: -1px"></span>
				</div>
			</form>
		</div>
        
        <div class="mail-controls clearfix">
			<div class="btn-toolbar wide-btns pull-left" role="toolbar">

				<div class="btn-group">
					<button id="btn_refresh_search" type="button" class="btn"><i class="fa fa-repeat"></i></button>
				</div>

              
                
			</div>

		</div>
        
		<div class="table-responsive">
				<table class="table table-striped" id="budgets_table">
					<thead>
                        <tr>
                            <th>Pedido</th>
                            <th>Sub-Pedido</th>
                            <th>Produto</th>
                            <th>Preço Unid.</th>
                            <th>Quantidade</th>
                            <th>Valor Total</th>
                            <th>Criado Em</th>
						</tr>
					</thead>
					<tbody>
                        @foreach($list as $product)
                        <tr>
                            <td><a href="http://deltafaucetrep.com/order/detail/{{$product->order_id}}">{{$product->order_id}}</a></td>
                            <td><a href="http://deltafaucetrep.com/billing/detail/{{$product->sub_order_id}}">{{$product->delta_code . $product->order_id}}</a></td>
                            <td><a href="#productDetailModal" data-toggle="modal" onclick="productDetail({{$product->product_id}})">{{$product->sku}}</a></td>
                            <td>{{number_format($product->price_c_discount, 2, ",", ".")}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{number_format($product->total_price, 2, ",", ".")}}</td>
                            <td>{{date_format(date_create($product->created_at), "d/m/Y")}}</td>
                        </tr>
                        @endforeach
                    </tbody>
				</table>
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

<script type="text/javascript">
	$(document).ready(function () {
	    var table = $('#budgets_table').DataTable({
            paging: false,
            sDom: ""
        });
        
        $("#search_input").keyup(function () {
            table.search($(this).val() == "" ? " " : $(this).val()).draw();
        });
        
        $("#btn_refresh_search").click(function () {
            table.search(" ").draw();    
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

@endsection