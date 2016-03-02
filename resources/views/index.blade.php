@extends('layouts.master') @section('title', 'Home') @section('content') @if ($user->getUserType()->cod == 20)
<div class="col-md-6">
    <div class="panel widget-support-tickets">
        <div class="panel-heading">
            <span class="panel-title"><i class="panel-title-icon fa  fa-edit"></i>Pedidos para aprovação</span>
            <div class="panel-heading-controls">
                <div class="panel-heading-text"><a href="#">{{count($user->manager()->getPendingOrders())}} pedidos pendentes</a>
                </div>
            </div>
        </div>
        <!-- / .panel-heading -->
        <div class="panel-body tab-content-padding">
            <!-- Panel padding, without vertical padding -->
            <div id="dashboard_user_notifications" style="height:300px;">
                <div class="panel-padding no-padding-vr">

                    @foreach($user->manager()->getPendingOrders() as $o)

                    <div class="ticket">
                        <span class="ticket-label">R$ {{$o->grand_total}}</span>
                        <a href="http://deltafaucetrep.com/order/detail/{{$o->order_id}}" title="" class="ticket-title">{{$o->title}}<span>[#{{$o->order_id}}]</span></a>
                        <span class="ticket-info">
									Enviado por <a href="#" title="">{{$o->representant()->user()->name . " " . $o->representant()->user()->surname}}</a> {{$o->created_at}}
								</span>
                    </div>
                    <!-- / .ticket -->

                    @endforeach

                </div>
            </div>
        </div>
        <!-- / .panel-body -->
    </div>
    <!-- / .panel -->
</div>

@endif 

@if ($user->getUserType()->cod == 40)
<div class="row">

    <div class="col-md-6">
        <div class="panel widget-support-tickets">
            <div class="panel-heading">
                <span class="panel-title"><i class="panel-title-icon fa  fa-edit"></i>Pedidos para análise</span>
                <div class="panel-heading-controls">
                    <div class="panel-heading-text"><a href="#">{{count($user->getApprovedOrders())}} pedidos pendentes</a>
                    </div>
                </div>
            </div>
            <!-- / .panel-heading -->
            <div class="panel-body tab-content-padding">
                <!-- Panel padding, without vertical padding -->
                <div class="dashboard_user_notifications">
                    <div class="panel-padding no-padding-vr">

                        @foreach($user->getApprovedOrders() as $o)

                        <div class="ticket">
                            <span class="ticket-label">R$ {{$o->grand_total}}</span>
                            <a href="http://deltafaucetrep.com/order/detail/{{$o->order_id}}" title="" class="ticket-title">{{$o->title}}<span>[#{{$o->order_id}}]</span></a>
                            <span class="ticket-info">
									Enviado por <a href="#" title="">{{$o->representant() == null ? "Televendas" : ($o->representant()->manager()->user()->name . " " . $o->representant()->manager()->user()->surname)}}</a> {{$o->created_at}}
								</span>
                        </div>
                        <!-- / .ticket -->

                        @endforeach

                    </div>
                </div>
            </div>
            <!-- / .panel-body -->
        </div>
        <!-- / .panel -->
    </div>

    <div class="col-md-6">
        <div class="panel widget-support-tickets">
            <div class="panel-heading">
                <span class="panel-title"><i class="panel-title-icon fa  fa-credit-card"></i>Análise de Crédito</span>
                <div class="panel-heading-controls">
                    <div class="panel-heading-text"><a href="#">{{count($user->getPendingCreditAnalysis())}} pedidos pendentes</a>
                    </div>
                </div>
            </div>
            <!-- / .panel-heading -->
            <div class="panel-body tab-content-padding">
                <!-- Panel padding, without vertical padding -->
                <div class="dashboard_user_notifications">
                    <div class="panel-padding no-padding-vr">

                        @foreach($user->getPendingCreditAnalysis() as $c)

                        <div class="ticket">
                            <a href="http://deltafaucetrep.com/customer/credit_analysis/{{$c->customer_credit_analysis_id}}" title="" class="ticket-title">{{$c->customer()->fantasy_name}}<span>[#{{$c->customer()->customer_id}}]</span></a>
                            <span class="ticket-info">
									Enviado por <a href="#" title="">{{($c->representant() == null ? $c->manager() == null ? "Televendas" : $c->manager()->user()->name : $c->representant()->user()->name) . " " . ($c->representant() == null ? $c->manager() == null ? "" : $c->manager()->user()->surname : $c->representant()->user()->surname)}}</a> {{$c->created_at}}
								</span>
                        </div>
                        <!-- / .ticket -->

                        @endforeach

                    </div>
                </div>
            </div>
            <!-- / .panel-body -->
        </div>
        <!-- / .panel -->
    </div>
</div>
@endif @if ($user->getUserType()->cod == 5)
<div class="row">

    <div class="col-md-6">
        <div class="panel widget-support-tickets">
            <div class="panel-heading">
                <span class="panel-title"><i class="panel-title-icon fa  fa-credit-card"></i>Solicitações de Análise de Crédito</span>
                <div class="panel-heading-controls">
                    <div class="panel-heading-text"><a href="#">{{count($user->distribuitor()->getPendingCreditAnalysis())}} pedidos pendentes</a>
                    </div>
                </div>
            </div>
            <!-- / .panel-heading -->
            <div class="panel-body tab-content-padding">
                <!-- Panel padding, without vertical padding -->
                <div class="dashboard_user_notifications">
                    <div class="panel-padding no-padding-vr">

                        @foreach($user->distribuitor()->getPendingCreditAnalysis() as $o)

                        <div class="ticket">
                            <a href="http://deltafaucetrep.com/distribuitor/credit_analysis/{{$o->customer_credit_analysis_id}}" title="" class="ticket-title">{{$o->creditAnalysis()->customer()->fantasy_name}}<span>[#{{$o->creditAnalysis()->customer_credit_analysis_id}}]</span></a>
                            <span class="ticket-info">
								  Análise de Crédito solicitada por <a href="#" title="">{{$o->creditAnalysis()->representant() == null ? "Delta Faucet" : ($o->creditAnalysis()->representant()->user()->name . " " . $o->creditAnalysis()->representant()->user()->surname)}}</a> {{$o->created_at}}
								</span>
                        </div>
                        <!-- / .ticket -->

                        @endforeach

                    </div>
                </div>
            </div>
            <!-- / .panel-body -->
        </div>
        <!-- / .panel -->
    </div>
    
    <div class="col-md-6">
        <div class="panel widget-support-tickets">
            <div class="panel-heading">
                <span class="panel-title"><i class="panel-title-icon fa  fa-edit"></i>Pedidos para Aprovação</span>
                <div class="panel-heading-controls">
                    <div class="panel-heading-text"><a href="#">{{count($user->distribuitor()->getPendingOrdersApproval())}} pedidos pendentes</a>
                    </div>
                </div>
            </div>
            <!-- / .panel-heading -->
            <div class="panel-body tab-content-padding">
                <!-- Panel padding, without vertical padding -->
                <div class="dashboard_user_notifications">
                    <div class="panel-padding no-padding-vr">

                        @foreach($user->distribuitor()->getPendingOrdersApproval() as $o)

                        <div class="ticket">
                            <a href="http://deltafaucetrep.com/sub_order/detail/{{$o->sub_order_id}}" title="" class="ticket-title">Pedido<span>[#{{$o->distribuitor()->delta_code . $o->order_id}}]</span></a>
                            <span class="ticket-info">
								  Cliente: <a href="http://deltafaucetrep.com/portfolio/detail/{{$o->customer()->customer_id}}" title="">{{$o->customer()->company_name}}</a> {{$o->created_at}}
								</span>
                        </div>
                        <!-- / .ticket -->

                        @endforeach

                    </div>
                </div>
            </div>
            <!-- / .panel-body -->
        </div>
        <!-- / .panel -->
    </div>
</div>
@endif

@if ($user->getUserType()->cod == 10 || $user->getUserType()->cod == 20)
<div class="col-md-6">
    <div class="panel panel-warning" id="dashboard-recent">
        <div class="panel-heading">
            <span class="panel-title"><i class="panel-title-icon fa fa-bullhorn text-danger"></i>Pedidos</span>
            <ul class="nav nav-tabs nav-tabs-xs">
                <li class="active">
                    <a href="#dashboard-recent-comments" data-toggle="tab">Finalizados</a>
                </li>
                <li class="">
                    <a href="#dashboard-recent-threads" data-toggle="tab">Em Andamento</a>
                </li>
            </ul>
        </div>
        <!-- / .panel-heading -->
        <div class="tab-content">

            <!-- Comments widget -->

            <!-- Without padding -->
            <div class="widget-comments panel-body tab-pane no-padding fade active in" id="dashboard-recent-comments">
                <!-- Panel padding, without vertical padding -->
                <div class="dashboard_user_notifications">
                    <div class="panel-padding no-padding-vr">

                        @foreach($user->getNotifications() as $note) @if ($note->getSubject()->notification_subject_id == 5)
                        <div class="comment" style="margin-bottom:10px;">
                            <img src="http://static.deltafaucetrep.com/assets/demo/avatars/1.jpg" alt="" class="comment-avatar">
                            <div class="comment-body">
                                <div class="comment-by">
                                    <a href="#" title="">{{$note->from()->name . " " . $note->from()->surname}}</a>
                                </div>
                                <div class="comment-text">
                                    {{$note->text}}
                                </div>
                                <div class="comment-actions">
                                    <span class="pull-right">{{$note->created_at}}</span>
                                </div>
                            </div>
                            <!-- / .comment-body -->
                        </div>
                        @endif @endforeach

                    </div>
                </div>
            </div>
            <!-- / .widget-comments -->

            <!-- Threads widget -->

            <!-- Without padding -->
            <div class="widget-threads panel-body tab-pane no-padding fade" id="dashboard-recent-threads">
                <div class="dashboard_user_notifications">
                    <div class="panel-padding no-padding-vr">

                        @foreach($user->getNotifications() as $note) @if ($note->getSubject()->notification_subject_id == 2 || $note->getSubject()->notification_subject_id == 3 || $note->getSubject()->notification_subject_id == 6)
                        <div class="thread">
                            <img src="http://static.deltafaucetrep.com/assets/demo/avatars/1.jpg" alt="" class="thread-avatar">
                            <div class="thread-body">
                                <span class="thread-time">{{$note->created_at}}</span>
                                <a href="#" class="thread-title">{{$note->from()->name . " " . $note->from()->surname}}</a>
                                <div class="thread-info">{{$note->text}}
                                </div>
                            </div>
                            <!-- / .thread-body -->
                        </div>
                        <!-- / .thread -->
                        @endif @endforeach

                    </div>
                </div>
            </div>
            <!-- / .panel-body -->
        </div>
    </div>
    <!-- / .widget-threads -->
</div>
@endif

@if ($user->getUserType()->cod == 20)
<div class="col-md-6">
    <div class="panel panel-warning" id="dashboard-recent">
        <div class="panel-heading">
            <span class="panel-title"><i class="panel-title-icon fa fa-bullhorn text-danger"></i>Projetos</span>
            <ul class="nav nav-tabs nav-tabs-xs">
                <li class="active">
                    <a href="#dashboard-closed-projects" data-toggle="tab">Finalizados</a>
                </li>
                <li class="">
                    <a href="#dashboard-in-progress-projects" data-toggle="tab">Em Andamento</a>
                </li>
            </ul>
        </div>
        <!-- / .panel-heading -->
        <div class="tab-content">

            <!-- Comments widget -->

            <!-- Without padding -->
            <div class="widget-comments panel-body tab-pane no-padding fade active in" id="dashboard-closed-projects">
                <!-- Panel padding, without vertical padding -->
                <div class="dashboard_user_notifications">
                    <div class="panel-padding no-padding-vr">

                        @foreach($user->getNotifications() as $note) 
							@if ($note->getSubject()->notification_subject_id == 11)
								<div class="comment" style="margin-bottom:10px;">
									<img src="http://static.deltafaucetrep.com/assets/demo/avatars/1.jpg" alt="" class="comment-avatar">
									<div class="comment-body">
										<div class="comment-by">
											<a href="#" title="">{{$note->from()->name . " " . $note->from()->surname}}</a>
										</div>
										<div class="comment-text">
											{{$note->text}}
										</div>
										<div class="comment-actions">
											<span class="pull-right">{{$note->created_at}}</span>
										</div>
									</div>
									<!-- / .comment-body -->
								</div>
                        	@endif 
						@endforeach

                    </div>
                </div>
            </div>
            <!-- / .widget-comments -->

            <!-- Threads widget -->

            <!-- Without padding -->
            <div class="widget-threads panel-body tab-pane no-padding fade" id="dashboard-in-progress-projects">
                <div class="dashboard_user_notifications">
                    <div class="panel-padding no-padding-vr">

                        @foreach($user->getNotifications() as $note) 
							@if ($note->getSubject()->notification_subject_id == 10)
							<div class="thread">
								<img src="http://static.deltafaucetrep.com/assets/demo/avatars/1.jpg" alt="" class="thread-avatar">
								<div class="thread-body">
									<span class="thread-time">{{$note->created_at}}</span>
									<a href="#" class="thread-title">{{$note->from()->name . " " . $note->from()->surname}}</a>
									<div class="thread-info">{{$note->text}}
									</div>
								</div>
								<!-- / .thread-body -->
							</div>
							<!-- / .thread -->
							@endif 
						@endforeach

                    </div>
                </div>
            </div>
            <!-- / .panel-body -->
        </div>
    </div>
    <!-- / .widget-threads -->
</div>
@endif


@if (($user->getUserType()->cod == 10 || $user->getUserType()->cod == 5) && ($user->user_id == 46 || $user->user_id == 41))
<div class="col-sm-6">
	<div class="panel panel-info widget-support-tickets" id="dashboard-recent">
		<div class="panel-heading">
			<span class="panel-title"><i class="panel-title-icon fa  fa-binoculars"></i>Projetos à prospectar</span>
			<div class="panel-heading-controls">
				<div class="panel-heading-text"><a href="#">{{count($user->getProjectsToProspect())}} prospecções pendentes</a>
				</div>
			</div>
		</div>
	<div class="panel-body tab-content-padding">
		<!-- Panel padding, without vertical padding -->
		<div class="dashboard_user_notifications">
			<div class="panel-padding no-padding-vr">

				@foreach($user->getProjectsToProspect() as $project)
					<div class="ticket">
						<a href="http://deltafaucetrep.com/tracker/project/{{$project->project_id}}/detail" title="" class="ticket-title">Projeto<span class="ticket-title">#{{$project->project_id}}</span></a>
						<span class="ticket-info">
							<a href="http://deltafaucetrep.com/tracker/project/{{$project->project_id}}/detail" title="">{{$project->title}}</a> {{date_format(date_create($project->prospect_date), "d/m/Y")}} 
						</span>
					</div>
				@endforeach

			</div>
		</div>
	</div>
	</div>
</div>
@endif

@endsection @section('end')
<script>
    $('.dashboard_user_notifications').slimScroll({
        height: "300px",
        alwaysVisible: true,
        color: '#888',
        allowPageScroll: true
    });
    
    setTimeout(function () { window.location.reload() }, 50000);
</script>

<script type="text/javascript">
    @foreach(collect($user->getUnreadPosts())->take(5) as $post)
        var notification = $.growl.notice({
            title: '{{$post->subject}}',
            message: "Enviado por: {{$post->user()->name . " " . $post->user()->surname}}",
            duration: 1500
        });
    @endforeach
    
    @if (count($user->getUnreadPosts()) > 0)
    
        var beep = new Audio("http://static.deltafaucetrep.com/assets/wavs/beep.wav");
        beep.play();
    
    @endif
</script>


@endsection
