@extends('layouts.door')

@section('title', 'Login')

@section('content')
<!-- Left side -->
<div class="signin-info">
	<a href="index.html" class="logo">
		Delta Direct
	</a> <!-- / .logo -->
	<div class="slogan">
		See what Delta can do.
	</div> <!-- / .slogan -->
	<ul>
		<li><i class="fa fa-check signin-icon"></i> Chrome</li>
		<li><i class="fa fa-check signin-icon"></i> Mozilla Firefox</li>
		<li><i class="fa fa-check signin-icon"></i> Safari e Opera</li>
		<li><i class="fa fa-close signin-icon"></i> Internet Explorer</li>
	</ul> <!-- / Info list -->
</div>
<!-- / Left side -->

<!-- Right side -->
<div class="signin-form">

	<!-- Form -->
	<form action="/auth/login" id="signin-form" method="post" novalidate="novalidate">
		<div class="signin-text">
			<span>Acesse o Delta Direct</span>
		</div> <!-- / .signin-text -->

		<div class="form-group w-icon">
			<input type="text" name="signin_email" id="username_id" class="form-control input-lg" placeholder="Endereço de Email">
			<span class="fa fa-user signin-form-icon"></span>
		</div> <!-- / Username -->

		<div class="form-group w-icon">
			<input type="password" name="signin_password" id="password_id" class="form-control input-lg" placeholder="Senha">
			<span class="fa fa-lock signin-form-icon"></span>
		</div> <!-- / Password -->

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="form-actions">
			<input type="submit" value="ENTRAR" class="signin-btn bg-primary">
			<a href="#" class="forgot-password" id="forgot-password-link">Esqueceu sua senha?</a>
		</div> <!-- / .form-actions -->
	</form>
	<!-- / Form -->

	
	<!-- Password reset form -->
	<div class="password-reset-form" id="password-reset-form">
		<div class="header">
			<div class="signin-text">
				<span>Esqueceu sua senha?</span>
				<div class="close">×</div>
			</div> <!-- / .signin-text -->
		</div> <!-- / .header -->
		
		<!-- Form -->
		<form id="password-reset-form_id" novalidate="novalidate">
			<div class="form-group w-icon">
				<input type="text" name="password_reset_email" id="password_reset_email" class="form-control input-lg" placeholder="Seu Email">
				<span class="fa fa-envelope signin-form-icon"></span>
			</div> <!-- / Email -->

			<div class="form-actions">
				<input id="resetPassword" type="submit" value="Enviar email com nova senha" class="signin-btn bg-primary">
			</div> <!-- / .form-actions -->
		</form>
		<!-- / Form -->
	</div>
	<!-- / Password reset form -->
</div>
<!-- Right side -->

@endsection

@section('end')

<script type="text/javascript">

    $("#resetPassword").click(function () {
        var data = {};
        
        data.email = $("#password_reset_email").val();
        data._token = $("#_token").val();
        
        var req = $.ajax({
            url: "http://deltafaucetrep.com/auth/reset_password",
            dataType: "json",
            data: data,
            type: "post"
        });
        
        req.error(function () {
            alert("Houve um erro ao resetar a senha, por favor entre em contato com a Delta.");    
        });
        
        req.success(function () {
            alert("Sua senha foi enviada para seu email de cadastro.");        
        });
    });
    
</script>

@endsection