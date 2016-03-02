@extends('layouts.master')

@section('content')

<div class="panel">
    <div class="panel-heading">
        <span class="panel-title">Carteira de Clientes</span>
    </div>
    <div class="panel-body">
        <div class="row">
			<h2 class="col-sm-8 text-center text-left-sm text-slim">
				FAQ Carteira de Clietes
			</h2>
			<form action="" class="col-sm-4 form-faq">
				<input id="searchInput" type="text" placeholder="Insira palavras chaves da sua dúvida" class="form-control input-sm rounded">
			</form>
		</div>
        <div class="row" style="margin-top: 20px;">
            <div class="col-sm-4 col-sm-push-8">
                <div class="panel no-border panel-dark">
                    <div class="panel-body text-center">
                        <p class="text-lg text-slim">
                            Não achou a sua Dúvida?
                        </p>
                        <div style="margin-top: 20px;">
                            <a href="#" class="btn btn-lg btn-primary btn-flat" data-toggle="modal" data-target="#modal-faq">Abra um chamado</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-8 col-sm-pull-4">
                <div class="panel-group" id="accordion-example">
                    <div class="panel tut-topic">
                        <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#whereIsMyPortoflio">
                                <strong>Dúvida:</strong> Como acessar minha Carteira de Clientes?
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="whereIsMyPortoflio" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                Para acessar a sua carteira basta clicar na aba <strong>Carteira de Clientes</strong>:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide3.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                                Clique na opção <strong>Cadastrados</strong>:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide5.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- / .panel-group -->
            </div>
        </div>
    </div>
</div>

@endsection

@section('end')

<script type="text/javascript">

    $("#searchInput").keyup(function () {
        $(".tut-topic").css("display", "none");
        
        $(".tut-topic:contains('"+ $(this).val() +"')").css("display", "block");
    
        if ($(this).val() == "") {
            $(".tut-topic").css("display", "block");    
        }
    });

</script>

@endsection