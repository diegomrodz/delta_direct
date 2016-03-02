@extends('layouts.master') @section('title', 'Pedido') @section('content')

<div class="panel">
    <div class="panel">
        <div class="panel-heading">
            <strong><span class="panel-title">Pedido <span
                                                           id="budget_id">{{$order->distribuitor()->delta_code . $order->order_id}}</span></span></strong>
             <div class="panel-heading-controls">
                <button style="margin-top:-4px;" data-toggle="modal" data-target="#sendOrderModal" class="btn btn-primary btn-outline btn-flat"><span class="btn-label icon fa fa-envelope"></span></button>
                <a target="_blank" href="http://deltafaucetrep.com/sub_order/print/{{$order->sub_order_id}}"><button style="margin-top:-4px;" class="btn btn-primary btn-outline btn-flat"><span class="btn-label icon fa fa-print"></span></button></a>
            </div>
        </div>
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-6">

                    <form action="" class="panel form-horizontal">
                        <div class="panel-heading">
                            <span class="panel-title">Cliente</span>
                        </div>
                        <ul class="list-group">
                            <li style="margin-top:10px" class="list-group-item">
                                <div class="row">
                                    <input type="hidden" id="customer_id" value="{{ $order->customer()->customer_id }}">

                                    <div class="col-sm-12">
                                        <div class="form-group no-margin-hr">
                                            <strong>Razão Social:</strong>
                                            <span id="customer_company_name"><a href="http://deltafaucetrep.com/portfolio/detail/{{ $order->customer()->customer_id }}">{{ $order->customer()->company_name }}</a></span>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div class="col-sm-12">
                                        <div class="form-group no-margin-hr">
                                            <strong>CNPJ/CPF:</strong>
                                            <span id="customer_cnpj">{{ $order->customer()->cnpj }}</span>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div class="col-sm-12">
                                        <div class="form-group no-margin-hr">
                                            <strong>Endereço de Entrega:</strong>
                                            <span id="customer_delivery_address">{{  $order->customer()->getDeliveryAddress()->text }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group no-margin-hr">
                                            <strong>Endereço de Fatura:</strong>
                                            <span id="customer_billing_address">{{  $order->customer()->getBillingAddress()->text }}</span>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <strong>CEP:</strong>
                                            <span id="customer_cep">{{  $order->customer()->getAddress() == null ? "" : $order->customer()->getAddress()->cep }}</span>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <strong>UF:</strong>
                                            <span id="customer_uf">{{  ($order->customer()->getDeliveryAddress() == null ? "" : $order->customer()->getDeliveryAddress()->uf() == null ? "" : $order->customer()->getDeliveryAddress()->uf()->uf) . ", " . ($order->customer()->getDeliveryAddress() == null ? "" : $order->customer()->getDeliveryAddress()->city_text) }}</span>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <strong>Telefone:</strong>
                                            <span id="customer_phone">{{ $order->customer()->phone }}</span>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <strong>Contato:</strong>
                                            <span id="customer_contact_name">{{ count($order->customer()->getBusinessContacts()) == 0 ? "" : $order->customer()->getBusinessContacts()[0]->name }}</span>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div class="col-sm-12">
                                        <div class="form-group no-margin-hr">
                                            <strong>Email:</strong>
                                            <span id="customer_email">{{ $order->customer()->email }}</span>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                </div>
                                <!-- row -->
                            </li>
                            <li class="list-group-item">
                                <div style="margin-top:20px" class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <strong>Aceita entrega parcial:</strong>
                                            <span id="customer_accept_partial_delivery">{{$order->accept_partial_delivery == 's' ? 'Sim' : 'Não'}}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <strong>Aceita expedições diferentes:</strong>
                                            <span id="customer_accept_different_expeditions">{{$order->accept_different_orders == 's' ? 'Sim' : 'Não'}}</span>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div class="col-sm-12">
                                        <div class="form-group no-margin-hr">
                                            <strong>Contribuinte do ICMS:</strong>
                                            <span id="customer_icms_taxpayer">{{ $order->customer()->icms_taxpayer == 's' ? 'Sim' : 'Não'  }}</span>
                                        </div>
                                        <!-- col-sm-6 -->
                                    </div>
                            </li>
                        </ul>
                    </form>


                    </div>


                    @if ($order->representant() != null)
                    <div class="col-sm-6">


                        <form action="" class="panel form-horizontal">
                            <div class="panel-heading">
                                <span class="panel-title">Representante</span>
                            </div>
                            <div class="panel-body">
                                <input type="hidden" id="representant_id" value="{{$order->representant()->representant_id}}">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Nome:</label>
                                            <span><a href="http://deltafaucetrep.com/profile/{{$order->representant()->user()->user_id}}/detail">{{$order->representant()->user()->name . " " . $order->representant()->user()->surname}}</a></span>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div style="margin-top: -10px;" class="col-sm-12">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Telefone:</label>
                                            <span>{{$order->representant()->phone}}</span>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div style="margin-top: -10px;" class="col-sm-12">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Email:</label>
                                            <span>{{$order->representant()->user()->email}}</span>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                </div>
                                <!-- row -->

                            </div>
                        </form>

                    </div>

                    <div class="col-sm-6">
                        <form action="" class="panel form-horizontal">
                            <div class="panel-heading">
                                <span class="panel-title">Gerente</span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Nome:</label>
                                            <span><a href="http://deltafaucetrep.com/profile/{{$order->manager()->user()->user_id}}/detail">{{$order->manager()->user()->name . " " . $order->manager()->user()->surname}}</a></span>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div style="margin-top: -10px;" class="col-sm-12">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Telefone:</label>
                                            <span>{{$order->manager()->phone}}</span>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div style="margin-top: -10px;" class="col-sm-12">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Email:</label>
                                            <span>{{$order->manager()->user()->email}}</span>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                </div>
                                <!-- row -->

                            </div>
                        </form>
                        <!-- /9. $BLOCK_STYLED_FORM -->

                    </div>
                    @elseif ($order->manager() != null)
                
                
                    <div class="col-sm-6">
                        <form action="" class="panel form-horizontal">
                            <div class="panel-heading">
                                <span class="panel-title">Gerente</span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Nome:</label>
                                            <span><a href="http://deltafaucetrep.com/profile/{{$order->manager()->user()->user_id}}/detail">{{$order->manager()->user()->name . " " . $order->manager()->user()->surname}}</a></span>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div style="margin-top: -10px;" class="col-sm-12">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Telefone:</label>
                                            <span>{{$order->manager()->phone}}</span>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div style="margin-top: -10px;" class="col-sm-12">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Email:</label>
                                            <span>{{$order->manager()->user()->email}}</span>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                </div>
                                <!-- row -->

                            </div>
                        </form>
                        <!-- /9. $BLOCK_STYLED_FORM -->

                    </div>
                
                    @elseif ($order->order()->budget()->distribuitor() != null)
                
                    <div class="col-sm-6">
                        <form action="" class="panel form-horizontal">
                            <div class="panel-heading">
                                <span class="panel-title">Vendedor</span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Nome:</label>
                                            <span>{{$order->budget()->distribuitor()->user()->name . " " . $order->budget()->distribuitor()->user()->surname}}</span>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div style="margin-top: -10px;" class="col-sm-12">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Telefone:</label>
                                            <span>{{$order->budget()->distribuitor()->contact_phone}}</span>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div style="margin-top: -10px;" class="col-sm-12">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Email:</label>
                                            <span>{{$order->budget()->distribuitor()->contact_email}}</span>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                </div>
                                <!-- row -->

                            </div>
                        </form>
                        <!-- /9. $BLOCK_STYLED_FORM -->

                    </div>
                
                @else
                    <div class="col-sm-6">

                        <form action="" class="panel form-horizontal">
                            <div class="panel-heading">
                                <span class="panel-title">Representante</span>
                            </div>
                            <div class="panel-body">
                                <input type="hidden" id="representant_id" value="null">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Nome:</label>
                                            <span><a href="http://deltafaucetrep.com/profile/2/detail">Delta Televendas</a></span>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div style="margin-top: -10px;" class="col-sm-12">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Telefone:</label>
                                            <span>(11) 3285-9020</span>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div style="margin-top: -10px;" class="col-sm-12">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Email:</label>
                                            <span>sac@deltafaucet.com</span>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                </div>
                                <!-- row -->

                            </div>
                        </form>

                    </div>
                    @endif

                </div>

                <div class="row">

                    <div class="col-sm-6">

                        <form action="" class="panel form-horizontal">
                            <div class="panel-heading">
                                <span class="panel-title">Pagamento/Entrega</span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Tipo de Pedido:</label>
                                            <span id="order_type">{{$order->customer()->getType()->name}}</span>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div class="col-sm-12">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Condição de Pagamento</label>
                                            <span id="order_payment_condition">{{$order->paymentCondition()->description}}</span>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Detalhes do Pagamento</label>
                                            <textarea id="order_payment_details" rows="7" class="form-control" readonly value="{{$order->order()->payment_details}}">{{$order->order()->payment_details}}</textarea>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                </div>
                                <!-- row -->

                            </div>
                        </form>
                        <!-- /9. $BLOCK_STYLED_FORM -->

                    </div>

                    <div class="col-sm-6">
                        <form action="" class="panel form-horizontal">
                            <div class="panel-heading">
                                <span class="panel-title">Status</span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="col-sm-12">
                                            <div class="form-group no-margin-hr">
                                                <label class="control-label">Data:</label>
                                                <span id="budget_created_at">{{ date_format($order->created_at, "d/m/Y") }}</span>
                                            </div>
                                        </div>
                                        <!-- col-sm-6 -->
                                        <div class="col-sm-12">
                                            <div class="form-group no-margin-hr">
                                                <label class="control-label">Validade:</label>
                                                <span id="budget_validity">10</span> Dias Úteis
                                            </div>
                                        </div>
                                        <!-- col-sm-6 -->
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-sm-12">
                                            <div class="form-group no-margin-hr">
                                                <label class="control-label">Status:</label>
                                                <a id="budget_status" href="#" class="label">{{$order->getStatus()->description}}</a>
                                            </div>
                                        </div>
                                        <!-- col-sm-6 -->
                                    </div>
                                </div>
                                <!-- row -->
                            </div>
                            <div style="margin-top:-16px" class="panel-body">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td><strong>Valor do Produto (c/ IPI)</strong>
                                            </td>
                                            <td>R$ <span id="product_values">{{number_format($order->product_values, 2, ',', '.')}}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Financeiro</strong>
                                            </td>
                                            <td>R$ <span id="interest_rate">{{number_format($order->interest_rate, 2, ',', '.')}}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Outras cobranças</strong>
                                            </td>
                                            <td>R$ <span id="other_fees">{{number_format($order->other_charging, 2, ',', '.')}}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Valor Total</strong>
                                            </td>
                                            <td>R$ <span id="grand_total">{{number_format($order->grand_total, 2, ',', '.')}}</span>
                                            </td>
                                        </tr>
                                        <tr></tr>
                                        <tr>
                                            <td><strong>Comissão do Representante</strong>
                                            </td>
                                            <td>R$ <span id="representant_fee">{{number_format($order->representant_fee, 2, ',', '.')}}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </form>

                    </div>

                </div>

                <div class="row">
                    <div  class="col-sm-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <span class="panel-title">Produtos</span>

                                <div class="panel-heading-controls">
                                    @if ($user->getUserType()->cod == 40 || $user->getUserType()->cod == 5)
                                    <button onclick="showComments({{$order->sub_order_id}});" data-toggle="modal" data-target="#productOrderNotesModal" class="btn btn-info btn-xs btn-flat"><span class="btn-label icon fa fa-comments"></span>
                                    </button>
                                    @endif
                                </div>

                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table" id="order_table">
                                        <thead>
                                            <tr>
                                                <th>SKU</th>
                                                <th>Qtd.</th>
                                                <th>Imagem</th>
                                                <th>Descrição</th>
                                                <th>Preço s/ Desconto (R$)</th>
                                                <th>Desconto</th>
                                                <th>Preço c/ Desconto (R$)</th>
                                                <th>Total R$</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($order->getProducts() as $p) @if($p->approved == 'n')
                                            <tr class="danger">
                                                @else
                                                <tr class="success">
                                                    @endif
                                                    <td><a href="" onclick="productDetail({{$p->product_id}})" data-toggle="modal" data-target="#productDetailModal">{{trim($p->product()->sku)}}</a>
                                                    </td>
                                                    <td><span data-order-id="{{$order->order_id}}" data-product-id="{{$p->product_id}}" data-field-name="quantity" class="order_product_editable">{{$p->quantity}}</span>
                                                    </td>
                                                    <td>
                                                        <img src="http://dfc.scene7.com/is/image/DFC/{{trim($p->product()->sku)}}-B1.tif?fmt=jpeg,rgb&wid=70&hei=51" />
                                                    </td>
                                                    <td>{{$p->product()->description_pt}}</td>
                                                    <td>{{number_format($p->price_c_ipi, 2, ',', '.')}}</td>
                                                    <td><span data-order-id="{{$order->order_id}}" data-product-id="{{$p->product_id}}" data-field-name="discount" class="order_product_editable">{{$p->discount}}%</span>
                                                    </td>
                                                    <td>{{number_format($p->price_c_discount, 2, ',', '.')}}</td>
                                                    <td>{{number_format($p->total_price, 2, ',', '.')}}</td>
                                                </tr>
                                                @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td><strong>Total:</strong>
                                                </td>
                                                <td><strong>{{collect($order->getProducts())->reduce(function ($carry, $item) { return $carry + $item->quantity; })}} </strong>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><strong>{{number_format( collect($order->getProducts())->reduce(function ($carry, $item) { return $carry + $item->total_price; }) , 2, ',', '.')}} </strong>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <!-- /5. $DEFAULT_TABLES -->
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
        <div class="panel-footer">
            @if (($user->getUserType()->cod == 5 || $user->getUserType()->cod == 40) && $order->sub_order_status_id == 1)
            <button id="end-order-btn" data-toggle="modal" data-target="#acceptOrderModalAlert" class="btn btn-success btn-lg btn-flat">Aprovar Pedido</button>
            <button data-toggle="modal" data-target="#reproveOrderModal" class="btn btn-danger btn-lg btn-flat">Reprovar Pedido</button>
            @endif
            
            @if ($user->getUserType()->cod == 40 && $order->sub_order_status_id == 3)
                <button id="cancel-order-btn" class="btn btn-danger btn-lg btn-flat">Cancelar Sub-Pedido</button>
            @endif
        </div>
    </div>
    

    <div id="acceptOrderModalAlert" class="modal modal-alert modal-warning fade" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="fa fa-warning"></i>
                </div>
                <div class="modal-title">Atenção</div>
                <div class="modal-body">Ao aprovar este pedido ele será enviado para faturamento, deseja continuar?</div>
                <div class="modal-footer">
                    <button onclick="approveOrder({{$order->sub_order_id}})" type="button" class="btn btn-warning" data-dismiss="modal">OK</button>
                    <button type="button" class="btn btn" data-dismiss="modal">Fechar</button>
                </div>
            </div>
            <!-- / .modal-content -->
        </div>
        <!-- / .modal-dialog -->
    </div>

<div id="reproveOrderModal" class="modal modal-alert modal-danger fade" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="fa fa-warning"></i>
                </div>
                <div class="modal-title">Atenção</div>
                <div class="modal-body">Ao reprovar este pedido o representante o gerente comercial da Delta serão notificados, deseja proseguir?</div>
                <div class="modal-footer">
                    <button onclick="reproveOrder({{$order->sub_order_id}})" type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                </div>
            </div>
            <!-- / .modal-content -->
        </div>
        <!-- / .modal-dialog -->
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

    <div id="productOrderNotesModal" class="modal fade">
        <div style="width:900px" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="product_order_notes">
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
</div>

<div id="sendOrderModal" class="modal fade">
    <div style="width:700px" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Enviar pedido para:</h4>
            </div>
            <div class="modal-body">

                <div class="panel">
                    <table class="table">
                     <tr>
                        <th>Meu Email</th>
                        <th></th>
                        <th></th>
                     </tr>
                       <tr>
                            <td>
                                <input type="checkbox" class="budget_email_to" value="{{$user->email}}">
                            </td>
                            <td>{{$user->name . " " . $user->surname}}</td>
                            <td>{{$user->email}}</td>
                        </tr>
                     @if ($user->representant() != null)   
                        <tr>
                            <th>Gerente</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" class="budget_email_to" value="{{$user->representant()->manager()->user()->email}}">
                            </td>
                            <td>{{$user->representant()->manager()->user()->name . " " . $user->representant()->manager()->user()->surname}}</td>
                            <td>{{$user->representant()->manager()->user()->email}}</td>
                        </tr>
                     @endif
                        <tr>
                            <th>Comercial</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" class="budget_email_to" value="{{$order->customer()->email}}">
                            </td>
                            <td>{{$order->customer()->company_name}}</td>
                            <td>{{$order->customer()->email}}</td>
                        </tr>

                        @if(count($order->customer()->getBusinessContacts()) > 0)
                        <tr>
                            <th>Contatos Comerciais</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($order->customer()->getBusinessContacts() as $c)
                        <tr>
                            <td>
                                <input type="checkbox" class="budget_email_to" value="{{$c->email}}">
                            </td>
                            <td>{{$c->name}}</td>
                            <td>{{$c->email}}</td>
                        </tr>
                        @endforeach @endif @if(count($order->customer()->getPartners()) > 0)
                        <tr>
                            <th>Sócios e Proprietários</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($order->customer()->getPartners() as $c)
                        <tr>
                            <td>
                                <input type="checkbox" class="budget_email_to" value="{{$c->email}}">
                            </td>
                            <td>{{$c->name}}</td>
                            <td>{{$c->email}}</td>
                        </tr>
                        @endforeach @endif

                        <tr>
                            <th>Outros</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td colspan=2><input type="text" class="form-control budget_email_to"></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td colspan=2><input type="text" class="form-control budget_email_to"></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td colspan=2><input type="text" class="form-control budget_email_to"></td>
                        </tr>
                        
                    </table>


                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button id="btn_send_emails" type="button" class="btn btn-primary">Enviar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<input type="hidden" id="_token" value="{{csrf_token()}}">

    @endsection @section('end')

    <script type="text/javascript">
        var table = $('#order_table').DataTable({
            responsive: {
                details: false
            },
            paging: false,
            sDom: '<"col-sm-12"f>'
        });

         function showComments(order) {
            var response = $.ajax({
                url: "http://deltafaucetrep.com/sub_order/" + order + "/notes",
                type: "GET",
                dataType: "html"
            });

            response.done(function(data) {
                $("#product_order_notes").html(data);
            });
        }


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
        
        function approveOrder(order) {
            var response = $.ajax({
                url: "http://deltafaucetrep.com/sub_order/approve/" + order,
                type: "get",
                dataType: 'json'
            });
            
            window.setTimeout(function () {
                window.location.reload();
            }, 500);
        }
        
        function reproveOrder(order) {
            var response = $.ajax({
                url: "http://deltafaucetrep.com/sub_order/reprove/" + order,
                type: "get",
                dataType: 'json'
            });
            
            window.setTimeout(function () {
                window.location.reload();
            }, 500);
        }
        
        $("#cancel-order-btn").click(function () {
            $.ajax({
                url: "http://deltafaucetrep.com/sub_order/reprove/{{$order->sub_order_id}}",
                type: "GET"
            });
            
            window.setTimeout(function () {
                window.location.reload();    
            }, 500);
        });
        
        $("#btn_send_emails").click(function () {
            $(".budget_email_to").each(function (key, value) {
                if (value.checked == true || $(value).attr('type') == 'text') {

                    var req = $.ajax({
                        url: 'http://deltafaucetrep.com/sub_order/send/{{$order->sub_order_id}}/to/' + $(value).val(),
                        type: 'GET',
                        dataType: 'text'
                    });

                    req.done(function (data) {
                        if(data == 1) {
                            alert("Pedido enviado para " + $(value).val() + " com sucesso!");
                        } else {
                            alert("Erro ao enviar pedido para " + $(value).val() + ", por favor tentar novamente. Se erro persistir, envie o pedido manulamente.");
                        }   
                    });
                }    
            });

            $("#sendOrdertModal").modal("toggle");
        });
    </script>

    @endsection