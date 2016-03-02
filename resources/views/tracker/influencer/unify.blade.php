<div class="row">

    <fieldset>
        <legend>Pessoas Selecionadas</legend>
        
        <div class="col-sm-6">
            <table class="table">
                <tbody>
                    <tr>
                        <td><strong>Nome:</strong></td>
                        <td>{{$first->name or "N.I"}}</td>
                    </tr>

                    <tr>
                        <td><strong>Sobrenome:</strong></td>
                        <td>{{$first->surname or "N.I"}}</td>
                    </tr>
                    
                    <tr>
                        <td><strong>Organização:</strong></td>
                        <td>{{$first->customer() == null ? "N.I" : $first->customer()->fantasy_name}}</td>
                    </tr>

                    <tr>
                        <td><strong>Departamento:</strong></td>
                        @if ($first->entity() != null)
                            @if ($first->entity_derived_type == 'bc')
                                <td>{{$first->entity()->dept or "N.I"}}</td>
                            @else
                                <td>Sócio</td>            
                            @endif
                        @else
                            <td>N.I</td>            
                        @endif
                    </tr>                   
                    
                    <tr>
                        <td><strong>CPF/CNPJ:</strong></td>
                        <td>{{$first->cpf_cnpj or "N.I"}}</td>
                    </tr>

                    <tr>
                        <td><strong>Email:</strong></td>
                        <td>{{$first->email or "N.I"}}</td>
                    </tr>

                    <tr>
                        <td><strong>Website:</strong></td>
                        <td>{{$first->website or "N.I"}}</td>
                    </tr>

                    <tr>
                        <td><strong>Telefone:</strong></td>
                        <td>{{$first->phone or "N.I"}}</td>
                    </tr>

                    <tr>
                        <td><strong>Telefone 2:</strong></td>
                        <td>{{$first->phone2 or "N.I"}}</td>
                    </tr>

                    <tr>
                        <td><strong>Celular:</strong></td>
                        <td>{{$first->cellphone or "N.I"}}</td>
                    </tr>


                </tbody>
            </table>
        </div>

        <div class="col-sm-6">
            <table class="table">
                <tbody>
                    <tr>
                        <td><strong>Nome:</strong></td>
                        <td>{{$second->name or "N.I"}}</td>
                    </tr>

                    <tr>
                        <td><strong>Sobrenome:</strong></td>
                        <td>{{$second->surname or "N.I"}}</td>
                    </tr>
                    
                    <tr>
                        <td><strong>Organização:</strong></td>
                        <td>{{$second->customer() == null ? "N.I" : $second->customer()->fantasy_name}}</td>
                    </tr>
                    
                    <tr>
                        <td><strong>Departamento:</strong></td>
                        @if ($second->entity() != null)
                            @if ($second->entity_derived_type == 'bc')
                                <td>{{$second->entity()->dept or "N.I"}}</td>
                            @else
                                <td>Sócio</td>            
                            @endif
                        @else
                            <td>N.I</td>            
                        @endif
                    </tr>                   
                    
                    
                    <tr>
                        <td><strong>CPF/CNPJ:</strong></td>
                        <td>{{$second->cpf_cnpj or "N.I"}}</td>
                    </tr>

                    <tr>
                        <td><strong>Email:</strong></td>
                        <td>{{$second->email or "N.I"}}</td>
                    </tr>

                    <tr>
                        <td><strong>Website:</strong></td>
                        <td>{{$second->website or "N.I"}}</td>
                    </tr>

                    <tr>
                        <td><strong>Telefone:</strong></td>
                        <td>{{$second->phone or "N.I"}}</td>
                    </tr>

                    <tr>
                        <td><strong>Telefone 2:</strong></td>
                        <td>{{$second->phone2 or "N.I"}}</td>
                    </tr>

                    <tr>
                        <td><strong>Celular:</strong></td>
                        <td>{{$second->cellphone or "N.I"}}</td>
                    </tr>


                </tbody>
            </table>
        </div>

    </fieldset>

    <fieldset>
        <legend>Nova Pessoa</legend>
        
        <div class="col-sm-8">
            <div class="form-group no-margin-hr">
                <label class="control-label">Escolha de qual a nova pessoa herdará os atributos listados acima:</label>
                <select id="selected_influencer" class="form-control">
                    <option value="">Selecione</option>
                    <option value="{{$first->influencer_id}}">{{$first->name . " " . $first->surname}}</option>
                    <option value="{{$second->influencer_id}}">{{$second->name . " " . $second->surname}}</option>
                </select>
            </div>
        </div>
        
        <div class="col-sm-4 text-right">
            <button id="unifyInfluencerBtn" class="btn btn-success chat-controls-btn" style="margin-top: 25px;">Criar Nova Pessoa</button>
        </div>
        
    </fieldset>
    
</div>

<script type="text/javascript">

    $("#unifyInfluencerBtn").click(function () {
        var id = $("#selected_influencer").val();
        
        if (id == "") {
            return alert("Selecione de quem a nova pessoa herdará os atributos.");
        }
        
        $.ajax({
            url: "http://deltafaucetrep.com/tracker/influencer/unify/{{$first->influencer_id}}/{{$second->influencer_id}}?id="+id,
            type: "get"
        }).done(function (data) {
            setTimeout(function () {
                window.location.reload();
            }, 300);
        });
        
    });
    
</script>