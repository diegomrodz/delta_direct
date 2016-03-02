@extends('layouts.master')

@section('title', 'Ranking de Organizações')

@section('content')

<script type="text/javascript">

    window.document.body.className += " page-mail";
    
</script>

<div style="margin-left:0px;" class="mail-container">
	<div class="col-sm-12">
        
        <div class="mail-container-header">
			Ranking de Organizações

			<form action="#" class="pull-right" style="width: 300px;margin-top: 3px;">
				<div class="form-group input-group-sm has-feedback no-margin">
					<input id="search_input" type="text" placeholder="Busca" class="form-control">
					<span class="fa fa-search form-control-feedback" style="top: -1px"></span>
				</div>
			</form>
		</div>
		
		<div class="mail-controls clearfix">
            <div class="btn-toolbar wide-btns pull-left" role="toolbar">

                <div class="btn-group">
                    <button id="btn_mark_rows" type="button" class="btn "><i class="fa fa-check-square-o"></i>&nbsp;<i class="fa fa-caret-down"></i>
                    </button>
                    <button id="btn_refresh_search" type="button" class="btn"><i class="fa fa-repeat"></i>
                    </button>
                </div>
                
            </div>

        </div>
		
        <div class="table-responsive">
            <table class="table table-striped" id="organization_table">
                <thead>
                    <tr>
						<th>Pontuação</th>
						<th>Nome</th>
                        <th>Influência</th>
                        <th>Influência Média</th>
						<th>Influência Média p/ Influênciador</th>
                        <th>Influência Projetos Ganhos</th>
                        <th>Qtd. Influenciadores Ativos</th>
                        <th>Qtd. Projetos</th>
						<th>Total Projetos</th>
                        <th>Qtd. Projetos Ganhos</th>
						<th>Total Projetos Ganhos</th>
                    </tr>
                </thead>
                <tbody>
					@foreach ($that->getOrganizationRanking() as $org)
					<tr>
						<td></td>
						<td>{{$org["f_name"]}}</td>
						<td>{{$org["sum_level"]}}</td>
						<td>{{$org["sum_level"] / $org["num_projects"]}}</td>
						<td></td>
						<td></td>
						<td></td>
						<td>{{$org["num_projects"]}}</td>
						<td style="white-space: nowrap;">R$ {{number_format($org["total_projects"], 2, ",", ".")}}</td>
						<td></td>
						<td></td>
					</tr>
					@endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('end')

<script type="text/javascript">

	 var table = $('#organization_table').DataTable({ sDom: "", paging: false, responsive: { details: false } });

	$("#search_input").keyup(function () {
		table.search($(this).val() == "" ? " " : $(this).val()).draw();
	});


	$("#btn_refresh_search").click(function () {
		table.search(" ").draw();    
	});
	
   
	
</script>

@endsection