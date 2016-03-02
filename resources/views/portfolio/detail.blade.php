@extends('layouts.master') @section('title', 'Carteira de Clientes') @section('content')

<div class="row">
    <div class="col-sm-12">

        <!-- 5. $DEFAULT_TABLES ============================================================================

		Default tables
-->
        <div class="panel">
            <input type="hidden" id="customer_id" value="{{$customer->customer_id}}">
            <input type="hidden" id="_token" value="{{ csrf_token() }}">

            <div class="panel-heading">
                <span class="panel-title"><strong>{{$customer->customer_id . " - " . $customer->company_name}}</strong></span>
                <div class="panel-heading-controls">
                    <button id="btn_new_budget" class="btn btn-success btn-xs">Novo Orçamento</button>
                    @if ($user->hasCustomer($customer->customer_id))
                    <button class="btn btn-flat btn-xs btn-info" data-toggle="modal" data-target="#credit-analysis-req"><span class="btn-label icon fa "></span>Solicitar Análise de Crédito</button>
                    @endif
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="panel">
                                <div class="panel-heading">
                                    <span class="panel-title">Dados do cliente</span>
                                </div>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td><strong>Razão Social:</strong>
                                            </td>
                                            <td id="company_name" class="customer_attr">{{$customer->company_name}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nome Fantasia:</strong>
                                            </td>
                                            <td id="fantasy_name" class="customer_attr">{{$customer->fantasy_name}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tipo de Cliente:</strong>
                                            </td>
                                            <td id="customer_type_id" class="customer_type_attr">{{is_null($customer->getType()) ? "" : $customer->getType()->name}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>CNPJ/CPF:</strong>
                                            </td>
                                            <td id="cnpj" class="customer_attr">{{$customer->cnpj}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>IE:</strong>
                                            </td>
                                            <td id="ie" class="customer_attr">{{$customer->ie}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Cidade:</strong>
                                            </td>
                                            <td><span id="city_text" class="customer_attr">{{$customer->city_text}}</span>, <span id="state_id" class="customer_state_attr">{{$customer->getState()->uf}}</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Endereço:</strong>
                                            </td>
                                            <td id="text" class="customer_address_attr">{{ is_null($customer->getAddress()) ? "" : $customer->getAddress()->text}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Bairro:</strong>
                                            </td>
                                            <td id="district" class="customer_address_attr">{{is_null($customer->getAddress()) ? "" : $customer->getAddress()->district}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>CEP:</strong>
                                            </td>
                                            <td id="cep" class="customer_address_attr">{{is_null($customer->getAddress()) ? "" : $customer->getAddress()->cep}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Telefone:</strong>
                                            </td>
                                            <td id="phone" class="customer_attr">{{$customer->phone}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email:</strong>  <a href="mailto:{{$customer->email}}"><span class="btn-label icon fa fa-envelope-o"></span></a>
                                            </td>
                                            <td id="email" class="customer_attr">{{$customer->email}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Skype:</strong>
                                            </td>
                                            <td id="skype" class="customer_attr">{{$customer->skype}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Sede Própria:</strong>
                                            </td>
                                            <td id="own_seat" class="customer_own_seat_attr">{{($customer->own_seat === 's') ? "Sim" : "Não"}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Contribuinte do ICMS:</strong>
                                            </td>
                                            <td id="icms_taxpayer" class="customer_icms_attr">{{$customer->icms_taxpayer == 's' ? "Sim" : ($customer->icms_taxpayer == 'n' ? "Não" : "Indefinido")}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Faturamento Anual:</strong>
                                            </td>
                                            <td id="annual_income" class="customer_attr">R$ {{$customer->annual_income}}</td>
                                        </tr>
                                    </tbody>
                               </table>
                            </div>
                        </div>

                        @if (! is_null($customer->representant()))
                        <div class="col-sm-6">


                            <form action="" class="panel form-horizontal">
                                <div class="panel-heading">
                                    <span class="panel-title">Gerente</span>
								</div>
                                	<table class="table">
                                        <tr>
                                            <td><strong>Nome:</strong>
                                            </td>
                                            <td><a href="http://deltafaucetrep.com/profile/{{$customer->representant()->manager()->user()->user_id}}/detail">{{$customer->representant()->manager()->user()->name . " " . $customer->representant()->manager()->user()->surname}}</a></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Telefone:</strong>
                                            </td>
                                            <td>{{$customer->representant()->manager()->phone}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email:</strong>
                                            </td>
                                            <td><a href="mailto:{{$customer->representant()->manager()->user()->email}}">{{$customer->representant()->manager()->user()->email}}</a></td>
                                        </tr>
                                    </table>
                            </form>

                        </div>

                        <div class="col-sm-6">


                            <form action="" class="panel form-horizontal">
                                <div class="panel-heading">
                                    <span class="panel-title">Representante</span>
									
								</div>
                                    <table class="table">
                                        <tr>
                                            <td><strong>Nome:</strong>
                                            </td>
                                            <td>{{$customer->representant()->company()->name}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Telefone:</strong>
                                            </td>
                                            <td>{{$customer->representant()->phone}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email:</strong>
                                            </td>
                                            <td><a href="mailto:{{$customer->representant()->user()->email}}">{{$customer->representant()->user()->email}}</a></td>
                                        </tr>
                                    </table>
                            </form>

                        </div>

                        @else @if ($user->getUserType()->cod == 40)

                        <div class="col-sm-6">


                            <form action="" class="panel form-horizontal">
                                <div class="panel-heading">
                                    <span class="panel-title">Atribuir Representante</span>
                                </div>
                                <div class="atr_rep_div">
                                    <table id="atr_rep_table" class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Cod</th>
                                                <th>Nome</th>
                                                <th>Representação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($user->getAllRepresentants() as $td)
                                            <tr>
                                                <td>
                                                    <input data-rep-id="{{$td->representant_id}}" type="checkbox" class="atr_rep_to_customer" name="atr_rep_to_customer" />
                                                </td>
                                                <td>{{$td->representant_id}}</td>
                                                <td>{{$td->user()->name . " " . $td->user()->surname}}</td>
                                                <td>{{$td->company()->name}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="panel-footer">
                                    <div class="row">
                                        <button style="float:right;" id="btn_atr_rep" type="button" class="btn btn-info btn-md">Atribuir</button>
                                    </div>
                                </div>
                            </form>

                        </div>

                        @endif @endif @if ($user->getUserType()->cod != 5) @if (! is_null($customer->creditAnalysis())) @if ($customer->creditAnalysis()->customer_credit_analysis_status_id == 3)
                        <div class="col-sm-6">
                            <form action="" class="panel form-horizontal">
                                <div class="panel-heading">
                                    <span class="panel-title">Análise de Crédito</span>
                                </div>
                                <div style="padding-top:9px;" class="panel-body">
                                    <table class="table">
                                        <tr>
                                            <th>Limite Aprovado:</th>
                                            <td>{{$customer->creditAnalysis()->getRange()->description}}</td>
                                        </tr>
                                        <tr>
                                            <th>Observação:</th>
                                            <td>{{$customer->creditAnalysis()->observation}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </form>
                        </div>
                        @else
                        <div class="col-sm-6">
                            <form action="" class="panel form-horizontal">
                                <div class="panel-heading">
                                    <span class="panel-title">Análise de Crédito</span>

                                    <div class="panel-heading-controls">
                                        <button onclick="openRepAnalysisConversation({{$customer->creditAnalysis()->customer_credit_analysis_id}})" data-toggle="modal" data-target="#repAnalysisConversationModal" class="btn btn-info  btn-flat"><span class="btn-label icon fa fa-comments"></span>
                                        </button>
                                    </div>
                                </div>
                                <div style="padding-top:9px;" class="panel-body">
                                    <span>Em andamento...</span>
                                </div>
                            </form>
                        </div>
                        @endif @endif @endif

                        </form>


                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="panel">
                                <div class="panel-heading">
                                    <span class="panel-title">Endereço de entrega</span>
                                    
                                    <div class="panel-heading-controls">
                                        @if ($user->hasCustomer($customer->customer_id))
                                        <button id="btn_copy_delivery_address" title="Copiar endereço cliente" class="btn btn-primary btn-outline btn-flat"><i class="fa fa-copy"></i>
                                        </button>
                                        @endif
                                    </div>
                                </div>
                                <table class="table">
                                        <tr>
                                            <td><strong>Cidade:</strong>
                                            </td>
                                            <td><span id="city_text" class="customer_delivery_attr">{{is_null($customer->getDeliveryAddress()) ?  "" :  $customer->getDeliveryAddress()->city_text}}</span>, <span id="state_id" class="customer_delivery_uf_attr">{{$customer->getDeliveryAddress()->uf() == null ? "N.I" : $customer->getDeliveryAddress()->uf()->uf}}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Endereço:</strong>
                                            </td>
                                            <td id="text" class="customer_delivery_attr">{{ is_null($customer->getDeliveryAddress()) ? "" : $customer->getDeliveryAddress()->text}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Bairro:</strong>
                                            </td>
                                            <td id="district" class="customer_delivery_attr">{{ is_null($customer->getDeliveryAddress()) ? "" : $customer->getDeliveryAddress()->district}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>CEP:</strong>
                                            </td>
                                            <td id="cep" class="customer_delivery_attr">{{ is_null($customer->getDeliveryAddress()) ? "" : $customer->getDeliveryAddress()->cep}}</td>
                                        </tr>
                                    </table>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="panel">
                                <div class="panel-heading">
                                    <span class="panel-title">Endereço de cobrança</span>
                                    
                                    <div class="panel-heading-controls">
                                        @if ($user->hasCustomer($customer->customer_id))
                                        <button id="btn_copy_billing_address" title="Copiar endereço cliente" class="btn btn-primary btn-outline btn-flat"><i class="fa fa-copy"></i>
                                        </button>
                                        @endif
                                    </div>
                                </div>
                                <table class="table">
                                        <tr>
                                            <td><strong>Cidade:</strong>
                                            </td>
                                            <td><span id="city_text" class="customer_billing_attr">{{is_null($customer->getBillingAddress()) ?  "" :  $customer->getBillingAddress()->city_text}}</span>, <span id="state_id" class="customer_billing_uf_attr">{{$customer->getBillingAddress()->uf() == null ? "N.I" : $customer->getBillingAddress()->uf()->uf}}</span>
                                        </tr>
                                        <tr>
                                            <td><strong>Endereço:</strong>
                                            </td>
                                            <td id="text" class="customer_billing_attr">{{is_null($customer->getBillingAddress()) ? "" : $customer->getBillingAddress()->text}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Bairro:</strong>
                                            </td>
                                            <td id="district" class="customer_billing_attr">{{is_null($customer->getBillingAddress()) ? "" : $customer->getBillingAddress()->district}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>CEP:</strong>
                                            </td>
                                            <td id="cep" class="customer_billing_attr">{{is_null($customer->getBillingAddress()) ? "" : $customer->getBillingAddress()->cep}}</td>
                                        </tr>
                                    </table>
                            </div>
                        </div>

                    </div>

					<div class="row">
						<div class="col-sm-12">
							<div class="panel">
								<div class="panel-heading">
									<span class="panel-title">Pessoas Relacionadas</span>
									
									@if ($user->hasCustomer($customer->customer_id))
										<div class="panel-heading-controls">
											<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addNewPeopleRelated"><span class="btn-label icon fa fa-plus"></span>
											</button>
										</div>
                                    @endif
								</div>
								<table class="table">
									<thead>
										<tr>
											<th>#</th>
											<th>Nome</th>
											<th>Email</th>
											<th>Telefone</th>
											<th>Departamento/Função</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($customer->getAllPeopleRelated() as $people)
											<tr>
												<td></td>
												<td><a onclick="influencerDetail({{$people['entity_id']}})">{{$people["name"] . " " . $people["surname"]}}</a></td>
												<td>{{$people["email"]}}</td>
												<td>{{$people["phone"]}}</td>
												<td>{{$people["dept"]}}</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>

                    <div class="row">

                        <div class="col-sm-6">
                            <div class="panel">
                                <div class="panel-heading">
                                    <span class="panel-title">Principais Fornecedores</span>
                                    @if ($user->hasCustomer($customer->customer_id))
                                    <div class="panel-heading-controls">
                                        <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addMainProvider"><span class="btn-label icon fa fa-plus"></span>
                                        </button>
                                    </div>
                                    @endif
                                </div>
                                <div class=panel-body>
                                    <div class="panel-group" id="main-provider-acc">

                                        @foreach($customer->getMainProviders() as $c)

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#main-provider-acc" href="#collapse-pf-{{$c->customer_main_provider_id}}">
                                                    {{$c->name}}
                                                </a>
                                            </div>
                                            <!-- / .panel-heading -->
                                            <div id="collapse-pf-{{$c->customer_main_provider_id}}" class="panel-collapse collapse" style="height: 0px;">
                                                    <table class="table">
                                                        <tr>
                                                            <td><strong>Email:</strong><a href="mailto:{{$c->email}}"><span style="margin-left:5px;" class="btn-label icon fa fa-envelope-o"></span></a>
                                                            </td>
                                                            <td data-mp-id="{{$c->customer_main_provider_id}}" id="email" class="customer_main_provider_attr">{{$c->email}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Telefone:</strong>
                                                            </td>
                                                            <td data-mp-id="{{$c->customer_main_provider_id}}" id="phone" class="customer_main_provider_attr">{{$c->phone}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Empresa:</strong>
                                                            </td>
                                                            <td data-mp-id="{{$c->customer_main_provider_id}}" id="company" class="customer_main_provider_attr">{{$c->company}}</td>
                                                        </tr>
                                                    </table>
                                            </div>
                                            <!-- / .collapse -->
                                        </div>
                                        <!-- / .panel -->

                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="panel">
                                <div class="panel-heading">
                                    <span class="panel-title">Dados Bancários</span>
                                    @if ($user->hasCustomer($customer->customer_id))
                                    <div class="panel-heading-controls">
                                        <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addBankAccount"><span class="btn-label icon fa fa-plus"></span>
                                        </button>
                                    </div>
                                    @endif

                                </div>
                                <div class=panel-body>
                                    <div class="panel-group" id="bank-accounts-acc">

                                        @foreach($customer->getBankAccounts() as $c)

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#bank-accounts-acc" href="#collapse-sp-{{$c->customer_bank_account_id}}">
                                                            {{$c->bank}}
                                                        </a>
                                            </div>
                                            <!-- / .panel-heading -->
                                            <div id="collapse-sp-{{$c->customer_bank_account_id}}" class="panel-collapse collapse" style="height: 0px;">
                                                    <table class="table">
                                                        <tr>
                                                            <td><strong>Agência:</strong>
                                                            </td>
                                                            <td id="email" class="customer_bank_attr">{{$c->agency}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Conta Corrente:</strong>
                                                            </td>
                                                            <td id="email" class="customer_bank_attr">{{$c->number}}</td>
                                                        </tr>
                                                    </table>
                                            </div>
                                            <!-- / .collapse -->
                                        </div>
                                        <!-- / .panel -->

                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                        <div class="row">

                    @if ($user->getUserType()->cod == 20 || $user->getUserType()->cod == 40)
                            <div class="col-sm-6">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">Informações Internas</span>
                                    </div>
                                    <table class="table">
                                            <tr>
                                                <td><strong>Status:</strong>
                                                </td>
                                                <td id="so_status" class="customer_status_attr">{{$customer->getStatus() == null ? "" : $customer->getStatus()->description}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Canal:</strong>
                                                </td>
                                                <td id="so_channel" class="customer_channel_attr">{{$customer->getChannel() == null ? "" : $customer->getChannel()->description}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Segmento:</strong>
                                                </td>
                                                <td id="so_segment" class="customer_segment_attr">{{$customer->getSegment() == null ? "" : $customer->getSegment()->name}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Região:</strong>
                                                </td>
                                                <td id="so_region" class="customer_region_attr">{{$customer->getRegion() == null ? "" : $customer->getRegion()->description}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Classificação Oficial:</strong>
                                                </td>
                                                <td id="so_official_classification" class="customer_official_classification_attr">{{$customer->getOfficialClassification() == null ? "" : $customer->getOfficialClassification()->name}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Classificação Potencial:</strong>
                                                </td>
                                                <td id="so_official_classification" class="customer_potential_classification_attr">{{$customer->getPotentialClassification() == null ? "" : $customer->getPotentialClassification()->name}}</td>
                                            </tr>
                                        </table>
                                </div>
                            </div>
                        @endif
                            
                            <div class="col-sm-6">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">Análises de Crédito Anteriores</span>
                                    </div>
                                    <div id="tb_previous_cas">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Status</th>
                                                    <th>Solicitante</th>
                                                    <th>Limite Aprovado</th>
                                                    <th>Criado em</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($customer->allCreditAnalysis() as $ca)
                                                <tr>
                                                    <td><a href="http://deltafaucetrep.com/customer/credit_analysis/{{$ca->customer_credit_analysis_id}}">{{$ca->getStatus()->description}}</a></td>
                                                    @if ($ca->representant_id != null)
                                                        <td><a href="http://deltafaucetrep.com/profile/{{$ca->representant()->user()->user_id}}">{{$ca->representant()->user()->name . " ". $ca->representant()->user()->surname}}</a></td>
                                                    @elseif ($ca->manager_id != null)
                                                        <td><a href="http://deltafaucetrep.com/profile/{{$ca->manager()->user()->user_id}}">{{$ca->manager()->user()->name . " ". $ca->manager()->user()->surname}}</a></td>
                                                    @else
                                                        <td><a href="http://deltafaucetrep.com/profile/2/detail">Delta</a></td>
                                                    @endif
                                                    <td>{{$ca->getRange() == null ? "Sob Analise" : $ca->getRange()->description}}</td>
                                                    <td>{{$ca->created_at}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                @if ($user->getUserType()->cod != 5)
                    <div class="row">
                        <div class="col-sm-12">
                        <div class="panel widget-chat">
                            <div class="panel-heading">
                                <span class="panel-title"><i class="panel-title-icon fa fa-comment"></i>Anotações</span>
                            </div>
                            <!-- / .panel-heading -->
                            <div class="panel-body" id="customerNotes">

                                @foreach($customer->notes() as $note)
                                
                                    @if ($user->getUserType()->cod == 10)
                                        @if ($user->user_id == $note->user_id)
                                            <div class="message {{$note->user_id != $user->user_id ?: 'right'}}">
                                                <img src="{{$note->user()->avatar_path == null ? "http://static.deltafaucetrep.com/assets/demo/avatars/1.jpg" : $note->user()->avatar_path}}" alt="" class="message-avatar">
                                                <div class="message-body">
                                                    <div class="message-heading">
                                                        <a href="http://deltafaucetrep.com/profile/{{$note->user_id}}/detail" title="">{{$note->user()->name . " " . $note->user()->surname}}</a>:
                                                        <span class="pull-right">{{date_format(date_create($note->created_at), "d/m/Y")}}</span>
                                                    </div>
                                                    <div class="message-text">
                                                        {{$note->text}}
                                                    </div>
                                                </div>
                                                <!-- / .message-body -->
                                            </div>
                                         @endif
                                    @else
                                            <div class="message {{$note->user_id != $user->user_id ?: 'right'}}">
                                                <img src="{{$note->user()->avatar_path == null ? "http://static.deltafaucetrep.com/assets/demo/avatars/1.jpg" : $note->user()->avatar_path}}" alt="" class="message-avatar">
                                                <div class="message-body">
                                                    <div class="message-heading">
                                                        <a href="http://deltafaucetrep.com/profile/{{$note->user_id}}/detail" title="">{{$note->user()->name . " " . $note->user()->surname}}</a>:
                                                        <span class="pull-right">{{date_format(date_create($note->created_at), "d/m/Y")}}</span>
                                                    </div>
                                                    <div class="message-text">
                                                        {{$note->text}}
                                                    </div>
                                                </div>
                                                <!-- / .message-body -->
                                            </div>
                                    @endif
                                
                                @endforeach

                            </div>
                            <!-- / .panel-body -->
                            <form class="panel-footer chat-controls">
                                <div class="chat-controls-input">
                                    <textarea id="customerNoteText" rows="1" class="form-control" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 32px;"></textarea>
                                </div>
                                <button id="customerNoteSend" class="btn btn-primary chat-controls-btn">Send</button>
                            </form>
                            <!-- / .panel-footer -->
                        </div>
                        </div>
                    </div>
                @endif
                
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <span class="panel-title"><i class="panel-title-icon fa fa-file-archive-o"></i>Arquivos</span>
                                    
                                    <div class="panel-heading-controls">
                                        <button data-target="#sendFilesModal" data-toggle="modal" class="btn btn-success btn-xs">Enviar Arquivo</button>
                                    </div>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
																					  <th>#</th>
                                            <th>Nome do Arquivo</th>
                                            <th>Descrição</th>
                                            <th>Enviado Por</th>
                                            <th>Adicionado Em</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach ($customer->getFiles() as $file) 
                                            <tr>
																							  <td>{{$file->cloud_file_id}}</td>
                                                <td><a target="_blank" href="http://static.deltafaucetrep.com/{{$file->directory()->dir_path}}/{{$customer->customer_id}}/{{$file->filename}}">{{$file->filename}}</a></td>
                                                <td>{{$file->description}}</td>
                                                <td><a href="http://deltafaucetrep.com/profile/{{$file->user()->user_id}}/detail">{{$file->user()->name . " " . $file->user()->surname}}</a></td>
                                                <td>{{$file->created_at}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /5. $DEFAULT_TABLES -->

</div>
</div>

<div id="sendFilesModal" class="modal fade">
    <div style="width:500px" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Descrição:</label>
                            <input type="text" id="cs_file_desc" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Arquivo:</label>
                            <input type="file" id="cs_file_att">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button style="float:right;" id="btn_send_cs_file" type="button" class="btn btn-info btn-md">Enviar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="repAnalysisConversationModal" class="modal fade">
    <div style="width:900px" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="rep_analysis_conversation">
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>


<div id="credit-analysis-req" class="modal fade" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Formulário para requisição de análise de crédito.</h4>
            </div>
            <div class="modal-body">
                <div class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <p>Para requirir uma análise de crédito de seu gerente, basta preecher o formulário abaixo e anexar os seguintes documentos:</p>
                            <ul>
                                <li>CNPJ</li>
                                <li>Contrato Social (Última Alteração)</li>
                                <li>Inscrição Estadual</li>
                                <li>Ultimo Balanço + DRE</li>
                            </ul>
                            <p>Para acompanhar o status de seu requirimento, verifique o seu quadro de avisos ou visualize o perfil do cliente atarvés de sua carteira de clientes.</p>
                        </div>
                        <div style="margin-top: 15px;" class="row">

                            <div class="col-sm-6">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Valor estimado do primeiro pedido</label>
                                    <input type="number" id="first_order_value" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                            <div class="col-sm-6">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Limite de crédito solicitado</label>
                                    <input type="number" id="credit_limit_asked" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <p>Documentos para análise:</p>
                            <div class="col-sm-6">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">CNPJ:</label>
                                    <input type="file" id="cnpj_file_att">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Inscrição Estadual:</label>
                                    <input type="file" id="ie_file_att">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Contrato Social(Última Alteração):</label>
                                    <input type="file" id="social_contract_file_att">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">(Último Balanço + DRE) / Analise Serasa</label>
                                    <input type="file" id="last_budget_dre_file_att">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="btn_send_credit_analysis" type="button" class="btn btn-success" data-dismiss="modal">Enviar</button>
            </div>
        </div>
        <!-- / .modal-content -->
    </div>
    <!-- / .modal-dialog -->
</div>


<div id="ui-error-alert" class="modal modal-alert modal-danger fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fa fa-times-circle"></i>
            </div>
            <div class="modal-title">Erro!</div>
            <div class="modal-body">Houve um erro no envio de seu formulário. Tente enviá-lo novamente. Caso o erro persista, por favor, consultar nosso suporte tecnico.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
            </div>
        </div>
        <!-- / .modal-content -->
    </div>
    <!-- / .modal-dialog -->
</div>

<div id="addNewPeopleRelated" class="modal fade" aria-hidden="true" style="display: none;">
    <div style="width:700px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="padding:0px">
                <div class="row">
                    <div class="panel" style="margin-bottom:0px;">
                        <div class="panel-heading">
                            <span class="panel-title">Adicionar nova Pessoa</span>
                        </div>

                        <div class="panel-body">
                            <div class="row">
								<div class="form-group no-margin-hr col-sm-6">
									<label class="control-label">Nome</label>
									<input id="new_people_name" type="text" class="form-control">
								</div>
								
								<div class="form-group no-margin-hr col-sm-6">
									<label class="control-label">Sobrenome</label>
									<input id="new_people_surname" type="text" class="form-control">
								</div>
							</div>
							
							<div class="row">
							
								<div class="form-group no-margin-hr col-sm-6">
									<label class="control-label">Email</label>
									<input id="new_people_email" type="text" name="lastname" class="form-control">
								</div>

								<div class="form-group no-margin-hr col-sm-6">
									<label class="control-label">Telefone</label>
									<input id="new_people_phone" type="text" name="lastname" class="form-control">
								</div>
								
							</div>
							
							<div class="row">
							
								<div class="form-group no-margin-hr col-sm-6">
									<label class="control-label">Celular</label>
									<input id="new_people_cel" type="text" name="lastname" class="form-control">
								</div>

								<div class="form-group no-margin-hr col-sm-6">
									<label class="control-label">Telefone 2</label>
									<input id="new_people_phone2" type="text" name="lastname" class="form-control">
								</div>
								
							</div>

							<div class="row">
								<div class="form-group no-margin-hr col-sm-6">
									<label class="control-label">Website</label>
									<input id="new_people_website" type="text" name="lastname" class="form-control">
								</div>
								<div class="form-group no-margin-hr col-sm-6">
									<label class="control-label">CPF/CNPJ</label>
									<input id="new_people_cpf_cnpj" type="text" name="lastname" class="form-control">
								</div>
							</div>
							
							<div class="row">
								<div class="form-group no-margin-hr col-sm-6">
									<label class="control-label">Departamento/Cargo</label>
									<input id="new_people_dept" type="text" name="lastname" class="form-control">
								</div>
								<div class="form-group no-margin-hr col-sm-6">
									<label class="control-label">Tipo de Influência:</label>
									<select id="new_people_inf_type" style="margin-bottom:0px !important" class="form-control form-group-margin">
										<option value="-"></option>
										@foreach($user->getInfluencerTypes() as $type)
                                            <option value="{{$type->influencer_type_id}}">{{$type->description}}</option>
                                        @endforeach
									</select>
								</div>
							</div>
							
                        </div>

                        <div class="panel-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                            <button onclick="newPeopleRelated({{$customer->customer_id}});" type="button" class="btn btn-success" data-dismiss="modal">Adicionar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / .modal-content -->
    </div>
    <!-- / .modal-dialog -->
</div>


<div id="addBusinessContact" class="modal fade" aria-hidden="true" style="display: none;">
    <div style="width:500px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="padding:0px">
                <div class="row">
                    <div class="panel" style="margin-bottom:0px;">
                        <div class="panel-heading">
                            <span class="panel-title">Adicionar novo Contato Comercial</span>
                        </div>

                        <div class="panel-body">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">Nome Completo</label>
                                <input id="new_business_contact_name" type="text" name="lastname" class="form-control">
                            </div>

                            <div class="form-group no-margin-hr">
                                <label class="control-label">Email</label>
                                <input id="new_business_contact_email" type="text" name="lastname" class="form-control">
                            </div>

                            <div class="form-group no-margin-hr">
                                <label class="control-label">Telefone</label>
                                <input id="new_business_contact_phone" type="text" name="lastname" class="form-control">
                            </div>

                            <div class="form-group no-margin-hr">
                                <label class="control-label">Departamento/Cargo</label>
                                <input id="new_business_contact_dept" type="text" name="lastname" class="form-control">
                            </div>
                        </div>

                        <div class="panel-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                            <button onclick="newBusinessContact({{$customer->customer_id}})" type="button" class="btn btn-success" data-dismiss="modal">Adicionar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / .modal-content -->
    </div>
    <!-- / .modal-dialog -->
</div>

<div id="addBankAccount" class="modal fade" aria-hidden="true" style="display: none;">
    <div style="width:500px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="padding:0px">
                <div class="row">
                    <div class="panel" style="margin-bottom:0px;">
                        <div class="panel-heading">
                            <span class="panel-title">Adicionar novo Dado Bancário</span>
                        </div>

                        <div class="panel-body">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">Banco</label>
                                <input id="new_bank_acc_bank" type="text" name="lastname" class="form-control">
                            </div>

                            <div class="form-group no-margin-hr">
                                <label class="control-label">Agência</label>
                                <input id="new_bank_acc_agency" type="text" name="lastname" class="form-control">
                            </div>

                            <div class="form-group no-margin-hr">
                                <label class="control-label">Conta Corrente</label>
                                <input id="new_bank_acc_number" type="text" name="lastname" class="form-control">
                            </div>
                        </div>

                        <div class="panel-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                            <button onclick="newBankAccount({{$customer->customer_id}})" type="button" class="btn btn-success" data-dismiss="modal">Adicionar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / .modal-content -->
    </div>
    <!-- / .modal-dialog -->
</div>


<div id="addPartner" class="modal fade" aria-hidden="true" style="display: none;">
    <div style="width:500px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="padding:0px">
                <div class="row">
                    <div class="panel" style="margin-bottom:0px;">
                        <div class="panel-heading">
                            <span class="panel-title">Adicionar novo Sócio ou Proprietário</span>
                        </div>

                        <div class="panel-body">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">Nome Completo</label>
                                <input id="new_partner_name" type="text" name="lastname" class="form-control">
                            </div>

                            <div class="form-group no-margin-hr">
                                <label class="control-label">Email</label>
                                <input id="new_partner_email" type="text" name="lastname" class="form-control">
                            </div>

                            <div class="form-group no-margin-hr">
                                <label class="control-label">Telefone</label>
                                <input id="new_partner_phone" type="text" name="lastname" class="form-control">
                            </div>

                            <div class="form-group no-margin-hr">
                                <label class="control-label">CPF</label>
                                <input id="new_partner_cpf" type="text" name="lastname" class="form-control">
                            </div>
                        </div>

                        <div class="panel-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                            <button onclick="newPartner({{$customer->customer_id}})" type="button" class="btn btn-success" data-dismiss="modal">Adicionar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / .modal-content -->
    </div>
    <!-- / .modal-dialog -->
</div>

<div id="addMainProvider" class="modal fade" aria-hidden="true" style="display: none;">
    <div style="width:500px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="padding:0px">
                <div class="row">
                    <div class="panel" style="margin-bottom:0px;">
                        <div class="panel-heading">
                            <span class="panel-title">Adicionar novo Fornecedor</span>
                        </div>

                        <div class="panel-body">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">Nome Completo</label>
                                <input id="new_main_provider_name" type="text" name="lastname" class="form-control">
                            </div>

                            <div class="form-group no-margin-hr">
                                <label class="control-label">Email</label>
                                <input id="new_main_provider_email" type="text" name="lastname" class="form-control">
                            </div>

                            <div class="form-group no-margin-hr">
                                <label class="control-label">Telefone</label>
                                <input id="new_main_provider_phone" type="text" name="lastname" class="form-control">
                            </div>

                            <div class="form-group no-margin-hr">
                                <label class="control-label">Empresa</label>
                                <input id="new_main_provider_company" type="text" name="lastname" class="form-control">
                            </div>
                        </div>

                        <div class="panel-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                            <button onclick="newMainProvider({{$customer->customer_id}})" type="button" class="btn btn-success" data-dismiss="modal">Adicionar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / .modal-content -->
    </div>
    <!-- / .modal-dialog -->
</div>

<div id="loadingModal" data-backdrop="static" data-keyboard="false" class="modal modal-alert modal-info fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i id="loadingSpinner" class="fa fa-spinner fa-pulse"></i>
            </div>
            <div class="modal-body">
                <div class="row">
                    <span>Enviando análise de crédito.</span>
                </div>
                <br>
                <br>
                <div class="row">
                    <span>O tempo de espera é proporcional a velocidade de sua conexão. Caso esteja demorando mais do que 3 minutos
por favor entre em contato com a Delta.</span>
                </div>
                <br>
                <br>
            </div>
        </div>
        <!-- / .modal-content -->
    </div>
    <!-- / .modal-dialog -->
</div>

<div id="influencerDetailModal" class="modal fade">
    <div style="width:500px" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="influencerDetailBody">

            </div>
        </div>
    </div>
</div>

@endsection @section('end')

<script type="text/javascript" src="http://static.deltafaucetrep.com/assets/javascripts/editable.js"></script>


<script type="text/javascript">
    var fields = (function() {
        var o = {
            customer: {
                customer_id: $("#customer_id")
            },

            credit_analysis: {
                first_order_value: $("#first_order_value"),
                credit_limit_asked: $("#credit_limit_asked"),
                cnpj_file_att: $("#cnpj_file_att"),
                ie_file_att: $("#ie_file_att"),
                social_contract_file_att: $("#social_contract_file_att"),
                last_budget_dre_file_att: $("#last_budget_dre_file_att")
            }
        };

        return o;
    }());
	
 	function influencerDetail(influencer_id) {
        $("#influencerDetailModal").modal("toggle");
        
        $.ajax({
            url: "http://deltafaucetrep.com/tracker/influencer/"+influencer_id+"/detail",
            type: "get",
            dataType: "html"
        }).done(function (data) {
            $("#influencerDetailBody").html(data);        
        });
    }
    
	function newPeopleRelated(customer_id) {
		var data = {};
		
		data.name = $("#new_people_name").val();
		data.surname = $("#new_people_surname").val();
		data.email = $("#new_people_email").val();
		data.phone = $("#new_people_phone").val();
		data.phone2 = $("#new_people_phone2").val();
		data.cpf_cnpj = $("#new_people_cpf_cnpj").val();
		data.website = $("#new_people_website").val();
		data.dept = $("#new_people_dept").val();
		data.inf_type = $("#new_people_inf_type option:selected").val();
		
		data._token = $("#_token").val();
		
		if (data.name == "" || data.surname == "") {
			return alert("Por favor, insira o nome e o sobrenome da pessoa.");
		}
		
		if (data.inf_type == "-") {
			return alert("Por favor, escolha o tipo de influência que essa pessoa exerce. Caso não saiba ou não exista a opção, escolha 'Other'.")
		}
		
		var req = $.ajax({
			url: "http://deltafaucetrep.com/customer/"+customer_id+"/new/people",
			data: data,
			dataType: "json",
			type: "post"
		});
		
		req.done(function () {
			setTimeout(function () {
				window.location.reload();	
			}, 500)
		});
	}
	
    function newBankAccount(customer_id) {
        var data = {};

        data.bank_name = $("#new_bank_acc_bank").val();
        data.agency = $("#new_bank_acc_agency").val();
        data.cc = $("#new_bank_acc_number").val();

        data._token = $("#_token").val();

        var req = $.ajax({
            url: "http://deltafaucetrep.com/customer/" + customer_id + "/new/bank_account",
            data: data,
            dataType: "json",
            type: "POST"
        });

        req.success(function(data) {
            window.location.reload();
        });
    }

    function newBusinessContact(customer_id) {
        var data = {};

        data.name = $("#new_business_contact_name").val();
        data.email = $("#new_business_contact_email").val();
        data.phone = $("#new_business_contact_phone").val();
        data.dept = $("#new_business_contact_dept").val();

        data._token = $("#_token").val();

        var req = $.ajax({
            url: "http://deltafaucetrep.com/customer/" + customer_id + "/new/business_contact",
            data: data,
            dataType: "json",
            type: "POST"
        });

        req.success(function(data) {
            window.location.reload();
        });
    }

    function newPartner(customer_id) {
        var data = {};

        data.name = $("#new_partner_name").val();
        data.email = $("#new_partner_email").val();
        data.phone = $("#new_partner_phone").val();
        data.cpf = $("#new_partner_cpf").val();

        data._token = $("#_token").val();

        var req = $.ajax({
            url: "http://deltafaucetrep.com/customer/" + customer_id + "/new/partner",
            data: data,
            dataType: "json",
            type: "POST"
        });

        req.success(function(data) {
            window.location.reload();
        });
    }

    function newMainProvider(customer_id) {
        var data = {};

        data.name = $("#new_main_provider_name").val();
        data.email = $("#new_main_provider_email").val();
        data.phone = $("#new_main_provider_phone").val();
        data.company = $("#new_main_provider_company").val();

        data._token = $("#_token").val();

        var req = $.ajax({
            url: "http://deltafaucetrep.com/customer/" + customer_id + "/new/main_provider",
            data: data,
            dataType: "json",
            type: "POST"
        });

        req.success(function(data) {
            window.location.reload();
        });
    }
    
    $("#btn_copy_delivery_address").click(function () {
        $.ajax({
            url: 'http://deltafaucetrep.com/customer/' + $("#customer_id").val() + '/edit/delivery_address/city_text/to/' + normalize($("#city_text").text()),
            type: 'get'
        });
        
        $.ajax({
            url: 'http://deltafaucetrep.com/customer/' + $("#customer_id").val() + '/edit/delivery_address/text/to/' + normalize($("#text").text()),
            type: 'get'
        });
        
        $.ajax({
            url: 'http://deltafaucetrep.com/customer/' + $("#customer_id").val() + '/edit/delivery_address/district/to/' + normalize($("#district").text()),
            type: 'get'
        });
        
        $.ajax({
            url: 'http://deltafaucetrep.com/customer/' + $("#customer_id").val() + '/edit/delivery_address/cep/to/' + normalize($("#cep").text()),
            type: 'get'
        });
        
        window.location.reload();
    });
    
    $("#btn_copy_billing_address").click(function () {
        $.ajax({
            url: 'http://deltafaucetrep.com/customer/' + $("#customer_id").val() + '/edit/billing_address/city_text/to/' + normalize($("#city_text").text()),
            type: 'get'
        });
        
        
        $.ajax({
            url: 'http://deltafaucetrep.com/customer/' + $("#customer_id").val() + '/edit/billing_address/text/to/' + normalize($("#text").text()),
            type: 'get'
        });
        
        $.ajax({
            url: 'http://deltafaucetrep.com/customer/' + $("#customer_id").val() + '/edit/billing_address/district/to/' + normalize($("#district").text()),
            type: 'get'
        });
        
        $.ajax({
            url: 'http://deltafaucetrep.com/customer/' + $("#customer_id").val() + '/edit/billing_address/cep/to/' + normalize($("#cep").text()),
            type: 'get'
        });
        
        window.location.reload();
    });

    function normalize(text) {
        return (text == "") ? "-" : text.replace(/\//g, "-");
    }

    @if ($user->getUserType()->cod == 40)
        $(".customer_attr").each(function(key, value) {
            $(value).editInPlace({
                url: "#",
                callback: function(original_element, html, original) {

                    $.ajax({
                        url: 'http://deltafaucetrep.com/customer/' + $("#customer_id").val() + '/edit/' + original_element + '/to/' + normalize(html),
                        type: 'get'
                    }).done(function(data) {
                        if (data == 0) {
                            $("#ui-error-alert").modal("toggle");
                        }
                    });

                    return html;
                }
            });
        });
    
        $(".customer_own_seat_attr").each(function(key, value) {
            $(value).editInPlace({
                url: "#",
                select_options: [
                    ["Sim", "s"],
                    ["Não", "n"]
                ],
                field_type: "select",
                callback: function(original_element, html, original) {

                    $.ajax({
                        url: 'http://deltafaucetrep.com/customer/' + $("#customer_id").val() + '/edit/' + original_element + '/to/' + normalize(html),
                        type: 'get'
                    }).done(function(data) {
                        if (data == 0) {
                            $("#ui-error-alert").modal("toggle");
                        }
                    });

                    return html == 's' ? 'Sim' : 'Não';
                }
            });
        });
    @endif
    
    $(".customer_status_attr").each(function (key, value) {
        $(value).editInPlace({
            url: "#",
            select_options: [
                ['OK', '1'],
                ['Desativado', '2']
            ],
            field_type: "select",
            callback: function(original_element, html, original) {

                $.ajax({
                    url: 'http://deltafaucetrep.com/customer/' + $("#customer_id").val() + '/edit/customer_status_id/to/' + normalize(html),
                    type: 'get'
                }).done(function(data) {
                    if (data == 0) {
                        $("#ui-error-alert").modal("toggle");
                    }
                });

                return html == '1' ? "OK" : "Desativado";
            }
        });        
    });

    $(".customer_channel_attr").each(function (key, value) {
        $(value).editInPlace({
            url: "#",
            select_options: [
                @foreach($customer->getAllChannels() as $s) ['{{$s->description}}', '{{$s->customer_channel_id}}'],  @endforeach
            ],
            field_type: "select",
            callback: function(original_element, html, original) {

                $.ajax({
                    url: 'http://deltafaucetrep.com/customer/' + $("#customer_id").val() + '/edit/customer_channel_id/to/' + normalize(html),
                    type: 'get'
                }).done(function(data) {
                    if (data == 0) {
                        $("#ui-error-alert").modal("toggle");
                    }
                });

                @foreach($customer->getAllChannels() as $s)
                if (html == '{{$s->customer_channel_id}}') return '{{$s->description}}';
                @endforeach
                
                return html;
            }
        });        
    });
                
    $(".customer_official_classification_attr").each(function (key, value) {
        $(value).editInPlace({
            url: "#",
            select_options: [
                @foreach($customer->getAllClassifications() as $s) ['{{$s->name}}', '{{$s->customer_classification_id}}'],  @endforeach
            ],
            field_type: "select",
            callback: function(original_element, html, original) {

                $.ajax({
                    url: 'http://deltafaucetrep.com/customer/' + $("#customer_id").val() + '/edit/customer_classification_official_id/to/' + normalize(html),
                    type: 'get'
                }).done(function(data) {
                    if (data == 0) {
                        $("#ui-error-alert").modal("toggle");
                    }
                });

                @foreach($customer->getAllClassifications() as $s)
                if (html == '{{$s->customer_classification_id}}') return '{{$s->name}}';
                @endforeach
                
                return html;
            }
        });        
    });
    
    $(".customer_potential_classification_attr").each(function (key, value) {
        $(value).editInPlace({
            url: "#",
            select_options: [
                @foreach($customer->getAllClassifications() as $s) ['{{$s->name}}', '{{$s->customer_classification_id}}'],  @endforeach
            ],
            field_type: "select",
            callback: function(original_element, html, original) {

                $.ajax({
                    url: 'http://deltafaucetrep.com/customer/' + $("#customer_id").val() + '/edit/customer_classification_potential_id/to/' + normalize(html),
                    type: 'get'
                }).done(function(data) {
                    if (data == 0) {
                        $("#ui-error-alert").modal("toggle");
                    }
                });

                @foreach($customer->getAllClassifications() as $s)
                if (html == '{{$s->customer_classification_id}}') return '{{$s->name}}';
                @endforeach
                
                return html;
            }
        });        
    });

    $(".customer_segment_attr").each(function (key, value) {
        $(value).editInPlace({
            url: "#",
            select_options: [
                @foreach($customer->getAllSegments() as $s) ['{{$s->name}}', '{{$s->customer_segment_id}}'],  @endforeach
            ],
            field_type: "select",
            callback: function(original_element, html, original) {

                $.ajax({
                    url: 'http://deltafaucetrep.com/customer/' + $("#customer_id").val() + '/edit/customer_segment_id/to/' + normalize(html),
                    type: 'get'
                }).done(function(data) {
                    if (data == 0) {
                        $("#ui-error-alert").modal("toggle");
                    }
                });

                @foreach($customer->getAllSegments() as $s)
                if (html == '{{$s->customer_segment_id}}') return '{{$s->name}}';
                @endforeach
                
                return html;
            }
        });        
    });
    
    $(".customer_region_attr").each(function (key, value) {
        $(value).editInPlace({
            url: "#",
            select_options: [
                @foreach($customer->getAllRegions() as $s) ['{{$s->description}}', '{{$s->customer_region_id}}'],  @endforeach
            ],
            field_type: "select",
            callback: function(original_element, html, original) {

                $.ajax({
                    url: 'http://deltafaucetrep.com/customer/' + $("#customer_id").val() + '/edit/customer_region_id/to/' + normalize(html),
                    type: 'get'
                }).done(function(data) {
                    if (data == 0) {
                        $("#ui-error-alert").modal("toggle");
                    }
                });

                @foreach($customer->getAllRegions() as $s)
                if (html == '{{$s->customer_region_id}}') return '{{$s->description}}';
                @endforeach
                
                return html;
            }
        });        
    });
    
    @if ($user->getUserType()->cod == 40 || $user->getUserType()->cod == 20)
        $(".customer_icms_attr").each(function(key, value) {
            $(value).editInPlace({
                url: "#",
                select_options: [
                    ['Sim', 's'],
                    ['Não', 'n'],
                    ['Não Sei', 'x']
                ],
                field_type: "select",
                callback: function(original_element, html, original) {

                    $.ajax({
                        url: 'http://deltafaucetrep.com/customer/' + $("#customer_id").val() + '/edit/' + original_element + '/to/' + normalize(html),
                        type: 'get'
                    }).done(function(data) {
                        if (data == 0) {
                            $("#ui-error-alert").modal("toggle");
                        }
                    });

                    return html == 's' ? 'Sim' : html == 'n' ? 'Não' : 'Não Sei';
                }
            });
        });

        $(".customer_state_attr").each(function (key, value) {
            $(value).editInPlace({
                url: "#",
                select_options: [
                    @foreach($states as $state)
                        ["{{$state->uf}}", "{{$state->id}}"],
                    @endforeach
                ],
                field_type: "select",
                callback: function (original_element, html, original) {
                    $.ajax({
                        url: 'http://deltafaucetrep.com/customer/' + $("#customer_id").val() + '/edit/' + original_element + '/to/' + normalize(html),
                        type: 'get'
                    }).done(function(data) {
                        if (data == 0) {
                            $("#ui-error-alert").modal("toggle");
                        }
                    });

                    @foreach($states as $state)
                        if (html == {{$state->id}}) return "{{$state->uf}}";
                    @endforeach

                    return html;
                }
            });
        });

        $(".customer_type_attr").each(function(key, value) {
            $(value).editInPlace({
                url: "#",
                select_options: [@foreach($customer->getTypes() as $t)["{{$t->name}}", "{{$t->customer_type_id}}"], @endforeach],
                field_type: "select",
                callback: function(original_element, html, original) {

                    $.ajax({
                        url: 'http://deltafaucetrep.com/customer/' + $("#customer_id").val() + '/edit/' + original_element + '/to/' + normalize(html),
                        type: 'get'
                    }).done(function(data) {
                        if (data == 0) {
                            $("#ui-error-alert").modal("toggle");
                        }
                    });

                    @foreach($customer->getTypes() as $t)
                    if (html == '{{$t->customer_type_id}}') return '{{$t->name}}';
                    @endforeach

                    return html;
                }
            });
        });

        $(".customer_address_attr").each(function(key, value) {
            $(value).editInPlace({
                url: "#",
                callback: function(original_element, html, original) {

                    $.ajax({
                        url: 'http://deltafaucetrep.com/customer/' + $("#customer_id").val() + '/edit/address/' + original_element + '/to/' + normalize(html),
                        type: 'get'
                    }).done(function(data) {
                        if (data == 0) {
                            $("#ui-error-alert").modal("toggle");
                        }
                    });

                    return html;
                }
            });
        });

    @endif
    
    $(".customer_delivery_uf_attr").each(function(key, value) {
        $(value).editInPlace({
            url: "#",
            select_options: [
                @foreach($states as $state)
                    ["{{$state->uf}}", "{{$state->id}}"],
                @endforeach
            ],
            field_type: "select",
            callback: function (original_element, html, original) {
                $.ajax({
                    url: 'http://deltafaucetrep.com/customer/' + $("#customer_id").val() + '/edit/delivery_address/' + original_element + '/to/' + normalize(html),
                    type: 'get'
                }).done(function(data) {
                    if (data == 0) {
                        $("#ui-error-alert").modal("toggle");
                    }
                });
 
                @foreach($states as $state)
                    if (html == {{$state->id}}) return "{{$state->uf}}";
                @endforeach
                
                return html;
            }
        });
    });
                
    $(".customer_billing_uf_attr").each(function(key, value) {
        $(value).editInPlace({
            url: "#",
            select_options: [
                @foreach($states as $state)
                    ["{{$state->uf}}", "{{$state->id}}"],
                @endforeach
            ],
            field_type: "select",
            callback: function (original_element, html, original) {
                $.ajax({
                    url: 'http://deltafaucetrep.com/customer/' + $("#customer_id").val() + '/edit/billing_address/' + original_element + '/to/' + normalize(html),
                    type: 'get'
                }).done(function(data) {
                    if (data == 0) {
                        $("#ui-error-alert").modal("toggle");
                    }
                });
 
                @foreach($states as $state)
                    if (html == {{$state->id}}) return "{{$state->uf}}";
                @endforeach
                
                return html;
            }
        });
    });
    
    $(".customer_delivery_attr").each(function(key, value) {
        $(value).editInPlace({
            url: "#",
            callback: function(original_element, html, original) {

                $.ajax({
                    url: 'http://deltafaucetrep.com/customer/' + $("#customer_id").val() + '/edit/delivery_address/' + original_element + '/to/' + normalize(html),
                    type: 'get'
                }).done(function(data) {
                    if (data == 0) {
                        $("#ui-error-alert").modal("toggle");
                    }
                });

                return html;
            }
        });
    });

    $(".customer_billing_attr").each(function(key, value) {
        $(value).editInPlace({
            url: "#",
            callback: function(original_element, html, original) {

                $.ajax({
                    url: 'http://deltafaucetrep.com/customer/' + $("#customer_id").val() + '/edit/billing_address/' + original_element + '/to/' + normalize(html),
                    type: 'get'
                }).done(function(data) {
                    if (data == 0) {
                        $("#ui-error-alert").modal("toggle");
                    }
                });

                return html;
            }
        });
    });

    $(".customer_business_contact_attr").each(function(key, value) {
        $(value).editInPlace({
            url: "#",
            callback: function(original_element, html, original) {
                $.ajax({
                    url: 'http://deltafaucetrep.com/customer/business_contact/' + $(value).attr('data-bc-id') + '/edit/' + original_element + '/to/' + normalize(html),
                    type: 'get'
                }).done(function(data) {
                    if (data == 0) {
                        $("#ui-error-alert").modal("toggle");
                    }
                });

                return html;
            }
        });
    });

    $(".customer_partner_attr").each(function(key, value) {
        $(value).editInPlace({
            url: "#",
            callback: function(original_element, html, original) {

                $.ajax({
                    url: 'http://deltafaucetrep.com/customer/partner/' + $(value).attr('data-pt-id') + '/edit/' + original_element + '/to/' + normalize(html),
                    type: 'get'
                }).done(function(data) {
                    if (data == 0) {
                        $("#ui-error-alert").modal("toggle");
                    }
                });

                return html;
            }
        });
    });

    $(".customer_main_provider_attr").each(function(key, value) {
        $(value).editInPlace({
            url: "#",
            callback: function(original_element, html, original) {

                $.ajax({
                    url: 'http://deltafaucetrep.com/customer/main_provider/' + $(value).attr('data-mp-id') + '/edit/' + original_element + '/to/' + normalize(html),
                    type: 'get'
                }).done(function(data) {
                    if (data == 0) {
                        $("#ui-error-alert").modal("toggle");
                    }
                });

                return html;
            }
        });
    });


    $("#btn_send_credit_analysis").click(function() {
        try {

            var files = new FormData();

            files.append('first_order_value', fields.credit_analysis.first_order_value.val());
            files.append('credit_limit_asked', fields.credit_analysis.credit_limit_asked.val());

            var cnpj_file_att = fields.credit_analysis.cnpj_file_att.prop('files')[0];
            var ie_file_att = fields.credit_analysis.ie_file_att.prop('files')[0];
            var last_budget_dre_file_att = fields.credit_analysis.last_budget_dre_file_att.prop('files')[0];
            var social_contract_file_att = fields.credit_analysis.social_contract_file_att.prop('files')[0];

            if (cnpj_file_att) {
                files.append('cnpj_file_att', cnpj_file_att, cnpj_file_att.name);
            }
            
            if (ie_file_att) {
                files.append('ie_file_att', ie_file_att, ie_file_att.name);
            }
            
            if (last_budget_dre_file_att) {
                files.append('last_budget_dre_file_att', last_budget_dre_file_att, last_budget_dre_file_att.name);
            }
            
            if (social_contract_file_att) {
                files.append('social_contract_file_att', social_contract_file_att, social_contract_file_att.name);
            }
            
            files.append('_token', $("#_token").val());

            var req = $.ajax({
                url: 'http://deltafaucetrep.com/portfolio/' + fields.customer.customer_id.val() + '/credit_analysis',
                type: 'POST',
                data: files,
                cache: false,
                dataType: 'json',
                processData: false, // Don't process the files
                contentType: false
            });
            
            $("#loadingModal").modal("toggle");
            
            req.done(function () {
                window.setTimeout(function () {
                    window.location.reload();    
                }, 1000);
            });
        } catch (e) {
            $("#ui-error-alert").modal("toggle");
        }
    });
    
    $("#btn_send_cs_file").click(function () {
        var data = new FormData();
        var file = $("#cs_file_att").prop('files')[0];
        
        data.append("desc", $("#cs_file_desc").val());
        data.append("file", file, file.name);
        
        data.append("_token", $("#_token").val());
    
        var req = $.ajax({
            url: "http://deltafaucetrep.com/portfolio/{{$customer->customer_id}}/send_file",
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false
        });
        
        req.done(function () {
            setTimeout(function () {
                window.location.reload();
            }, 500);
        });
    });

    $("#btn_new_budget").click(function() {
        window.location.replace("http://deltafaucetrep.com/budget/new/{{$customer->customer_id}}");
    });

    $("#btn_atr_rep").click(function() {
        var data = {};

        data.reps = [];

        $(".atr_rep_to_customer").each(function(key, value) {
            if (value.checked == true) {
                data.reps.push($(value).attr('data-rep-id'));
            }
        });

        data._token = $("#_token").val();

        var req = $.ajax({
            url: 'http://deltafaucetrep.com/portfolio/{{$customer->customer_id}}/attrs',
            type: 'POST',
            data: data
        });

        req.success(function(e) {
            window.location.reload();
        });
    });
    
    $("#customerNoteSend").click(function () {
        var data = {};
        
        data._token = $("#_token").val();
        data.text = $("#customerNoteText").val();
        
        $.ajax({
            url: "http://deltafaucetrep.com/customer/{{$customer->customer_id}}/note",
            type: "post",
            data: data,
            dataType: "json"
        });
        
        window.location.reload();
    });

    function openRepAnalysisConversation(ca) {
        var response = $.ajax({
            url: "http://deltafaucetrep.com/customer/credit_analysis/" + ca + "/notes",
            type: 'GET',
            dataType: 'html'
        });

        response.done(function(data) {
            $("#rep_analysis_conversation").html(data);
        });
    }

    $(document).ready(function() {

        $('.atr_rep_div').slimScroll({
            height: "300px",
            alwaysVisible: true,
            color: '#888',
            allowPageScroll: true
        });

        $("#tb_previous_cas").slimScroll({
            height: "209px",
            alwaysVisible: true,
            color: '#888',
            allowPageScroll: true
        });
        
        $("#customerNotes").slimScroll({
            height: "400px",
            alwaysVisible: true,
            color: '#888',
            allowPageScroll: true
        });


    });
</script>
@endsection

