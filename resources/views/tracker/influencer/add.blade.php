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
                        <button onclick=" importInfluencer({{$p['entity_id']}}, '{{$p['people_name']}}', '{{$p['people_surname']}}', '{{$p['customer_id'] or 'null'}}', '{{$p['people_email'] or 'N.I'}}', '{{$p['people_phone'] or 'N.I'}}', '{{$p['people_cpf'] or 'N.I'}}', '{{$p['people_type'] or 'N.I'}}', {{$p['people_influencer_type'] or 0}});" class="btn btn-info btn-xs btn-flat"><span class="btn-label icon fa fa-plus"></span>
                        </button>
                    </td>
                    <td>{{$p["people_name"] . " " . $p["people_surname"]}}</td>
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
    
    
    function importInfluencer(entity_id, name, surname, customer_id, email, phone, cpf, type, in_type) {
        $("#influencer_name").val(name);
        $("#influencer_surname").val(surname);
        $("#customer_id").val(customer_id);
        $("#influencer_email").val(email);
        $("#influencer_phone").val(phone);
        $("#influencer_cpf_cnpj").val(cpf);
        $("#type").val(type);
        $("#entity_id").val(entity_id);
        
        $("#influencer_name").attr('disabled', 'disabled');
        $("#influencer_surname").attr('disabled', 'disabled');
        $("#influencer_email").attr('disabled', 'disabled');
        $("#influencer_phone").attr('disabled', 'disabled');
        $("#influencer_cpf_cnpj").attr('disabled', 'disabled');
        
        if (customer_id != "N.I") {
            $("#influencer_org").val(customer_id).change();
            $("#influencer_org").attr('disabled', 'disabled');
        }
        
        if (type == 'Influenciador') {
            $("#influencer_type").children('option').each(function (key, value) {
                if ($(value).val() == in_type) {
                    $(value).attr('selected', 'selected');
                    $("#influencer_type").attr('disabled', 'disabled');
                }
            });
        } else {
            $("#influencer_type").removeAttr('disabled');
            $("#influencer_type").val("-");
        }
        
        $("#addInfluencerModal").modal("toggle");
    }
    
</script>