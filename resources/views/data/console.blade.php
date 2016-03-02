@extends('layouts.master')

@section('title', 'Console')

@section('content')

<script type="text/javascript">

    window.document.body.className += " page-mail";
    
</script>

<div style="margin-left: 0px;" class="mail-container">
	<div class="col-sm-12">

        <div class="mail-container-header">
			Console
		</div>
        
        <div class="mail-controls clearfix">
			<div class="btn-toolbar wide-btns pull-left" role="toolbar">

				<div class="btn-group">
					<button id="btn_send_code" title="Subir código" type="button" class="btn " ><i class="fa fa-upload"></i>&nbsp;</button>
					<button id="btn_clear_code" title="Limpar código" type="button" class="btn"><i class="fa fa-repeat"></i></button>
                </div>

                <div class="btn-group">
					<button id="btn_clear_cache" title="Limpar Cache" type="button" class="btn"><i class="fa fa-fire-extinguisher"></i></button>
                </div>
                
                <div class="btn-group">
                    <button data-target="#batchUploadModal" data-toggle="modal" title="Enviar batch de comandos" type="button" class="btn"><i class="fa fa-file-code-o"></i></button>
                </div>
                
			</div>

		</div>
        
        <div class="col-sm-12">
            <textarea id="consoleTextInput" class="form-control" placeholder="Insira o código SQL aqui..." cols="30" rows="10"></textarea>
        
        </div>

	</div>
</div>

<div id="batchUploadModal" class="modal modal-alert modal-warning fade">
    <div class="modal-dialog" style="width:500px;">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fa fa-warning"></i>
            </div>
            <div class="modal-title">Atenção</div>
            <div class="modal-body" style="text-align:left !important;">
                <div class="col-sm-12">
                    <p>Para que o script seja executado corretamente siga as seguintes orientações:</p>

                    <ul>
                        <li>Adicione a extensão <strong>.sql</strong> no final do arquivo;</li>
                        <li>Certifique-se que os comandos estão com o caractere <strong>;</strong> (Ponto e vírgula) no final;</li>
                        <li>Verifique se há o caractere <strong>;</strong> (Ponto e vírgula) ou <strong>'</strong> (Aspas simples) em algum dos campos, pois eles podem causar erros;</li>
                        <li>Após a mensagem de sucesso, clique no botão <strong>Limpar Cache</strong> para que a memória do servidor seja resetada.</li>
                    </ul>

                    <p>Pronto!</p>
                </div>
                    
                <hr>
                
                <div class="col-sm-12">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Arquivo:</label>
                        <input id="batch_file" type="file">
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button id="btnSendBatchToServer" type="button" class="btn btn-success" style="float: right;">Enviar Script</button>
            </div>
        </div>
        <!-- / .modal-content -->
    </div>
    <!-- / .modal-dialog -->
</div>

<input type="hidden" id="_token" value="{{csrf_token()}}">

@endsection

@section('end')

<script type="text/javascript">
	$(document).ready(function () {
        
        $("#btn_send_code").click(function () {
            var data = {};
            
            data.command = $("#consoleTextInput").val();
            data._token = $("#_token").val();
            
            var req = $.ajax({
                url: "http://deltafaucetrep.com/data/console",
                type: "post",
                data: data,
                dataType: "json"
            });
            
            req.error(function (data) {
                alert("Houve um erro ao executar o comando!");    
            });
            
            req.success(function (data) {
                alert("Comando executado com sucesso!");     
            });
            
            $("#consoleTextInput").val("");
        });
        
        $("#btn_clear_code").click(function (){
            $("#consoleTextInput").val("");
        });
        
        $("#btnSendBatchToServer").click(function () {
            var data = new FormData;
            var file = $("#batch_file").prop("files")[0];
            
            if ( ! file) {
                alert("Não esqueça de anexar o arquivo contendo os comandos.");
                return;
            }
            
            data.append("batch_file", file, file.name);
            data.append("_token", $("#_token").val());
            
            var req = $.ajax({
                url: "http://deltafaucetrep.com/data/console/run_batch",
                type: 'POST',
                data: data,
                cache: false,
                dataType: 'json',
                processData: false, // Don't process the files
                contentType: false
            });
            
            req.done(function (data, textStatus) {
                if (textStatus == "success") {
                    alert("O comando foi executado com sucesso.");    
                } else {
                    var msg = "Houve um erro na execução do comando, por favor tente novamente. Caso o erro persista entre em contato pelo email: diego.mrodrigues@outlook.com. Envie a planilha Excel com os comandos para que eu possa rodá-los direto no servidor.";
                    
                    msg += "\n\n " + data;
                    
                    alert(msg);
                }
            });
        });
        
        $("#btn_clear_cache").click(function () {
            var req = $.ajax({
                url: "http://deltafaucetrep.com/data/cache/clear",
                type: "get"
            });
            
           req.error(function (data) {
                alert("Houve um erro ao executar o comando!");    
            });
            
            req.success(function (data) {
                alert("Comando executado com sucesso!");     
            });
        });
        
	});
</script>

@endsection