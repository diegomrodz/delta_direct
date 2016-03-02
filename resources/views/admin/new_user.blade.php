@extends('layouts.master')

@section('title', 'Cadastrar Novo Usuário')

@section('content')
<div class="row">
	<div class="col-sm-12">

		<form class="panel form-horizontal">
			<div class="panel-heading">
				<span class="panel-title">Cadastrar Novo Usuário</span>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label for="userName" class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-8">
						<input id="userName" name="userName" type="text" class="form-control" placeholder="Nome">
					</div>
				</div>
                <div class="form-group">
					<label for="userName" class="col-sm-2 control-label">Sobrenome</label>
					<div class="col-sm-8">
						<input id="userSurame" name="userSurname" type="text" class="form-control" placeholder="Sobreome">
					</div>
				</div>
                <div class="form-group">
					<label for="userEmail" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="userEmail" id="userEmail" placeholder="Email">
					</div>
				</div>
				<div class="form-group">
					<label for="userType" class="col-sm-2 control-label">Tipo de Usuário</label>
					<div class="col-sm-8">
						<select id="userType" name="userType" class="form-control form-group-margin">
							<option value="" >-</option>
                            @foreach ($user->getAllUserTypes() as $u)
							    <option value="{{$u->user_type_id}}" >{{$u->description}}</option>
                            @endforeach
						</select>
					</div>
				</div>
                <hr>
                <div class="form-group">
					<label for="userType" class="col-sm-2 control-label">Gerente de Vendas</label>
					<div class="col-sm-8">
						<select disabled="disabled" id="repManager" name="repManager" class="form-control form-group-margin">
							@foreach ($user->getAllManagers() as $m)
							    <option value="{{$m->manager_id}}" >{{$m->user()->name . " " . $m->user()->surname}}</option>
                            @endforeach
						</select>
					</div>
				</div>
                
                <div class="form-group">
					<label for="userType" class="col-sm-2 control-label">Representação</label>
					<div class="col-sm-8">
						<select disabled="disabled" id="repCompany" name="repCompany" class="form-control form-group-margin">
							@foreach ($user->getAllRepCompanies() as $c)
							    <option value="{{$c->representant_company_id}}" >{{$c->name}}</option>
                            @endforeach
						</select>
					</div>
		        </div>
            </div>
            <div class="panel-footer">
                <button id="btn_new_user" type="button" class="btn btn-flat btn-md btn-success"><span class="btn-label icon fa "></span>Novo Usuário</button>
            </div>
		</form>

	</div>
</div>

<input type="hidden" id="_token" value="{{ csrf_token() }}">

@endsection

@section('end')

<script type="text/javascript">

    $("#btn_new_user").click(function (e) {
        e.preventDefault();
        var data = {};
        
        data.name = $("#userName").val();
        data.surname = $("#userSurame").val();
        data.email = $("#userEmail").val();
        data.user_type = $("#userType").val();
        
        data.rep_manager = $("#repManager").val();
        data.rep_company = $("#repCompany").val();
        
        data._token = $("#_token").val();
        
        $.ajax({
            url: "http://deltafaucetrep.com/admin/new_user",
            type: "POST",
            data: data,
            dataType: "json"
        }).success(function () {
            alert("Usuário cadastrado com sucesso!");
        }).error(function () {
            alert("Erro ao cadastrar usuário!");    
        });
    });
    
    $("#userType").change(function () {
        if ($(this).val() == 1) {
            $("#repManager").prop("disabled", "");
            $("#repCompany").prop("disabled", "");
        } else {
            $("#repManager").prop("disabled", "disabled");
            $("#repCompany").prop("disabled", "disabled");
        }
    });

</script>

@endsection