@extends('layouts.master')

@section('content')
<div class="panel">
    <div class="panel-heading">
        <span class="panel-title">{{trans('tracker_new.new_project')}}</span>
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">{{trans('tracker_new.project_detail')}}</span>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{trans('tracker_new.project_attrs.name')}}</label>
                                    <input type="text" id="project_name" class="form-control">
                                    <div for="project_name" class="jquery-validate-error help-block" style="display:none;">{{trans('tracker_new.project_attrs.required_field')}}</div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{trans('tracker_new.project_attrs.city')}}</label>
                                    <input type="text" id="project_city" class="form-control">
                                    <div for="project_city" class="jquery-validate-error help-block" style="display:none;">{{trans('tracker_new.project_attrs.required_field')}}</div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{trans('tracker_new.project_attrs.uf')}}</label>
                                    <select id="project_uf" style="margin-bottom:0px !important" class="form-control form-group-margin">
                                        @foreach($user->getAllStates() as $s)
                                        <option value="{{$s->uf}}">{{$s->uf}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{trans('tracker_new.project_attrs.address')}}</label>
                                    <input  type="text" id="project_address" class="form-control">
                                    <div for="project_address" class="jquery-validate-error help-block" style="display:none;">{{trans('tracker_new.project_attrs.required_field')}}</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{trans('tracker_new.project_attrs.district')}}</label>
                                    <input type="text" id="project_district" class="form-control">
                                    <div for="project_district" class="jquery-validate-error help-block" style="display:none;">{{trans('tracker_new.project_attrs.required_field')}}</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{trans('tracker_new.project_attrs.cep')}}</label>
                                    <input type="text" id="project_cep" class="form-control">
                                    <div for="project_cep" class="jquery-validate-error help-block" style="display:none;">{{trans('tracker_new.project_attrs.required_field')}}</div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{trans('tracker_new.project_attrs.obs')}}</label>
                                    <textarea name="" id="project_obs" cols="30" rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-sm-6">
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">{{trans('tracker_new.project_detail2')}}</span>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{trans('tracker_new.project_attrs.type')}}</label>
                                    <select id="project_type" class="form-control">
                                        <option value="-" selected></option>
                                        @foreach ($user->getAllProjectTypes() as $type)
                                            <option value="{{$type->project_type_id}}">{{$type->description}}</option>
                                        @endforeach
                                    </select>
                                    <div for="project_type" class="jquery-validate-error help-block" style="display:none;">{{trans('tracker_new.project_attrs.required_field')}}</div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{trans('tracker_new.project_attrs.est_value')}}</label>
                                    <input type="number" id="project_est_value" class="form-control">
                                    <div for="project_est_value" class="jquery-validate-error help-block" style="display:none;">{{trans('tracker_new.project_attrs.required_field')}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">{{trans('tracker_new.project_est_dates')}}</span>
                    </div>

                    
                    <table class="table">
                        <tbody>
                            @if ($user->getUserType()->cod >= 20)
                            <tr>
                                <td style="text-align:right; vertical-align: middle;"><strong>{{trans('tracker_new.project_attrs.dates.prospect')}}</strong></td>
                                <td><input id="project_prospect_date" class="form-control" type="date"></td>
                            </tr>
                            @endif
                            <tr>
                                <td style="text-align:right; vertical-align: middle;"><strong>{{trans('tracker_new.project_attrs.dates.proposal')}}</strong></td>
                                <td><input id="project_proposal_date" class="form-control" type="date"></td>
                            </tr>
                            <tr>
                                <td style="text-align:right; vertical-align: middle;"><strong>{{trans('tracker_new.project_attrs.dates.mock_up')}}</strong></td>
                                <td><input id="project_mockup_date" class="form-control" type="date"></td>
                            </tr>
                            <tr>
                                <td style="text-align:right; vertical-align: middle;"><strong>{{trans('tracker_new.project_attrs.dates.delivery')}}</strong></td>
                                <td><input id="project_delivery_date" class="form-control" type="date"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">{{trans('tracker_new.project_influencers')}}</span>
                        
                        <div class="panel-heading-controls">
                            <button id="btn_add_influencer" class="btn btn-flat btn-md btn-outline"><span class="btn-label icon fa "></span>{{trans('tracker_new.project_influencers_add')}}</button>
                            
                        </div>
                        
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{trans('tracker_new.influencers.name')}}</label>
                                    <input type="text" id="influencer_name" class="form-control">
                                    <div for="influencer_name" class="jquery-validate-error help-block" style="display:none;">{{trans('tracker_new.project_attrs.required_field')}}</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{trans('tracker_new.influencers.surname')}}</label>
                                    <input type="text" id="influencer_surname" class="form-control">
                                    <div for="influencer_surname" class="jquery-validate-error help-block" style="display:none;">{{trans('tracker_new.project_attrs.required_field')}}</div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{trans('tracker_new.influencers.type')}}</label>
                                    <select class="form-control" id="influencer_type">
                                        <option value="-" selected>Selecione</option>
                                        @foreach($user->getInfluencerTypes() as $type)
                                            <option value="{{$type->influencer_type_id}}">{{$type->description}}</option>
                                        @endforeach
                                    </select>
                                    <div for="influencer_type" class="jquery-validate-error help-block" style="display:none;">{{trans('tracker_new.project_attrs.required_field')}}</div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{trans('tracker_new.influencers.org')}}</label>
                                    <select class="form-control" id="influencer_org">
                                        <option value="-" selected>Selecione</option>
                                        @foreach($user->getAllCustomers() as $org)
                                            <option value="{{$org->customer_id}}">{{$org->fantasy_name or $org->company_name}}</option>
                                        @endforeach
                                    </select>
                                    <div for="influencer_org" class="jquery-validate-error help-block" style="display:none;">{{trans('tracker_new.project_attrs.required_field')}}</div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{trans('tracker_new.influencers.email')}}</label>
                                    <input type="text" id="influencer_email" class="form-control">
                                    <div for="influencer_email" class="jquery-validate-error help-block" style="display:none;">{{trans('tracker_new.project_attrs.required_field')}}</div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{trans('tracker_new.influencers.phone')}}</label>
                                    <input type="text" id="influencer_phone" class="form-control">
                                    <div for="customer_district" class="jquery-validate-error help-block" style="display:none;">{{trans('tracker_new.project_attrs.required_field')}}</div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{trans('tracker_new.influencers.cpf_cnpj')}}</label>
                                    <input type="text" id="influencer_cpf_cnpj" class="form-control">
                                    <div for="customer_district" class="jquery-validate-error help-block" style="display:none;">{{trans('tracker_new.project_attrs.required_field')}}</div>
                                </div>
                            </div>
                            <input id="customer_id" type="hidden" value="null">
                            <input id="type" type="hidden" value="null">
                            <input id="entity_id" type="hidden" value="null">
                            <div class="col-sm-12">
                                <button id="btn_add_influencer_to_table" style="float:right;" class="btn btn-flat btn-md btn-info"><span class="btn-label icon fa "></span>{{trans('tracker_new.project_influencers_add2')}}</button>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table" id="influencers_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{trans('tracker_new.influencers.table.inf_level')}}</th>
                                        <th>{{trans('tracker_new.influencers.table.name')}}</th>
                                        <th>{{trans('tracker_new.influencers.table.org')}}</th>
                                        <th>{{trans('tracker_new.influencers.table.type')}}</th>
                                        <th>{{trans('tracker_new.influencers.table.email')}}</th>
                                        <th>{{trans('tracker_new.influencers.table.phone')}}</th>
                                    </tr>
                                </thead>
                                <tbody id="influencers_list">
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="_token" value="{{csrf_token()}}">
    
    <div class="panel-footer">
            <button id="btn_add_project"  class="btn btn-flat btn-md btn-success"><span class="btn-label icon fa "></span>{{trans('tracker_new.project_add_btn')}}</button>
    </div>
