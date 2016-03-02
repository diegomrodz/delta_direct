@extends('layouts.master')

@section('title', 'Listar Influenciadores')

@section('content')

<script type="text/javascript">

    window.document.body.className += " page-mail";
    
</script>

<div style="margin-left:0px;" class="mail-container">
	<div class="col-sm-12">
        
        <div class="mail-container-header">
			@if ($user->getUserType()->cod != 40)
                Meus Influenciadores
            @else
                Delta CRM
            @endif

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
                
				<div class="btn-group">
                    @if ($user->getUserType()->cod == 40)
						<button id="btn_disable_infs" title="Excluir Pessoas" type="button" class="btn "><i class="fa fa-user-times"></i>
						</button>
						<button data-toggle="modal" data-target="#chooseNewOrganizationModal" title="Mudar Organização" type="button" class="btn "><i class="fa fa-plane"></i>
						</button>
						<button id="unifyInfluencers" title="Unificar Pessoas" type="button" class="btn "><i class="fa fa-users"></i>
						</button>
					@endif
                </div>

            </div>

        </div>
        
        <div class="table-responsive">
            <table class="table table-striped" id="budgets_table">
                <thead>
                    <tr>
						<th>#</th>
                        <th>Nome</th>
                        <th>Organização</th>
                        <th>Email</th>
                        <th>Tipo de Influência</th>
                        <th>Telefone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->getAllPeopleRelated() as $inf)
                    <tr data-influencer-id="{{$inf['entity_id']}}">
						<td>
							<input type="checkbox" style="width:16px;height:16px;margin-bottom:6px;" class="px influencer_checkbox">
						</td>
                        <td data-search='{{$inf["people_name"] . " " . $inf["people_surname"]}}'><a href="#" onclick='influencerDetail({{$inf["entity_id"]}})'>{{$inf["people_name"] . " " . $inf["people_surname"]}}</a></td>
                        @if ($inf['customer_id'] != 'N.I')
						<td><a href="http://deltafaucetrep.com/portfolio/detail/{{$inf['customer_id']}}">{{$inf["organization_name"]}}</a></td>
                        @else
						<td>N.I</td>
						@endif
						<td>{{$inf["people_email"]}}</td>
                        <td>{{$user->getInfluencerType($inf["people_influencer_type"]) == null ? "N.I" : $user->getInfluencerType($inf["people_influencer_type"])->description}}</td>
                        <td>{{$inf["people_phone"]}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="influencerDetailModal" class="modal fade">
    <div style="width:500px" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="influencerDetailBody">

            </div>
        </div>
    </div>
</div>

<div id="unifyInfluencerDetailModal" class="modal fade">
    <div style="width:700px" class="modal-dialog">
        <div class="modal-content">
			<div class="modal-body" id="unifyInfluencerDetailBody">

            </div>
        </div>
    </div>
</div>

<div id="chooseNewOrganizationModal" class="modal fade">
	<div style="width:400px" class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body" id="organizationListBody">
				<p>Você deseja mover as pessoas selecionadas para qual organização?</p>
				<div class="form-group no-margin-hr">
					<select class="form-control" id="influencer_org">
						<option value="-" selected>Selecione</option>
						@foreach($user->getAllCustomers() as $org)
						<option value="{{$org->customer_id}}">{{$org->fantasy_name or $org->company_name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group no-margin-hr text-right">
					<button id="btn_change_organization"  class="btn btn-flat btn-md btn-success"><span class="btn-label icon fa "></span>Alterar</button>
    			</div>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="_token" value="{{ csrf_token() }}">

@endsection

@section('end')

<script type="text/javascript">
	$(document).ready(function () {
	    var table = $('#budgets_table').DataTable({
            sDom: "",
            paging: false
        });
        
        $("#search_input").keyup(function () {
            table.search($(this).val() == "" ? " " : $(this).val()).draw();
        });
        
		 $("#btn_refresh_search").click(function () {
            table.search(" ").draw();    
        });
		
		$("#unifyInfluencers").click(function () {
			var data = {};
			
			data["selected"] = [];
			
			$(".influencer_checkbox:checked").each(function (key, value) {
				var id = $(value).parent('td').parent('tr').data('influencer-id');
				
				data["selected"].push(id);
			});
			
			if (data["selected"].length != 2) {
				alert("Está funcionalidade precisa que apenas 2 pessoas sejam selecionadas.");
				return;
			}
			
			$.ajax({
				url: "http://deltafaucetrep.com/tracker/influencer/unify/" + data["selected"][0] + "/" + data["selected"][1],
				type: "GET",
				dataType: "html"
			}).done(function (html) {
				$("#unifyInfluencerDetailBody").html(html);
			});
			
			$("#unifyInfluencerDetailModal").modal("toggle");
		});
		
		$("#btn_change_organization").click(function () {
			var org_id = $("#influencer_org").val();
			
			if (org_id == "-") {
				alert("Selecione uma organização para continuar.");
				return;
			}
			
			var data = {};
			
			data["_token"] = $("#_token").val();
			
			data["selected"] = [];
			
			$(".influencer_checkbox:checked").each(function (key, value) {
				var id = $(value).parent('td').parent('tr').data('influencer-id');
				
				data["selected"].push(id);
			});
			
			if (data["selected"].length == 0) {
				alert("Selecione pelo menos uma pessoa para continuar.");
			}
			
			$.ajax({
				url: "http://deltafaucetrep.com/tracker/influencer/change-to-org/" + org_id,
				type: "POST",
				data: data,
				dataType: "json"
			});
			
			setTimeout(function () {
				window.location.reload();
			}, 1000);
		});
		
		$("#btn_disable_infs").click(function () {
			if (!confirm("Você tem certeza que deseja excluir as pessoas selecionadas?")) return;
			
			$(".influencer_checkbox:checked").each(function (key, value) {
				var id = $(value).parent('td').parent('tr').data('influencer-id');
				
				$.ajax({
					url: "http://deltafaucetrep.com/tracker/disable-influencer/" + id,
					type: "get"
				}).error(function () {
					alert("Houve um erro ao excluir a pessoa de id " + id);	
				});
			});
			
			setTimeout(function () {
				window.location.reload();
			}, 500);
		});
        
		 $("#btn_mark_rows").click(function () {
			var has_check = false;

			$(".influencer_checkbox").each(function (key, value) { 
				if ($(value).prop('checked')) {
					has_check = true;
				}
			});

			if (has_check) {
				$(".influencer_checkbox").prop('checked', false);
			} else {
				$(".influencer_checkbox").prop('checked', true);
			}
		});	
		
		$("#influencer_org").select2();
		
	});
    
    function influencerDetail(influencer_id) {
        $("#influencerDetailModal").modal("toggle");
        
        $.ajax({
            url: "http://deltafaucetrep.com/tracker/influencer/"+influencer_id+"/detail",
            type: "get",
            dataType: "html"
        }).done(function (data) {
            $("#influencerDetailBody").html(data);        
        });
    }
</script>

@endsection