@extends('layouts.master')

@section('content')

<script type="text/javascript">

    window.document.body.className += " page-mail";
    
</script>


<div class="mail-container"  style="margin-left:0px;">
    <div class="mail-container-header">
        @if ($user->getUserType()->cod == 40)
            {{trans('tracker_index.title1')}}
        @else
            {{trans('tracker_index.title2')}}
        @endif

        <form action="" class="pull-right" style="width: 250px;margin-top: 3px;">
            <div class="form-group input-group-sm has-feedback no-margin">
                <input id="search_input" type="text" placeholder="Buscar..." class="form-control">
                <span class="fa fa-search form-control-feedback" style="top: -1px"></span>
            </div>
        </form>
    </div>

    <div class="mail-controls clearfix">
        <div class="btn-toolbar wide-btns pull-left" role="toolbar">

            <div class="btn-group">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="fa fa-check-square-o"></i>&nbsp;<i class="fa fa-caret-down"></i>
                </button>
                <button type="button" class="btn"><i class="fa fa-repeat"></i>
                </button>
            </div>
            
            @if ($user->getUserType()->cod >= 20)
                <div class="btn-group" style="width:auto;">
                    <button type="button" title="{{trans('tracker_index.new_project')}}" class="btn" onclick="window.location.href = 'http://deltafaucetrep.com/tracker/project/new';"><i class="fa fa-plus"></i>
                    </button>
                </div>
            @endif            
        </div>

    </div>


    <div class="table-responsive">
    
       <table id="projects_table" class="table table-striped">
           <thead>
                <tr>
                    <th>{{trans('tracker_index.thead.item')}}</th>
                    <th>{{trans('tracker_index.thead.title')}}</th>
                    <th>{{trans('tracker_index.thead.city')}}, {{trans('tracker_index.thead.state')}}</th>
                    @if ($user->getUserType()->cod >= 20)
                        <th>{{trans('tracker_index.thead.rep')}}</th>
                    @endif
                    @if ($user->getUserType()->cod == 40)
                        <th>{{trans('tracker_index.thead.manager')}}</th>
                    @endif
                    <th>{{trans('tracker_index.thead.type')}}</th>
                    <th>{{trans('tracker_index.thead.stage')}}</th>
                    <th>{{trans('tracker_index.thead.est_value')}}</th>
                    <th>{{trans('tracker_index.thead.confidence')}}</th>
                    <th>{{trans('tracker_index.thead.influencer')}}</th>
                    <th>{{trans('tracker_index.thead.entry')}}</th>
                    <th>{{trans('tracker_index.thead.delivery')}}</th>
               </tr>
           </thead>
           <tbody>
                @if ($user->getUserType()->cod == 40)
                    @foreach ($user->getAllProjects() as $project)
                        <tr>
                            <td data-order="{{$project->project_id}}"><input type="checkbox" data-project-id="{{$project->project_id}}"></td>
                            <td><a href="http://deltafaucetrep.com/tracker/project/{{$project->project_id}}/detail">{{$project->title}}</a></td>
                            <td>{{$project->city_text}}, {{$project->state}}</td>
                            <td>{{$project->representant() == null ? "Delta" : $project->representant()->user()->name . " " . $project->representant()->user()->surname}}</td>
                            <td>{{$project->manager() == null ? "Delta" : $project->manager()->user()->name}}</td>
                            <td>{{$project->type()->description}}</td>
                            @if ($project->project_stage_id == 1)
                                <td>{{$project->closedStatus()->description}}</td>
                            @else
                                <td>{{$project->stage()->description}}</td>
                            @endif
                            <td>{{number_format($project->project_value, 2,".", ",")}}</td>
                            <td>{{$project->confidence_level}}%</td>
                            <td>{{$project->influencer() == null ? "-" : ($project->influencer()->name == null ? $project->influencer()->fantasy_name : $project->influencer()->name)}}</td>
                            <td>{{date_format(date_create($project->created_at), "d/m/Y")}}</td>
                            <td>{{date_format(date_create($project->est_arrival), "d/m/Y")}}</td>
                        </tr>
                    @endforeach
                @elseif ($user->getUserType()->cod == 20)
                    @foreach ($user->getAllProjects() as $project)
                        <tr>
                            <td data-order="{{$project->project_id}}"><input type="checkbox" data-project-id="{{$project->project_id}}"></td>
                            <td><a href="http://deltafaucetrep.com/tracker/project/{{$project->project_id}}/detail">{{$project->title}}</a></td>
                            <td>{{$project->city_text}}, {{$project->state}}</td>
                            <td>{{$project->representant() == null ? "Delta" : $project->representant()->user()->name . " " . $project->representant()->user()->surname}}</td>
                            <td>{{$project->type()->description}}</td>
                            @if ($project->project_stage_id == 1)
                                <td>{{$project->closedStatus()->description}}</td>
                            @else
                                <td>{{$project->stage()->description}}</td>
                            @endif
                            <td>{{number_format($project->project_value, 2,".", ",")}}</td>
                            <td>{{$project->confidence_level}}%</td>
                            <td>{{$project->influencer() == null ? "-" : ($project->influencer()->name == null ? $project->influencer()->fantasy_name : $project->influencer()->name)}}</td>
                            <td>{{date_format(date_create($project->created_at), "d/m/Y")}}</td>
                            <td>{{date_format(date_create($project->est_arrival), "d/m/Y")}}</td>
                        </tr>
                    @endforeach
               @elseif ($user->getUserType()->cod == 10 || $user->getUserType()->cod == 5)
                    @foreach ($user->getAllProjects() as $project)
                        <tr>
                            <td data-order="{{$project->project_id}}"><input type="checkbox" data-project-id="{{$project->project_id}}"></td>
                            <td><a href="http://deltafaucetrep.com/tracker/project/{{$project->project_id}}/detail">{{$project->title}}</a></td>
                            <td>{{$project->city_text}}, {{$project->state}}</td>
                            <td>{{$project->type()->description}}</td>
                            @if ($project->project_stage_id == 1)
                                <td>{{$project->closedStatus()->description}}</td>
                            @else
                                <td>{{$project->stage()->description}}</td>
                            @endif
                            <td>{{number_format($project->project_value, 2,".", ",")}}</td>
                            <td>{{$project->confidence_level}}%</td>
                            <td>{{$project->influencer() == null ? "-" : ($project->influencer()->name == null ? $project->influencer()->fantasy_name : $project->influencer()->name)}}</td>
                            <td>{{date_format(date_create($project->created_at), "d/m/Y")}}</td>
                            <td>{{date_format(date_create($project->est_arrival), "d/m/Y")}}</td>
                        </tr>
                    @endforeach
               @endif
           </tbody>
       </table>
    
    </div>

</div>

@endsection

@section('end')

<script type="text/javascript">

    var table = $("#projects_table").DataTable({
        responsive : {details: false},
        paging: false,
        sDom: ""
    });
    
    $("#search_input").keyup(function() {
        table.search($(this).val() == "" ? " " : $(this).val()).draw();
    });

    $("#btn_refresh_search").click(function() {
        table.search(" ").draw();
    });
</script>

@endsection