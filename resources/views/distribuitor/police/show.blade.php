<div class="panel">
    <div class="panel-heading">
        <span class="panel-title">{{$distribuitor->company_name}}</span>
    </div>
    
    <div class="panel-body">
        @if ($distribuitor->distribuitor_id == 4)
        
        <h3>Codições Comerciais</h3>
        
        <ul>
            <li><h4>1.PREÇO DE VENDA ENGENHARIA:</h4></li>
            <ul>
                <li><h5>1.1 Lista de Preços com a seguintes Premissas:</h5></li>
                <ul>
                    <li>- Taxa do Dólar - R$ 3,17</li>
                    <li>- Mark UP -   1,5</li>
                    <li>- Custo Fixo de Importação -5%</li>
                    <li>- Frete Marítimo - 6%.</li> 
                    <li><strong>Atenção:  Avaliar no momento do fechamento do pedido AVALIA o valor do Dólar, se  necessário repassar ajuste ao Mark UP.</strong></li>
                </ul>
                <li><h5>Condições de Pagamento : Prazo Maximo em dias, Taxa de Juros ao de 1,2% ao mês, O % (percentual) de pagamento especificado na tabela abaixo será contato a partir da data de confirmação do Pedido com base na data do Pedido ver quadro abaixo:</h5></li>
                <li>
                    <table class="table">
                        <tr>
                            <th>Pagamento "D"</th>
                            <th>Taxa de Juros</th>
                            <th>% de Pagamento</th>
                        </tr>
                        <tr>
                            <td>No pedido</td>
                            <td>0</td>
                            <td>34,4%</td>
                        </tr>
                        <tr>
                            <td>28 dias do pedido</td>
                            <td>1,20%</td>
                            <td>8,9%</td>
                        </tr>
                    </table>
                </li>
            </ul>
        
        @endif
    </div>
</div>
    
    