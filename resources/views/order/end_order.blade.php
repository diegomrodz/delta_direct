<div class="panel">
    <div class="panel-heading">
        <span class="panel-title">Quebra do Pedido: #{{$order->order_id}} {{$order->title}}</span>
    </div>
    <div class="panel-body">
        <!-- Tabs -->
        <ul class="nav nav-tabs bs-tabdrop-example">

            @foreach ($g_products as $key => $g)
            <li class=""><a href="#bs-tabdrop-tab{{$g[0]->delta_code}}" class="tab-clickable" data-toggle="tab">Pedido #{{$g[0]->delta_code}}{{$order->order_id}}</a>
            </li>
            @endforeach
        </ul>
        <div class="tab-content tab-content-bordered">
            @foreach ($g_products as $key => $g)
            <div class="tab-pane" id="bs-tabdrop-tab{{$g[0]->delta_code}}">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <strong>Pedido:</strong>
                            <span>#{{$g[0]->delta_code}}{{$order->order_id}}</span>
                        </div>
                        <div class="form-group no-margin-hr">
                            <strong>Cond. de Pagamento:</strong>
                            <span>{{$order->paymentCondition()->description}}</span>
                        </div>
                        <div class="form-group no-margin-hr">
                            <strong>Detalhes do pagamento:</strong>
                            <span>{{$order->payment_details}}</span>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><strong>Valor do Produto (c/ IPI)</strong>
                                    </td>
                                    <td>R$ <span id="budget_product_values">{{number_format(collect($g)->reduce(function ($carry, $item) { return $carry + $item->total_price; }), 2, ',', '.')}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Financeiro</strong>
                                    </td>
                                    <td>R$ <span id="interest_rate">{{number_format(($order->getInterestRate()/100) * collect($g)->reduce(function ($carry, $item) { return $carry + $item->total_price; }), 2, ',', '.')}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Outras cobranças</strong>
                                    </td>
                                    <td>R$ <span id="other_fees">{{number_format($order->other_charging / count($g_products), 2, ',', '.')}}</span>
                                    </td>
                                </tr>
                                @if ($order->customer()->representant() != null)
                                 <tr>
                                    <td><strong>Comissão (5%)</strong>
                                    </td>
                                    <td>R$ <span id="other_fees">{{number_format(((collect($g)->reduce(function ($carry, $item) { return $carry + $item->total_price; }))) * 0.05, 2, ',', '.')}}</span>
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <td><strong>Valor Total</strong>
                                    </td>
                                    @if ($order->customer()->representant() != null)
                                    <td>R$ <span id="budget_grand_total">{{number_format( (($order->other_charging / count($g_products)) 
                                                    + (($order->getInterestRate()/100) * collect($g)->reduce(function ($carry, $item) { return $carry + $item->total_price; })) 
                                                    + (collect($g)->reduce(function ($carry, $item) { return $carry + $item->total_price; })))
                                                    + ((collect($g)->reduce(function ($carry, $item) { return $carry + $item->total_price; })) * 0.05), 2, ',', '.')}}</span>
                                    </td>
                                    @else
                                    <td>R$ <span id="budget_grand_total">{{number_format( (($order->other_charging / count($g_products)) 
                                                    + (($order->getInterestRate()/100) * collect($g)->reduce(function ($carry, $item) { return $carry + $item->total_price; })) 
                                                    + (collect($g)->reduce(function ($carry, $item) { return $carry + $item->total_price; }))), 2, ',', '.')}}</span>
                                    </td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <table class="table">

                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Imagem</th>
                            <th>Preço s/ IPI</th>
                            <th>Preço c/ IPI</th>
                            <th>Preço c/ Desconto</th>
                            <th>Preço Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($g as $product)

                        <tr>
                            <td>{{$product->sku}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>
                                <img src="http://dfc.scene7.com/is/image/DFC/{{$product->sku}}-B1.tif?fmt=jpeg,rgb&amp;wid=70&amp;hei=51">
                            </td>
                            <td>{{number_format($product->price_s_ipi == 0 ? $product->price_c_ipi : $product->price_s_ipi, 2, ',', '.')}}</td>
                            <td>{{number_format($product->price_c_ipi, 2, ',', '.')}}</td>
                            <td>{{number_format($product->price_c_discount, 2, ',', '.')}}</td>
                            <td>{{number_format($product->total_price, 2, ',', '.')}}</td>
                        </tr>

                        @endforeach
                    </tbody>

                    <tfoot>
                        <th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total:</strong>
                            </td>
                            <td><strong>{{number_format( collect($g)->reduce(function ($carry, $item) { return $carry + $item->total_price; }) , 2, ',', '.')}}</strong>
                            </td>
                        </th>
                    </tfoot>
                </table>

            </div>

            @endforeach
        </div>

    </div>
    <div class="panel-footer">
        <button id="send-order-btn" class="btn btn-success btn-lg btn-flat">Enviar para aprovação</button>
    </div>
</div>

<script type="text/javascript">

    $('.endDateInvoice').editable();
    $(".tab-clickable").first().trigger("click");
    
    $("#send-order-btn").click(function () {
        var req = $.ajax({
            url: "http://deltafaucetrep.com/order/{{$order->order_id}}/send_to_dist",
            type: 'get',
            dataType: 'json'
        });
        
        req.success(function (data) {
            window.location.reload(); 
        });
    });

</script>

