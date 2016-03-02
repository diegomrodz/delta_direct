@extends('layouts.master')

@section('content')

<div class="panel">
    <div class="panel-heading">
        <span class="panel-title">Agenda</span>
        
        
    </div>

    <div class="panel-body">
        <div class="row">
            <div id="trackerCalendar"></div>
        </div>
        
        <div class="row">
            <table class="table">
                <caption><strong>Legenda</strong></caption>
                <tbody>
                    <tr>
                        <td><strong>Prospect Date</strong></td>
                        <td><div style="width:20px;height:20px;background-color: red;"></div></td>
                        
                        <td> | </td>
                        
                        <td><strong>Proposal Date</strong></td>
                        <td><div style="width:20px;height:20px;background-color: #4083a9;"></div></td>
                        
                        <td> | </td>
                        
                        <td><strong>Mockup Date</strong></td>
                        <td><div style="width:20px;height:20px;background-color: blue;"></div></td>
                        
                        <td> | </td>
                        
                        <td><strong>Est. Arrival</strong></td>
                        <td><div style="width:20px;height:20px;background-color: green;"></div></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="calendarLegendaModal" class="modal fade" aria-hidden="true" style="display: none;">
    <div style="width:350px" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">

                <table class="table">
                    <caption><strong> Legenda </strong></caption>
                    <tbody>
                        <tr>
                            <td>
                                <div style="width:20px;height:20px;background-color: red;"></div>
                            </td>
                            <td>
                                <span>Prospect Date</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="width:20px;height:20px;background-color: #4083a9;"></div>
                            </td>
                            <td>
                                <span>Proposal Date</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="width:20px;height:20px;background-color: blue;"></div>
                            </td>
                            <td>
                                <span>Mockup Date</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="width:20px;height:20px;background-color: green;"></div>
                            </td>
                            <td>
                                <span>Est. Arrival</span>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection

@section('end')

<script src="http://fullcalendar.io/js/fullcalendar-2.4.0/lib/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.4.0/fullcalendar.min.js"></script>

<script type="text/javascript">

    $("#trackerCalendar").fullCalendar({

        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek'
        },

        editable: true,
        eventLimit: true,

        events: [
            @foreach($user->getDeliverableProjects() as $project)
                @if ($project->prospect_date != null)
                    {
                        title: '{{$project->title}}',
                        url: 'http://deltafaucetrep.com/tracker/project/{{$project->project_id}}/detail',
                        start: '{{date_format(date_create($project->prospect_date), "Y-m-d")}}',
                        color: 'red'
                    },
                @endif
             
                @if ($project->proposal_date != null)
                    {
                        title: '{{$project->title}}',
                        url: 'http://deltafaucetrep.com/tracker/project/{{$project->project_id}}/detail',
                        start: '{{date_format(date_create($project->proposal_date), "Y-m-d")}}',
                    },
                @endif
             
                @if ($project->mockup_date != null)
                    {
                        title: '{{$project->title}}',
                        url: 'http://deltafaucetrep.com/tracker/project/{{$project->project_id}}/detail',
                        start: '{{date_format(date_create($project->mockup_date), "Y-m-d")}}',
                        color: 'blue'
                    },
                @endif
             
                @if ($project->est_arrival != null)
                    {
                        title: '{{$project->title}}',
                        url: 'http://deltafaucetrep.com/tracker/project/{{$project->project_id}}/detail',
                        start: '{{date_format(date_create($project->est_arrival), "Y-m-d")}}',
                        color: "green"
                    },
                @endif
            @endforeach
        ]

    });
    
</script>

@endsection