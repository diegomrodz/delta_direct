<div class="panel">
    <div class="panel-heading">
        <span class="panel-title">Selecionar Distribuidor para Produto: {{$product->sku}}</span>
    </div>
    <div class="panel-body">
        <table class="table">
            <tr>
                <th>Distribuidor</th>
                <th>Saldo Estoque</th>
                <th>Preço Venda</th>
                <th>Preço Transferência</th>
                <th>Ações</th>
            </tr>
            @foreach($dists as $d)
            <tr>
                <td>{{$d->fantasy_name}}</td>
                <td>{{$d->getProductInventoryBalance($product->product_id)["quantity"] == 0 || $d->getProductInventoryBalance($product->product_id)["quantity"] == null ? "Não possui" : $d->getProductInventoryBalance($product->product_id)["quantity"] }}</td>
                <td>{{$d->getProductSellPrice($product->product_id)["value"] == 0 || $d->getProductSellPrice($product->product_id)["value"] == null ? "-" : "R$ " . $d->getProductSellPrice($product->product_id)["value"]}}</td>
                <td>-</td>
                <td>
                    <button onclick="openPricePolice({{$d->distribuitor_id}})" style="margin-top:3px !important;" data-toggle="modal" data-target="#distribuitorPricePolice" class="btn btn-warning btn-xs btn-flat"><span class="btn-label icon fa fa-tag"></span>
                    </button>
                    <button onclick="selectDistribuitorProduct({{$op->order_product_id}}, {{$d->distribuitor_id}})" style="margin-top:3px !important;" class="btn btn-success btn-xs btn-flat"><span class="btn-label icon fa fa-check"></span>
                    </button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
