<div class="panel-body">
    <div class="col-sm-5">
        <div class="col-sm-12">
            <img width="350" height="255" src="http://dfc.scene7.com/is/image/DFC/{{trim($product->sku)}}-B1.tif?fmt=jpeg,rgb&wid=476&hei=350">
        </div>
        <div style="margin-top:50px;" class="col-sm-12">
            <table class="table">
                <tr>
                    <th>Código SKU:</th>
                    <td>{{$product->sku}}</td>
                </tr>
                <tr>
                    <th>Marca:</th>
                    <td>{{$product->getBrand() == null ? "N.I." : $product->getBrand()->description}}</td>
                </tr>
                <tr>
                    <th>Série:</th>
                    <td>{{$product->getSerie() == null ? "N.I" : $product->getSerie()->description}}</td>
                </tr>
                <tr>
                    <th>Função:</th>
                    <td>{{$product->getFunction() == null ? "N.I." : $product->getFunction()["description"]}}</td>
                </tr>
                <tr>
                    <th>Acabamento:</th>
                    <td>{{$product->getFinish()->description}}</td>
                </tr>
                <tr>
                    <th>Descrição:</th>
                    <td>{{$product->description_pt}}</td>
                </tr>
            </table>
        </div>
    </div>
    <div style="margin-left: 20px;" class="col-sm-6">
        <table class="table">
            <tr>
                <th>NCM:</th>
                <td>{{$product->ncm}}</td>
            </tr>
            <tr>
                <th>Peso:</th>
                <td>{{$product->product_weight_kg}} kg</td>
            </tr>
            <tr>
                <th>Vazão:</th>
                <td>{{$product->flow_rate}}</td>
            </tr>
            <tr>
                <th>IPI:</th>
                <td>{{$product->ipi * 100}}%</td>
            </tr>
            <tr>
                <th>Quantidade em Caixa:</th>
                <td>{{$product->case_quantity}} Unid.</td>
            </tr>
            <tr>
                <th>Altura da Caixa:</th>
                <td>{{round($product->box_height_cm, 3)}} cm</td>
            </tr>
            <tr>
                <th>Comprimento da Caixa:</th>
                <td>{{round($product->box_length_cm, 3)}} cm</td>
            </tr>
            <tr>
                <th>Largura da Caixa:</th>
                <td>{{round($product->box_height_cm, 3)}} cm</td>
            </tr>
        </table>
    </div>
</div>