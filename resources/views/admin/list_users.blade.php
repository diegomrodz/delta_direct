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
				<span class="panel-title">Usuários do Delta Direct</span>
			</div>
			<div class="panel-body">
				<table class="table" id="users_table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Tipo</th>
                            <th>Adicionado Em</th>
                            <th>Ativo</th>
						</tr>
					</thead>
					<tbody>
                @foreach($users as $u)
						<tr>
							<td>{{$u->user_id}}</td>
							<td><a href="http://deltafaucetrep.com/profile/{{$u->user_id}}/detail">{{$u->name . " " . $u->surname}}</a></td>
							<td><a href="mailto:{{$u->email}}">{{$u->email}}</a></td>
							<td>{{$u->getUserType()->description}}</td>
                            <td>{{date("d/m/Y", strtotime($u->created_at))}}</td>
                            <td>{{$u->active === "s" ? "Sim" : "Não"}}</td>
						</tr>
                @endforeach
					</tbody>
				</table>
			</div>
		</form>
<!-- /10. $FORM_EXAMPLE -->

	</div>
</div>
@endsection

@section('end')
<script>
    $("#users_table").DataTable();
</script>
@endsection