@extends('layouts.master') @section('title', 'Quartinho') @section('content')


<div class="row">
    <div class="col-sm-12">

        <!-- 5. $DEFAULT_TABLES ============================================================================

		Default tables
-->
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Produtos no Estoque Local</span>
            </div>
            <div class="panel-body">
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
                            @foreach($inventory->getProducts() as $p)
                            <tr>
                                <td>{{$p->getProduct()->sku}}</td>
                                <td>
                                    <img width="70" height="51" src="http://dfc.scene7.com/is/image/DFC/{{trim($p->getProduct()->sku)}}-B1.tif?fmt=jpeg,rgb&wid=476&hei=350">
                                </td>
                                <td>{{$p->getProduct()->getBrand()["description"]}}</td>
                                <td>{{$p->getProduct()->description_pt}}</td>
                                <td>{{$p->quantity}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- /5. $DEFAULT_TABLES -->

    </div>
</div>


@endsection @section('end')

<script type="text/javascript">
    $(document).ready(function () {
         var table = $(".inventory-table").DataTable({
             "responsive" : {details: false},
             "aaSorting": [
              [0, "dsc"]
            ]
         });
    });
</script>

@endsection