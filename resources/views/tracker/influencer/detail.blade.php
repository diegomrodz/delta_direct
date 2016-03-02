<div class="col-sm-12">
    <table class="table">
        <caption><strong>Informações de Cadastro</strong></caption>
        <tr>
            <th>Nome:</th>
            <td class="influencer_attr" data-field="name">{{$influencer->name or "N.I"}}</td>
        </tr>
        <tr>
            <th>Sobrenome:</th>
            <td class="influencer_attr" data-field="surname">{{$influencer->surname or "N.I"}}</td>
        </tr>
        <tr>
            <th>CPF/CNPJ:</th>
            <td class="influencer_attr" data-field="cpf_cnpj" >{{$influencer->cpf_cnpj or "N.I"}}</td>
        </tr>
        <tr>
            <th>Organização:</th>
            <td>{{$influencer->customer() == null ? "N.I" : $influencer->customer()->fantasy_name}}</td>
        </tr>
        <tr>
            <th>Departamento:</th>
            @if ($influencer->entity() != null)
                @if ($influencer->entity_derived_type == 'bc')
                    <td>{{$influencer->entity()->dept or "N.I"}}</td>
                @else
                    <td>Sócio</td>            
                @endif
            @else
                <td>N.I</td>            
            @endif
        </tr>
        <tr>
            <th>Tipo de Influenciador:</th>
            <td>{{$influencer->type() == null ? "N.I" : $influencer->type()->description}}</td>
        </tr>
    </table>
</div>

<div class="col-sm-12">
    <table class="table">
        <caption><strong>Informações de Contato</strong></caption>
        <tr>
            <th>Email:</th>
            <td class="influencer_attr" data-field="email">{{$influencer->email or "N.I"}}</td>
        </tr>
        <tr>
            <th>Website:</th>
            <td class="influencer_attr" data-field="website">{{$influencer->website or "N.I"}}</td>
        </tr>
        <tr>
            <th>Telefone 1:</th>
            <td class="influencer_attr" data-field="phone">{{$influencer->phone or "N.I"}}</td>
        </tr>
        <tr>
            <th>Telefone 2:</th>
            <td class="influencer_attr" data-field="phone2">{{$influencer->phone2 or "N.I"}}</td>
        </tr>
        <tr>
            <th>Celular:</th>
            <td class="influencer_attr" data-field="cellphone">{{$influencer->cellphone or "N.I"}}</td>
        </tr>
    </table>
</div>

@if ($influencer->resp() != null)
<div class="col-sm-12">
    <table class="table">
        <caption><strong>Responsável</strong></caption>
        <tr>
            <th>Nome:</th>
            <td>{{$influencer->resp()->user()->name . " " . $influencer->resp()->user()->surname}}</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>{{$influencer->resp()->user()->email}}</td>
        </tr>
        <tr>
            <th>Telefone:</th>
            <td>{{$influencer->resp()->user()->phone}}</td>
        </tr>
    </table>
</div>
@endif

<script type="text/javascript">

    function _normalize(text) {
        return (text == "") ? "-" : text.replace(/\//g, "-");
    }
    
    @if ($user->hasInfluencer($influencer))
        $(".influencer_attr").each(function(key, value) {
            $(value).editInPlace({
                url: "#",
                callback: function(original_element, html, original) {

                    $.ajax({
                        url: 'http://deltafaucetrep.com/tracker/influencer/{{$influencer->influencer_id}}/edit/' + $(value).data('field') + '/to/' + _normalize(html),
                        type: 'get'
                    }).error(function(data) {
                        alert("Erro ao alterar a propriedade " + $(value).data('field') + " para " + html);
                    });

                    return html;
                }
            });
        });
    @endif

</script>