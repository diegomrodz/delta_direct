@extends('layouts.master') @section('title', 'Novo Orçamento') @section('content')
    <style type="text/css">
        .panel-body .row .no-margin-hr {
            margin-top: -10px;
        }

        table.dataTable thead .sorting: after {
            content: none;
            display: block;
        }

        table.dataTable thead .sorting_asc: after {
            content: none;
            display: block;
        }

        table.dataTable thead .sorting_desc: after {
            content: none;
            display: block;
        }

        .custom_budget_filter {
            margin-left: 10px;
            margin-top: 7px;
        }

        .custom_paging {
            margin-left: 10px;
            margin-top: 7px;
        }

        .custom_length_control {
            margin-left: 10px;
            margin-top: 7px;
            float: right;
        }

        .customer_table_row: hover {
            cursor: hand;
        }
    </style>

    <div class="panel" id="rep_budget">
        <div class="panel">
            <div class="panel-heading">
                <strong><span class="panel-title">Orçamento <span
                                id="budget_id">{{$budget->representant_budget_id}}</span>:</span></strong> <span
                        id="budget_title">{{$budget->title}}</span>
                
                <div class="panel-heading-controls">
                    <button style="margin-top:-4px;" data-toggle="modal" data-target="#discountCalculator" class="btn btn-primary btn-outline btn-flat"><span class="btn-label icon fa fa-calculator"></span></button>
                </div>

            </div>
            <div class="panel-body">
                <div class="row">

                    <div class="row">
                        <div class="col-sm-6">

                            <form action="" class="panel form-horizontal">
                                <div class="panel-heading">
                                    <span class="panel-title">Cliente</span>

                                    <div class="panel-heading-controls">
                                        @if (is_null($customer))
                                            <button id="btn_import_customer"
                                                    class="btn btn-primary btn-outline btn-flat" data-toggle="modal"
                                                    data-target="#importCustomerModal">Importar Cliente
                                            </button>
                                        @endif
                                    </div>
                                </div>
                                <ul class="list-group">
                                    <li style="margin-top:10px" class="list-group-item">
                                        <div class="row">
                                            <input type="hidden" id="customer_id"
                                                   value="{{ is_null($customer) ? "" : $customer->customer_id }}">

                                            <div class="col-sm-12">
                                                <div class="form-group no-margin-hr">
                                                    <strong>Razão Social:</strong>
                                                    <span id="customer_company_name">{{ is_null($customer) ? "" : $customer->company_name }}</span>
                                                </div>
                                            </div>
                                            <!-- col-sm-6 -->
                                            <div class="col-sm-12">
                                                <div class="form-group no-margin-hr">
                                                    <strong>CNPJ/CPF:</strong>
                                                    <span id="customer_cnpj">{{ is_null($customer) ? "" : $customer->cnpj }}</span>
                                                </div>
                                            </div>
                                            <!-- col-sm-6 -->
                                            <div class="col-sm-12">
                                                <div class="form-group no-margin-hr">
                                                    <strong>Endereço de Entrega:</strong>
                                                    <span id="customer_delivery_address">{{ is_null($customer) || is_null($customer->getDeliveryAddress()) ? "" : $customer->getDeliveryAddress()->text }}</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group no-margin-hr">
                                                    <strong>Endereço de Fatura:</strong>
                                                    <span id="customer_billing_address">{{ is_null($customer) || is_null($customer->getBillingAddress()) ? "" : $customer->getBillingAddress()->text }}</span>
                                                </div>
                                            </div>
                                            <!-- col-sm-6 -->
                                            <div class="col-sm-6">
                                                <div class="form-group no-margin-hr">
                                                    <strong>CEP:</strong>
                                                    <span id="customer_cep">{{ is_null($customer) || is_null($customer->getAddress()) ? "" : $customer->getAddress()->cep }}</span>
                                                </div>
                                            </div>
                                            <!-- col-sm-6 -->
                                            <div class="col-sm-6">
                                                <div class="form-group no-margin-hr">
                                                    <strong>UF:</strong>
                                                    <span id="customer_uf">{{ is_null($customer) || is_null($customer->getDeliveryAddress()) || is_null($customer->getDeliveryAddress()->uf()) ? "" : $customer->getDeliveryAddress()->uf()->uf . ", " . $customer->getDeliveryAddress()->city_text }}</span>
                                                </div>
                                            </div>
                                            <!-- col-sm-6 -->
                                            <div class="col-sm-6">
                                                <div class="form-group no-margin-hr">
                                                    <strong>Telefone:</strong>
                                                    <span id="customer_phone">{{ is_null($customer) ? "" : $customer->phone }}</span>
                                                </div>
                                            </div>
                                            <!-- col-sm-6 -->
                                            <div class="col-sm-6">
                                                <div class="form-group no-margin-hr">
                                                    <strong>Contato:</strong>
                                                    <span id="customer_contact_name">{{ is_null($customer) || is_null($customer->getBusinessContacts()) || count($customer->getBusinessContacts()) == 0 ? "" : $customer->getBusinessContacts()[0]->name }}</span>
                                                </div>
                                            </div>
                                            <!-- col-sm-6 -->
                                            <div class="col-sm-12">
                                                <div class="form-group no-margin-hr">
                                                    <strong>Email:</strong>
                                                    <span id="customer_email">{{ is_null($customer) ? "" : $customer->email }}</span>
                                                </div>
                                            </div>
                                            <!-- col-sm-6 -->
                                        </div>
                                        <!-- row -->
                                    </li>
                                    <li class="list-group-item">
                                        <div  class="row">
                                            <div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert">*</button>
                                                <strong>Atenção:</strong> Por favor não deixe de selecionar as seguintes informações
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group no-margin-hr">
                                                    
                                                  <label class="checkbox-inline" >
                                                        <input id="customer_accept_partial_delivery" type="checkbox" class="px">
                                                        <span class="lbl"><strong>Aceita entrega parcial</strong> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group no-margin-hr">
                                                    <label class="checkbox-inline">
                                                        <input id="customer_accept_different_expeditions" type="checkbox" class="px">
                                                        <span class="lbl"><strong>Aceita expedições diferentes</strong> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- col-sm-6 -->
                                            <div class="col-sm-12" style="margin-top:10px;">
                                                <div class="form-group no-margin-hr">
                                                    <strong>Contribuinte do ICMS:</strong>
                                                    @if (!is_null($customer))
                                                        <span id="customer_icms_taxpayer">{{ $customer->icms_taxpayer == 's' ? 'Sim' : $customer->icms_taxpayer == '?' ? 'Não Sei' : 'Não'  }}</span>
                                                    @else
                                                        <span id="customer_icms_taxpayer"></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- col-sm-6 -->
                                        </div>
                                    </li>
                                </ul>
                            </form>


                        </div>

                   @if ($user->getUserType()->cod == 10)
                        
                        <div class="col-sm-6">


                            <form action="" class="panel form-horizontal">
                                <div class="panel-heading">
                                    <span class="panel-title">Representante</span>
                                </div>
                                <div class="panel-body">
                                    <input type="hidden" id="representant_id"
                                           value="{{$user->representant()->representant_id}}">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group no-margin-hr">
                                                <label class="control-label">Nome:</label>
                                                <span>{{$user->name . " " . $user->surname}}</span>
                                            </div>
                                        </div>
                                        <!-- col-sm-6 -->
                                        <div style="margin-top: -10px;" class="col-sm-12">
                                            <div class="form-group no-margin-hr">
                                                <label class="control-label">Telefone:</label>
                                                <span>{{$user->representant()->phone}}</span>
                                            </div>
                                        </div>
                                        <!-- col-sm-6 -->
                                        <div style="margin-top: -10px;" class="col-sm-12">
                                            <div class="form-group no-margin-hr">
                                                <label class="control-label">Email:</label>
                                                <span>{{$user->email}}</span>
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
                                                <span>{{$user->representant()->manager()->user()->name . " " . $user->representant()->manager()->user()->surname}}</span>
                                            </div>
                                        </div>
                                        <!-- col-sm-6 -->
                                        <div style="margin-top: -10px;" class="col-sm-12">
                                            <div class="form-group no-margin-hr">
                                                <label class="control-label">Telefone:</label>
                                                <span>{{$user->representant()->manager()->phone}}</span>
                                            </div>
                                        </div>
                                        <!-- col-sm-6 -->
                                        <div style="margin-top: -10px;" class="col-sm-12">
                                            <div class="form-group no-margin-hr">
                                                <label class="control-label">Email:</label>
                                                <span>{{$user->representant()->manager()->user()->email}}</span>
                                            </div>
                                        </div>
                                        <!-- col-sm-6 -->
                                    </div>
                                    <!-- row -->

                                </div>
                            </form>
                            <!-- /9. $BLOCK_STYLED_FORM -->

                        </div>
                   
                   @elseif ($user->getUserType()->cod == 40)
                        
                        <div class="col-sm-6">


                            <form action="" class="panel form-horizontal">
                                <div class="panel-heading">
                                    <span class="panel-title">Representante</span>
                                </div>
                                <div class="panel-body">
                                    <input type="hidden" id="representant_id"
                                           value="null">

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

                   @elseif ($user->getUserType()->cod == 5)
                        
                        <div class="col-sm-6">


                            <form action="" class="panel form-horizontal">
                                <div class="panel-heading">
                                    <span class="panel-title">Vendedor</span>
                                </div>
                                <div class="panel-body">
                                    <input type="hidden" id="representant_id"
                                           value="null">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group no-margin-hr">
                                                <label class="control-label">Nome:</label>
                                                <span>{{$user->distribuitor()->user()->name}}</span>
                                            </div>
                                        </div>
                                        <!-- col-sm-6 -->
                                        <div style="margin-top: -10px;" class="col-sm-12">
                                            <div class="form-group no-margin-hr">
                                                <label class="control-label">Telefone:</label>
                                                <span>{{$user->distribuitor()->company_phone}}</span>
                                            </div>
                                        </div>
                                        <!-- col-sm-6 -->
                                        <div style="margin-top: -10px;" class="col-sm-12">
                                            <div class="form-group no-margin-hr">
                                                <label class="control-label">Email:</label>
                                                <span>{{$user->distribuitor()->user()->email}}</span>
                                            </div>
                                        </div>
                                        <!-- col-sm-6 -->
                                    </div>
                                    <!-- row -->

                                </div>
                            </form>

                        </div>
                        
                        
                   @elseif ($user->getUserType()->cod == 20)
                   
                        @if ($customer != null && $customer->representant() != null)
                             <div class="col-sm-6">

                                <form action="" class="panel form-horizontal">
                                    <div class="panel-heading">
                                        <span class="panel-title">Representante</span>
                                    </div>
                                    <div class="panel-body">
                                        <input type="hidden" id="representant_id"
                                               value="{{$customer->representant()->representant_id}}">

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">Nome:</label>
                                                    <span>{{$customer->representant()->user()->name . " " . $customer->representant()->user()->surname}}</span>
                                                </div>
                                            </div>
                                            <!-- col-sm-6 -->
                                            <div style="margin-top: -10px;" class="col-sm-12">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">Telefone:</label>
                                                    <span>{{$customer->representant()->user()->representant()->phone}}</span>
                                                </div>
                                            </div>
                                            <!-- col-sm-6 -->
                                            <div style="margin-top: -10px;" class="col-sm-12">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label">Email:</label>
                                                    <span>{{$customer->representant()->user()->email}}</span>
                                                </div>
                                            </div>
                                            <!-- col-sm-6 -->
                                        </div>
                                        <!-- row -->

                                    </div>
                                </form>

                              </div>
                        @endif

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
                                                <span>{{$user->name . " " . $user->surname}}</span>
                                            </div>
                                        </div>
                                        <!-- col-sm-6 -->
                                        <div style="margin-top: -10px;" class="col-sm-12">
                                            <div class="form-group no-margin-hr">
                                                <label class="control-label">Telefone:</label>
                                                <span>{{$user->manager()->phone}}</span>
                                            </div>
                                        </div>
                                        <!-- col-sm-6 -->
                                        <div style="margin-top: -10px;" class="col-sm-12">
                                            <div class="form-group no-margin-hr">
                                                <label class="control-label">Email:</label>
                                                <span>{{$user->email}}</span>
                                            </div>
                                        </div>
                                        <!-- col-sm-6 -->
                                    </div>
                                    <!-- row -->

                                </div>
                            </form>
                            <!-- /9. $BLOCK_STYLED_FORM -->

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
                                                <label class="control-label">Tipo de Pedido: </label>
                                                @if(!is_null($customer) && !is_null($customer->getType()))
                                                    @if($customer->getType()->customer_type_id == 1 || $customer->getType()->customer_type_id == 2 || $customer->getType()->customer_type_id == 3)
                                                        <span id="budget_type">Revenda</span>
                                                    @elseif ( $customer->getType()->customer_type_id == 7 )
                                                        <span id="budget_type">Consumidor</span>
                                                    @elseif($customer->getType()->customer_type_id == 4 || $customer->getType()->customer_type_id == 5 || $customer->getType()->customer_type_id == 6 || $customer->getType()->customer_type_id == 8 || $customer->getType()->customer_type_id == 9)
                                                        <span id="budget_type">Construtora</span>
                                                    @endif
                                                @else
                                                    <span id="budget_type"></span>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- col-sm-6 -->
                                        <div class="col-sm-12">
                                            <div class="form-group no-margin-hr">
                                                <label class="control-label">Condição de Pagamento</label>
                                                <select id="budget_payment_condition"
                                                        style="margin-bottom:0px !important"
                                                        class="form-control form-group-margin">
                                                    @if ($customer == null)
                                                        @foreach($budget->getAllPaymentConditions() as $b)
                                                            <option value="{{$b->representant_budget_payment_condition_id}}">{{$b->description}}</option>
                                                        @endforeach
                                                    @elseif ($customer->creditAnalysis() == null || $customer->creditAnalysis()->customer_credit_analysis_range_id == 1 || $customer->creditAnalysis()->customer_credit_analysis_range_id == null)
                                                        <option value="1">NEGOCIADO - VIDE OBS</option>
                                                        <option value="2">ANTECIPADO</option>
                                                    @else
                                                        @foreach($budget->getAllPaymentConditions() as $b)
                                                            <option value="{{$b->representant_budget_payment_condition_id}}">{{$b->description}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group no-margin-hr">
                                                <label class="control-label">Detalhes do Pagamento</label>
                                                <textarea id="budget_payment_details" rows="6"
                                                          class="form-control"></textarea>
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
                                                    <span id="budget_created_at">{{ date_format($budget->created_at, "d/m/Y") }}</span>
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
                                                    @if ($budget->is_draft)
                                                        <a id="budget_status" href="#" class="label">Salvo como
                                                            rascunho</a>
                                                    @endif
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
                                            <td><strong>Valor do Produto</strong>
                                            </td>
                                            <td>R$ <span id="budget_product_values">0,00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Financeiro</strong>
                                            </td>
                                            <td>R$ <span id="interest_rate">0,00</span>
                                            </td>
                                        </tr>    
                                        <tr>
                                            <td><strong>Outras cobranças</strong>
                                            </td>
                                            <td>R$ <span id="other_fees">0,00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Valor Total</strong>
                                            </td>
                                            <td>R$ <span id="budget_grand_total">0,00</span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </form>

                        </div>

                    </div>

                </div>

                <div class="row">
                    <div style="padding:0px;" class="col-sm-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <span class="panel-title">Produtos</span>

                                <div style="margin-right:-11px;" class="panel-heading-controls">
                                    <button style="margin-top:-4px;" data-toggle="modal" data-target="#discountCalculator" class="btn btn-primary btn-outline btn-flat"><span class="btn-label icon fa fa-calculator"></span></button>
                                    <button class="btn btn-labeled btn-success" data-toggle="modal"
                                            data-target="#addProductModal"><span
                                                class="btn-label icon fa fa-plus"></span>Inserir
                                    </button>
                                    <button class="btn btn-labeled btn-danger" id="btn_budget_remove_products"><span
                                                class="btn-label icon fa fa-times"></span>Remover
                                    </button>
                                </div>

                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table" id="budgets_table">
                                        <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>SKU</th>
                                            <th>Qtd.</th>
                                            <th>Imagem</th>
                                            <th>Descrição</th>
                                            <th>Preço s/ IPI (R$)</th>
                                            <th>IPI</th>
                                            <th>Preço c/ IPI (R$)</th>
                                            <th><a href="#" id="budget_discount" data-type="text">Desconto</a></th>
                                            <th>Total R$</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td><strong>Total:</strong>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
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
                    <div style="padding:0px;" class="col-sm-12">
                        <div class="note note-danger">
                            <h4 class="note-title">Importante</h4>
                            PREÇOS COM IPI, EMBALAGEM, ICMS DE ACORDO COM CLASSIFICAÇÃO FISCAL - NCM, <strong>NÃO
                                CONSIDERA SUBSTITUIÇÃO TRIBUTÁRIA</strong> - FINANCEIRO PROPORCIONAL A CONDIÇÃO DE
                            PAGAMENTO. PARA COMPRAS PARCELADAS OS IMPOSTOS SERÃO COBRADOS NA PRIMEIRA PARCELA. APÓS A
                            CONFERÊNCIA
                            E RECEBIMENTO DAS MERCADORIAS NÃO SERÃO ACEITAS DEVOLUÇÕES DE PRODUTOS, CUJOS MOTIVOS NÃO
                            SEJAM DE NOSSA RESPONSABILIDADE. PRAZO DE ENTREGA CONTARÁ APÓS A APROVAÇÃO DO PEDIDO PELA
                            DELTA FAUCET - PEDIDO SUJEITO A ANÁLISE DE CREDITO.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div style="padding-left:0px;" class="col-sm-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <span class="panel-title">Observações</span>
                            </div>
                            <div class="panel-body">
                                <textarea id="budget_observation" rows="8" class="form-control"></textarea>

                                <p class="help-block">Detalhes sobre entrega, pagamento, cliente, etc.</p>
                            </div>
                        </div>
                    </div>

                    <div style="padding-right:0px;" class="col-sm-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <span class="panel-title">Outras cobranças</span>
                            </div>
                            <div class="panel-body">
                                <!-- col-sm-6 -->
                                <div class="col-sm-12">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">Outro</label>
                                        <input id="budget_other_charges" type="number"
                                               name="lastname" class="form-control">
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div style="padding:0px;" class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <button id="btn_save_draft" class="btn btn-flat btn-lg btn-warning"><span class="btn-label icon fa "></span>Salvar Orçamento</button>
                                <button id="btn_end_budget" class="btn btn-flat btn-lg btn-success"><span class="btn-label icon fa "></span>Processar Pedido</button>
                            </div>
                        </div>
                        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                    </div>
                </div>
            </div>
        </div>

        <div id="addProductModal" class="modal fade">
            <div style="width:900px" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Adicionar Produto</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="panel">
                                <div class="table-responsive">
                                    <table class="table" id="results_table">
                                        <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>SKU</th>
                                            <th>Imagem</th>
                                            <th>Descrição</th>
                                            <th>Preço Unit. R$</th>
                                        </tr>
                                        </thead>
                                        <tbody>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button id="btn_table_search_add" type="button" class="btn btn-primary">Adicionar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div id="importCustomerModal" class="modal fade">
            <div style="width:900px" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Clientes</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="panel">
                                <div class="table-responsive">
                                    <table class="table" id="customer_table">
                                        <thead>
                                        <tr>
                                            <th>Cod</th>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>Telefone</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                       
                                        @if ($user->getUserType()->cod == 10)    
                                            
                                        @foreach($user->representant()->getPortfolio() as $p)
                                            <tr>
                                                <td>{{$p->getCustomer()->customer_id}}</td>
                                                <td><a href="#"
                                                       onclick="customerDetail({{$p->getCustomer()->customer_id}})">{{$p->getCustomer()->fantasy_name}}
                                                </td>
                                                <td>{{$p->getCustomer()->email}}</td>
                                                <td>{{$p->getCustomer()->phone}}</td>
                                            </tr>
                                        @endforeach
                                            
                                        @elseif ($user->getUserType()->cod == 20)
                                        
                                                @foreach($user->manager()->getPortfolio() as $p)
                                                <tr>
                                                    <td>{{$p->getCustomer()->customer_id}}</td>
                                                    <td><a href="#"
                                                           onclick="customerDetail({{$p->getCustomer()->customer_id}})">{{$p->getCustomer()->fantasy_name}}
                                                    </td>
                                                    <td>{{$p->getCustomer()->email}}</td>
                                                    <td>{{$p->getCustomer()->phone}}</td>
                                                </tr>
                                                @endforeach
                                        
                                            
                                        @elseif ($user->getUserType()->cod == 5)
                                        
                                                @foreach($user->distribuitor()->getPortfolio() as $p)
                                                <tr>
                                                    <td>{{$p->customer_id}}</td>
                                                    <td><a href="#"
                                                           onclick="customerDetail({{$p->customer_id}})">{{$p->fantasy_name}}
                                                    </td>
                                                    <td>{{$p->email}}</td>
                                                    <td>{{$p->phone}}</td>
                                                </tr>
                                                @endforeach
                                        
                                            
                                        @else
                                        
                                              @foreach($user->getAllCustomers() as $p)
                                                <tr>
                                                    <td>{{$p->customer_id}}</td>
                                                    <td><a href="#"
                                                           onclick="customerDetail({{$p->customer_id}})">{{$p->fantasy_name}}
                                                    </td>
                                                    <td>{{$p->email}}</td>
                                                    <td>{{$p->phone}}</td>
                                                </tr>
                                                @endforeach
                                        
                                            
                                        @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div id="productDetailModal" class="modal fade">
            <div style="width:900px" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
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

        <div id="ui-error-alert" class="modal modal-alert modal-danger fade" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <i class="fa fa-times-circle"></i>
                    </div>
                    <div class="modal-title">Erro!</div>
                    <div class="modal-body">Houve um erro no envio de seu formulário. Tente enviá-lo novamente. Caso o
                        erro persista, por favor, consultar nosso suporte tecnico.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
                    </div>
                </div>
                <!-- / .modal-content -->
            </div>
            <!-- / .modal-dialog -->
        </div>

        <div id="ui-warning-budget" class="modal modal-alert modal-warning fade" aria-hidden="true"
             style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <i class="fa fa-warning"></i>
                    </div>
                    <div class="modal-title">Atenção</div>
                    <div class="modal-body">
                        <strong>Não deixe de verificar se as definições de entrega parcial e expedições diferentes estão corretas!</strong>
                        
                        <br>
                        Seu orçamento será enviado para ser analisado por seu gerente de vendas.
                        Deseja proseguir?
                    </div>
                    <div class="modal-footer">
                        <button id="btnSendBudgetForApproval" type="button" class="btn btn-success">Sim</button>
                        <button onclick="window.location.href = 'http://deltafaucetrep.com/budget/list';" type="button" class="btn btn-error" data-dismiss="modal">Não</button>
                    </div>
                </div>
                <!-- / .modal-content -->
            </div>
            <!-- / .modal-dialog -->
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
        
        <div id="loadingModal"  data-backdrop="static" data-keyboard="false" class="modal modal-alert modal-info fade" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <i id="loadingSpinner" class="fa fa-spinner fa-pulse"></i>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <span>Carregado informações de produtos<span id="loadingSight"></span></span>
                        </div>
                        <br><br>
                        <div class="row">
                            <span>O tempo de espera é proporcional a velocidade de sua conexão. Caso esteja demorando mais do que 3 minutos
                            por favor entre em contato com a Delta.</span>
                        </div>
                        <br><br>
                    </div>
                </div>
                <!-- / .modal-content -->
            </div>
            <!-- / .modal-dialog -->
        </div>

        @endsection

        @section('end')
        
            <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
            <script type="text/javascript"
                    src="http://static.deltafaucetrep.com/assets/javascripts/editable.js"></script>

            <script type="text/javascript">
                $("#loadingModal").modal("toggle");
                
                
                function getInterestRate() {
                    var paymentCondition = $("#budget_payment_condition").val();
                    
                    if (paymentCondition == 1 || paymentCondition == 2 || paymentCondition == 4) {
                        return 0;
                    } else if (paymentCondition == 3) {
                        return 0.26;
                    } else if (paymentCondition == 5 || paymentCondition == 8 || paymentCondition == 10) {
                        return 1.03;
                    } else if (paymentCondition == 6) {
                        return 0.51;
                    } else if (paymentCondition == 7 || paymentCondition == 12) {
                        return 1.54;
                    } else if (paymentCondition == 9 || paymentCondition == 11 || paymentCondition == 14) {
                        return 2.06;
                    } else if (paymentCondition == 13) {
                        return 2.59;
                    } else if (paymentCondition == 3.11) {
                        return 3.11;
                    }
                }
                
                $(document).ready(function () {
                    var req = $.ajax({
                        url: 'http://deltafaucetrep.com/product/portfolio/brazil',
                        type: 'GET',
                        dataType: 'json',
                        crossDomain: true,
                        xhrFields: {
                            withCredentials: true
                        }
                    });
                    
                    req.error(function () {
                        alert("Houve um erro no sistema! Entre em contato com a Delta para que o problema seja resolvido o quanto antes.");
                        $("#loadingModal").modal("toggle");
                        window.location.reload();
                    });
                    
                    req.done(function (data) {
                        var table = $('#results_table').DataTable({
                            responsive: {
                                details: false
                            },
                            bProcessing: true,
                            bDeferRender: true,
                            pagingType: 'simple',
                            lengthMenu: [5, 10, 20],
                            sDom: '<"custom_budget_filter col-xs-3"f><"custom_paging col-xs-3"p><"custom_length_control col-xs-2"l>',

                            language: {
                                paginate: {
                                    previous: "Anterior",
                                    next: "Próxima"
                                }    
                            },
                            
                            createdRow: function (row, data, index) {
                                $('td', row).eq(0).html("").append(data[0]);
                                $('td', row).eq(1).html("").append(data[1]);
                                $('td', row).eq(2).html("").append(data[2]);
                                $('td', row).eq(4).html("").append(data[4]);
                            }
                        });

                        for (var i = 0; i < data.length; i += 1) {
                            var row = [];

                            var item = $(document.createElement("input"));

                            item.val(data[i]["product_id"]);
                            item.attr("type", "checkbox");
                            item.attr("class", "px table_product_check");

                            row.push(item);

                            row.push(data[i]["sku"].trim());

                            var a = $(document.createElement("a"));
                            
                            a.attr("onclick", "productDetail(" + data[i]["product_id"] + ");");
                            a.attr("data-toggle", "modal");
                            a.attr("data-target", "#productDetailModal");
                            a.attr("style", "cursor: pointer;");

                            var img = $(document.createElement("img"));

                            img.attr("src", "http://dfc.scene7.com/is/image/DFC/" + data[i]["sku"].trim() + "-B1.tif?fmt=jpeg,rgb&wid=70&hei=51");

                            a.append(img);
                            
                            row.push(a);

                            row.push(data[i]["description_pt"]);

                            var span1 = $(document.createElement("span"));

                            span1.attr("style", "display:none");
                            span1.attr("class", "search_table_resale_price");
                            span1.text(data[i]["product_resale_price_value_c_ipi"]);

                            var span2 = $(document.createElement("span"));

                            span2.attr("style", "display:none");
                            span2.attr("class", "search_table_consumer_price");
                            span2.text(data[i]["product_consumer_price_value_c_ipi"]);

                            var span3 = $(document.createElement("span"));

                            span3.attr("style", "display:inline");
                            span3.attr("class", "search_table_builder_price");
                            span3.text(data[i]["product_builder_price_value_c_ipi"]);

                            var div = $(document.createElement("div"));

                            div.append(span1);
                            div.append(span2);
                            div.append(span3);

                            row.push(div);

                            table.row.add(row);
                        }
                        table.draw();
                        
                        $("#loadingModal").modal("toggle");
                        
                        setTimeout(function () {$("#budget_type").trigger("change");},100);
                    });

                    $('#budgets_table').DataTable({
                        responsive: {
                            details: false
                        },

                        createdRow: function (row, data, index) {
                            $('td', row).eq(2).html('<span class="edit_quantity">' + products[index].budget_quantity + '</span>');
                            $('td', row).eq(1).html('<a href="" onclick="productDetail(' + products[index].product.product_id + ')" data-toggle="modal" data-target="#productDetailModal">' + data[1].trim() + '</a>');
                            $('td', row).eq(3).html('<img width="70" height="51" src="http://dfc.scene7.com/is/image/DFC/' + data[1].trim() + '-B1.tif?fmt=jpeg,rgb&wid=476&hei=350" />');
                            $('td', row).eq(0).html('<input value="' + products[index].product.product_id + '" type="checkbox" class="px budget_product_check">');

                            $('td', row).eq(8).html('<span class="edit_discount">' + products[index].budget_discount + '%</span>');

                            $('td', row).eq(8).editInPlace({
                                url: "#",
                                callback: function (original_element, html, original) {
                                    var grandTotal = 0;

                                    products[index].budget_discount = parseFloat(html, 10).toFixed(4);

                                    if (isNaN(products[index].budget_discount)) {
                                        products[index].budget_discount = 0;
                                    }
                                    
                                    if ($("#budget_type").text() == "Revenda") {
                                        $('td', row).eq(9).text((products[index].budget_quantity * (products[index].resale_price.value_c_ipi * (1 - (products[index].budget_discount / 100)))).toFixed(2));
                                    } else if ($("#budget_type").text() == "Consumidor") {
                                        $('td', row).eq(9).text((products[index].budget_quantity * (products[index].consumer_price.value_c_ipi * (1 - (products[index].budget_discount / 100)))).toFixed(2));
                                    } else {
                                        $('td', row).eq(9).text((products[index].budget_quantity * (products[index].builder_price.value_c_ipi * (1 - (products[index].budget_discount / 100)))).toFixed(2));
                                    }

                                    for (var j = 0; j < products.length; j += 1) {
                                        if ($("#budget_type").text() == "Revenda") {
                                            grandTotal += (products[j].budget_quantity * (products[j].resale_price.value_c_ipi * (1 - (products[j].budget_discount / 100) )));
                                        } else if ($("#budget_type").text() == "Consumidor") {
                                            grandTotal += (products[j].budget_quantity * (products[j].consumer_price.value_c_ipi * (1 - (products[j].budget_discount / 100) )));
                                        } else {
                                            grandTotal += (products[j].budget_quantity * (products[j].builder_price.value_c_ipi * (1 - (products[j].budget_discount / 100) )));
                                        }
                                    }


                                    $($('#budgets_table').DataTable().column(9).footer()).html('<strong>' + grandTotal.toFixed(2) + '</strong>');
                                    $("#interest_rate").text((grandTotal * (getInterestRate()/100)).toFixed(2));

                                    $("#budget_product_values").text(grandTotal.toFixed(2));
                                    $("#budget_grand_total").text((parseFloat($("#interest_rate").text(),10) + parseFloat($("#other_fees").text(), 10) + parseFloat($("#budget_product_values").text(), 10)).toFixed(2));

                                    return products[index].budget_discount + "%";
                                }
                            });

                            $('td', row).eq(2).editInPlace({
                                url: "#",
                                callback: function (original_element, html, original) {
                                    var quantityTotal = 0, grandTotal = 0;

                                    products[index].budget_quantity = parseInt(html, 10);

                                    if ($("#budget_type").text() == "Revenda") {
                                        $('td', row).eq(9).text((products[index].budget_quantity * (products[index].resale_price.value_c_ipi * (1 - (products[index].budget_discount / 100) ))).toFixed(2));
                                    } else if ($("#budget_type").text() == "Consumidor") {
                                        $('td', row).eq(9).text((products[index].budget_quantity * (products[index].consumer_price.value_c_ipi * (1 - (products[index].budget_discount / 100) ))).toFixed(2));
                                    } else {
                                        $('td', row).eq(9).text((products[index].budget_quantity * (products[index].builder_price.value_c_ipi * (1 - (products[index].budget_discount / 100) ))).toFixed(2));
                                    }

                                    for (var i = 0; i < products.length; i += 1) {
                                        quantityTotal += products[i].budget_quantity;
                                    }

                                    $($('#budgets_table').DataTable().column(2).footer()).html('<strong>' + quantityTotal + '</strong>');

                                    for (var j = 0; j < products.length; j += 1) {
                                        if ($("#budget_type").text() == "Revenda") {
                                            grandTotal += (products[j].budget_quantity * (products[j].resale_price.value_c_ipi * (1 - (products[j].budget_discount / 100) )));
                                        } else if ($("#budget_type").text() == "Consumidor") {
                                            grandTotal += (products[j].budget_quantity * (products[j].consumer_price.value_c_ipi * (1 - (products[j].budget_discount / 100) )));
                                        } else {
                                            grandTotal += (products[j].budget_quantity * (products[j].builder_price.value_c_ipi * (1 - (products[j].budget_discount / 100) )));
                                        }
                                    }


                                    $($('#budgets_table').DataTable().column(9).footer()).html('<strong>' + grandTotal.toFixed(2) + '</strong>');

                                    $("#budget_product_values").text(grandTotal.toFixed(2));
                                    
                                    $("#interest_rate").text((grandTotal * (getInterestRate()/100)).toFixed(2));
                                    
                                    $("#budget_grand_total").text((parseFloat($("#interest_rate").text(),10) + parseFloat($("#other_fees").text(), 10) + parseFloat($("#budget_product_values").text(), 10)).toFixed(2));

                                    return products[index].budget_quantity;
                                }
                            });
                        },

                        footerCallback: function (row, data, start, end, display) {
                            var api = this.api(), i = 0, j = 0, quantityTotal = 0, grandTotal = 0, price_s_ipi_total = 0;

                            for (i = 0; i < products.length; i += 1) {
                                quantityTotal += products[i].budget_quantity;
                            }

                            for (j = 0; j < products.length; j += 1) {
                                if ($("#budget_type").text() == "Revenda") {
                                    grandTotal += (products[j].budget_quantity * (products[j].resale_price.value_c_ipi * (1 - (products[j].budget_discount / 100) )));
                                } else if ($("#budget_type").text() == "Consumidor") {
                                    grandTotal += (products[j].budget_quantity * (products[j].consumer_price.value_c_ipi * (1 - (products[j].budget_discount / 100) )));
                                } else {
                                    grandTotal += (products[j].budget_quantity * (products[j].builder_price.value_c_ipi * (1 - (products[j].budget_discount / 100) )));
                                }
                            }
                            
                            $(api.column(2).footer()).html('<strong>' + quantityTotal + '</strong>');
                            $(api.column(9).footer()).html('<strong>' + grandTotal.toFixed(2) + '</strong>');

                            $("#budget_product_values").text(grandTotal.toFixed(2));
                            
                            $("#interest_rate").text((grandTotal * (getInterestRate()/100)).toFixed(2));
                                    
                            $("#budget_grand_total").text((parseFloat($("#interest_rate").text(),10) + parseFloat($("#other_fees").text(), 10) + parseFloat($("#budget_product_values").text(), 10)).toFixed(2));

                        },

                        paging: false,
                        sDom: '<"col-sm-12"f>'
                    });
                    
                    $('#customer_table').DataTable({
                        responsive: {
                            details: false
                        },
                        pagingType: 'simple',
                        lengthMenu: [5, 10, 20],
                        sDom: '<"custom_budget_filter col-xs-3"f><"custom_paging col-xs-3"p><"custom_length_control col-xs-2"l>'
                    });
                    $('#portfolio_table').DataTable({
                        responsive: {
                            details: false
                        },
                        pagingType: 'simple',
                        lengthMenu: [5, 10, 20],
                        sDom: '<"custom_budget_filter col-xs-3"f><"custom_paging col-xs-3"p><"custom_length_control col-xs-2"l>'
                    });
                    
                });

                var fields = {
                    customer: {
                        customer_id: $("#customer_id"),
                        cnpj: $("#customer_cnpj"),
                        company_name: $("#customer_company_name"),
                        delivery_address: $("#customer_delivery_address"),
                        billing_address: $("#customer_billing_address"),
                        cep: $("#customer_cep"),
                        uf: $("#customer_uf"),
                        phone: $("#customer_phone"),
                        contact_name: $("#customer_contact_name"),
                        email: $("#customer_email"),
                        accept_partials: $("#customer_accept_partial_delivery"),
                        accept_different_expeditions: $("#customer_accept_different_expeditions"),
                        icms_taxpayer: $("#customer_icms_taxpayer")
                    },
                    representant: {
                        representant_id: $("#representant_id")
                    },
                    budget: {
                        budget_id: $("#budget_id"),
                        title: $("#budget_title"),
                        type: $("#budget_type"),
                        payment_condition: $("#budget_payment_condition"),
                        details: $("#budget_payment_details"),
                        created_at: $("#budget_created_at"),
                        validity: $("#budget_validity"),
                        status: $("#budget_status"),
                        product_values: $("#budget_product_values"),
                        interest_rate: $("#interest_rate"),
                        other_fees: $("#other_fees"),
                        grand_total: $("#budget_grand_total"),
                        observation: $("#budget_observation"),
                        other_charges: $("#budget_other_charges")
                    }
                };

                var products = [];
                var productCounter = 0;

                var ajaxController = (function () {
                    var counter = 0;
                    var calls = [];

                    function next() {
                        counter += 1;
                    }

                    function reset() {
                        counter = 0;
                        calls = [];
                    }

                    function fire() {
                        if (counter < calls.length) {
                            return calls[counter]();
                        }

                        drawProducts();
                        reset();
                    }

                    function add(fn) {
                        calls.push(fn);
                    }

                    return {
                        next: next,
                        reset: reset,
                        fire: fire,
                        add: add
                    };
                }())
                
                @if ($customer == null)
                    $("#btn_save_draft").prop("disabled", true);
                    $("#btn_end_budget").prop("disabled", true);
                @endif

                function customerDetail(id) {
                    var response = $.ajax({
                        url: "http://deltafaucetrep.com/customer/find/" + id,
                        type: "GET",
                        dataType: "json"
                    });
                    
                    $("#btn_save_draft").prop("disabled", false);
                    $("#btn_end_budget").prop("disabled", false);

                    response.done(function (data) {

                        fields.customer.company_name.text(data.customer.company_name);
                        fields.customer.cnpj.text(data.customer.cnpj);
                        fields.customer.cep.text(data.address.cep);
                        fields.customer.phone.text(data.customer.phone);
                        fields.customer.email.text(data.customer.email);
                        fields.customer.icms_taxpayer.text(data.customer.icms_taxpayer == 's' ? "Sim" : data.customer.icms_taxpayer == '?' ? "Indefinido" : "Não");
                        fields.customer.delivery_address.text(data.delivery_address.text);
                        fields.customer.billing_address.text(data.billing_address.text);
                        fields.customer.customer_id.val(data.customer.customer_id);

                        if (data.credit_analysis == "0" || data.credit_analysis.customer_credit_analysis_range_id == 1) {
                            $("#budget_payment_condition option:gt(1)").remove();
                        }
                            
                        fields.budget.title.text(data.customer.company_name);

                        if (data.customer_type.customer_type_id == 1 || data.customer_type.customer_type_id == 2 || data.customer_type.customer_type_id == 3 || data.customer_type.customer_type_id == 7) {

                            $("#budget_type_resale").show();
                            
                            if (data.customer_type.customer_type_id == 7) {
                                $("#budget_type_resale").text("Revenda");
                            }
                            
                        } else {
                            $("#budget_type_resale").hide();
                        }

                        if (data.customer_type.customer_type_id == 4 || data.customer_type.customer_type_id == 5 || data.customer_type.customer_type_id == 6 || data.customer_type.customer_type_id == 9) {
                            $("#budget_type").text("Construtora");
                        } else if (data.customer_type.customer_type_id == 7) {
                            $("#budget_type").text("Consumidor");
                        } else {
                            $("#budget_type").text("Revenda");
                        }

                        if (data.business_contacts.length > 0) {
                            fields.customer.contact_name.text(data.business_contacts[0].name);
                        }

                        fields.customer.uf.text(data.state.uf);

                        $("#importCustomerModal").modal("toggle");
                        $("#budget_type").trigger("change");
                    });
                }

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

                function addProduct(id) {

                    return function () {
                        var req = $.ajax({
                            url: "http://deltafaucetrep.com/product/find/" + id,
                            type: 'GET',
                            dataType: 'json'
                        });

                        req.done(function (data) {
                            products.push(data);
                            ajaxController.next();
                            ajaxController.fire();
                        });
                    }
                }

                function drawProducts() {
                    var table = $('#budgets_table').DataTable(), grandTotal = 0;

                    for (; productCounter < products.length; productCounter += 1) {
                        var row = [];

                        if (!products[productCounter]["budget_quantity"]) {
                            products[productCounter]["budget_quantity"] = 1;
                        }

                        if (!products[productCounter]["budget_discount"]) {
                            products[productCounter]["budget_discount"] = 0.0;
                        }

                        row.push("");
                        row.push(products[productCounter]["product"]["sku"]);
                        row.push(products[productCounter]["budget_quantity"]);
                        row.push("");
                        row.push(products[productCounter]["product"]["description_pt"]);

                        if ($("#budget_type").text() == "Revenda") {
                            row.push(products[productCounter]["resale_price"]["value_s_ipi"]);
                        } else if ($("#budget_type").text() == "Consumidor") {
                            row.push(products[productCounter]["consumer_price"]["value_c_ipi"]);
                        } else {
                            row.push(products[productCounter]["builder_price"]["value_s_ipi"]);
                        }

                        row.push((parseFloat(products[productCounter]["product"]["ipi"], 10) * 100).toFixed(2) + "%");

                        if ($("#budget_type").text() == "Revenda") {
                            row.push(products[productCounter]["resale_price"]["value_c_ipi"]);
                        } else if ($("#budget_type").text() == "Consumidor") {
                            row.push(products[productCounter]["consumer_price"]["value_c_ipi"]);
                        } else {
                            row.push(products[productCounter]["builder_price"]["value_c_ipi"]);
                        }

                        row.push(parseFloat((products[productCounter]["budget_discount"])).toFixed(4) + "%");

                        if ($("#budget_type").text() == "Revenda") {
                            row.push((products[productCounter]["budget_quantity"] * (products[productCounter]["resale_price"]["value_c_ipi"] * (1 - (products[productCounter].budget_discount / 100)))).toFixed(2));
                        } else if ($("#budget_type").text() == "Consumidor") {
                            row.push((products[productCounter]["budget_quantity"] * (products[productCounter]["consumer_price"]["value_c_ipi"] * (1 - (products[productCounter].budget_discount / 100)))).toFixed(2));
                        } else {
                            row.push((products[productCounter]["budget_quantity"] * (products[productCounter]["builder_price"]["value_c_ipi"] * (1 - (products[productCounter].budget_discount / 100)))).toFixed(2));
                        }

                        table.row.add(row).draw();
                        table.columns.adjust().draw();
                    }

                    for (var j = 0; j < products.length; j += 1) {
                        if ($("#budget_type").text() == "Revenda") {
                            grandTotal += (products[j].budget_quantity * (products[j].resale_price.value_c_ipi * (1 - (products[j].budget_discount / 100))));
                        } else if ($("#budget_type").text() == "Consumidor") {
                            grandTotal += (products[j].budget_quantity * (products[j].consumer_price.value_c_ipi * (1 - (products[j].budget_discount / 100))));
                        } else {
                            grandTotal += (products[j].budget_quantity * (products[j].builder_price.value_c_ipi * (1 - (products[j].budget_discount / 100))));
                        }
                    }

                    $("#budget_product_values").text(grandTotal.toFixed(2));

                    $("#interest_rate").text((grandTotal * (getInterestRate()/100)).toFixed(2));
                    $("#budget_grand_total").text((parseFloat($("#interest_rate").text(),10) + parseFloat($("#other_fees").text(), 10) + parseFloat($("#budget_product_values").text(), 10)).toFixed(2));
                }


                $("#btn_budget_remove_products").click(function () {
                    var table = $('#budgets_table').DataTable();

                    $(".budget_product_check").each(function (key, value) {
                        if (value.checked == true) {
                            var id = $(this).val(), index = -1, i = 0;

                            for (i = 0; i < products.length; i += 1) {
                                if (products[i].product.product_id === id) {
                                    index = i;
                                    break;
                                }
                            }

                            products.splice(index, 1);
                        }
                    });

                    table.clear().draw();

                    productCounter = 0;
                    drawProducts();
                });

                $("#btnSendBudgetForApproval").click(function () {
                    var req = $.ajax({
                        url: 'http://deltafaucetrep.com/order/save/' + fields.budget.budget_id.text(),
                        type: 'GET'
                    });
                    
                    req.success(function (data) {
                        $("#ui-warning-budget").modal("toggle");
                        
                        window.location.href = "http://deltafaucetrep.com/budget/finished/list";
                    });
                    
                    req.error(function () {
                        $("#ui-warning-budget").modal("toggle");    
                    
                        $("#ui-error-alert").modal("toggle");
                    });
                });

                $("#btn_end_budget").click(function () {
                    var data = {};

                    data.budget_id = fields.budget.budget_id.text();
                    data.customer_id = fields.customer.customer_id.val();
                    data.representant_id = fields.representant.representant_id.val();

                    data.budget_title = fields.budget.title.text();
                    data.customer_accept_partials = fields.customer.accept_partials[0].checked ? 's' : 'n';
                    data.customer_different_expeditions = fields.customer.accept_different_expeditions[0].checked ? 's' : 'n';

                    data.budget_payment_condition = fields.budget.payment_condition.val();
                    data.budget_payment_details = fields.budget.details.val();

                    data.budget_product_values = fields.budget.product_values.text();
                    data.budget_interest_rate = fields.budget.interest_rate.text();
                    data.budget_grand_total = fields.budget.grand_total.text();
                    data.budget_other_charges = fields.budget.other_charges.val();

                    data.budget_observations = fields.budget.observation.val();

                    data.budget_products = [];

                    for (var i = 0; i < products.length; i += 1) {
                        var product = {};

                        product.product_id = products[i].product.product_id;
                        product.budget_quantity = products[i].budget_quantity;
                        product.budget_discount = products[i].budget_discount;

                        if ($("#budget_type").text() == "Revenda") {
                            product.price_s_ipi = products[i].resale_price.value_s_ipi;
                            product.price_c_ipi = products[i].resale_price.value_c_ipi;
                            product.price_c_discount = (parseFloat(product.price_c_ipi, 10) * (1 - (parseFloat(product.budget_discount, 10) / 100))).toFixed(2);
                            product.total_price = product.price_c_discount * product.budget_quantity;
                        } else if ($("#budget_type").text() == "Consumidor") {
                            product.price_s_ipi = products[i].consumer_price.value_s_ipi;
                            product.price_c_ipi = products[i].consumer_price.value_c_ipi;
                            product.price_c_discount = (parseFloat(product.price_c_ipi, 10) * (1 - (parseFloat(product.budget_discount, 10) / 100))).toFixed(2);
                            product.total_price = product.price_c_discount * product.budget_quantity;
                        } else {
                            product.price_s_ipi = products[i].builder_price.value_s_ipi;
                            product.price_c_ipi = products[i].builder_price.value_c_ipi;
                            product.price_c_discount = (parseFloat(product.price_c_ipi, 10) * (1 - (parseFloat(product.budget_discount, 10) / 100))).toFixed(2);
                            product.total_price = product.price_c_discount * product.budget_quantity;
                        }

                        data.budget_products.push(product);
                    }

                    data._token = $("#_token").val();

                    var req = $.ajax({
                        url: 'http://deltafaucetrep.com/budget/new',
                        data: data,
                        type: 'POST'
                    });

                    req.done(function (data) {
                        $("#ui-warning-budget").modal("toggle");
                    });

                    req.error(function () {
                        $("#ui-error-alert").modal("toggle");
                    });
                });

                $("#btn_save_draft").click(function () {
                    var data = {};

                    data.budget_id = fields.budget.budget_id.text();
                    data.customer_id = fields.customer.customer_id.val();
                    data.representant_id = fields.representant.representant_id.val();

                    data.budget_title = fields.budget.title.text();
                    data.customer_accept_partials = fields.customer.accept_partials[0].checked ? 's' : 'n';
                    data.customer_different_expeditions = fields.customer.accept_different_expeditions[0].checked ? 's' : 'n';

                    data.budget_payment_condition = fields.budget.payment_condition.val();
                    data.budget_payment_details = fields.budget.details.val();

                    data.budget_product_values = fields.budget.product_values.text();
                    data.budget_grand_total = fields.budget.grand_total.text();
                    data.budget_interest_rate = fields.budget.interest_rate.text();
                    data.budget_other_charges = fields.budget.other_charges.text();

                    data.budget_observations = fields.budget.observation.val();

                    data.budget_products = [];

                    for (var i = 0; i < products.length; i += 1) {
                        var product = {};

                        product.product_id = products[i].product.product_id;
                        product.budget_quantity = products[i].budget_quantity;
                        product.budget_discount = products[i].budget_discount;

                        if ($("#budget_type").text() == "Revenda") {
                            product.price_s_ipi = products[i].resale_price.value_s_ipi;
                            product.price_c_ipi = products[i].resale_price.value_c_ipi;
                            product.price_c_discount = (parseFloat(product.price_c_ipi, 10) * (1 - (parseFloat(product.budget_discount, 10) / 100))).toFixed(2);
                            product.total_price = product.price_c_discount * product.budget_quantity;
                        } else if ($("#budget_type").text() == "Consumidor") {
                            product.price_s_ipi = products[i].consumer_price.value_s_ipi;
                            product.price_c_ipi = products[i].consumer_price.value_c_ipi;
                            product.price_c_discount = (parseFloat(product.price_c_ipi, 10) * (1 - (parseFloat(product.budget_discount, 10) / 100))).toFixed(2);
                            product.total_price = product.price_c_discount * product.budget_quantity;
                        } else {
                            product.price_s_ipi = products[i].builder_price.value_s_ipi;
                            product.price_c_ipi = products[i].builder_price.value_c_ipi;
                            product.price_c_discount = (parseFloat(product.price_c_ipi, 10) * (1 - (parseFloat(product.budget_discount, 10) / 100))).toFixed(2);
                            product.total_price = product.price_c_discount * product.budget_quantity;
                        }

                        data.budget_products.push(product);
                    }

                    data._token = $("#_token").val();

                    var req = $.ajax({
                        url: 'http://deltafaucetrep.com/budget/new',
                        data: data,
                        type: 'POST'
                    });

                    req.success(function () {
                        window.location.href = "http://deltafaucetrep.com/budget/list";
                    });

                    req.error(function () {
                        $("#ui-error-alert").modal("toggle");
                    });
                });

                $("#budget_architect_fee").change(function () {
                    $('#budgets_table').DataTable().draw();
                });

                $("#budget_other_charges").change(function () {
                    $("#other_fees").text(parseFloat($("#budget_other_charges").val(), 10).toFixed(2));

                    $("#budget_grand_total").text((parseFloat($("#other_fees").text(), 10) + parseFloat($("#budget_product_values").text(), 10)).toFixed(2));
                });

                $("#btn_table_search_add").click(function () {
                    $(".table_product_check").each(function (key, value) {
                        if (value.checked == true) {

                            ajaxController.add(addProduct($(value).val()));

                            value.checked = false;
                        }
                    });

                    ajaxController.fire();

                    $("#addProductModal").modal("hide");
                });

                $("#budget_type_resale").click(function () {
                    if ($(this).text() == "Revenda") {
                        $("#budget_type").text("Revenda");
                        $("#budget_type").trigger("change");
                        $(this).text("Consumidor");
                    } else {
                        $("#budget_type").text("Consumidor");
                        $("#budget_type").trigger("change");
                        $(this).text("Revenda");
                    }
                });
                
                $("#btn_send_email").click(function () {
                    var req = $.ajax({
                        url: 'http://deltafaucetrep.com/budget/email/' + fields.customer.customer_id.val()
                    })    
                });

                $("#budget_type").change(function () {
                    var table = $('#budgets_table').DataTable();
                    
                    if ($(this).text() == "Consumidor") {
                        $(".search_table_consumer_price").show();
                        $(".search_table_resale_price").hide();
                        $(".search_table_builder_price").hide();
                        
                        table.column(5).visible(false);
                        table.column(6).visible(false);
                    } else if ($(this).text() == "Revenda") {
                        $(".search_table_consumer_price").hide();
                        $(".search_table_resale_price").show();
                        $(".search_table_builder_price").hide();
                        
                        table.column(5).visible(true);
                        table.column(6).visible(true);
                    } else {
                        $(".search_table_consumer_price").hide();
                        $(".search_table_resale_price").hide();
                        $(".search_table_builder_price").show();
                        
                        table.column(5).visible(true);
                        table.column(6).visible(true);
                    }
                });
                
                $("#budget_payment_condition").change(function () {
                    drawProducts();
                });
                
                $('#budget_discount').editable({
                       type: 'text',
                       pk: 1,
                       name: 'budget_discount',
                       title: 'Aplicar desconto'
                }).on('shown', function (e, editable) {
                      editable.input.$input.val(0);
                }).on('save', function (e, params) {
                    var table = $('#budgets_table').DataTable();
                    
                    for (var i = 0; i < products.length; i += 1) {
                        products[i].budget_discount = params.newValue;
                    }
                    
                    $(".edit_discount").each(function(index, value) {
                        $(value).text(params.newValue);
                    });
                    
                    table.clear();
                    
                    productCounter = 0;
                    drawProducts();
                    
                    params.newValue = "Desconto";
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