@extends('layouts.master')

@section('content')

<div class="panel">
    <div class="panel-heading">
        <span class="panel-title">Orçamentos</span>
    </div>
    <div class="panel-body">
        <div class="row">
			<h2 class="col-sm-8 text-center text-left-sm text-slim">
				FAQ Orçamentos
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
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#howToCreateANewBudget">
                                <strong>Dúvida:</strong> Como criar um novo Orçamento?
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="howToCreateANewBudget" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                Na sua área, clique no botão <strong>Criar Novo Orçamento</strong>:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide133.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                                Ou, clique na aba <strong>Orçamentos</strong>:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide1.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                                E depois clique no botão destacado abaixo:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide12.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel tut-topic">
                        <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#howToViewMyBudgets">
                                <strong>Dúvida:</strong> Como visualizar meus Orçamentos?
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="howToViewMyBudgets" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                Na sua área, clique no aba <strong>Orçamentos</strong>:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide1.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                                Depois clique no título do orçamento que você deseja visualizar:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide134.png" width="85%" height="85%"></center>
                                
                                <br><br>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel tut-topic">
                        <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#howToViewTheCodeOfMyBudget">
                                <strong>Dúvida:</strong> Como verificar o código do meu novo Orçamento?
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="howToViewTheCodeOfMyBudget" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                Na tela de criação de orçamentos verifique o cabeçalho da página:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide41.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                                Este código é único a cada orçamento sendo utilizado como referência nos emails e para buscá-lo no sistema (Desconsidere a diferença de código entre as imagens):
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide84.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel tut-topic">
                        <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#howUseTheDiscountCalculator">
                                <strong>Dúvida:</strong> Como usar a calculadora de descontos?
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="howUseTheDiscountCalculator" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                Na tela de orçamento, clique no botão indicado na foto abaixo:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide42.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                                Uma vez com a calculadora aberta, preencha o campo indicado com o valor mostrado no sistema:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide43.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                                Depois preencha no campo indicado com o valor que você deseja:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide44.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                                Agora basta copiar e colar o desconto gerado no produto que deseja alterar o preço.
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel tut-topic">
                        <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#howToImportACustomerToMyBudget">
                                <strong>Dúvida:</strong> Como importar um cliente para o meu Orçamento?
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="howToImportACustomerToMyBudget" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                Na tela de orçamento, clique no botão indicado na foto abaixo:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide135.png" width="85%" height="85%"></center>
                                
                                <br><br>
                                Depois basta pesquisar pelo cliente que deseja importar e clicar em seu nome:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide45.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                                Uma vez importado, os dados serão atualizados com as informações de cadastro do cliente importado e a tabela de preços utilizadas
                                será definida com base no tipo de cliente:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide46.PNG" width="85%" height="85%"></center>
                                
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

<div id="modal-faq" class="modal fade" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <form action="" class="modal-body">
                <input id="faqSubject" type="text" placeholder="Assunto" class="form-control form-group-margin input-lg">
                <textarea id="faqText" placeholder="Sua dúvida, problema ou sugestão." class="form-control form-group-margin input-lg" rows="6"></textarea>
                <div class="clearfix">
                    <button id="faqSubmit" type="submit" class="btn btn-lg btn-block btn-flat btn-primary">Criar Chamado</button>
                </div>
            </form>
        </div>
        <!-- / .modal-content -->
    </div>
    <!-- / .modal-dialog -->
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

    $("#faqSubmit").click(function () {
        var data = {};
        
        data.subject = $("#faqSubject").val();
        data.text = $("#faqText").val();
        data._token = $("#_token").val();
        
        $.ajax({
            url: "http://deltafaucetrep.com/inbox/new/faq",
            dataType: "json",
            type: "post",
            data: data
        }).done(function () {
            window.location.href = "http://deltafaucetrep.com/inbox/index";    
        });   
    });
    
</script>

@endsection