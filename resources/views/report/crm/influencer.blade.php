@extends('layouts.master')

@section('title', 'Ranking de Influenciadores')

@section('content')

<script type="text/javascript">

    window.document.body.className += " page-mail";
    
</script>

<div style="margin-left:0px;" class="mail-container">
	<div class="col-sm-12">
        
        <div class="mail-container-header">
			Ranking de Influenciadores

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
            <table class="table table-striped" id="influencers_table">
                <thead>
                    <tr>
						<th>Pontuação</th>
						<th>Nome</th>
                        <th>Fator Competência</th>
						<th>Fator Influência</th>
						<th>Fator Financeiro</th>
						<th>Fator Engajamento</th>
						<th>Influência</th>
                        <th>Influência Média</th>
						<th>Influência Projetos Ganhos</th>
                        <th>Qtd. Projetos</th>
						<th>Total Projetos</th>
                        <th>Qtd. Projetos Ganhos</th>
						<th>Total Projetos Ganhos</th>
                    </tr>
                </thead>
                <tbody>
					@foreach($that->getInfluencersRanking() as $inf)
					<tr>
						<td>{{number_format($inf["pontuation"] * 100, 2, ",", "")}}</td>
						<td><a href="#" onclick="detailInfluencer({{$inf['id']}});" data-target="#influencerDetailModal" data-toggle="modal">{{$inf["name"] . " " . $inf["surname"]}}</a></td>
						<td>{{number_format($inf["competence_factor"] * 400, 2, ",", "")}}</td>
						<td>{{number_format($inf["influence_factor"] * 100, 2, ",", "")}}</td>
						<td>{{number_format($inf["finance_factor"] * 100, 2, ",","")}}</td>
						<td>{{$inf["mkt_factor"]}}</td>
						<td>{{$inf["sum_level"]}}</td>
						<td>{{$inf["sum_level"] / $inf["num_projects"]}}</td>
						<td>{{$inf["won_sum_level"] or 0}}</td>
						<td>{{$inf["num_projects"] or 0}}</td>
						<td data-order="{{$inf['total_projects']}}" style="white-space: nowrap;">R$ {{number_format($inf["total_projects"], 2, ",", ".")}}</td>
						<td>{{$inf["won_num_projects"] == null ? 0 : $inf["won_num_projects"]}}</td>
						<td data-order='{{$inf["won_total_projects"]}}' style="white-space: nowrap;">R$ {{$inf["won_total_projects"] == null ? "0,00" : number_format($inf["won_total_projects"], 2, ".", ",")}}</td>
					</tr>
					@endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="influencerDetailModal" class="modal fade">
    <div style="width:900px" class="modal-dialog">
        <div class="modal-content" >
            <div class="modal-body" id="influencerDetailBody">

            </div>
        </div>
    </div>
</div>

@endsection

@section('end')

<script type="text/javascript">

	 var table = $('#influencers_table').DataTable({ 
		 sDom: "", 
		 paging: false,
		 order: [[0, 'desc']] 
	 });

	$("#search_input").keyup(function () {
		table.search($(this).val() == "" ? " " : $(this).val()).draw();
	});


	$("#btn_refresh_search").click(function () {
		table.search(" ").draw();    
	});
	
	function detailInfluencer(id) {
		$.ajax({
			url: "http://deltafaucetrep.com/report/crm/influencer/detail/" + id,
			type: "get",
			dataType: "html"
		}).done(function (html) {
			$("#influencerDetailBody").html(html);
		});
	}
	
</script>

@endsection