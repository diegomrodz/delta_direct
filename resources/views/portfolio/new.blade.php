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
    .list-group-item {
        padding-top: 15px;
        padding-bottom: 5px;
    }
</style>

<div id="rep_portfolio_add">
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Novo cliente</span>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">

                    <form action="" class="panel form-horizontal">
                        <div class="panel-heading">
                            <span class="panel-title">Dados do cliente</span>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">Razão Social</label>
                                        <input placeholder="Ex.: Kaza Arquitetura & Design Ltda." type="text" id="customer_company_name" class="form-control">
                                        <div for="customer_company_name" class="jquery-validate-error help-block" style="display:none;">Este campo é obrigatório!</div>
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                                <div class="col-sm-12">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">Nome Fantasia</label>
                                        <input placeholder="Ex.: Kaza" type="text" id="customer_fantasy_name" class="form-control">
                                        <div for="customer_fantasy_name" class="jquery-validate-error help-block" style="display:none;">Este campo é obrigatório!</div>
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">CNPJ/CPF</label>
                                        <div class="input-group">
                                            <input type="text" id="customer_cnpj" class="form-control">
                                            <div class="input-group-btn">
                                                <button id="btn_customer_cnpj_change" type="button" class="btn dropdown-toggle" data-toggle="dropdown"><span class="fa fa-caret-down"></span>
                                                </button>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a id="customer_cnpj_change_cnpj" href="#">CNPJ</a>
                                                    </li>
                                                    <li><a id="customer_cnpj_change_cpf" href="#">CPF</a>
                                                    </li>
                                                    </li>
                                                </ul>
                                                <!-- / .dropdown-menu -->
                                            </div>
                                            <!-- / .btn-group -->
                                        </div>
                                            <div for="customer_cnpj" class="jquery-validate-error help-block" style="display:none;">Este campo é obrigatório!</div>
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">IE</label>
                                        <input type="text" id="customer_ie" class="form-control">
                                        <div for="customer_ie" class="jquery-validate-error help-block" style="display:none;">Este campo é obrigatório!</div>
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                                <div class="col-sm-8">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">Cidade</label>
                                        <input placeholder="Ex.: Rio Branco" type="text" id="customer_city" class="form-control">
                                        <div for="customer_city" class="jquery-validate-error help-block" style="display:none;">Este campo é obrigatório!</div>
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                                <div class="col-sm-4">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">UF</label>
                                        <select id="customer_uf" style="margin-bottom:0px !important" class="form-control form-group-margin">
                                            @foreach($states as $s)
                                            <option value="{{$s->id}}">{{$s->uf}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                                <div class="col-sm-12">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">Endereço</label>
                                        <input placeholder="Ex.: Av. França Morais, 900 - Bloco B / 2º Andar" type="text" id="customer_address" class="form-control">
                                            <div for="customer_address" class="jquery-validate-error help-block" style="display:none;">Este campo é obrigatório!</div>
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">Bairro</label>
                                        <input placeholder="Ex.: Vila Holanda" type="text" id="customer_district" class="form-control">
                                            <div for="customer_district" class="jquery-validate-error help-block" style="display:none;">Este campo é obrigatório!</div>
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">CEP</label>
                                        <input type="text" id="customer_cep" class="form-control">
                                            <div for="customer_cep" class="jquery-validate-error help-block" style="display:none;">Este campo é obrigatório!</div>
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                            </div>
                            <!-- row -->

                        </div>
                    </form>


                </div>

            @if ($user->getUserType()->cod == 10)
                <div style="margin-bottom:10px" class="col-sm-6">


                    <form action="" class="panel form-horizontal">
                        <div class="panel-heading">
                            <span class="panel-title">Representante</span>
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
            @elseif ($user->getUserType()->cod == 20)
                <div style="margin-bottom:10px" class="col-sm-6">

                
                    <form action="" class="panel form-horizontal">
                        <div class="panel-heading">
                            <span class="panel-title">Representante/Gerente<span>
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

                </div>
            @endif
                <div class="col-sm-6">

                    <form action="" class="panel form-horizontal">
                        <div class="panel-heading">
                            <span class="panel-title">Informações para contato</span>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">Telefone Comercial</label>
                                        <input placeholder="Ex.: (21) 1234-5678" type="text" id="customer_phone" class="form-control">
                                        <div for="customer_phone" class="jquery-validate-error help-block" style="display:none;">Este campo é obrigatório!</div>
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                                <div class="col-sm-12">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">Email da Empresa</label>
                                        <input placeholder="Ex.: exemplo@email.com.br" type="text" id="customer_email" class="form-control">
                                        <div for="customer_email" class="jquery-validate-error help-block" style="display:none;">Este campo é obrigatório!</div>
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                            </div>
                            <!-- row -->

                        </div>
                    </form>
                </div>

            </div>

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Endereço de entrega</span>
                    <div class="panel-heading-controls">
                        <button id="btn_copy_delivery_address" title="Copiar endereço cliente" class="btn btn-primary btn-outline btn-flat"><i class="fa fa-copy"></i>
                        </button>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">Cidade</label>
                                <input type="text" id="delivery_address_city" class="form-control">
                                <div for="delivery_address_city" class="jquery-validate-error help-block" style="display:none;">Este campo é obrigatório!</div>
                            </div>
                        </div>
                        <!-- col-sm-6 -->
                        <div class="col-sm-2">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">UF</label>
                                <select id="delivery_address_uf" style="margin-bottom:0px !important" class="form-control form-group-margin">
                                    @foreach($states as $s)
                                    <option value="{{$s->id}}">{{$s->uf}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- col-sm-6 -->
                        <div class="col-sm-5">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">CEP</label>
                                <input id="delivery_address_cep" type="text" class="form-control">
                                <div for="delivery_address_cep" class="jquery-validate-error help-block" style="display:none;">Este campo é obrigatório!</div>
                            </div>
                        </div>
                        <!-- col-sm-6 -->
                    </div>
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">Endereço</label>
                                <input id="delivery_address_address" type="text" class="form-control">
                                <div for="delivery_address_address" class="jquery-validate-error help-block" style="display:none;">Este campo é obrigatório!</div>
                            </div>
                        </div>
                        <!-- col-sm-6 -->
                        <div class="col-sm-5">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">Bairro</label>
                                <input type="text" id="delivery_address_district" class="form-control">
                                <div for="delivery_address_district" class="jquery-validate-error help-block" style="display:none;">Este campo é obrigatório!</div>
                            </div>
                        </div>
                        <!-- col-sm-6 -->
                    </div>
                </div>
            </div>

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Endereço de cobrança</span>
                    <div class="panel-heading-controls">
                        <button id="btn_copy_billing_address" title="Copiar endereço cliente" class="btn btn-primary btn-outline btn-flat"><i class="fa fa-copy"></i>
                        </button>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">Cidade</label>
                                <input type="text" id="billing_address_city" class="form-control">
                                <div for="billing_address_city" class="jquery-validate-error help-block" style="display:none;">Este campo é obrigatório!</div>
                            </div>
                        </div>
                        <!-- col-sm-6 -->
                        <div class="col-sm-2">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">UF</label>
                                <select id="billing_address_uf" style="margin-bottom:0px !important" class="form-control form-group-margin">
                                    @foreach($states as $s)
                                    <option value="{{$s->id}}">{{$s->uf}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- col-sm-6 -->
                        <div class="col-sm-5">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">CEP</label>
                                <input type="text" id="billing_address_cep" class="form-control">
                                    <div for="billing_address_cep" class="jquery-validate-error help-block" style="display:none;">Este campo é obrigatório!</div>
                            </div>
                        </div>
                        <!-- col-sm-6 -->
                    </div>
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">Endereço</label>
                                <input type="text" id="billing_address_address" class="form-control">
                                    <div for="billing_address_address" class="jquery-validate-error help-block" style="display:none;">Este campo é obrigatório!</div>
                            </div>
                        </div>
                        <!-- col-sm-6 -->
                        <div class="col-sm-5">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">Bairro</label>
                                <input type="text" id="billing_address_district" class="form-control">
                                    <div for="billing_address_district" class="jquery-validate-error help-block" style="display:none;">Este campo é obrigatório!</div>
                            </div>
                        </div>
                        <!-- col-sm-6 -->
                    </div>
                </div>
            </div>


            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Contatos comerciais</span>
                </div>

                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Nome</label>
                                    <input type="text" name="business_contact_name" class="form-control">
                                    <div for="business_contact_name" class="jquery-validate-error help-block" style="display:none;">Este campo é obrigatório!</div>
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                            <div class="col-sm-4">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Email</label>
                                    <input type="text" name="business_contact_email" class="form-control">
                                    <div for="business_contact_email" class="jquery-validate-error help-block" style="display:none;">Este campo é obrigatório!</div>
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                            <div class="col-sm-2">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Telefone</label>
                                    <input type="text" name="business_contact_phone" class="form-control">
                                    <div for="business_contact_phone" class="jquery-validate-error help-block" style="display:none;">Este campo é obrigatório!</div>
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                            <div class="col-sm-3">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Departamento/Cargo</label>
                                    <input type="text" name="business_contact_dept" class="form-control">
                                    <div for="business_contact_dept" class="jquery-validate-error help-block" style="display:none;">Este campo é obrigatório!</div>
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Nome</label>
                                    <input type="text" name="business_contact_name" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                            <div class="col-sm-4">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Email</label>
                                    <input type="text" name="business_contact_email" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                            <div class="col-sm-2">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Telefone</label>
                                    <input type="text" name="business_contact_phone" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                            <div class="col-sm-3">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Departamento/Cargo</label>
                                    <input type="text" name="business_contact_dept" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                        </div>
                    </li>

                </ul>
            </div>

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Informações dos sócios ou proprietários</span>
                </div>

                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Nome</label>
                                    <input type="text" name="partners_name" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                            <div class="col-sm-4">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Email</label>
                                    <input type="text" name="partners_email" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                            <div class="col-sm-2">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Telefone</label>
                                    <input type="text" name="partners_phone" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                            <div class="col-sm-3">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">CPF</label>
                                    <input type="text" name="partners_cpf" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Nome</label>
                                    <input type="text" name="partners_name" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                            <div class="col-sm-4">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Email</label>
                                    <input type="text" name="partners_email" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                            <div class="col-sm-2">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Telefone</label>
                                    <input type="text" name="partners_phone" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                            <div class="col-sm-3">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">CPF</label>
                                    <input type="text" name="partners_cpf" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Nome</label>
                                    <input type="text" name="partners_name" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                            <div class="col-sm-4">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Email</label>
                                    <input type="text" name="partners_email" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                            <div class="col-sm-2">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Telefone</label>
                                    <input type="text" name="partners_phone" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                            <div class="col-sm-3">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">CPF</label>
                                    <input type="text" name="partners_cpf" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Nome</label>
                                    <input type="text" name="partners_name" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                            <div class="col-sm-4">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Email</label>
                                    <input type="text" name="partners_email" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                            <div class="col-sm-2">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Telefone</label>
                                    <input type="text" name="partners_phone" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                            <div class="col-sm-3">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">CPF</label>
                                    <input type="text" name="partners_cpf" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                        </div>
                    </li>
                </ul>
            </div>


            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Principais fornecedores</span>
                </div>

                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Nome</label>
                                    <input type="text" name="main_provider_name" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                            <div class="col-sm-4">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Email</label>
                                    <input type="text" name="main_provider_email" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                            <div class="col-sm-2">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Telefone</label>
                                    <input type="text" name="main_provider_phone" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                            <div class="col-sm-3">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Empresa</label>
                                    <input type="text" name="main_provider_company" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Nome</label>
                                    <input type="text" name="main_provider_name" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                            <div class="col-sm-4">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Email</label>
                                    <input type="text" name="main_provider_email" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                            <div class="col-sm-2">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Telefone</label>
                                    <input type="text" name="main_provider_phone" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                            <div class="col-sm-3">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Empresa</label>
                                    <input type="text" name="main_provider_company" class="form-control">
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                        </div>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title">Principais Fornecedores de Metais e Louças Sanitárias</span>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">Metais Sanitarios</label>
                                        <select id="sanitary_metals_suppliers" class="multiple-suppliers form-control" multiple="multiple">
                                            <option>Deca</option>
                                            <option>Docol</option>
                                            <option>Outro</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">Louças Sanitárias</label>
                                        <select id="sanitary_ware_suppliers" class="multiple-suppliers form-control" multiple="multiple">
                                            <option>Deca</option>
                                            <option>Docol</option>
                                            <option>Outro</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                            </div>
                            <!-- row -->
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title">Outras Informações</span>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">Sede Própria</label>
                                        <select id="customer_own_seat" style="margin-bottom:0px !important" class="form-control form-group-margin">
                                            <option value="s">Sim</option>
                                            <option value="n">Não</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                                <div class="col-sm-8">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">Faturamento Anual</label>
                                        <div class="input-group">
                                            <span class="input-group-addon bg-danger no-border">R$</span>
                                            <input type="number" id="annual_income" class="form-control" min="0" max="100000000000" step="100000">
                                            <span class="input-group-addon bg-info no-border">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                                <div class="col-sm-4">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">Contribuinte do ICMS</label>
                                        <select id="customer_icms_taxpayer" style="margin-bottom:0px !important" class="form-control form-group-margin">
                                            <option value="s">Sim</option>
                                            <option value="n">Não</option>
                                            <option value="?">Não Sei</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                                <div class="col-sm-8">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">Tipo de Cliente</label>
                                        <select id="customer_type" style="margin-bottom:0px !important" class="form-control form-group-margin">
                                            <option value="0" selected>-</option>
                                            @foreach($customer_type as $c)
                                            <option value="{{$c->customer_type_id}}">{{$c->name}}</option>
                                            @endforeach
                                        </select>
                                        <div for="customer_type" class="jquery-validate-error help-block" style="display:none;">Este campo é obrigatório!</div>
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                            </div>
                            <!-- row -->
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title">Referências Bancárias</span>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Banco</label>
                                            <input type="text" name="bank_account_bank" class="form-control">
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div class="col-sm-4">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Agência</label>
                                            <input type="text" name="bank_account_agency" class="form-control">
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div class="col-sm-4">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Conta Corrente</label>
                                            <input type="text" name="bank_account_number" class="form-control">
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Banco</label>
                                            <input type="text" name="bank_account_bank" class="form-control">
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div class="col-sm-4">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Agência</label>
                                            <input type="text" name="bank_account_agency" class="form-control">
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div class="col-sm-4">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Conta Corrente</label>
                                            <input type="text" name="bank_account_number" class="form-control">
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Banco</label>
                                            <input type="text" name="bank_account_bank" class="form-control">
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div class="col-sm-4">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Agência</label>
                                            <input type="text" name="bank_account_agency" class="form-control">
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div class="col-sm-4">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">Conta Corrente</label>
                                            <input type="text" name="bank_account_number" class="form-control">
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                </div>
                            </li>
                        </ul>
                    </div>
                    
                </div>
                        <div class="panel-footer">
                            <button id="btn_salvar_cliente" class="btn btn-flat btn-lg btn-success"><span class="btn-label icon fa "></span>Salvar Cliente</button>
                        </div>
                <input type="hidden" id="_token" value="{{ csrf_token() }}">
            </div>

        </div>
    </div>
</div>
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

<div id="form-alert" class="modal modal-alert modal-danger fade" aria-hidden="true" style="display: none;">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <i class="fa fa-times-circle"></i>
        </div>
        <div class="modal-title">Atenção</div>
        <div class="modal-body">Há campos em branco no formulário de cadastro!</div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
        </div>
    </div>
    <!-- / .modal-content -->
</div>
<!-- / .modal-dialog -->
</div>

@endsection @section('end')
<script type="text/javascript" charset="utf8" src="http://static.deltafaucetrep.com/assets/javascripts/editable.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

<script type="text/javascript">
    $(".multiple-suppliers").select2();
    
    $("#customer_cnpj").mask("99.999.999/9999-99");
    
    $("#customer_cnpj_change_cnpj").click(function () {
        $("#btn_customer_cnpj").val("CNPJ");
        $("#customer_cnpj").mask("99.999.999/9999-99");
    });
    
    $("#customer_cnpj_change_cpf").click(function () {
        $("#btn_customer_cnpj").val("CPF");
        $("#customer_cnpj").mask("999.999.999-99");
    });
    
    $("#customer_cep").mask("99999-999");
    
</script>

<script type="text/javascript">
$(document).ready(function () {
   
    var fields = (function() {
        
        var o =  {
           customer : {
               company_name : $("#customer_company_name"),
               fantasy_name : $("#customer_fantasy_name"),
               cnpj : $("#customer_cnpj"),
               ie : $("#customer_ie"),
               city : $("#customer_city"),
               uf : $("#customer_uf"),
               address : $("#customer_address"),
               district : $("#customer_district"),
               cep : $("#customer_cep"),
               phone: $("#customer_phone"),
               email: $("#customer_email"),
               type : $("#customer_type"),
               icms_taxpayer : $("#customer_icms_taxpayer")
           },
           delivery_address : {
               city : $("#delivery_address_city"),
               uf : $("#delivery_address_uf"),
               address : $("#delivery_address_address"),
               district : $("#delivery_address_district"),
               cep : $("#delivery_address_cep")
           },
           billing_address : {
               city : $("#billing_address_city"),
               uf : $("#billing_address_uf"),
               address : $("#billing_address_address"),
               district : $("#billing_address_district"),
               cep : $("#billing_address_cep")
           },
           business_contact : {
               name : $("input[name=business_contact_name]"),
               email : $("input[name=business_contact_email]"),
               phone : $("input[name=business_contact_phone]"),
               dept : $("input[name=business_contact_dept]")
           },
           partner : {
               name : $("input[name=partners_name]"),
               email : $("input[name=partners_email]"),
               phone : $("input[name=partners_phone]"),
               cpf : $("input[name=partners_cpf]")
           },
           main_provider : {
              name : $("input[name=main_provider_name]"),
              email : $("input[name=main_provider_email]"),
              phone : $("input[name=main_provider_phone]"),
              company : $("input[name=main_provider_company]")
           },
           suppliers : {
               sanitary : $("#sanitary_metals_suppliers"),
               ware : $("#sanitary_ware_suppliers")
           },
           own_seat : $("#customer_own_seat"),
           annual_income : $("#annual_income"),
           bank_account : {
               bank : $("input[name=bank_account_bank]"),
               agency : $("input[name=bank_account_agency]"),
               number : $("input[name=bank_account_number]")
           },
           credit_analysis : {
               first_order_value : $("#first_order_value"),
               credit_limit_asked : $("#credit_limit_asked"),
               cnpj_file_att : $("#cnpj_file_att"),
               ie_file_att : $("#ie_file_att"),
               social_contract_file_att : $("#social_contract_file_att"),
               last_budget_dre_file_att : $("#last_budget_dre_file_att")
           }
        };
        
        return o;
    }());
    
    $("#btn_copy_delivery_address").click(function() {
        fields.delivery_address.city.val(fields.customer.city.val());
        fields.delivery_address.district.val(fields.customer.district.val());
        fields.delivery_address.uf.val(fields.customer.uf.val());
        fields.delivery_address.address.val(fields.customer.address.val());
        fields.delivery_address.cep.val(fields.customer.cep.val());
    });
    
    $("#btn_copy_billing_address").click(function() {
        fields.billing_address.city.val(fields.customer.city.val());
        fields.billing_address.district.val(fields.customer.district.val());
        fields.billing_address.uf.val(fields.customer.uf.val());
        fields.billing_address.address.val(fields.customer.address.val());
        fields.billing_address.cep.val(fields.customer.cep.val());
    });
    
    $("#btn_salvar_cliente").click(function () {
        var valid = true;
        
        if (fields.customer.company_name.val().length == 0) {
            fields.customer.company_name.parent().addClass("dark has-error");
            $("div[for='" + fields.customer.company_name.prop('id') + "']").show();
            valid = false;
        } else {
            $("div[for='" + fields.customer.company_name.prop('id') + "']").hide();
            fields.customer.company_name.parent().removeClass("dark has-error");
        }
        
        if (fields.customer.fantasy_name.val().length == 0) {
            fields.customer.fantasy_name.parent().addClass("dark has-error");
            $("div[for='" + fields.customer.fantasy_name.prop('id') + "']").show();
            valid = false;
        } else {
             $("div[for='" + fields.customer.fantasy_name.prop('id') + "']").hide();
            fields.customer.fantasy_name.parent().removeClass("dark has-error");
        }
        
        if (fields.customer.cnpj.val().length == 0) {
            fields.customer.cnpj.parent().parent().addClass("dark has-error");
            $("div[for='" + fields.customer.cnpj.prop('id') + "']").show();
            valid = false;
        } else {
             $("div[for='" + fields.customer.cnpj.prop('id') + "']").hide();
            fields.customer.cnpj.parent().parent().removeClass("dark has-error");
        }
        
        if (fields.customer.ie.val().length == 0) {
            fields.customer.ie.parent().addClass("dark has-error");
            $("div[for='" + fields.customer.ie.prop('id') + "']").show();
            valid = false;
        } else {
             $("div[for='" + fields.customer.ie.prop('id') + "']").hide();
            fields.customer.ie.parent().removeClass("dark has-error");
        }
        
        if (fields.customer.city.val().length == 0) {
            fields.customer.city.parent().addClass("dark has-error");
            $("div[for='" + fields.customer.city.prop('id') + "']").show();
            valid = false;
        } else {
             $("div[for='" + fields.customer.city.prop('id') + "']").hide();
            fields.customer.city.parent().removeClass("dark has-error");
        }
        
        if (fields.customer.address.val().length == 0) {
            fields.customer.address.parent().addClass("dark has-error");
            $("div[for='" + fields.customer.address.prop('id') + "']").show();
            valid = false;
        } else {
             $("div[for='" + fields.customer.address.prop('id') + "']").hide();
            fields.customer.address.parent().removeClass("dark has-error");
        }
        
        if (fields.customer.district.val().length == 0) {
            fields.customer.district.parent().addClass("dark has-error");
            $("div[for='" + fields.customer.district.prop('id') + "']").show();
            valid = false;
        } else {
             $("div[for='" + fields.customer.district.prop('id') + "']").hide();
            fields.customer.district.parent().removeClass("dark has-error");
        }
        
        if (fields.customer.cep.val().length == 0) {
            fields.customer.cep.parent().addClass("dark has-error");
            $("div[for='" + fields.customer.cep.prop('id') + "']").show();
            valid = false;
        } else {
             $("div[for='" + fields.customer.cep.prop('id') + "']").hide();
            fields.customer.cep.parent().removeClass("dark has-error");
        }
        
        if (fields.customer.phone.val().length == 0) {
            fields.customer.phone.parent().addClass("dark has-error");
            $("div[for='" + fields.customer.phone.prop('id') + "']").show();
            valid = false;
        } else {
             $("div[for='" + fields.customer.phone.prop('id') + "']").hide();
            fields.customer.phone.parent().removeClass("dark has-error");
        }
        
        if (fields.customer.email.val().length == 0) {
            fields.customer.email.parent().addClass("dark has-error");
            $("div[for='" + fields.customer.email.prop('id') + "']").show();
            valid = false;
        } else {
             $("div[for='" + fields.customer.email.prop('id') + "']").hide();
            fields.customer.email.parent().removeClass("dark has-error");
        }
        
        //
        
        if (fields.delivery_address.city.val().length == 0) {
            fields.delivery_address.city.parent().addClass("dark has-error");
            $("div[for='" + fields.delivery_address.city.prop('id') + "']").show();
            valid = false;
        } else {
             $("div[for='" + fields.delivery_address.city.prop('id') + "']").hide();
            fields.delivery_address.city.parent().removeClass("dark has-error");
        }
        
        if (fields.delivery_address.cep.val().length == 0) {
            fields.delivery_address.cep.parent().addClass("dark has-error");
            $("div[for='" + fields.delivery_address.cep.prop('id') + "']").show();
            valid = false;
        } else {
             $("div[for='" + fields.delivery_address.cep.prop('id') + "']").hide();
            fields.delivery_address.cep.parent().removeClass("dark has-error");
        }
        
        if (fields.delivery_address.address.val().length == 0) {
            fields.delivery_address.address.parent().addClass("dark has-error");
            $("div[for='" + fields.delivery_address.address.prop('id') + "']").show();
            valid = false;
        } else {
             $("div[for='" + fields.delivery_address.address.prop('id') + "']").hide();
            fields.delivery_address.address.parent().removeClass("dark has-error");
        }
        
        if (fields.delivery_address.district.val().length == 0) {
            fields.delivery_address.district.parent().addClass("dark has-error");
            $("div[for='" + fields.delivery_address.district.prop('id') + "']").show();
            valid = false;
        } else {
             $("div[for='" + fields.delivery_address.district.prop('id') + "']").hide();
            fields.delivery_address.district.parent().removeClass("dark has-error");
        }
        
        //
        
        if (fields.billing_address.cep.val().length == 0) {
            fields.billing_address.cep.parent().addClass("dark has-error");
            $("div[for='" + fields.billing_address.cep.prop('id') + "']").show();
            valid = false;
        } else {
             $("div[for='" + fields.billing_address.cep.prop('id') + "']").hide();
            fields.billing_address.cep.parent().removeClass("dark has-error");
        }
        
        if (fields.billing_address.address.val().length == 0) {
            fields.billing_address.address.parent().addClass("dark has-error");
            $("div[for='" + fields.billing_address.address.prop('id') + "']").show();
            valid = false;
        } else {
             $("div[for='" + fields.billing_address.address.prop('id') + "']").hide();
            fields.billing_address.address.parent().removeClass("dark has-error");
        }
        
        if (fields.billing_address.district.val().length == 0) {
            fields.billing_address.district.parent().addClass("dark has-error");
            $("div[for='" + fields.billing_address.district.prop('id') + "']").show();
            valid = false;
        } else {
             $("div[for='" + fields.billing_address.district.prop('id') + "']").hide();
            fields.billing_address.district.parent().removeClass("dark has-error");
        }
        
        if (fields.billing_address.city.val().length == 0) {
            fields.billing_address.city.parent().addClass("dark has-error");
            $("div[for='" + fields.billing_address.city.prop('id') + "']").show();
            valid = false;
        } else {
             $("div[for='" + fields.billing_address.city.prop('id') + "']").hide();
            fields.billing_address.city.parent().removeClass("dark has-error");
        }
        
        //
        
        if ($(fields.business_contact.dept[0]).val().length == 0) {
            $(fields.business_contact.dept[0]).parent().parent().addClass("dark has-error");
            $("div[for='" + $(fields.business_contact.dept[0]).prop('name') + "']").show();
            valid = false;
        } else {
             $("div[for='" + $(fields.business_contact.dept[0]).prop('name') + "']").hide();
            $(fields.business_contact.dept[0]).parent().parent().removeClass("dark has-error");
        }
        
        if ($(fields.business_contact.phone[0]).val().length == 0) {
            $(fields.business_contact.phone[0]).parent().parent().addClass("dark has-error");
            $("div[for='" + $(fields.business_contact.phone[0]).prop('name') + "']").show();
            valid = false;
        } else {
             $("div[for='" + $(fields.business_contact.phone[0]).prop('name') + "']").hide();
            $(fields.business_contact.phone[0]).parent().parent().removeClass("dark has-error");
        }
        
        if ($(fields.business_contact.email[0]).val().length == 0) {
            $(fields.business_contact.email[0]).parent().parent().addClass("dark has-error");
            $("div[for='" + $(fields.business_contact.email[0]).prop('name') + "']").show();
            valid = false;
        } else {
             $("div[for='" + $(fields.business_contact.email[0]).prop('name') + "']").hide();
            $(fields.business_contact.email[0]).parent().parent().removeClass("dark has-error");
        }
        
        if ($(fields.business_contact.name[0]).val().length == 0) {
            $(fields.business_contact.name[0]).parent().parent().addClass("dark has-error");
            $("div[for='" + $(fields.business_contact.name[0]).prop('name') + "']").show();
            valid = false;
        } else {
             $("div[for='" + $(fields.business_contact.name[0]).prop('name') + "']").hide();
            $(fields.business_contact.name[0]).parent().parent().removeClass("dark has-error");
        }
        
        if (fields.customer.type.val() == 0) {
            fields.customer.type.parent().addClass("dark has-error");
            $("div[for='" + fields.customer.type.prop('id') + "']").show();
            valid = false;
        } else {
             $("div[for='" + fields.customer.type.prop('id') + "']").hide();
            fields.customer.type.parent().removeClass("dark has-error");
        }
        
        if (valid) { 
            sendCustomer(); 
        } else {
            $("#form-alert").modal("toggle");
            window.location.href = "#rep_portfolio_add";
        }
        
    });
        
    function sendCustomer() {
        var data = {}, i = 0, j = 0, k = 0, l = 0;
        
        data.customer = {};
        
        data.customer.company_name = fields.customer.company_name.val();
        data.customer.fantasy_name = fields.customer.fantasy_name.val();
        data.customer.cnpj = fields.customer.cnpj.val();
        data.customer.ie = fields.customer.ie.val();
        data.customer.city = fields.customer.city.val();
        data.customer.uf = fields.customer.uf.val();
        data.customer.address = fields.customer.address.val();
        data.customer.district = fields.customer.district.val();
        data.customer.cep = fields.customer.cep.val();
        data.customer.phone = fields.customer.phone.val();
        data.customer.email = fields.customer.email.val();
        data.customer.icms_taxpayer = fields.customer.icms_taxpayer.val();
        data.customer.type = fields.customer.type.val();
        
        data.delivery_address = {};
        
        data.delivery_address.city = fields.delivery_address.city.val();
        data.delivery_address.district = fields.delivery_address.district.val();
        data.delivery_address.uf = fields.delivery_address.uf.val();
        data.delivery_address.address = fields.delivery_address.address.val();
        data.delivery_address.cep = fields.delivery_address.cep.val();
        
        data.billing_address = {};
        
        data.billing_address.city = fields.billing_address.city.val();
        data.billing_address.district = fields.billing_address.district.val();
        data.billing_address.uf = fields.billing_address.uf.val();
        data.billing_address.address = fields.billing_address.address.val();
        data.billing_address.cep = fields.billing_address.cep.val();
    
        data.business_contact = [];
        
        for (; i <= 1; i++) {
            data.business_contact.push({});
            
            data.business_contact[i].name = fields.business_contact.name[i].value;
            data.business_contact[i].email = fields.business_contact.email[i].value;
            data.business_contact[i].phone = fields.business_contact.phone[i].value;
            data.business_contact[i].dept = fields.business_contact.dept[i].value;
        }
        
        data.partner = [];
        
        for (; j <= 3; j++) {
            data.partner.push({});
            
            data.partner[j].name = fields.partner.name[j].value;
            data.partner[j].email = fields.partner.email[j].value;
            data.partner[j].phone = fields.partner.phone[j].value;
            data.partner[j].cpf = fields.partner.cpf[j].value;
        }
        
        data.main_provider = [];
        
        for (; k <= 1; k++) {
            data.main_provider.push({});
            
            data.main_provider[k].name = fields.main_provider.name[k].value;
            data.main_provider[k].email = fields.main_provider.email[k].value;
            data.main_provider[k].phone = fields.main_provider.phone[k].value;
            data.main_provider[k].company = fields.main_provider.company[k].value;
        }
        
        data.suppliers = {};
        
        data.suppliers.sanitary = fields.suppliers.sanitary.val();
        data.suppliers.ware = fields.suppliers.ware.val();
        
        data.own_seat = fields.own_seat.val();
        data.annual_income = fields.annual_income.val();
        
        data.bank_account = [];
        
        for (; l <= 2; l++) {
            data.bank_account.push({});
            
            data.bank_account[l].bank = fields.bank_account.bank[l].value;
            data.bank_account[l].agency = fields.bank_account.agency[l].value;
            data.bank_account[l].number = fields.bank_account.number[l].value;
        }

        data._token = $("#_token").val();
        
        $.ajax({
            url: "http://deltafaucetrep.com/portfolio/new",
            type: "post",
            data: data,
            success: function (d) {
                @if ($user->getUserType()->cod != 40)
                    window.location.href = "http://deltafaucetrep.com/portfolio/list";
                @else
                    window.location.href = "http://deltafaucetrep.com/customer/list";
                @endif
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
                $("#ui-error-alert").modal("toggle");
            }
        });
        
    }
    
});
</script>

<!-- <script src="http://static.deltafaucetrep.com/assets/javascripts/rep_portfolio.js"></script> -->

@endsection