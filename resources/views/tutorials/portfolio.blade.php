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
                
                    <div class="panel tut-topic">
                        <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#searchCustomerInMyPortfolio">
                                <strong>Dúvida:</strong> Como pesquisar clientes específicos na minha carteira?
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="searchCustomerInMyPortfolio" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                Acesse sua <strong>Carteira de Clientes</strong>, e clique em <strong>Cadastrados</strong>:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide5.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                                Digite o nome do cliente ou qualquer outra informação vísivel na tabela de clientes:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide24.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                            </div>
                        </div>
                    </div>
                
                    <div class="panel tut-topic">
                        <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#howToFilterCustomersByType">
                                <strong>Dúvida:</strong> Como filtrar meus clientes por tipo de cliente? 
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="howToFilterCustomersByType" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                Acesse sua <strong>Carteira de Clientes</strong>, e clique em <strong>Cadastrados</strong>:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide5.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                                Clique no botão <strong>Tipo</strong> e selecione qual tipo você deseja filtrar:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide25.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel tut-topic">
                        <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#howToMakeABudgetToANonRegisteredCustomer">
                                <strong>Dúvida:</strong> Como fazer um orçamento para um cliente ainda não cadastrado? 
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="howToMakeABudgetToANonRegisteredCustomer" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                Acesse sua <strong>Carteira de Clientes</strong>, e clique em <strong>Cadastrados</strong>:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide5.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                                Escolha um dos <strong>Clientes Coringa</strong> baseando-se na tabela de preços que deseja utilizar. Por exemplo, suponhamos que você está prestes a fechar um
                                orçamento com uma pessoa física mas não há tempo hábil para cadastrar o cliente em sua carteira. Neste caso, o cliente a ser escolhido é o <strong>Cliente Consumidor</strong>, que utilizará a tabela
                                de preços correta. Basta clicar no nome <strong>Cliente Consumidor</strong>:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide23.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                                
                                Clique no botão <strong>Novo Orçamento</strong> para criar um orçamento com referência a este cliente coringa:
                                
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide26.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                                
                                Seu novo orçamento deve se paracer com o da foto abaixo:
                                
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide76.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                            </div>
                        </div>
                    </div>
                
                    <div class="panel tut-topic">
                        <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#howToCreateAnBudgetFromARegisteredCustomer">
                                <strong>Dúvida:</strong> Como criar um orçamento a partir de um cliente cadastrado?
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="howToCreateAnBudgetFromARegisteredCustomer" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                Acesse sua <strong>Carteira de Clientes</strong>, e clique em <strong>Cadastrados</strong>:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide5.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                                Clique no cliente que deseja criar um orçamento, e depois clique no botão <strong>Novo Orçamento</strong>:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide26.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel tut-topic">
                        <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#nowToAskForCreditAnalysisOfAnRegisteredCustomer">
                                <strong>Dúvida:</strong> Como solicitar a Análise de Crédito de um cliente de minha carteira?
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="nowToAskForCreditAnalysisOfAnRegisteredCustomer" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                Acesse sua <strong>Carteira de Clientes</strong>, e clique em <strong>Cadastrados</strong>:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide5.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                                Clique no cliente para abrir a tela de detalhes do mesmo e depois clique no botão <strong>Solicitar Análise de Crédito</strong>:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide27.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                                Insira o valor estimado do primeiro pedido na caixa de texto indicada, lembrando-se de digitar apenas números:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide28.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                                Agora, insira o crédito solicitado na caixa de texto indicada, lembrando-se de digitar apenas números:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide29.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                                Para que nós e os distribuidores possamos verificar as informações do cliente, por favor anexe o <strong>CNPJ</strong> e a <strong>Inscrição Estadual</strong> 
                                clicando nos botões indicados abaixo:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide31.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                                Caso o crédito solicitado seja maior que R$ 10,000.00, serão necessários o <strong>Contrato Social</strong> mais o <strong>Último Balanço + DRE</strong>
                                para a análise:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide32.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                                Depois de preenchida e com os devidos documentos anexados, basta clicar no botão <strong>Enviar</strong>:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide33.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                                Caso a página não tenha carregado, por favor aperte <strong>F5</strong> para que a caixa com o status da sua solicitação de crédito seja alterada:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide34.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel tut-topic">
                        <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#howToVerifyMyOngoingCreditAnalysis">
                                <strong>Dúvida:</strong> Como verificar o andamento da minha solictação de análise de crédito?
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="howToVerifyMyOngoingCreditAnalysis" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                Acesse sua <strong>Carteira de Clientes</strong>, e clique em <strong>Cadastrados</strong>:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide5.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                                Visualize o status no local indicado abaixo:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide34.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                           
                                Caso a Análise de Crédito ainda esteja <strong>em andamento</strong>, você pode entrar em contato conosco através do botão destacado abaixo:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide35.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                           
                                Para acessar mais informações referente à análise de crédito basta clicar no status da tabela indicada abaixo:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide36.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel tut-topic">
                        <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#howToAccessFilesUploadedAtTheCreditAnalysis">
                                <strong>Dúvida:</strong> Como acessar os documentos anexados durante a solicitação de análise de crédito?
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="howToAccessFilesUploadedAtTheCreditAnalysis" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                Acesse sua <strong>Carteira de Clientes</strong>, e clique em <strong>Cadastrados</strong>:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide5.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                                Clique no cliente que você solicitou a análise de crédito, e depois localize a tabela <strong>Análise de Crédito Anteriores</strong>, clique na 
                                análise de crédito correspondente:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide36.PNG" width="85%" height="85%"></center>
                                
                                <br><br>
                                Na tela de análise de crédito, basta procurar pela área <strong>Documentos</strong> destacada na figura abaixo:
                                <br><br>
                                
                                <center><img src="http://static.deltafaucetrep.com/tutorial/Slide37.PNG" width="85%" height="85%"></center>
                                
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

<input id="_token" type="hidden" value="{{csrf_token()}}">

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