</div>

<div id="addInfluencerModal" class="modal fade" aria-hidden="true" style="display: none;">
    <div style="width:850px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="padding:0px">
                <div class="row">
                    <div class="panel" style="margin-bottom:0px;">
                        <div class="panel-heading">
                            <span class="panel-title">{{trans('tracker_new.project_influencers_add')}}</span>
                        </div>

                        <div class="panel-body" id="add_influencer_body">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- / .modal-content -->
    </div>
    <!-- / .modal-dialog -->
</div>

<div id="addOrganizationModal" class="modal fade" aria-hidden="true" style="display: none;">
    <div style="width:850px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="padding:0px">
                <div class="row">
                    <div class="panel" style="margin-bottom:0px;">
                        <div class="panel-heading">
                            <span class="panel-title">{{trans('tracker_new.project_organization_add')}}</span>
                        </div>

                        <div class="panel-body" id="add_organization_body">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- / .modal-content -->
    </div>
    <!-- / .modal-dialog -->
</div>


@endsection

@section('end')

<script type="text/javascript">
    
    $("#btn_add_project").click(function () {
        var data = {};
        
        data.project_name = $("#project_name").val();
        data.project_type = $("#project_type").val();
        data.project_city = $("#project_city").val();
        data.project_uf = $("#project_uf").val();
        data.project_address = $("#project_address").val();
        data.project_district = $("#project_district").val();
        data.project_cep = $("#project_cep").val();
        data.project_est_value = $("#project_est_value").val();
        
        var validated = true;
        
        for (var prop in data) {
            if (data[prop] == "" || data[prop] == "-") {
                $("div[for='"+prop+"']").css("display", "");
                $("#"+prop).parent("div.form-group").addClass("has-error");

                validated = false;
            } else {
                $("div[for='"+prop+"']").css("display", "none");
                $("#"+prop).parent("div.form-group").removeClass("has-error");
            }
        }
        
        if ( ! validated) {
            return alert("Há campos obrigatórios em branco!");
        }
        
        data.project_obs = $("#project_obs").val();
        
        @if ($user->getUserType()->cod >= 20)
            data.project_prospect_date = $("#project_prospect_date").val();
        @else
            data.project_prospect_date = "";
        @endif
        
        data.project_proposal_date = $("#project_proposal_date").val();
        data.project_mockup_date = $("#project_mockup_date").val();
        data.project_delivery_date = $("#project_delivery_date").val();
        
        data.influencers = [];
        
        $("#influencers_list").children("tr").each(function (key,value) {
            var influencer = {};
            
            influencer.type = $(value).attr("type");
            influencer.org_id = $(value).attr("org-id");
            influencer.entity_type = $(value).attr("entity-type");
            influencer.entity_id = $(value).attr("entity-id");
            
            influencer.cpf_cnpj = $(value).attr("cpf-cnpj");
            influencer.name = $(value).attr("name");
            influencer.surname = $(value).attr("surname");
            influencer.in_type = $(value).children("td").eq(4).text();
            influencer.email = $(value).children("td").eq(5).text();
            influencer.phone = $(value).children("td").eq(6).text();
            
            influencer.level = $(value).children('td').eq(1).children('i.fa-star').length;
            
            data.influencers.push(influencer);
        });
        
        data._token = $("#_token").val();
        
        $.ajax({
            "url" : "http://deltafaucetrep.com/tracker/project/new",
            "type" : "POST",
            "data" : data,
            "dataType" : "json" 
        }).done(function (data) {
            window.location.href = "http://deltafaucetrep.com/tracker/index";
        });
    });

    function hasSomeoneWith5Stars() {
        var table = $("#influencers_list");
        var has = false;
        
        table.children("tr").each(function (key, value) {
            var stars = $(value).children('td').eq(1).children('i');
            var counter = 0;
            
            $(stars).each(function (i, star) {
                if ($(star).hasClass("fa-star")) {
                    counter += 1;
                }
            });
            
            if (counter == 5) {
                has = true;
            }
        });
        
        return has;
    }
    
    var has_load_influencers = false;
    var has_load_organizations = false;
    
    var has_an_organization_already = false;
    
    $("#btn_add_influencer").click(function () {
        $("#addInfluencerModal").modal("toggle");
        
        if (! has_load_influencers) {
            $.ajax({
                url: "http://deltafaucetrep.com/tracker/influencer/add",
                type: "GET",
                dataType: "html"
            }).done(function (data) {
                $("#add_influencer_body").html(data);        
            });
            
            has_load_influencers = true;
        }
    });
    
    $("#btn_add_organization").click(function () {
        $("#addOrganizationModal").modal("toggle");
        
        if (! has_load_organizations) {
            $.ajax({
                url: "http://deltafaucetrep.com/tracker/organization/add",
                type: "GET",
                dataType: "html"
            }).done(function (data) {
                $("#add_organization_body").html(data);        
            });
            
            has_load_organizations = true;
        }
    });
    
    $("#btn_add_influencer_to_table").click(function () {
        if ($("#influencer_type").val() == "-") {
            return alert("{{trans('tracker_new.project_add_influencer_alert')}}");
        }
        
        var table = $("#influencers_list");
        
        var tr = document.createElement("tr");
        
        tr.setAttribute("type", $("#type").val());
        tr.setAttribute("org-id", $("#influencer_org").val());
        tr.setAttribute("entity-id", $("#entity_id").val());
        tr.setAttribute("cpf-cnpj", $("#influencer_cpf_cnpj").val());
        tr.setAttribute("name", $("#influencer_name").val());
        tr.setAttribute("surname", $("#influencer_surname").val());
        
        var td0 = document.createElement("td");
        
        var btn = document.createElement("button");
        
        btn.className = "btn btn-danger btn-xs btn-flat";
        
        var label = document.createElement("span");
        
        label.className = "btn-label icon fa fa-close";
        
        btn.appendChild(label);
        
        $(btn).click(function () {
            $(tr).remove();
        });
        
        td0.appendChild(btn);
        
        tr.appendChild(td0);
        
        var td1 = document.createElement("td");
        
        for (var i = 0; i < 5; i += 1) {
            var icon = document.createElement("i");
            
            icon.className = "fa fa-star-o influencer-star";
            $(icon).attr('data-star-index', i);
            $(icon).css("margin-right", "3px");
            
            $(icon).click(function () {
                var that = this;
                
                if ($(that).data('star-index') == 4 && hasSomeoneWith5Stars()) {
                    return;
                }
                
                $(that).parent("td").children("i").each(function (key, value) {
                    if ($(value).data('star-index') <= $(that).data('star-index')) {
                        $(value).removeClass("fa-star-o");
                        $(value).addClass("fa-star");
                    } else {
                        $(value).removeClass("fa-star");
                        $(value).addClass("fa-star-o");
                    }   
                });
            });
            
            td1.appendChild(icon);
        }
        
        tr.appendChild(td1);
        
        var td2 = document.createElement("td");
        
        $(td2).text($("#influencer_name").val() + " " + $("#influencer_surname").val());
        
        tr.appendChild(td2);
        
        var td_org = document.createElement("td");
        
        $(td_org).text($("#influencer_org option:selected").text());
        
        tr.appendChild(td_org);
        
        var td3 = document.createElement("td");
        
        $(td3).text($("#influencer_type option:selected").text());
        
        tr.appendChild(td3);
        
        var td4 = document.createElement("td");
        
        $(td4).text($("#influencer_email").val());
        
        tr.appendChild(td4);
        
        var td5 = document.createElement("td");
        
        $(td5).text($("#influencer_phone").val());
        
        tr.appendChild(td5);
        
        table.append(tr);
        
        $("#type").val("");
        $("#customer_id").val("");
        
        $("#influencer_name").removeAttr('disabled');
        $("#influencer_surname").removeAttr('disabled');
        $("#influencer_org").removeAttr('disabled');
        $("#influencer_email").removeAttr('disabled');
        $("#influencer_phone").removeAttr('disabled');
        $("#influencer_cpf_cnpj").removeAttr('disabled');
        $("#influencer_type").removeAttr('disabled');
        
        $("#influencer_name").val("");
        $("#influencer_surname").val("");
        $("#influencer_email").val("");
        $("#influencer_phone").val("");
        $("#influencer_cpf_cnpj").val("");
        $("#influencer_type").val("-").change();
        $("#influencer_org").val("-").change();
    });
    
    $("#influencer_org").select2();
    
</script>

@endsection