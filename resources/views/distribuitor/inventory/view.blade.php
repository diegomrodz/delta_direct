@extends('layouts.master')

@section('title', 'Estoque Distribuidor')

@section('content')

<div class="row">
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Visualizar Estoque</span>
        </div>
        
        <div class="panel-body">
            <table id="table-products" class="table">
                <thead>
                    <tr>
                        <th>SKU</th>
                        <th>Imagem</th>
                        <th>Marca</th>
                        <th>Descrição</th>
                        <th>Saldo Estoque</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user->distribuitor()->getInventoryProducts() as $p)
                        <tr>
                            <td><a href="#" data-toggle="modal" data-target="#productDetailModal" onclick="productDetail({{$p->product_id}})"> {{$p->product()->sku}}</td>
                            <td>
                                    <img width="70" height="51" src="http://dfc.scene7.com/is/image/DFC/{{trim($p->product()->sku)}}-B1.tif?fmt=jpeg,rgb&wid=476&hei=350">
                                </td>
                            <td>{{$p->product()->getBrand()->description}}</td>
                            <td>{{$p->product()->description_pt}}</td>
                            <td>{{$p->quantity}}</td>
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

@endsection

@section('end')

<script type="text/javascript">
    $("#table-products").DataTable();
    
    function productDetail(id) {
        var response = $.ajax({
            url: "http://deltafaucetrep.com/product/detail/" + id,
            type: 'GET',
            dataType: 'html'
        });
        
        response.done(function (data) {
            $("#product_detail_body").html(data);
        });
    }

</script>

@endsection