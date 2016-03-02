@extends('layouts.master') @section('title', 'Home') @section('content')

<div class="panel">
    <div class="panel">
        <div class="panel-heading">
            <strong><span class="panel-title">Pedido <span
                                id="budget_id">{{$order->order_id}}</span>:</span></strong>  <span id="budget_title">{{$order->title}}</span>
            
            <div class="panel-heading-controls">
                @if ($user->getUserType()->cod == 40 && ($order->order_status_id == 4 || $order->hasPendingProducts()))
                    <button style="margin-top:-4px;" data-toggle="modal" data-target="#discountCalculator" class="btn btn-primary btn-outline btn-flat"><span class="btn-label icon fa fa-calculator"></span></button>
                @endif
                <button style="margin-top:-4px;" data-toggle="modal" data-target="#sendOrderModal" class="btn btn-primary btn-outline btn-flat"><span class="btn-label icon fa fa-envelope"></span></button>
                <a target="_blank" href="http://deltafaucetrep.com/order/print/{{$order->order_id}}"><button style="margin-top:-4px;" class="btn btn-primary btn-outline btn-flat"><span class="btn-label icon fa fa-print"></span></button></a>
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
                                            <span>{{$order->representant()->user()->name . " " . $order->representant()->user()->surname}}</span>
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
                                            <span>{{$order->manager()->user()->name . " " . $order->manager()->user()->surname}}</span>
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
                                            <span>{{$order->manager()->user()->name . " " . $order->manager()->user()->surname}}</span>
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
                
                @elseif ($order->budget()->distribuitor() != null)
                
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
                                            <span>Delta Televendas</span>
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
                                            <textarea id="order_payment_details" rows="7" class="form-control" readonly value="{{$order->payment_details}}">{{$order->payment_details}}</textarea>
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
                                            <td>R$ <span id="budget_product_values">{{number_format($order->product_values, 2, ',', '.')}}</span>
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
                                            <td>R$ <span id="budget_grand_total">{{number_format($order->grand_total, 2, ',', '.')}}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </form>

                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <span class="panel-title">Produtos</span>

                                <div class="panel-heading-controls">
                                    @if ($user->getUserType()->cod == 20 && $order->order_status_id == 1)
                                    <div class="row">
                                        <button data-toggle="modal" data-target="#acceptOrderModalAlert" class="btn btn-success btn-xs btn-flat"><span class="btn-label icon fa fa-check"></span>
                                        </button>
                                        <button onclick="refuseOrder({{$order->order_id}})" class="btn btn-danger btn-xs btn-flat"><span class="btn-label icon fa fa-ban"></span>
                                        </button>
                                        <button id="btnEditOrder" class="btn btn-warning btn-xs btn-flat"><span class="btn-label icon fa fa-edit"></span>
                                        </button>
                                    </div>
                                    @elseif ($user->getUserType()->cod == 40 && ($order->order_status_id == 4 || $order->hasPendingProducts()))
                                    <div class="row">
                                        <button id="btnEditOrder" class="btn btn-warning btn-xs btn-flat"><span class="btn-label icon fa fa-edit"></span>
                                        </button>
                                    </div>
                                    @endif
                                </div>

                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table" id="order_table">
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Distribuidor</th>
                                                <th>SKU</th>
                                                <th>Qtd.</th>
                                                <th>Imagem</th>
                                                <th>Descrição</th>
                                                @if ($user->getUserType()->cod >= 20)
                                                    <th>Analise de Margem</th>
                                                @endif
                                                <th>Preço s/ Desconto (R$)</th>
                                                <th>Desconto</th>
                                                <th>Preço c/ Desconto (R$)</th>
                                                <th>Total R$</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($order->getProducts() as $p) 
                                            @if ($order->order_status_id == 5)
                                                @if($p->dist_approval == 'n')
                                                    <tr class="danger">
                                                @else
                                                    <tr class="success">
                                                @endif
                                             @else
                                                @if($p->approved == 'n')
                                                    <tr class="danger">
                                                @else
                                                    <tr class="success">
                                                @endif
                                             @endif
                                                       @if ($user->getUserType()->cod == 40 && ($order->order_status_id == 4 || $order->order_status_id == 5))
                                                       <td>
                                                           <div class="row" style="margin: 0 10px !important;">
                                                               @if ($p->hasComments())
                                                                   <button onclick="showComments({{$p->product_id}}, {{$order->order_id}}, {{$p->order_product_id}});" data-toggle="modal" data-target="#productOrderNotesModal" class="btn btn-info btn-xs btn-flat"><span class="btn-label icon fa fa-comments"></span>
                                                                   </button>
                                                               @else
                                                                   <button onclick="showComments({{$p->product_id}}, {{$order->order_id}}, {{$p->order_product_id}});" data-toggle="modal" data-target="#productOrderNotesModal" class="btn btn-outline btn-xs btn-flat"><span class="btn-label icon fa fa-comments"></span>
                                                                   </button>
                                                               @endif
                                                               @if ($p->dist_approval == 'n')
                                                                <button onclick="selectDistribuitor({{$p->order_product_id}})"  data-toggle="modal" data-target="#distribuitorProductPickerModal" class="btn btn-warning btn-xs btn-flat"><span class="btn-label icon fa fa-truck"></span>
                                                                </button>
                                                               @endif
                                                               <button onclick="splitProduct({{$p->order_product_id}})"  class="btn btn-primary btn-xs btn-flat">&nbsp;<span class="btn-label icon fa fa-bolt">&nbsp;</span>
                                                                </button>
                                                           </div>
                                                       </td>
                                                       @else
                                                        <td>
                                                            @if ($p->hasComments())
                                                                <button onclick="showComments({{$p->product_id}}, {{$order->order_id}});" data-toggle="modal" data-target="#productOrderNotesModal" class="btn btn-info btn-xs btn-flat"><span class="btn-label icon fa fa-comments"></span>
                                                                </button>
                                                            @else
                                                                <button onclick="showComments({{$p->product_id}}, {{$order->order_id}});" data-toggle="modal" data-target="#productOrderNotesModal" class="btn btn-outline btn-xs btn-flat"><span class="btn-label icon fa fa-comments"></span>
                                                                </button>
                                                            @endif
                                                       </td>
                                                       @endif
                                                        <td>{{$p->distribuitor_id == null ? "" : $p->distribuitor()->fantasy_name}}</td>
                                                        <td><a href="" onclick="productDetail({{$p->product_id}})" data-toggle="modal" data-target="#productDetailModal">{{trim($p->product()->sku)}}</a>
                                                        </td>
                                                        <td><span data-order-id="{{$order->order_id}}" data-product-id="{{$p->product_id}}" data-field-name="quantity" class="order_product_editable">{{$p->quantity}}</span></td>
                                                        <td>
                                                            <img src="http://dfc.scene7.com/is/image/DFC/{{trim(preg_replace('/\t+/', '', $p->product()->sku))}}-B1.tif?fmt=jpeg,rgb&wid=70&hei=51" />
                                                        </td>
                                                        <td>{{$p->product()->description_pt}}</td>
                                                        @if ($user->getUserType()->cod >= 20)
                                                            <td>{{$p->product()->margin_analysis == null ? "TBD" : number_format($p->product()->margin_analysis * 100, 2, ",", ".")}}</td>
                                                        @endif
                                                        <td>{{number_format($p->price_c_ipi, 2, ',', '.')}}</td>
                                                        <td><span data-order-id="{{$order->order_id}}" data-product-id="{{$p->product_id}}" data-field-name="discount" class="order_product_editable">{{$p->discount}}%</span></td>
                                                        <td>{{number_format($p->price_c_discount, 2, ',', '.')}}</td>
                                                        <td>{{number_format($p->total_price, 2, ',', '.')}}</td>
                                                    </tr>
                                                    @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td><strong>Total:</strong>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td><strong>{{collect($order->getProducts())->reduce(function ($carry, $item) { return $carry + $item->quantity; })}} </strong>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td><strong>{{number_format($order->allOrderMarginAnalysis() * 100, 2, ",", ".")}} %</strong></td>
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

                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <span class="panel-title">Observações do Representante</span>
                            </div>
                            <div class="panel-body">
                                <textarea id="budget_observation" readonly rows="8" class="form-control" value="{{$order->observation}}">{{$order->observation}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div  class="col-sm-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <span class="panel-title">Outras cobranças</span>
                            </div>
                            <div class="panel-body">
                                <!-- col-sm-6 -->
                                <div class="col-sm-12">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">Outro</label>
                                        <span id="budget_other_charges">{{number_format($order->other_charging, 2, ",", ".")}}</span>
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div  class="col-sm-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <span class="panel-title">Observações do Gerente</span>
                            </div>
                            @if ($user->getUserType()->cod == 20 && $order->order_status_id == 1)
                            <div class="panel-body">
                                <textarea id="order_manager_observation" rows="8" class="form-control" value="{{$order->manager_observation}}">{{$order->manager_observation}}</textarea>
                                <p class="help-block">Detalhe por que o pedido foi aprovado ou rejeitado.</p>
                            </div>
                            @else
                            <div class="panel-body">
                                <textarea id="order_manager_observation" readonly rows="8" class="form-control" value="{{$order->manager_observation}}">{{$order->manager_observation}}</textarea>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <span class="panel-title">Observações Finais</span>
                            </div>
                            <div class="panel-body">
                                
                                @if($user->getUserType()->cod == 40 && ($order->order_status_id == 4 || $order->order_status_id == 5))
                                <textarea id="final_observation"  rows="8" class="form-control" value="{{$order->final_observation}}">{{$order->final_observation}}</textarea>
                                @else
                                <textarea id="final_observation" readonly rows="8" class="form-control" value="{{$order->final_observation}}">{{$order->final_observation}}</textarea>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
    
                    @if($order->order_status_id == 5 || $order->order_status_id == 7)

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">Pedidos Destinados</span>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Pedido</th>
                                                    <th>Distribuidor</th>
                                                    <th>Valor Total</th>
                                                    <th>Comissão</th>
                                                    <th>Status</th>
                                                    <th>Enviado em</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($order->getSubOrders() as $o)
                                                <tr>
                                                    <td><a href="http://deltafaucetrep.com/sub_order/detail/{{$o->sub_order_id}}">{{$o->distribuitor()->delta_code . $o->order_id}}</td>
                                                    <td>{{$o->distribuitor()->company_name}}</td>
                                                    <td>{{$o->grand_total}}</td>
                                                    <td>{{$o->representant_fee}}</td>
                                                    <td>{{$o->getStatus()->description}}</td>
                                                    <td>{{$o->updated_at}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endif
            </div>
        </div>
    
        <div class="panel-footer">
            @if ($user->getUserType()->cod == 40)
                @if ($user->getUserType()->cod == 40 && ($order->order_status_id == 4 || $order->hasPendingProducts()))
                    <button id="end-order-btn" data-toggle="modal" data-target="#endOrderModal" class="btn btn-info btn-lg btn-flat">Destinar Pedidos</button>
                    <button data-toggle="modal" data-target="#approveOrderModal" class="btn btn-success btn-lg btn-flat">Finalizar Pedido</button>
                    <button data-toggle="modal" data-target="#reproveOrderModal" class="btn btn-danger btn-lg btn-flat">Reprovar Pedido</button>
                @elseif ($order->order_status_id == 5)
                    <button data-toggle="modal" data-target="#approveOrderModal" class="btn btn-success btn-lg btn-flat">Finalizar Pedido</button>
                    <button data-toggle="modal" data-target="#reproveOrderModal" class="btn btn-danger btn-lg btn-flat">Reprovar Pedido</button>
                @endif
            @endif    
        </div>
    </div>

    <div id="endOrderModal" class="modal fade" aria-hidden="true" style="display: none;">
        <div style="width:1000px;" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="end_order_body">
                    
                </div>
            </div>
            <!-- / .modal-content -->
        </div>
        <!-- / .modal-dialog -->
    </div>

    <div id="approveOrderModal" class="modal modal-alert modal-danger fade" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="fa fa-warning"></i>
                </div>
                <div class="modal-title">Atenção</div>
                <div class="modal-body">Ao finalizar este pedido, os interessados serão notificados e ele ficará bloqueado para edição. Deseja proseguir?</div>
                <div class="modal-footer">
                    <button onclick="endApproveOrder({{$order->order_id}})" type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
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
                <div class="modal-body">Ao reprovar este pedido o representante o gerente comercial serão notificados, deseja proseguir?</div>
                <div class="modal-footer">
                    <button onclick="reproveOrder({{$order->order_id}})" type="button" class="btn btn-success" data-dismiss="modal">OK</button>
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

    <div id="distribuitorProductPickerModal" class="modal fade">
        <div style="width:900px" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="product_dist_picker">
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>

    <div id="acceptOrderModalAlert" class="modal modal-alert modal-warning fade" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="fa fa-warning"></i>
                </div>
                <div class="modal-title">Atenção</div>
                <div class="modal-body">Ao aprovar este pedido ele será enviado para análise logística por parte da gerência comercial, deseja continuar?</div>
                <div class="modal-footer">
                    <button onclick="acceptOrder({{$order->order_id}})" type="button" class="btn btn-warning" data-dismiss="modal">OK</button>
                    <button type="button" class="btn btn" data-dismiss="modal">Fechar</button>
                </div>
            </div>
            <!-- / .modal-content -->
        </div>
        <!-- / .modal-dialog -->
    </div>

    <div id="distribuitorPricePolice" class="modal fade">
        <div style="width:900px" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="dist_price_police">
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>

     <div id="discountCalculator" class="modal modal-alert modal-info fade" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <i class="fa fa-calculator"></i>
                        </div>
                        <div class="modal-body">
                            <div class="col-sm-12">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Valor no Sistema</label>
                                    <input type="number" step="any" id="calculator_sys_value" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Valor Desejado</label>
                                    <input type="number" step="any" id="calculator_wanted_value" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Desconto à Aplicar</label>
                                    <input type="text" readonly id="calculator_discount" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / .modal-content -->
                </div>
                <!-- / .modal-dialog -->
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


    @endsection @section('end')

    <script type="text/javascript" src="http://static.deltafaucetrep.com/assets/javascripts/editable.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

    <script type="text/javascript">
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':'{!! csrf_token() !!}'
        }
    });
    </script>

    <script type="text/javascript">
        var table = $('#order_table').DataTable({
            responsive: {
                details: false
            },
            paging: false,
            sDom: '<"col-sm-12"f>'
        });

        function showComments(product, order) {
            var response = $.ajax({
                url: "http://deltafaucetrep.com/order/" + order + "/product/" + product + "/notes",
                type: "GET",
                dataType: "html"
            });

            response.done(function(data) {
                $("#product_order_notes").html(data);
            });
        }
        
        function openPricePolice(distribuitor) {
            var response = $.ajax({
                url: "http://deltafaucetrep.com/distribuitor/police/"+distribuitor+"/show",
                type: "GET",
                dataType: "html"
            });

            response.done(function(data) {
                $("#dist_price_police").html(data);
            });
        }
        
        function splitProduct(id) {
            $.ajax({
                url: "http://deltafaucetrep.com/order/" + id + "/split",
                type: "get",
                dataType: "json"
            });
            
            window.setTimeout(function () {
                window.location.reload();
            }, 100);
        }

        function acceptOrder(order) {
            var data = {};
            
            data._token = $("#_token").val();
            data.manager_observation  =  $("#order_manager_observation").val();
            
            var response = $.ajax({
                url: "http://deltafaucetrep.com/order/accept/" + order,
                type: "POST",
                data: data,
                dataType: "text"
            });

            window.setTimeout(function () {
                window.location.reload();
            }, 100);
        }
        
        function selectDistribuitor(order_product) {
             var response = $.ajax({
                url: "http://deltafaucetrep.com/order/product/" + order_product + "/distribuitor",
                type: "GET",
                dataType: "html"
            });

            response.done(function(data) {
                $("#product_dist_picker").html(data);
            });
        }
        
        function refuseOrder(order) {
            var data = {};
            
            data._token = $("#_token").val();
            data.manager_observation  =  $("#order_manager_observation").val();
            
            var response = $.ajax({
                url: "http://deltafaucetrep.com/order/refuse/" + order,
                type: "POST",
                dataType: "text"
            });

            window.setTimeout(function () {
                window.location.reload();
            }, 100);
        }
        
        function approveOrder(order) {
            var data = {};
            
            data._token = $("#_token").val();
            data.final_observation = $("#final_observation").val();
            
            var response = $.ajax({
                url: "http://deltafaucetrep.com/order/approve/" + order,
                type: "post",
                data: data,
                dataType: 'json'
            });
            
            window.setTimeout(function () {
                window.location.reload();
            }, 100);
        }
        
        function endApproveOrder(order) {
            
            var response = $.ajax({
                url: "http://deltafaucetrep.com/order/end_analysis/" + order,
                type: "get",
                dataType: 'json'
            });
            
            window.setTimeout(function () {
                window.location.reload();
            }, 100);   
        }
        
        function reproveOrder(order) {
            var data = {};
            
            data._token = $("#_token").val();
            data.final_observation = $("#final_observation").val();
            
            var response = $.ajax({
                url: "http://deltafaucetrep.com/order/reprove/" + order,
                type: "post",
                data: data,
                dataType: 'json'
            });
            
            window.location.href = "http://deltafaucetrep.com/order/ended/list";    
        }
        
        function selectDistribuitorProduct(order_product, dist) {
            var response = $.ajax({
                url: "http://deltafaucetrep.com/order/set_product/" + order_product + "/dist/" + dist,
                type: "get",
                dataType: "json"
            });
            
            response.success(function (data) {
                window.location.reload();
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
        
        $("#end-order-btn").click(function () {
            $.ajax({
                url: 'http://deltafaucetrep.com/order/{{$order->order_id}}/end',
                type: 'get',
                dataType: 'html'
            }).done(function (data) {
                $("#end_order_body").html(data);    
            });
        });
        
                
    $("#btn_send_emails").click(function () {
        $(".budget_email_to").each(function (key, value) {
            if (value.checked == true || $(value).attr('type') == 'text') {
                
                var req = $.ajax({
                    url: 'http://deltafaucetrep.com/order/send/{{$order->order_id}}/to/' + $(value).val(),
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

        
        $("#btnEditOrder").click(function () {
            $(this).removeClass("btn-warning");
            
            $(".order_product_editable").editInPlace({
                url: "#",
                callback: function (original_element, html, original) {
                    //console.log($(this).attr("data-product-id"));
                    
                    var req = $.ajax({
                        url: "http://deltafaucetrep.com/order/" + $(this).attr("data-order-id") + "/edit/product/" + $(this).attr("data-product-id") + "/" + $(this).attr("data-field-name") + "/to/" + html,
                        type: "get"
                    });
                    
                    req.error(function () {
                        alert("Error changing value to " + html);    
                    });
                    
                    if ($(this).attr("data-field-name") == "discount") {
                        return html + "%";
                    } else {
                        return html;
                    }
                }
            });       
        });
        
        var a = $("#calculator_sys_value");
        var b = $("#calculator_wanted_value");
        var c = $("#calculator_discount");

        function calculate() {
            if (a.val() != "" && b.val() != "") {
                c.val(((1 - (b.val() / a.val())) * 100).toFixed(4));
            }
        }

        a.change(calculate);
        b.change(calculate);
    </script>

    @endsection
