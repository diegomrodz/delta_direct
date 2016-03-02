@extends('layouts.master')

@section('content')

<script type="text/javascript">

    window.document.body.className += " page-profile";
    
</script>

<div class="profile-full-name">
	<span class="text-semibold">{{$detail->name . " " . $detail->surname}}</span>, {{$detail->getUserType()->description}}
</div>

<div class="profile-row">
    <div class="left-col">
        <div class="profile-block">
            <div class="panel profile-photo">
                <img src="{{$detail->avatar_path == null ? "http://static.deltafaucetrep.com/assets/demo/avatars/1.jpg" : $detail->avatar_path}}" alt="">
            </div>
            <br>
            @if ($user->user_id == $detail->user_id)
                <a href="#" data-toggle="modal" data-target="#sendPictureModal" class="btn btn-success"><i class="fa fa-photo"></i>&nbsp;&nbsp;Alterar Foto</a>&nbsp;&nbsp;
            @endif
        </div>
    </div>

    <div class="right-col">

				<hr class="profile-content-hr no-grid-gutter-h">
				
				<div class="profile-content">

					<ul id="profile-tabs" class="nav nav-tabs"><li class="dropdown pull-right tabdrop hide"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-bars"></i> <b class="caret"></b></a><ul class="dropdown-menu"></ul></li>
						<li class="active">
							<a href="#profile-tabs-detail" data-toggle="tab">Detalhes</a>
						</li>
                        <li>
							<a href="#profile-tabs-activity" data-toggle="tab">Linha do Tempo</a>
						</li>
					</ul>

					<div class="tab-content tab-content-bordered panel-padding">
                        <div id="profile-tabs-detail" class="tab-pane panel no-padding no-border fade in active">
                            
                            <h4>Informações Gerais</h4>
                            
                            <hr class="no-panel-padding-h panel-wide">
                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <strong>Nome:</strong>
                                        <span id="detail_name" data-prop-name="name" class="{{$user->user_id == $detail->user_id ? 'user_attr' : ''}}">{{$detail->name}}</span>
                                    </div>
                                    <div class="form-group no-margin-hr">
                                        <strong>Sobrenome:</strong>
                                        <span id="detail_surname" data-prop-name="surname" class="{{$user->user_id == $detail->user_id ? 'user_attr' : ''}}">{{$detail->surname}}</span>
                                    </div>
                                    <div class="form-group no-margin-hr">
                                        <strong>Email:</strong>
                                        <span id="detail_email">{{$detail->email}}</span>
                                    </div>
                                    <div class="form-group no-margin-hr">
                                        <strong>Tipo de Usuário:</strong>
                                        <span id="detail_user_type">{{$detail->getUserType()->description}}</span>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <strong>Usuário desde:</strong>
                                        <span>{{date_format($detail->created_at, "d/m/Y")}}</span>
                                    </div>
                                    <div class="form-group no-margin-hr">
                                        <strong>Último Acesso:</strong>
                                        <span>{{date_format($detail->updated_at, "d/m/Y")}}</span>
                                    </div>
                                    <div class="form-group no-margin-hr">
                                        <strong>Status:</strong>
                                        <span>{{$detail->active == 's' ? 'Ativo' : 'Inativo' }}</span>
                                    </div>
                                    @if ($user->user_id == $detail->user_id)
                                        <div class="form-group no-margin-hr">
                                            <a data-target="#newPasswordModal" data-toggle="modal" href="#">Clique aqui para alterar sua senha.</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            @if ($detail->getUserType()->cod == 10)
                            
                                <h4>Representante</h4>

                                <hr class="no-panel-padding-h panel-wide">

                                <div class="row">
                                    
                                    
                                </div>
                            
                            
                                <h4>Representação</h4>

                                <hr class="no-panel-padding-h panel-wide">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <strong>Razão Social:</strong>
                                            <span id="detail_rep_company_name" data-prop-id="{{$detail->representant()->representant_company_id}}" data-prop-name="name" class="rep_company_attr">{{$detail->representant()->company()->name}}</span>
                                        </div>
                                        <div class="form-group no-margin-hr">
                                            <strong>CNPJ:</strong>
                                            <span id="detail_rep_cnpj" data-prop-id="{{$detail->representant()->representant_company_id}}" data-prop-name="cnpj" class="rep_company_attr">{{$detail->representant()->company()->cnpj}}</span>
                                        </div>
                                        <div class="form-group no-margin-hr">
                                            <strong>Inscrição Estadual:</strong>
                                            <span id="detail_rep_ie" data-prop-id="{{$detail->representant()->representant_company_id}}" data-prop-name="ie" class="rep_company_attr">{{$detail->representant()->company()->ie}}</span>
                                        </div>
                                        <div class="form-group no-margin-hr">
                                            <strong>Endereço:</strong>
                                            <span id="detail_rep_address" data-prop-id="{{$detail->representant()->representant_company_id}}" data-prop-name="address" class="rep_company_attr">{{$detail->representant()->company()->address}}</span>
                                        </div>
                                        <div class="form-group no-margin-hr">
                                            <strong>CEP:</strong>
                                            <span id="detail_rep_cep" data-prop-id="{{$detail->representant()->representant_company_id}}" data-prop-name="cep" class="rep_company_attr">{{$detail->representant()->company()->cep}}</span>
                                            <strong style="margin-left:10px;">Cidade:</strong>
                                            <span id="detail_rep_city" data-prop-id="{{$detail->representant()->representant_company_id}}" data-prop-name="city" class="rep_company_attr">{{$detail->representant()->company()->city}}</span>
                                            <strong style="margin-left:10px;">UF:</strong>
                                            <span id="detail_rep_state" data-prop-id="{{$detail->representant()->representant_company_id}}" data-prop-name="state" class="rep_company_attr">{{$detail->representant()->company()->state}}</span>
                                        </div>
                                        <div class="form-group no-margin-hr">
                                            <strong>Carteira de Clientes Compartilhada:</strong>
                                            <span id="detail_rep_has_shared_portfolio" data-prop-id="{{$detail->representant()->representant_company_id}}" data-prop-name="has_shared_portfolio">{{$detail->representant()->company()->has_shared_portfolio == 's' ? 'Sim' : 'Não'}}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <strong>Telefone 1:</strong>
                                            <span id="detail_rep_phone" data-prop-id="{{$detail->representant()->representant_company_id}}" data-prop-name="phone" class="rep_company_attr">{{$detail->representant()->company()->phone}}</span>
                                        </div>
                                        <div class="form-group no-margin-hr">
                                            <strong>Telefone 2:</strong>
                                            <span id="detail_rep_phone2" data-prop-id="{{$detail->representant()->representant_company_id}}" data-prop-name="phone2" class="rep_company_attr">{{$detail->representant()->company()->phone2}}</span>
                                        </div>
                                        <div class="form-group no-margin-hr">
                                            <strong>Banco:</strong>
                                            <span id="detail_rep_bank_details" data-prop-id="{{$detail->representant()->representant_company_id}}" data-prop-name="bank_name" class="rep_company_attr">{{$detail->representant()->company()->bank_name}}</span>, <span data-prop-id="{{$detail->representant()->company_id}}" data-prop-name="bank_number" class="rep_company_attr">{{$detail->representant()->company()->bank_number}}</span>
                                        </div>
                                        <div class="form-group no-margin-hr">
                                            <strong>Agência:</strong>
                                            <span id="detail_rep_bank_agency" data-prop-id="{{$detail->representant()->representant_company_id}}" data-prop-name="bank_agency" class="rep_company_attr">{{$detail->representant()->company()->bank_agency}}</span>
                                        </div>
                                        <div class="form-group no-margin-hr">
                                            <strong>Conta Corrente:</strong>
                                            <span id="detail_rep_bank_cc" data-prop-id="{{$detail->representant()->representant_company_id}}" data-prop-name="bank_cc" class="rep_company_attr">{{$detail->representant()->company()->bank_cc}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            
                            @if ($detail->getUserType()->cod == 5)
                                <h4>Empresa</h4>
                            
                                <hr class="no-panel-padding-h panel-wide">

                                <div class="row">
                                    <div class="col-sm-6">
                                       <div class="form-group no-margin-hr">
                                            <strong>Razão Social:</strong>
                                            <span id="detail_dist_company_name">{{$detail->distribuitor()->company_name}}</span>
                                        </div>
                                        <div class="form-group no-margin-hr">
                                            <strong>CNPJ:</strong>
                                            <span id="detail_dist_cnpj">{{$detail->distribuitor()->cnpj}}</span>
                                        </div>
                                        <div class="form-group no-margin-hr">
                                            <strong>IE:</strong>
                                            <span id="detail_dist_cnpj">{{$detail->distribuitor()->ie}}</span>
                                        </div>
                                        <div class="form-group no-margin-hr">
                                            <strong>Endereço:</strong>
                                            <span id="detail_rep_address">{{$detail->distribuitor()->address}}</span>
                                        </div>
                                        <div class="form-group no-margin-hr">
                                            <strong>CEP:</strong>
                                            <span id="detail_rep_cep">{{$detail->distribuitor()->cep}}</span>
                                            <strong style="margin-left:10px;">Cidade:</strong>
                                            <span id="detail_rep_city">{{$detail->distribuitor()->city_text}}</span>
                                            <strong style="margin-left:10px;">UF:</strong>
                                            <span id="detail_rep_state">{{$detail->distribuitor()->state}}</span>
                                        </div>
                                    </div>
                            
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <strong>Telefone:</strong>
                                            <span id="detail_rep_phone">{{$detail->distribuitor()->company_phone}}</span>
                                        </div>
                                        <div class="form-group no-margin-hr">
                                            <strong>Website:</strong>
                                            <span id="detail_rep_phone">{{$detail->distribuitor()->company_website}}</span>
                                        </div>
                                        
                                        <br>
                                        
                                        <div class="form-group no-margin-hr">
                                            <strong>Contato Comercial:</strong>
                                            <span id="detail_rep_phone">{{$detail->distribuitor()->contact_name}}</span>
                                        </div>
                                        <div class="form-group no-margin-hr">
                                            <strong>Telefone:</strong>
                                            <span id="detail_rep_phone">{{$detail->distribuitor()->contact_phone}}</span>
                                        </div>
                                        <div class="form-group no-margin-hr">
                                            <strong>Email:</strong>
                                            <span id="detail_rep_phone">{{$detail->distribuitor()->contact_email}}</span>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            @endif
                        </div>
                        
						<div class="tab-pane fade" id="profile-tabs-activity">
							<div class="timeline">
								<!-- Timeline header -->
								<div class="tl-header now">Hoje</div>
                                
                                @foreach($detail->getNotifications() as $note)
                                
                                    @if ($note->subject_id != 8)
                                        @if (floor( (strtotime(date("Y-m-d")) - strtotime($note->created_at)) / (60*60*24)) == -1)

                                            <div class="tl-entry">
                                                <div class="tl-time">
                                                    {{ (floor((strtotime(date("Y-m-d h:i:s")) - strtotime($note->created_at)) / (60*60*24)))*-1}}h atrás
                                                </div>
                                                <div class="tl-icon bg-warning"><i class="fa fa-envelope"></i></div>
                                                <div class="panel tl-body">
                                                    <h4 class="text-warning"><a href="http://deltafaucetrep.com/profile/{{$note->from()->user_id}}/detail">{{$note->from()->name . " " . $note->from()->surname}}</a></h4>
                                                    {{$note->text}}
                                                </div> <!-- / .tl-body -->
                                            </div> <!-- / .tl-entry -->

                                        @endif
                                    @endif
                                
                                @endforeach

								<!-- Timeline header -->
								<div class="tl-header">Ontem</div>

                                @foreach($detail->getNotifications() as $note)
                             
                                    @if ($note->subject_id != 8)
                                        @if (floor( (strtotime(date("Y-m-d")) - strtotime($note->created_at)) / (60*60*24)) == 0)

                                            <div class="tl-entry">
                                                <div class="tl-time">
                                                    {{date_format($note->created_at, "H:i")}}
                                                </div>
                                                <div class="tl-icon bg-warning"><i class="fa fa-envelope"></i></div>
                                                <div class="panel tl-body">
                                                    <h4 class="text-warning"><a href="http://deltafaucetrep.com/profile/{{$note->from()->user_id}}/detail">{{$note->from()->name . " " . $note->from()->surname}}</a></h4>
                                                    {{$note->text}}
                                                </div> <!-- / .tl-body -->
                                            </div> <!-- / .tl-entry -->

                                        @endif
                                    @endif
                                
                                @endforeach
                                
                                <div class="tl-header">Anteriores</div>
                                
                                @foreach($detail->getNotifications() as $note)
                                
                                   @if ($note->subject_id != 8)
                             
                                        @if (floor( (strtotime(date("Y-m-d")) - strtotime($note->created_at)) / (60*60*24)) != 0 || floor( (strtotime(date("Y-m-d")) - strtotime($note->created_at)) / (60*60*24)) != -1)

                                            <div class="tl-entry">
                                                <div class="tl-time">
                                                    {{date_format($note->created_at, "d/m")}}
                                                </div>
                                                <div class="tl-icon bg-warning"><i class="fa fa-envelope"></i></div>
                                                <div class="panel tl-body">
                                                    <h4 class="text-warning"><a href="http://deltafaucetrep.com/profile/{{$note->from()->user_id}}/detail">{{$note->from()->name . " " . $note->from()->surname}}</a></h4>
                                                    {{$note->text}}
                                                </div> <!-- / .tl-body -->
                                            </div> <!-- / .tl-entry -->

                                        @endif
                                    @endif
                                
                                @endforeach
                                

							</div> <!-- / .timeline -->
						</div> <!-- / .tab-pane -->
					</div> <!-- / .tab-content -->
				</div>
			</div>
    
</div>

<div id="newPasswordModal" class="modal fade" style="display: none;">
    <div style="width:450px;" class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Alterar Senha</h4>
            </div>
            <div class="modal-body">
                <input id="previousPassword" type="password" placeholder="Senha Atual" class="form-control form-group-margin input-lg">
                <input id="newPassword" type="password" placeholder="Nova Senha" class="form-control form-group-margin input-lg">
                <input id="newPassword2" type="password" placeholder="Repita a Nova Senha" class="form-control form-group-margin input-lg">
            </div>
            <div class="modal-footer">
                 <button id="changePassword" style="float:right;margin-top:15px;" href="#" class="btn btn-info"><i class="fa fa-check"></i>&nbsp;&nbsp;Alterar Senha</button>
            </div>
        </div>
        <!-- / .modal-content -->
    </div>
    <!-- / .modal-dialog -->
</div>


<div id="sendPictureModal" class="modal fade" style="display: none;">
    <div style="width:450px;" class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Selecione uma imagem</h4>
            </div>
            <div class="modal-body">
                <p>Não faça o upload de imagens(jpg, png, jpeg) maiores que 1.5mb.</p>
                
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Arquivo:</label>
                        <input id="avatar_photo" type="file" accept="image/*" id="photo_file_att">
                    </div>
                </div>
                <div class="col-sm-6">
                    <button id="upload_photo" style="float:right;margin-top:15px;" href="#" class="btn btn-info"><i class="fa fa-upload"></i>&nbsp;&nbsp;Fazer Upload</button>
                </div>
            </div>
        </div>
        <!-- / .modal-content -->
    </div>
    <!-- / .modal-dialog -->
</div>

<input id="_token" name="_token" type="hidden" value="{{csrf_token()}}">

@endsection

@section('end')

<script type="text/javascript" src="http://static.deltafaucetrep.com/assets/javascripts/editable.js"></script>

<script type="text/javascript">
    
    function normalize(text) {
        return (text == "") ? "-" : text.replace(/\//g, "-");
    }
    
    $(".user_attr").each(function (key, value) {
        $(value).editInPlace({
            url: "#",
            callback: function(original_element, html, original) {

                $.ajax({
                    url: 'http://deltafaucetrep.com/profile/{{$detail->user_id}}/edit/' + $(value).data("prop-name") + '/to/' + normalize(html),
                    type: 'get'
                });

                return html;
            }
        });  
    });
    
    @if ($user->getUserType()->cod == 10 && $user->representant() != null && $detail->representant() != null && $user->representant()->company_id == $detail->representant()->company_id)
        $(".rep_company_attr").each(function (key, value) {
            $(value).editInPlace({
                url: "#",
                callback: function(original_element, html, original) {

                    $.ajax({
                        url: 'http://deltafaucetrep.com/profile/representant/company/'+$(value).data('prop-id')+'/edit/' + $(value).data("prop-name") + '/to/' + normalize(html),
                        type: 'get'
                    });

                    return html;
                }
            });  
        });
    @endif
    
    $("#changePassword").click(function () {
        var data = {};
        
        if ($("#previousPassword").val() == "") {
            return alert("Por favor, insira a sua senha atual.");
        }
        
        data.previousPassoword = $("#previousPassword").val();
        
        if ($("#newPassword").val() != $("#newPassword2").val()) {
            return alert("Por favor, as duas senhas devem ser iguais.");
        }
        
        data.newPassword = $("#newPassword").val();
        data.newPassword2 = $("#newPassword2").val();
        
        data._token = $("#_token").val();
        
        var req = $.ajax({
            url: "http://deltafaucetrep.com/profile/{{$user->user_id}}/change/password",
            data: data,
            dataType: "json",
            type: "post"
        });
        
        req.success(function () {
            alert("Sua senha foi alterada com sucesso!");    
        });
        
        req.error(function () {
            alert("Houve um erro ao alterar sua senha, por favor tente novamente. Caso o erro persista, abra um chamado para a Delta e aguarde a resposta.");
        });
    });
    
    $("#upload_photo").click(function () {
        var data = new FormData();
        var file = $("#avatar_photo").prop('files')[0];
        
        data.append("avatar_file_att", file, file.name);
        data.append("_token", $("#_token").val());
        
        $.ajax({
            url: "http://deltafaucetrep.com/profile/{{$detail->user_id}}/change_avatar",
            type: "POST",
            data: data,
            dataType: "json",
            cache: false,
            processData: false, // Don't process the files
            contentType: false
        });
        
        setTimeout(function () {
            window.location.reload();
        }, 15);
    });
    
</script>

@endsection