<div class="col-sm-12">

    <table id="persons_table" class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>{{trans('tracker_new.influencers.add_view.name')}}</th>
                <th>{{trans('tracker_new.influencers.add_view.organization')}}</th>
                <th>{{trans('tracker_new.influencers.add_view.email')}}</th>
                <th>{{trans('tracker_new.influencers.add_view.dept_type')}}</th>
            </tr>
        </thead>
    
        <tbody>
            @foreach($user->getAllPeopleRelated() as $p)
                <tr>    
                    <td>
                        <button onclick="addInfluencer({{$p['entity_id']}}, '{{$p['people_name']}}', '{{$p['customer_id'] or 'null'}}', '{{$p['people_email'] or 'N.I'}}', '{{$p['people_phone'] or 'N.I'}}', '{{$p['people_cpf'] or 'N.I'}}', '{{$p['people_type'] or 'N.I'}}', {{$p['people_influencer_type'] or 0}});" class="btn btn-info btn-xs btn-flat"><span class="btn-label icon fa fa-plus"></span>
                        </button>
                    </td>
                    <td>{{$p["people_name"]}}</td>
                    <td>{{$p["organization_name"] or "N.I"}}</td>
                    <td>{{$p["people_email"] or "N.I"}}</td>
                    <td>{{$p["people_dept"] or $p["people_type"]}}</td>
                </tr>
            @endforeach
        </tbody>
        
    </table>
    
</div>

<script type="text/javascript">

    $("#persons_table").DataTable();
    
    function addInfluencer(entity_id, name, customer_id, email, phone, cpf, type, in_type) {
        var data = {
            entity_id : entity_id,
            name : name,
            customer_id : customer_id,
            email : email,
            phone : phone,
            cpf : cpf,
            type : type,
            in_type : in_type
        };
        
        data._token = $("#_token").val();
        
        $.ajax({
            url: "http://deltafaucetrep.com/tracker/project/" + $("#project_id").val() + "/add_influencer",
            type: "post",
            dataType: "json",
            data: data
        }).done(function () {
            setTimeout(function () {
                window.location.reload();
            },500);
        });
    }
    
</script>
