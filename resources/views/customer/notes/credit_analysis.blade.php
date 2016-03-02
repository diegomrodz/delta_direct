<div class="col-sm-12">
    <div class="panel widget-chat">
        <div class="panel-heading">
            <span class="panel-title"><i class="panel-title-icon fa fa-comments-o"></i>Analise de Crédito: {{$ca->customer()->company_name}}</span>
        </div>
        <!-- / .panel-heading -->
        <div class="panel-body">
            <div id="slim_sroll_chat">
                @foreach($ca->getRepAnalysisNotes() as $note)
                
                    @if ($note->from_id == $user->user_id)
                        <div class="message">
                    @else
                        <div class="message right">
                    @endif
                        <img src="http://static.deltafaucetrep.com/assets/demo/avatars/1.jpg" alt="" class="message-avatar">
                        <div class="message-body">
                            <div class="message-heading">
                                <a href="#" title="">{{$note->user()->name . " " . $note->user()->surname}}</a> diz:
                                <span class="pull-right">{{$note->created_at}}</span>
                            </div>
                            <div class="message-text">
                                {{$note->text}}
                            </div>
                        </div>
                        <!-- / .message-body -->
                    </div>
                    <!-- / .message -->
                
                @endforeach
                <!-- / .message -->
            </div>
        </div>
        <!-- / .panel-body -->
        <form class="panel-footer chat-controls">
            <div class="chat-controls-input">
                <textarea id="new_message" rows="1" class="form-control" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 32px;"></textarea>
            </div>
            <button id="btn_send_product_note" class="btn btn-primary chat-controls-btn">Enviar</button>
        </form>
        <!-- / .panel-footer -->
    </div>
</div>
    
<script type="text/javascript">
    $("#btn_send_product_note").click(function () {
        var data = {};
        
        data._token = $("#_token").val();
        data.text = $("#new_message").val();
        
        var req = $.ajax({
            url: "http://deltafaucetrep.com/customer/credit_analysis/{{$ca->customer_credit_analysis_id}}/notes",
            type: 'post',
            data: data,
            dataType: 'json'
        });
        
        req.done(function (res) {
            alert("Mensagem enviada!");
        });
        
    });
    
    $("#slim_sroll_chat").slimScroll({
            height: "280px"    
        });
</script>