@extends('layouts.master')

@section('title', 'Enviar Convite')

@section('content')
<div class="row">
	<div class="col-sm-12">

<!-- 10. $FORM_EXAMPLE =============================================================================

		Form example
-->
		<form class="panel form-horizontal">
			<div class="panel-heading">
				<span class="panel-title">Enviar convite para:</span>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label for="userName" class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-8">
						<input id="userName" name="userName" type="text" class="form-control" placeholder="Nome">
					</div>
				</div> <!-- / .form-group -->
				<div class="form-group">
					<label for="userEmail" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="userEmail" id="userEmail" placeholder="Email">
					</div>
				</div> <!-- / .form-group -->
				<div class="form-group">
					<label for="userType" class="col-sm-2 control-label">Tipo de Usuário</label>
					<div class="col-sm-8">
						<select id="userType" name="userType" class="form-control form-group-margin">
							<option value="" >-</option>
							<option value="10" >Representante</option>
							<option value="20">Gerente de Vendas</option>
							<option value="40">Gerência Comercial</option>
						</select>
					</div>
				</div> <!-- / .form-group -->
				<div class="form-group">
					<label for="invitationTicket" class="col-sm-2 control-label">Ticket</label>
					<div class="col-sm-8">
						<textarea readonly id="invitationTicket" name="invitationTicket" class="form-control"></textarea>
					</div>
				</div> <!-- / .form-group -->
				<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
				<div class="form-group" style="margin-bottom: 0;">
					<div class="col-sm-offset-2 col-sm-10">
						<button id="invitationSend" name="invitationSend" type="button" class="btn btn-primary">Enviar</button>
					</div>
				</div> <!-- / .form-group -->
			</div>
		</form>
<!-- /10. $FORM_EXAMPLE -->

	</div>
</div>
@endsection

@section('end')

<script src="http://static.deltafaucetrep.com/assets/javascripts/send_invitation.js" type="text/javascript"></script>

@endsection