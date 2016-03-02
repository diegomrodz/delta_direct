<div class="col-sm-12">

    <table id="organizations_table" class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>{{trans('tracker_new.organization.add.name')}}</th>
                <th>{{trans('tracker_new.organization.add.type')}}</th>
                <th>{{trans('tracker_new.organization.add.uf')}}</th>
                <th>{{trans('tracker_new.organization.add.city')}}</th>
            </tr>
        </thead>
    
        <tbody>
            @if ($user->getUserType()->cod == 40)
                @foreach($user->getAllCustomers() as $c)
                    <tr>    
                        <td>
                            <button onclick="importOrganization({{$c->customer_id}}, '{{$c->fantasy_name}}', '{{$c->getType() == null ? 'N.I' : $c->getType()->name}}', '{{$c->email or 'N.I'}}', '{{$c->phone or 'N.I'}}')" 
                                    
                                    class="btn btn-info btn-xs btn-flat"><span class="btn-label icon fa fa-plus"></span>
                            </button>
                        </td>
                        <td>{{$c->fantasy_name}}</td>
                        <td>{{$c->getType() == null ? "N.I" : $c->getType()->name}}</td>
                        <td>{{$c->getState()->uf}}</td>
                        <td>{{$c->getCity() == null ? $c->city_text : $c->getCity()->nome}}</td>
                    </tr>
                @endforeach
            @else
                @foreach($user->getPortfolio() as $c)
                    <tr>    
                        <td>
                            <button onclick="importOrganization({{$c->customer_id}}, '{{$c->getCustomer()->fantasy_name}}', '{{$c->getCustomer()->getType() == null ? 'N.I' : $c->getCustomer()->getType()->name}}', '{{$c->getCustomer()->email or 'N.I'}}', '{{$c->getCustomer()->phone or 'N.I'}}')" 
                                    
                                    class="btn btn-info btn-xs btn-flat"><span class="btn-label icon fa fa-plus"></span>
                            </button>
                        </td>
                        <td>{{$c->getCustomer()->fantasy_name}}</td>
                        <td>{{$c->getCustomer()->getType() == null ? "N.I" : $c->getCustomer()->getType()->name}}</td>
                        <td>{{$c->getCustomer()->getState()->uf}}</td>
                        <td>{{$c->getCustomer()->getCity() == null ? $c->getCustomer()->city_text : $c->getCustomer()->getCity()->nome}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        
    </table>
    
</div>

<script type="text/javascript">

    $("#organizations_table").DataTable();
    
    function clearSomeoneWith5Starts() {
        $("i.fa-star[data-star-index=4]").each(function (key, value) {
            $(value).removeClass("fa-star");
            $(value).addClass("fa-star-o");
        });
    }
    
    function importOrganization(id, name, type, email, phone) {
        $("#addOrganizationModal").modal("toggle");
        
        if (has_an_organization_already) {
            return alert("Você já importou uma organização. Para trocar, basta excluir a atual e importar uma nova.");
        }
        
        clearSomeoneWith5Starts();
        
        var table = $("#influencers_list");
        
        var tr = document.createElement("tr");
        
        tr.setAttribute("type", "Organization");
        tr.setAttribute("org-id", id);
        tr.setAttribute("entity-id", id);
        
        var td0 = document.createElement("td");
        
        var btn = document.createElement("button");
        
        btn.className = "btn btn-danger btn-xs btn-flat";
        
        var label = document.createElement("span");
        
        label.className = "btn-label icon fa fa-close";
        
        btn.appendChild(label);
        
        $(btn).click(function () {
            $(tr).remove();
            
            has_an_organization_already = false;
        });
        
        td0.appendChild(btn);
        
        tr.appendChild(td0);
        
        var td1 = document.createElement("td");
        
        for (var i = 0; i < 5; i += 1) {
            var icon = document.createElement("i");
            
            icon.className = "fa fa-star influencer-star";
            $(icon).attr('data-star-index', i);
            $(icon).css("margin-right", "3px");
            
            td1.appendChild(icon);
        }
        
        tr.appendChild(td1);
        
        var td2 = document.createElement("td");
        
        $(td2).text(name);
        
        tr.appendChild(td2);
        
        var td3 = document.createElement("td");
        
        $(td3).text(type);
        
        tr.appendChild(td3);
        
        var td4 = document.createElement("td");
        
        $(td4).text(email);
        
        tr.appendChild(td4);
        
        var td5 = document.createElement("td");
        
        $(td5).text(phone);
        
        tr.appendChild(td5);
        
        table.append(tr);
        
        has_an_organization_already = true;
    }
</script>



