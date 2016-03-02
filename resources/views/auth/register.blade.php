@extends('layouts.door')

@section('title', 'Novo Usuário')

@section('content')
<div class="row">
<div class="col-sm-12">

<!-- 10. $FORM_EXAMPLE =============================================================================

	Form example
-->
	<form class="panel form-horizontal" method="POST" action="/auth/register/{{$ticket}}">
		<div class="panel-heading">
			<span class="panel-title">Registrar novo usuário</span>
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label for="inputNome" class="col-sm-2 control-label">Nome</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="register_name" placeholder="Digite seu nome">
				</div>
			</div> <!-- / .form-group -->
			<div class="form-group">
				<label for="inputSobrenome" class="col-sm-2 control-label">Sobrenome</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="register_surname" placeholder="Digite seu sobrenome">
				</div>
			</div> <!-- / .form-group -->
			<div class="form-group">
				<label for="inputEmail2" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
					<input readonly type="text" value="{{ $user->email }}" class="form-control" name="register_email" placeholder="Digite seu email">
				</div>
			</div> <!-- / .form-group -->
			<div class="form-group">
				<label for="inputPassword" class="col-sm-2 control-label">Senha</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" name="register_password" placeholder="Digite sua senha">
				</div>
			</div> <!-- / .form-group -->
			<div class="form-group">
				<label for="inputPassword" class="col-sm-2 control-label"></label>
				<div class="col-sm-10">
					<input type="password" class="form-control" name="register_password2" placeholder="Digite sua senha novamente"
					<p class="help-block">Sua senha deve conter apenas letras e números, além de 4 á 16 caracteres.</p>
				</div>
			</div> <!-- / .form-group -->
@if ($user->getUserType()->cod == 10)

			<div class="form-group">
				<label for="register_cpf" class="col-sm-2 control-label">CPF</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="register_cpf" placeholder="Digite seu CPF">
				</div>
			</div> <!-- / .form-group -->

			<div class="form-group">
				<label for="register_tel" class="col-sm-2 control-label">Telefone</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="register_tel" placeholder="Digite seu Telefone">
				</div>
			</div> <!-- / .form-group -->

			<div class="form-group">
				<label for="register_cel" class="col-sm-2 control-label">Celular</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="register_cel" placeholder="Digite seu Celular">
				</div>
			</div> <!-- / .form-group -->
@endif
			<div class="form-group" style="margin-bottom: 0;">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Registrar</button>
				</div>
			</div> <!-- / .form-group -->
		</div>

		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
<!-- /10. $FORM_EXAMPLE -->

</div>
</div>
@endsection