@extends('layouts.master')

@section('content')

<script type="text/javascript">

    window.document.body.className += " page-mail";
    
</script>
    
    <div class="mail-nav fixed">
		<div class="compose-btn">
			<a href="http://deltafaucetrep.com/inbox/new" class="btn btn-primary btn-labeled btn-block"><i class="btn-label fa fa-pencil-square-o"></i>Novo Post</a>
		</div>
		<div class="navigation">
			<ul class="sections">
				<li><a href="http://deltafaucetrep.com/inbox/index"><i class="m-nav-icon fa fa-inbox"></i>Caixa de Entrada @if(count($user->getUnreadPosts()) > 0) <span class="label pull-right">{{count($user->getUnreadPosts())}}</span> @endif</a></li>
				<li><a href="http://deltafaucetrep.com/inbox/drafts"><i class="m-nav-icon fa fa-file-text-o"></i>Rascunhos <span class="label pull-right">11</span></a></li>
				<li class="divider"></li>
			</ul>
		</div>
	</div>


    <div class="mail-container">
		<div class="mail-container-header">
			Inbox

			<form action="" class="pull-right" style="width: 250px;margin-top: 3px;">
				<div class="form-group input-group-sm has-feedback no-margin">
					<input type="text" placeholder="Buscar..." class="form-control">
					<span class="fa fa-search form-control-feedback" style="top: -1px"></span>
				</div>
			</form>
		</div>

		<div class="mail-controls clearfix">
			<div class="btn-toolbar wide-btns pull-left" role="toolbar">

				<div class="btn-group">
					<div class="btn-group">
						<button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="fa fa-check-square-o"></i>&nbsp;<i class="fa fa-caret-down"></i></button>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Marcar Todos</a></li>
							<li><a href="#">Marcar Lidos</a></li>
							<li><a href="#">Marcar Não Lidos</a></li>
						</ul>
					</div>
					<button id="btnRefreshFilter" type="button" class="btn"><i class="fa fa-repeat"></i></button>
				</div>

				<div class="btn-group">
                    <div class="btn-group">
					    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tag"></i>&nbsp;<i class="fa fa-caret-down"></i></button>
                        <ul class="dropdown-menu" role="menu">
                            @foreach($user->getAllPostTags() as $tag)
                                <li><a href="#" onclick="filterPostsWithTags('{{$tag->description}}')"><div class="mail-nav-lbl {{$tag->color}}"></div>{{$tag->description}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <button id="btnFilterStarred" type="button" class="btn"><i class="fa fa-star"></i></button>
				</div>

			</div>

			<div class="pages pull-right">
				{{count($user->getPosts())}} post(s)
			</div>
		</div>


		<ul class="mail-list">
            @foreach ($user->getPosts() as $post)
                <li class="mail-item {{$post->hasBeenSeenBy($user->user_id) ? '' : 'unread'}} {{$post->isImportantTo($user->user_id) ? 'starred' : ''}}">
                    <div class="m-chck"><label class="px-single"><input type="checkbox" name="" value="{{$post->post_id}}" class="px"><span class="lbl"></span></label></div>
                    <div class="m-star"><a href="#" onclick="starThisPost({{$post->post_id}}, this);"></a></div>
                    <div class="m-from"><a href="http://deltafaucetrep.com/inbox/detail/{{$post->post_id}}">{{$post->user()->name . " " . $post->user()->surname}}</a></div>
                    <div class="m-subject">@if ($post->tag_id != null) <span class="label {{$post->tag()->color}}">{{$post->tag()->description}}</span> @endif&nbsp;&nbsp;<a href="http://deltafaucetrep.com/inbox/detail/{{$post->post_id}}">{{$post->subject}}</a></div>
                    <div class="m-date">{{date_format(date_create($post->created_at), "d/m/y")}}</div>
                    <div style="display:none">{{$post->text}}</div>
                </li>
            @endforeach
         </ul>

	</div>

@endsection
    
@section('end')

<script type="text/javascript">

    function starThisPost(post_id, e) {
        var parent = $(e).parent().parent();
        
        if (parent.hasClass("starred")) 
        {
            $.ajax({
                url: "http://deltafaucetrep.com/inbox/post/" + post_id + "/remove-star",
                dataType: "json",
                type: "get"
            });

            parent.removeClass("starred");
        }
        else
        {
            $.ajax({
                url: "http://deltafaucetrep.com/inbox/post/" + post_id + "/star-it",
                dataType: "json",
                type: "get"
            });

            parent.addClass("starred");
        }
    }
    
    function filterPostsWithTags(tag) {
        $(".mail-item").each(function (key, value) {
            var t = $(value).children('div.m-subject').first().children('span.label').first();
            
            console.log(key, $(value).children('div.m-subject').first().children('span.label'));
            
            if (t.text() != tag) {
                $(value).css("display", "none");
            }
        });    
    }
    
    $("#btnFilterStarred").click(function () {
        $(".mail-item").each(function (key, value) {
            if( ! $(value).hasClass("starred")) {
                $(value).css("display", "none");
            }
        });
    });
    
    $("#btnRefreshFilter").click(function () {
        $(".mail-item").each(function (key, value) {
            $(value).css("display", "block");
        });        
    });
    
    $("#btnFilterSended").click(function () {
        $(".mail-item").each(function (key, value) {
            if($(value).children("div.m-from").first().text() != "{{$user->name . " " . $user->surname}}") {
                $(value).css("display", "none");
            }
        });
    });
    
</script>

@endsection