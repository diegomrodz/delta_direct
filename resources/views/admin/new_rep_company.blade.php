@extends('layouts.master')

@section('title', 'Cadastrar Nova Representação')

@section('content')
<div class="row">
	<div class="col-sm-12">

		<form class="panel form-horizontal" method="POST" action="http://deltafaucetrep.com/admin/new_rep_company">
			<div class="panel-heading">
				<span class="panel-title">Cadastrar Nova Representação</span>
			</div>
			<div class="panel-body">

                {!! csrf_field() !!}
                
                <div class="form-group col-sm-6">
					<label for="name" class="col-sm-3 control-label">Nome:</label>
					<div class="col-sm-8">
						<input id="name" name="name" type="text" class="form-control" >
					</div>
				</div>
                
                <div class="form-group col-sm-6">
					<label for="nickname" class="col-sm-3 control-label">Abrev.:</label>
					<div class="col-sm-8">
						<input id="nickname" name="nickname" type="text" class="form-control" >
					</div>
				</div>
                
                <div class="form-group col-sm-6">
					<label for="cnpj" class="col-sm-3 control-label">CNPJ:</label>
					<div class="col-sm-8">
						<input id="cnpj" name="cnpj" type="text" class="form-control">
					</div>
				</div>
                
                <div class="form-group col-sm-6">
					<label for="ie" class="col-sm-3 control-label">IE:</label>
					<div class="col-sm-8">
						<input id="ie" name="ie" type="text" class="form-control">
					</div>
				</div>
                
                <div class="form-group col-sm-6">
					<label for="phone" class="col-sm-3 control-label">Telefone:</label>
					<div class="col-sm-8">
						<input id="phone" name="phone" type="text" class="form-control">
					</div>
				</div>
                
                <div class="form-group col-sm-6">
					<label for="phone2" class="col-sm-3 control-label">Telefone 2:</label>
					<div class="col-sm-8">
						<input id="phone2" name="phone2" type="text" class="form-control">
					</div>
				</div>
                
                <div class="form-group col-sm-6">
					<label for="email" class="col-sm-3 control-label">Email:</label>
					<div class="col-sm-8">
						<input id="email" name="email" type="text" class="form-control">
					</div>
				</div>
                
                <div class="form-group col-sm-6">
					<label for="bank_name" class="col-sm-3 control-label">Banco:</label>
					<div class="col-sm-8">
						<input id="bank_name" name="bank_name" type="text" class="form-control">
					</div>
				</div>
                
                <div class="form-group col-sm-6">
					<label for="bank_cc" class="col-sm-3 control-label">C/C:</label>
					<div class="col-sm-8">
						<input id="bank_cc" name="bank_cc" type="text" class="form-control">
					</div>
				</div>
                
                <div class="form-group col-sm-6">
					<label for="bank_cc" class="col-sm-3 control-label">Agência:</label>
					<div class="col-sm-8">
						<input id="bank_agency" name="bank_agency" type="text" class="form-control">
					</div>
				</div>
                
                <div class="form-group col-sm-6">
					<label for="state" class="col-sm-3 control-label">UF:</label>
					<div class="col-sm-8">
						<select name="state" id="state" class="form-control">
                            @foreach ($user->getAllStates() as $uf)
                                <option value="{{$uf->uf}}">{{$uf->nome}}</option>
                            @endforeach
                        </select>
					</div>
				</div>
                
                <div class="form-group col-sm-6">
					<label for="city" class="col-sm-3 control-label">Cidade:</label>
					<div class="col-sm-8">
						<input id="city" name="city" type="text" class="form-control">
					</div>
				</div>
                
                <div class="form-group col-sm-6">
					<label for="district" class="col-sm-3 control-label">Bairro:</label>
					<div class="col-sm-8">
						<input id="district" name="district" type="text" class="form-control">
					</div>
				</div>
                
                <div class="form-group col-sm-6">
					<label for="cep" class="col-sm-3 control-label">CEP:</label>
					<div class="col-sm-8">
						<input id="cep" name="cep" type="text" class="form-control">
					</div>
				</div>
                
                <div class="form-group col-sm-6">
					<label for="address" class="col-sm-3 control-label">Endereço:</label>
					<div class="col-sm-8">
					    <textarea name="address" id="address" class="form-control" rows="3"></textarea>
                    </div>
				</div>
                
                <div class="form-group col-sm-6">
					<label for="has_shared_portfolio" class="col-sm-3 control-label">Possui portfolio compartilhado:</label>
					<div class="col-sm-8">
					    <select name="has_shared_portfolio" id="has_shared_portfolio" class="form-control">
                            <option value="s">Sim</option>
                            <option value="n">Não</option>
                        </select>
                    </div>
				</div>
                
            </div>
            <div class="panel-footer">
                <button id="btn_new_rep_company" type="submit" class="btn btn-flat btn-md btn-success"><span class="btn-label icon fa "></span>Nova Representação</button>
            </div>
		</form>

	</div>
</div>

<input type="hidden" id="_token" value="{{ csrf_token() }}">

@endsection

@section('end')

<script type="text/javascript">



</script>

@endsection