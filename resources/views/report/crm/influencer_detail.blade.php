<div class="row">
    <fieldset>
        <legend>Informações de Cadastro</legend>
        <div class="col-sm-6">
            <table class="table">
                <tr>
                    <th>Nome:</th>
                    <td>{{$inf->name or "N.I"}}</td>
                </tr>
                <tr>
                    <th>Sobrenome:</th>
                    <td>{{$inf->surname or "N.I"}}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{$inf->email or "N.I"}}</td>
                </tr>
                <tr>
                    <th>Website:</th>
                    <td>{{$inf->website or "N.I"}}</td>
                </tr>
                <tr>
                    <th>Telefone 1:</th>
                    <td>{{$inf->phone or "N.I"}}</td>
                </tr>
                <tr>
                    <th>Telefone 2:</th>
                    <td>{{$inf->phone2 or "N.I"}}</td>
                </tr>
                <tr>
                    <th>Celular:</th>
                    <td>{{$inf->cellphone or "N.I"}}</td>
                </tr>
            </table>
        </div>

        <div class="col-sm-6">
            <table class="table">
                <tr>
                    <th>CPF/CNPJ:</th>
                    <td>{{$inf->cpf_cnpj or "N.I"}}</td>
                </tr>
                <tr>
                    <th>Organização:</th>
                    @if ($inf->customer() == null)
                        <td>N.I</td>                    
                    @else
                        <td><a target="_blanck" href="http://deltafaucetrep.com/portfolio/detail/{{$inf->customer_id}}">{{$inf->customer()->fantasy_name}}</a></td>
                    @endif
                </tr>
                <tr>
                    <th>Departamento:</th>
                    @if ($inf->entity() != null)
                        @if ($inf->entity_derived_type == 'bc')
                            <td>{{$inf->entity()->dept or "N.I"}}</td>
                        @else
                            <td>Sócio</td>            
                        @endif
                    @else
                        <td>N.I</td>            
                    @endif
                </tr>
                <tr>
                    <th>Tipo de Influência:</th>
                    <td>{{$inf->type() == null ? "N.I" : $inf->type()->description}}</td>
                </tr>

            </table>
    </div>
    </fieldset>

    <fieldset>
        <legend>Project Tracker</legend>
    
        <table class="table">
            <thead>
                <tr>
                    <th>Projeto</th>
                    <th>Influência</th>
                    <th>Valor da Obra</th>
                    <th>Estágio da Obra</th>
                    <th>Data Entrada</th>
                    <th>Data Entrega</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inf->projects() as $rel)
                <tr>
                    <td><a href="http://deltafaucetrep.com/tracker/project/{{$rel->project_id}}/detail" target="_blanck">{{$rel->project()->title}}</a></td>
                    <td>{{$rel->level}}</td>
                    <td>R$ {{number_format($rel->project()->project_value, 2, ".", ",")}}</td>
                    @if ($rel->project()->project_stage_id != 1)
                    <td>{{$rel->project()->stage()->description}}</td>
                    @else
                    <td>{{$rel->project()->closedStatus()->description}}</td>                   
                    @endif
                    <td>{{date_format(date_create($rel->project()->created_at), "d/m/Y")}}</td>
                    <td>{{$rel->project()->est_arrival == null ? "N.I" : date_format(date_create($rel->project()->est_arrival), "d/m/Y")}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </fieldset>
</div>