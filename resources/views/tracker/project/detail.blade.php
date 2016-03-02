@extends('layouts.master')

@section('content')

<div class="panel">
    <div class="panel-heading">
        <span class="panel-title"><strong>{{trans('tracker_detail.title')}} #{{$project->project_id}}:</strong> {{$project->title}}</span>
    
        <div class="panel-heading-controls">
            <a title="Imprimir Projeto" target="_blank" href="http://deltafaucetrep.com/tracker/project/print/{{$project->project_id}}"><button style="margin-top:-4px;" class="btn btn-primary btn-outline btn-flat"><span class="btn-label icon fa fa-print"></span></button></a>
        @if ($project->representant_id != null || $project->manager_id != null || $project->distribuitor_id != null)
            <button title="Notificar Responsável" style="margin-top:-4px;" data-toggle="modal" data-target="#respNotifyModal" class="btn btn-primary btn-outline btn-flat"><span class="btn-label icon fa fa-bullhorn"></span></button>
        @endif
        </div>
        
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">{{trans('tracker_detail.panel_title1')}}</span>
                    </div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><strong>{{trans('tracker_detail.construction_name')}}:</strong>
                                    </td>
                                    <td class="project_attr" data-field-name="title">{{$project->title}}</td>
                                </tr>
                                <tr>
                                    <td><strong>{{trans('tracker_detail.city')}}:</strong>
                                    </td>
                                    <td><span class="project_attr" data-field-name="city_text">{{$project->city_text == null ? "-" : $project->city_text}}</span>, {{$project->state == null ? "-" : $project->state}}</td>
                                </tr>
                                <tr>
                                    <td><strong>{{trans('tracker_detail.address')}}:</strong>
                                    </td>
                                    <td class="project_attr" data-field-name="address">{{$project->address == null ? "-" : $project->address}}</td>
                                </tr>
                                <tr>
                                    <td><strong>{{trans('tracker_detail.district')}}:</strong>
                                    </td>
                                    <td class="project_attr" data-field-name="district">{{$project->district == null ? "-" : $project->district}}</td>
                                </tr>
                                <tr>
                                    <td><strong>{{trans('tracker_detail.postal_code')}}:</strong>
                                    </td>
                                    <td class="project_attr" data-field-name="cep">{{$project->cep == null ? "-" : $project->cep}}</td>
                                </tr>
                                <tr>
                                    <td><strong>{{trans('tracker_detail.obs')}}:</strong></td>
                                    <td class="project_attr" data-field-name="description">{{$project->description or "-"}}</td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">{{trans('tracker_detail.panel_title2')}}</span>
                    </div>

                    <table class="table">
                            <tr>
                                <td><strong>{{trans('tracker_detail.project.type')}}:</strong>
                                </td>
                                <td class="project_type_attr">{{$project->type() == null ? "Indef" : $project->type()->description}}</td>
                            </tr>
                            @if ($project->stage()->project_stage_id != 1)
                            <tr>
                                <td><strong>{{trans('tracker_detail.project.stage')}}:</strong>
                                </td>
                                <td>{{$project->stage() == null ? "Indef" : $project->stage()->description}}</td>
                            </tr>
                            @else
                            <tr>
                                <td><strong>{{trans('tracker_detail.project.stage')}}:</strong>
                                </td>
                                <td>{{$project->closedStatus() == null ? "Indef" : $project->closedStatus()->description}}</td>
                            </tr>
                            @endif
                            <tr>
                                <td><strong>{{trans('tracker_detail.project.est_value')}}:</strong>
                                </td>
                                <td>R$ {{$project->project_value == null ? "N.I." : number_format($project->project_value, 2, ",", ".")}}</td>
                            </tr>
                            <tr>
                                <td><strong>{{trans('tracker_detail.project.budget_value')}}:</strong>
                                </td>
                                <td>R$ {{number_format($project->totalBudgetValue(), 2, ",", ".")}}</td>
                            </tr>
                            <tr>
                                <td><strong>{{trans('tracker_detail.project.invoiced_value')}}:</strong>
                                </td>
                                <td>R$ 0,00</td>
                            </tr>
                            <tr>
                                <td><strong>{{trans('tracker_detail.project.entry_date')}}:</strong>
                                </td>
                                <td>{{$project->created_at == null ? "N.I." : date_format(date_create($project->created_at), "d/m/Y")}}</td>
                            </tr>
                        </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">Responsável pelo Projeto</span>
                        
                        <div class="panel-heading-controls">
                            @if ($user->getUserType()->cod == 40 && $project->project_stage_id != 1)
                                <button  data-target="#atrRespModal" data-toggle="modal" class="btn btn-flat btn-xs btn-info">Atribuir Responsável</button>
                            @endif
                        </div>
                    </div>
                        @if ($project->representant_id != null)
                        <table class="table">
                            <tr>
                                <th>Representante</th>
                                <th>Gerente</th>
                            </tr>
                            <tr>
                                <td><strong>Nome:</strong> <a href="http://deltafaucetrep.com/profile/{{$project->representant()->user_id}}/detail">{{$project->representant()->user()->name . " " . $project->representant()->user()->surname}}</a></td>
                                <td><strong>Nome:</strong> <a href="http://deltafaucetrep.com/profile/{{$project->manager()->user_id}}/detail">{{$project->manager()->user()->name . " " . $project->manager()->user()->surname}}</a></td>
                            </tr>
                            <tr>
                                <td><strong>Telefone:</strong> {{$project->representant()->phone or "N.I"}}</td>
                                <td><strong>Telefone:</strong> {{$project->manager()->phone or "N.I"}}</td>
                            </tr>
                            <tr>
                                <td><strong>Email:</strong> {{$project->representant()->user()->email}}</td>
                                <td><strong>Email:</strong> {{$project->manager()->user()->email}}</td>
                            </tr>
                        </table>
                        @elseif ($project->manager_id != null)
                        <table class="table">
                            <tr>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Email</th>
                            </tr>
                            <tr>
                                <td><a href="http://deltafaucetrep.com/profile/{{$project->manager()->user_id}}/detail">{{$project->manager()->user()->name . " " . $project->manager()->user()->surname}}</a></td>
                                <td>{{$project->manager()->phone or "N.I"}}</td>
                                <td>{{$project->manager()->user()->email}}</td>
                            </tr>
                        </table>
                        @elseif ($project->distribuitor_id != null)
                        <table class="table">
                            <tr>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Email</th>
                            </tr>
                            <tr>
                                <td><a href="http://deltafaucetrep.com/profile/{{$project->distribuitor()->user_id}}/detail">{{$project->distribuitor()->user()->name . " " . $project->distribuitor()->user()->surname}}</a></td>
                                <td>{{$project->distribuitor()->phone or "N.I"}}</td>
                                <td>{{$project->distribuitor()->user()->email}}</td>
                            </tr>
                        </table>
                        @else
                            <div class="panel-body">
                                Nenhum responsável foi atribuido à este projeto ainda.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        
        <div class="row">
          <div class="col-sm-6">
            <div class="panel">
              <div class="panel-heading">
                <span class="panel-title">{{trans('tracker_detail.budgets.title')}}</span>
                
                <div class="panel-heading-controls">
                  @if ($project->project_stage_id != 1)
                    <button onclick="addBudgetToThisProject({{$project->project_id}});" class="btn btn-flat btn-xs btn-success">Novo Orçamento</button>
                  @endif
                </div>
              </div>
              <div id="projectBudgetsTable">
                <table class="table">
                  <thead>
                    <tr>
                      <th>{{trans('tracker_detail.budgets.dp')}}</th>
                      <th>{{trans('tracker_detail.budgets.budget_name')}}</th>
                      <th>{{trans('tracker_detail.budgets.qtd')}}</th>
                      <th>{{trans('tracker_detail.budgets.product_value')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($project->budgets() as $budget)
                    <tr>
                      <td style="text-align:center;">
                          <label class="checkbox-inline">
                            @if ($budget->flag_for_dp == 's')
                              <input type="checkbox" onchange="flagBudgetForDP({{$project->project_id}}, {{$budget->representant_budget_id}});" checked="checked" style="width:16px;height:16px;margin-bottom:6px;" class="px">
                            @else
                               <input type="checkbox" onchange="flagBudgetForDP({{$project->project_id}}, {{$budget->representant_budget_id}});" style="width:16px;height:16px;margin-bottom:6px;" class="px">
                            @endif
                          </label>
                      </td>
                      <td><a href="http://deltafaucetrep.com/budget/edit/{{$budget->representant_budget_id}}">{{$budget->budget()->title}}</a></td>
                      <td>{{collect($budget->budget()->getProducts())
                            ->reduce(function ($carry, $item) {
                              return $carry + $item->quantity;
                          })}} unds.</td>
                      <td>R$ {{number_format($budget->budget()->product_values, 2, ",", ".")}}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
            
          <div class="col-sm-6">
            <div class="panel">
              <div class="panel-heading">
                <span class="panel-title">{{trans('tracker_detail.dates.title')}}</span>
              </div>
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>{{trans('tracker_detail.dates.stage')}}</th>
                    <th>{{trans('tracker_detail.dates.est_date')}}</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      @if ($project->project_stage_id != 1 && $project->project_stage_id == 6) 
                          <button onclick="completeThisStage({{$project->project_id}}, 2);" class="btn btn-success btn-xs btn-flat">
                            <span class="btn-label icon fa fa-check"></span>
                          </button>
                      @endif
                    </td>
                    <td><strong>{{trans('tracker_detail.dates.identified')}}:</strong></td>
                    @if ($project->project_stage_id != 1 && $project->project_stage_id != 2 && $project->project_stage_id != 4 && $project->project_stage_id != 3)
                        <td><input type="date" data-field-name="prospect_date" class="project_date_attr form-control" value="{{$project->prospect_date == null ? 'N.I' : date_format(date_create($project->prospect_date), 'Y-m-d')}}" /></td>
                    @else
                        <td><input disabled type="date" data-field-name="prospect_date" class="project_date_attr form-control" value="{{$project->prospect_date == null ? 'N.I' : date_format(date_create($project->prospect_date), 'Y-m-d')}}" /></td>
                    @endif
                    </tr>
                  <tr>
                    <td>
                      @if ($project->project_stage_id != 1 
                        && $project->project_stage_id != 6 
                        && $project->project_stage_id != 4
                        && $project->project_stage_id != 3) 
                          <button onclick="completeThisStage({{$project->project_id}}, 4);" class="btn btn-success btn-xs btn-flat">
                            <span class="btn-label icon fa fa-check"></span>
                          </button>
                      @endif
                    </td>
                    <td><strong>{{trans('tracker_detail.dates.proposal')}}:</strong></td>
                    @if ($project->project_stage_id != 1 && $project->project_stage_id != 4 && $project->project_stage_id != 3)
                        <td><input type="date" data-field-name="proposal_date" class="project_date_attr form-control" value="{{$project->proposal_date == null ?: date_format(date_create($project->proposal_date), 'Y-m-d')}}" /></td>
                    @else
                        <td><input disabled type="date" data-field-name="proposal_date" class="project_date_attr form-control" value="{{$project->proposal_date == null ?: date_format(date_create($project->proposal_date), 'Y-m-d')}}" /></td>
                    @endif
                    </tr>
                  <tr>
                    <td>
                      @if ($project->project_stage_id != 1 
                        && $project->project_stage_id != 6 
                        && $project->project_stage_id != 3) 
                          <button onclick="completeThisStage({{$project->project_id}}, 3);" class="btn btn-success btn-xs btn-flat">
                            <span class="btn-label icon fa fa-check"></span>
                          </button>
                      @endif
                    </td>
                    <td><strong>{{trans('tracker_detail.dates.mock_up')}}:</strong></td>
                    @if ($project->project_stage_id != 1 && $project->project_stage_id != 3)
                        <td><input type="date" data-field-name="mockup_date" class="project_date_attr form-control" value="{{$project->mockup_date == null ?: date_format(date_create($project->mockup_date), 'Y-m-d')}}" /></td>
                    @else
                        <td><input disabled type="date" data-field-name="mockup_date" class="project_date_attr form-control" value="{{$project->mockup_date == null ?: date_format(date_create($project->mockup_date), 'Y-m-d')}}" /></td>
                    @endif
                  </tr>
                  <tr>
                    <td>
                      @if ($project->project_stage_id != 1 && $project->project_stage_id != 6 && $project->project_stage_id != 1) 
                          <button onclick="completeThisStage({{$project->project_id}}, 1);" class="btn btn-success btn-xs btn-flat">
                            <span class="btn-label icon fa fa-check"></span>
                          </button>
                      @endif
                    </td>
                    <td><strong>{{trans('tracker_detail.dates.delivery')}}:</strong></td>
                    @if ($project->project_stage_id != 1 && $project->project_stage_id != 5)
                      <td><input type="date" data-field-name="est_arrival" class="project_date_attr form-control" value="{{$project->est_arrival == null ? '' : date_format(date_create($project->est_arrival), 'Y-m-d')}}" /></td>
                    @else
                      <td><input disabled type="date" data-field-name="est_arrival" class="project_date_attr form-control" value="{{$project->est_arrival == null ? '' : date_format(date_create($project->est_arrival), 'Y-m-d')}}" /></td>
                    @endif
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
                            <span class="panel-title">Influenciadores</span>
                        
                            <div class="panel-heading-controls">
                                @if ($project->project_stage_id != 1)
                                    <button id="addNewInfluencerBtn"  data-target="#addNewInfluencerModal" data-toggle="modal" class="btn btn-flat btn-xs btn-outline">Adicionar Novo Influenciador</button>
                                @endif
                            </div>
                        </div>
                        @if (count($project->influencers()) == 0 || $project->influencers() == null)
                        <div class="panel-body">
                            Este projeto não possui nenhum influenciador ainda.
                        </div>                        
                        @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{trans('tracker_detail.influencer.influence')}}</th>
                                    <th>{{trans('tracker_detail.influencer.name')}}</th>
                                    <th>{{trans('tracker_detail.influencer.type')}}</th>
                                    <th>{{trans('tracker_detail.influencer.organization')}}</th>
                                    <th>{{trans('tracker_detail.influencer.email')}}</th>
                                    <th>{{trans('tracker_detail.influencer.phone')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($project->influencers() as $r)
                                <tr>
                                    <td>
                                        @if ($project->project_stage_id != 1)
                                            <button onclick="removeInfluencer({{$project->project_id}}, {{$r->influencer_id}});" class="btn btn-danger btn-xs btn-flat">
                                                <span class="btn-label icon fa fa-times"></span>
                                            </button>
                                        @endif
                                    </td>
                                    <td>
                                        @for ($i = 1; $i <= 5; $i += 1)
                                            @if ($i <= $r->level)
                                                <i onclick="setInfluencerLevel({{$project->project_id}}, {{$r->influencer_id}}, {{$i}});" class="fa fa-star"></i>
                                            @else
                                                <i onclick="setInfluencerLevel({{$project->project_id}}, {{$r->influencer_id}}, {{$i}});" class="fa fa-star-o"></i>
                                            @endif
                                        @endfor
                                    </td>
                                    <td><a onclick="influencerDetail({{$r->influencer_id}});">{{$r->influencer()->name . " " . $r->influencer()->surname}}</a></td>
                                    <td>{{$r->influencer()->type() == null ? "N.I" : $r->influencer()->type()->description}}</td>
                                    @if ($r->customer() == null)
                                        <td>N.I</td>
                                    @else
                                        <td><a target="_blank" href="http://deltafaucetrep.com/portfolio/detail/{{$r->customer_id}}">{{$r->customer()->fantasy_name}}</a></td>
                                    @endif
                                    <td>{{$r->influencer()->email or "N.I"}}</td>
                                    <td>{{$r->influencer()->phone or "N.I"}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="panel widget-chat">
                    <div class="panel-heading">
                        <span class="panel-title"><i class="panel-title-icon fa fa-comment"></i>{{trans('tracker_detail.notes.title')}}</span>
                    </div>
                    <!-- / .panel-heading -->
                    <div class="panel-body" id="projectNotes">

                        @foreach($project->notes() as $note) 
                            @if ($user->user_id == $note->user_id)
                            <div class="message {{$note->user_id != $user->user_id ?: 'right'}}">
                                <img src="{{$note->user()->avatar_path == null ? " http://static.deltafaucetrep.com/assets/demo/avatars/1.jpg " : $note->user()->avatar_path}}" alt="" class="message-avatar">
                                <div class="message-body">
                                    <div class="message-heading">
                                        <a href="http://deltafaucetrep.com/profile/{{$note->user_id}}/detail" title="">{{$note->user()->name . " " . $note->user()->surname}}</a>:
                                        <span class="pull-right">{{date_format(date_create($note->created_at), "d/m/Y")}}</span>
                                    </div>
                                    <div class="message-text">
                                        {{$note->text}}
                                    </div>
                                </div>
                                <!-- / .message-body -->
                            </div>
                            @else
                            <div class="message {{$note->user_id != $user->user_id ?: 'right'}}">
                                <img src="{{$note->user()->avatar_path == null ? " http://static.deltafaucetrep.com/assets/demo/avatars/1.jpg " : $note->user()->avatar_path}}" alt="" class="message-avatar">
                                <div class="message-body">
                                    <div class="message-heading">
                                        <a href="http://deltafaucetrep.com/profile/{{$note->user_id}}/detail" title="">{{$note->user()->name . " " . $note->user()->surname}}</a>:
                                        <span class="pull-right">{{date_format(date_create($note->created_at), "d/m/Y")}}</span>
                                    </div>
                                    <div class="message-text">
                                        {{$note->text}}
                                    </div>
                                </div>
                                <!-- / .message-body -->
                            </div>
                            @endif 
                        @endforeach

                    </div>
                    <!-- / .panel-body -->
                    <form class="panel-footer chat-controls">
                        <div class="chat-controls-input">
                            <textarea id="projectNoteText" rows="2" class="form-control" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 32px;"></textarea>
                        </div>
                        <button id="projectNoteSend" class="btn btn-primary chat-controls-btn">{{trans('tracker_detail.notes.btn')}}</button>
                    </form>
                    <!-- / .panel-footer -->
                </div>
            </div>
        </div>
        
        <div class="row">
          <div class="col-sm-12">
            <div class="panel">
              <div class="panel-heading">
                <span class="panel-title"><i class="panel-title-icon fa fa-file-archive-o"></i>{{trans('tracker_detail.files.title')}}</span>

                <div class="panel-heading-controls">
                  <button data-target="#sendFilesModal" data-toggle="modal" class="btn btn-success btn-xs">{{trans('tracker_detail.files.btn')}}</button>
                </div>
              </div>
                @if ($project->files() == null || count($project->files()) == 0)
                <div class="panel-body">
                    Este projeto ainda não possui arquivos.
                </div>                
                @else
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>{{trans('tracker_detail.files.name')}}</th>
                    <th>{{trans('tracker_detail.files.stage')}}</th>
                    <th>{{trans('tracker_detail.files.desc')}}</th>
                    <th>{{trans('tracker_detail.files.send_by')}}</th>
                    <th>{{trans('tracker_detail.files.added_at')}}</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($project->files() as $file)
                    <tr>
                        <td>{{$file->cloud_file_id}}</td>
                        <td><a href="http://static.deltafaucetrep.com/tracker_files/{{$project->project_id}}/{{$file->filename}}">{{$file->filename}}</a></td>
                        <td>{{$file->util}}</td>
                        <td>{{$file->description or "-"}}</td>
                        <td>{{$file->user()->name . " " . $file->user()->surname}}</td>
                        <td>{{date_format(date_create($file->created_at), "d/m/Y")}}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
                @endif
            </div>
          </div>
        </div>
      
    </div>

    <div class="panel-footer">
        @if ($project->project_stage_id != 1)
            <button data-toggle="modal" data-target="#closedStatusModal" class="btn btn-danger btn-md btn-flat">
                Fechar Projeto
            </button>
        @endif
    </div>
</div>

<div id="atrRespModal" class="modal fade" aria-hidden="true" style="display: none;">
    <div style="width:650px;" class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-body" style="padding:0px">
                <div class="row">
                    <div class="panel" style="margin-bottom:0px;">
                        <div class="panel-heading">
                            <span class="panel-title">Atribuir Responsável ao Projeto</span>
                        </div>

                        <div style="padding: 15px;">
                         <table class="table" id="reps_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Tipo de Usuário</th>
                                    <th>Perfil</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user->getAllNonDeltaUsers() as $rep)
                                <tr>
                                    <td>
                                        <button onclick="assignResp({{$project->project_id}}, {{$rep->user_id}});" class="btn btn-success btn-xs btn-flat">
                                            <span class="btn-label icon fa fa-check"></span>
                                        </button>
                                    </td>
                                    <td>{{$rep->name . " " . $rep->surname}}</td>
                                    <td>{{$rep->getUserType()->description}}</td>
                                    @if ($rep->getUserType()->cod == 20)
                                        <td>Delta</td>
                                    @elseif ($rep->getUserType()->cod == 10)
                                        <td>{{$rep->representant()->profile() == null ? "N.I" : $rep->representant()->profile()->description}}</td>
                                    @elseif ($rep->getUserType()->cod == 5)
                                        <td>Distribuidor</td>
                                    @elseif ($rep->getUserType()->cod == 3)
                                        <td>Lojista</td>                                    
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / .modal-content -->
    </div>
    <!-- / .modal-dialog -->
</div>

<div id="sendFilesModal" class="modal fade">
    <div style="width:500px" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Adicionar arquivo ao projeto
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{trans('tracker_detail.files.desc')}}:</label>
                            <input type="text" id="prj_file_desc" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{trans('tracker_detail.files.file')}}:</label>
                            <input type="file" id="prj_file_att">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button style="float:right;" id="btn_send_prj_file" type="button" class="btn btn-info btn-md">Enviar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="closedStatusModal" class="modal modal-alert modal-warning fade in">
    <div style="width:300px" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fa fa-warning"></i>
            </div>
            <div class="modal-title">Atenção</div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">{{trans('tracker_detail.close_dialog.question')}}</label>
                        <select id="project_closed_reason" class="form-control">
                            <option value="-" selected=""></option>
                            @foreach ($project->getAllClosedStatus() as $cs)
                                <option value="{{$cs->project_closed_status_id}}">{{$cs->description}}</option>
                            @endforeach
                        </select>
                        <div for="project_closed_reason" class="jquery-validate-error help-block" style="display:none;">{{trans('tracker_detail.req_field')}}</div>
                    </div>
                </div>
            </div>
        
            <div class="modal-footer">
                <button style="float:right;" id="btn_close_this_project" type="button" class="btn btn-info btn-md">{{trans('tracker_detail.close_dialog.btn')}}</button>
            </div>
        </div>
    </div>
</div>


<div id="addNewInfluencerModal" class="modal fade">
    <div style="width:900px" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="addInfluencerBody">

            </div>
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

<div id="respNotifyModal" class="modal fade">
    <div style="width:500px" class="modal-dialog">
        <div class="modal-content">
            <div class="panel" style="margin-bottom:0px;">
                <div class="panel-heading">
                    <span class="panel-title">Notificar Responsável</span>
                </div>
                
                <div class="panel-body">
                    
                    <p>O responsável pelo projeto será notificado por e-mail.</p>
                    
                    <textarea id="notifyRespMessage" class="form-control" rows="5" placeholder="Insira sua mensagem aqui."></textarea>
                    
                </div>
                
                <div class="panel-footer text-right">
                
                    <button id="projectNotifyResp" class="btn btn-success chat-controls-btn">Enviar</button>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="_token" value="{{csrf_token()}}">
<input type="hidden" id="project_id" value="{{$project->project_id}}">

@endsection

@section('end')

<script type="text/javascript" src="http://static.deltafaucetrep.com/assets/javascripts/editable.js"></script>

<script type="text/javascript">

    $.fn.editable.defaults.mode = 'inline';
    
    $("#reps_table").DataTable();
    
    var has_get_influencers = false;
    
    $("#addNewInfluencerBtn").click(function () {
        
        if ( ! has_get_influencers) {
            var req = $.ajax({
                url: "http://deltafaucetrep.com/tracker/add_influencer",
                type: "get",
                dataType: "html"
            }).done(function (data) {
                $("#addInfluencerBody").html(data);
            }); 
        
            has_get_influencers = true;
        }
        
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
    
    @if ($project->project_stage_id != 1)
        function setInfluencerLevel(project_id, influencer_id, level) {
            $.ajax({
                url: "http://deltafaucetrep.com/tracker/project/"+project_id+"/influencer/"+influencer_id+"/set_level/"+level,
                type: "get"
            }).done(function () {
                setTimeout(function () {
                    window.location.reload();
                }, 500);   
            });
        }
    @endif
    
    function removeInfluencer(project_id, influencer_id) {
        
        $.ajax({
            url: "http://deltafaucetrep.com/tracker/project/"+project_id+"/influencer/"+influencer_id+"/remove",
            type: "get"
        }).done(function () {
            setTimeout(function () {
                window.location.reload();
            }, 500);    
        });
        
    }
    
    function assignResp(project, resp) {
        
        var req = $.ajax({
            url: "http://deltafaucetrep.com/tracker/project/" + project + "/assign-resp/" + resp,
            type: "get",
            dataType: "json"
        });
        
        setTimeout(function () {
            window.location.reload();
        }, 200);
    }
  
    function addBudgetToThisProject(project) {
      $.ajax({
        url: "http://deltafaucetrep.com/tracker/project/" + project + "/new-budget",
        type: "get"
      }).done(function () {
        setTimeout(function () {
          window.location.reload();  
        }, 300)
      });  
    }
    
    function completeThisStage(project, stage) {
        $.ajax({
            url: "http://deltafaucetrep.com/tracker/project/"+project+"/stage/"+stage+"/complete",
            type: "get",
            dataType : "json"
        }).done(function (data) {
            window.location.reload();    
        });
    }
    
    function flagBudgetForDP(project, budget) {
      
      $.ajax({
        url: "http://deltafaucetrep.com/tracker/project/" + project + "/budget/" + budget + "/toggle-dp",
        type: "get"
      });
      
    }
    
    $("#projectNotifyResp").click(function () {
        var data = {};
    
        data.text = $("#notifyRespMessage").val();
        
        data._token = $("#_token").val();
        
        $.ajax({
            url: "http://deltafaucetrep.com/tracker/project/{{$project->project_id}}/notify-resp",
            type: "post",
            data: data,
            dataType: "json"
        }).success(function () {
            alert("O responsável foi notificado por email.");    
        }).error(function () {
            alert("Houve um erro durante o envio do email.");    
        });
    });
    
    $("#btn_close_this_project").click(function () {
        var status = $("#project_closed_reason option:selected").val();
        
        if (status == "-") {
            alert("{{trans('tracker_detail.alerts.close_reason')}}");
        }
        
        $.ajax({
            url: "http://deltafaucetrep.com/tracker/project/{{$project->project_id}}/close/" + status,
            type: "get",
            dataType: "json"
        }).done(function () {
            window.location.reload();    
        });
        
    });
    
    function normalize(text) {
        return (text == "") ? "-" : text.replace(/\//g, "-");
    }
    
    $(".project_date_attr").change(function () {
        $.ajax({
            url: 'http://deltafaucetrep.com/tracker/project/{{$project->project_id}}/edit/' + $(this).data("field-name") + '/to/' + $(this).val(),
            type: 'get'
        }).error(function(data) {
            alert("{{trans('tracker_detail.alerts.edit_error')}}");
        });
    });
    
        $(".project_attr").each(function (key, value) {
            $(value).editInPlace({
                url: "#",
                callback: function(original_element, html, original) {

                    $.ajax({
                        url: 'http://deltafaucetrep.com/tracker/project/{{$project->project_id}}/edit/' + $(value).data("field-name") + '/to/' + normalize(html),
                        type: 'get'
                    }).error(function(data) {
                        alert("{{trans('tracker_detail.alerts.edit_error')}}");
                    });

                    return html;
                }
            });
        });
    
        $(".project_type_attr").each(function (key, value) {
            $(value).editInPlace({
                url: "#",
                select_options: [
                    @foreach($user->getAllProjectTypes() as $t) ['{{$t->description}}', '{{$t->project_type_id}}'],  @endforeach
                ],
                field_type: "select",
                callback: function(original_element, html, original) {

                    $.ajax({
                        url: 'http://deltafaucetrep.com/tracker/project/{{$project->project_id}}/edit/project_type_id/to/' + normalize(html),
                        type: 'get'
                    }).error(function(data) {
                        alert("{{trans('tracker_detail.alerts.edit_error')}}");
                    });

                    @foreach($user->getAllProjectTypes() as $t)
                    if (html == '{{$t->project_type_id}}') return '{{$t->description}}';
                    @endforeach

                    return html;
                }
            });        
        });
    
    $("#projectNoteSend").click(function () {
        var data = {};
        
        data.text = $("#projectNoteText").val();
        
        data._token = $("#_token").val();
        
        var req = $.ajax({
            url: "http://deltafaucetrep.com/tracker/project/{{$project->project_id}}/send-note",
            type: "POST",
            dataType: "post",
            data: data
        }).done(function () {
            window.location.reload();    
        });
        
        setTimeout(function () {
            window.location.reload();    
        }, 200);
    });
    
    $("#btn_send_prj_file").click(function () {
        $("#sendFilesModal").modal("toggle");
        
        var data = new FormData();
        var file = $("#prj_file_att").prop('files')[0];
        
        data.append("desc", $("#prj_file_desc").val());
        data.append("file", file, file.name);
        
        data.append("_token", $("#_token").val());
    
        var req = $.ajax({
            url: "http://deltafaucetrep.com/tracker/project/{{$project->project_id}}/send_file",
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false
        });
        
        req.done(function () {
            setTimeout(function () {
                window.location.reload();
            }, 500);
        });
    });
    
    $("#projectNotes").slimScroll({
        height: "400px",
        alwaysVisible: true,
        color: '#888',
        allowPageScroll: true
    });
  
    $("#projectBudgetsTable").slimScroll({
        height: "230px",
        alwaysVisible: true,
        color: '#888',
        allowPageScroll: true
    });
</script>

@endsection