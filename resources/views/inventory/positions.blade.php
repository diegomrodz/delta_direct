@extends('layouts.master')

@section('title', 'Posição dos Estoques')

@section('content')


<div class="row">
	<div class="col-sm-12">

<!-- 5. $DEFAULT_TABLES ============================================================================

		Default tables
-->
		<div class="panel">
			<div class="panel-heading">
				<span class="panel-title">Posição Atual dos Estoques</span>
			</div>
			<div class="panel-body">
                    <ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
                        @foreach($inventory as $i)
                                <li class="">
                                    <a href="#tabs-inventory-{{$i->inventory_id}}" class="tab-inventory" data-toggle="tab">{{$i->description}}</a>
                                </li>
                        @endforeach
					</ul>
                
                    <div class="tab-content tab-content-bordered">
                        @foreach($inventory as $i)
                                <div class="tab-pane fade in" id="tabs-inventory-{{$i->inventory_id}}">
                                    <div class="table-responsive">
                                        <table class="compact inventory-table table">
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
                                        @foreach($i->getProducts() as $p)
                                            <tr>
                                                <td>{{$p->getProduct()->sku}}</td>
                                                <td><img width="70" height="51" src="http://dfc.scene7.com/is/image/DFC/{{trim($p->getProduct()->sku)}}-B1.tif?fmt=jpeg,rgb&wid=476&hei=350"></td>
								                <td>{{$p->getProduct()->getBrand()["description"]}}</td>
                                                <td>{{$p->getProduct()->description_pt}}</td>
                                                <td>{{$p->quantity}}</td>
                                            </tr>    
                                        @endforeach
                                           </tbody>
                                        </table>
                                    </div>
                                </div>
                        @endforeach
                </div>
			</div>
		</div>
<!-- /5. $DEFAULT_TABLES -->

	</div>
</div>

@endsection

@section('end')

<script type="text/javascript">
	$(document).ready(function () {
         var table = $(".inventory-table").DataTable({
             "responsive" : {details: false},
             "aaSorting": [
              [0, "dsc"]
            ]
         });
        
        $(".tab-inventory").first().click();
    });
</script>

@endsection