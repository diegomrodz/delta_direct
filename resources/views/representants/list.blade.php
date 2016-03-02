@extends('layouts.master')

@section('title', 'Carteira de Clientes')

@section('content')


<div class="row">
	<div class="col-sm-12">

<!-- 5. $DEFAULT_TABLES ============================================================================

		Default tables
-->
		<div class="panel">
			<div class="panel-heading">
				<span class="panel-title">Minha Carteira</span>
                
			</div>
			<div class="panel-body">
                <div class="table-responsive">
				<table class="table" id="portfolio_table">
					<thead>
						<tr>
                            <th>Nome</th>
                            <th>Agência</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Adicionado Em</th>
						</tr>
					</thead>
					<tbody>
                        @foreach($reps as $rep)
                            <tr>
                                <td><a href="http://deltafaucetrep.com/profile/{{$rep->user()->user_id}}/detail">{{$rep->user()->name . " " . $rep->user()->surname}}</a></td>
                                <td>{{$rep->company()->name}}</td>
                                <td><a href="mailto:{{$rep->user()->email}}">{{$rep->user()->email}}</a></td>
                                <td>{{$rep->phone}}</td>
                                <td>{{$rep->updated_at}}</td>
                            </tr>
                        @endforeach
					</tbody>
				</table>
                </div>
			</div>
		</div>
<!-- /5. $DEFAULT_TABLES -->

	</div>
</div>

@endsection

@section('end')

<script type="text/javascript">
	$(document).ready(function () {
	    $('#portfolio_table').DataTable({responsive: { details: false }});
	});
</script>

@endsection