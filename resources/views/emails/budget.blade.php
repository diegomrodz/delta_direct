<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title></title>
	<meta name="generator" content="LibreOffice 4.4.2.2 (Linux)"/>
	<meta name="created" content="2015-08-11T22:20:44.413014556"/>
	<meta name="changed" content="2015-08-11T22:50:13.918832280"/>
	
	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Arial"; font-size:x-small }
	</style>
	
</head>

<body>
    
    {!! $custom_text == null ? "" : $custom_text !!}
    
    <br>
    
<table cellspacing="0" border="0">
	<colgroup span="11" width="85"></colgroup>
    <tr>
        <td colspan=12 height="17" align="right" valign=middle>
            Clique na imagem para imprimir: <a href="http://deltafaucetrep.com/budget/print/{{$budget->representant_budget_id}}"><img width=46 height=46 src="http://static.deltafaucetrep.com/assets/images/print-printer-icon.png" alt=""></a>
        </td>
    </tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=3 height="58" align="center" valign=middle>
            <img src="http://static.deltafaucetrep.com/assets/images/main-navbar-logo.jpg" width=184 height=46 vspace=5>
        </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" colspan=6 align="left" valign=middle>
            Delta Faucet Metais Sanitários Co. Brazil
        <br>Av. Angélica, 2223
        <br>01403-001 / São Paulo, SP</td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle>
            <b>Orçamento #{{$budget->representant_budget_id}}</b><br>
                Data: {{date_format($budget->updated_at, "d/m/Y")}}<br>
                Validade: {{date_format($budget->updated_at->add(new DateInterval("P10D")), "d/m/Y")}} 
        </td>
    </tr>
	<tr>
		<td height="" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000" colspan=3 height="17" align="left" valign=middle><b>Vendedor:</b></td>
		<td style="border-top: 1px solid #000000" colspan=5 align="left" valign=middle><b>Cliente:</b></td>
		<td style="border-top: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle><b>Forma de Pagamento:</b></td>
		</tr>
	<tr>
		<td style="border-left: 1px solid #000000" colspan=3 height="17" align="left" valign=middle>{{$budget->representant() == null ? "Delta Faucet Co. Brazil" : $budget->representant()->company()->name }}</td>
		<td colspan=5 align="left" valign=middle>{{$budget->customer()->company_name}}</td>
		<td style="border-right: 1px solid #000000" colspan=3 align="left" valign=middle>{{$budget->paymentCondition()->description}}</td>
		</tr>
    <tr>
		<td style="border-left: 1px solid #000000" colspan=3 height="17" align="left" valign=middle>{{$budget->representant() == null ?"":($budget->representant()->user()->name . " " . $budget->representant()->user()->surname)}}</td>
	    <td colspan=5 align="left" valign=middle>CNPJ: {{$budget->customer()->cnpj}}</td>
        <td style="border-right: 1px solid #000000" colspan=3 align="left" valign=middle></td>
	</tr>
	<tr>
		<td style="border-left: 1px solid #000000" colspan=3 height="17" align="left" valign=middle>{{$budget->representant() == null ? "0800 740 7415" : $budget->representant()->phone}}</td>
		@if (count($budget->customer()->getBusinessContacts()) > 0)
            <td colspan=5 align="left" valign=middle>{{$budget->customer()->getBusinessContacts()[0]->name}}, {{$budget->customer()->getBusinessContacts()[0]->dept}}</td>
		@else
            <td colspan=5 align="left" valign=middle></td>
        @endif
        <td align="left"><br></td>
		<td align="left"><br></td>
		<td style="border-right: 1px solid #000000" align="left"><br></td>
	</tr>
	<tr>
		<td style="border-left: 1px solid #000000" colspan=3 height="17" align="left" valign=middle>{{$budget->representant() == null ? "sac@deltafaucet.com" : $budget->representant()->user()->email}}</td>
		<td colspan=5 align="left" valign=middle>{{$budget->customer()->phone}} / {{$budget->customer()->getBusinessContacts()[0]->phone}}</td>
		<td style="border-right: 1px solid #000000" colspan=3 align="left" valign=middle><b>OBS:</b></td>
		</tr>
	<tr>
		<td style="border-left: 1px solid #000000" colspan=3 height="18" align="left" valign=middle><font color="#000000"></font></td>
		<td colspan=5 align="left" valign=middle>{{$budget->customer()->email}}  / {{$budget->customer()->getBusinessContacts()[0]->email}}</td>
		<td style="border-right: 1px solid #000000" colspan=3 align="left" valign=middle>{{$budget->payment_details}}</td>
		</tr>
	<tr>
		<td style="border-left: 1px solid #000000" height="17" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td style="border-right: 1px solid #000000" align="left"><br></td>
	</tr>
	<tr>
		<td style="border-left: 1px solid #000000" colspan=8 height="17" align="left" valign=middle><b>Endereço de Entrega:</b></td>
		<td colspan=2 align="left" valign=middle><b>Total Produto:</b></td>
		<td style="border-right: 1px solid #000000" align="left">R$ {{$budget->product_values}}</td>
	</tr>
	<tr>
		<td style="border-left: 1px solid #000000" colspan=8 height="17" align="left" valign=middle>{{$budget->customer()->getDeliveryAddress()->text}} - {{$budget->customer()->getDeliveryAddress()->cep}} / {{$budget->customer()->getDeliveryAddress()->city_text}}, {{$budget->customer()->getDeliveryAddress()->uf() == null ? "N.I" : $budget->customer()->getDeliveryAddress()->uf()->uf}}</td>
		<td colspan=2 align="left" valign=middle><b>Outras Cobranças:</b></td>
		<td style="border-right: 1px solid #000000" align="left">R$ {{$budget->other_charging + $budget->interest_rate}}</td>
	</tr>
	<tr>
		<td style="border-left: 1px solid #000000" height="17" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td colspan=2 align="left" valign=middle><br></td>
		<td style="border-right: 1px solid #000000" align="left" sdval="0" sdnum="1046;0;0,00%"></td>
	</tr>
	<tr>
		<td style="border-left: 1px solid #000000" colspan=8 height="17" align="left" valign=middle><b>Endereço de Cobrança:</b></td>
		<td colspan=2 align="left" valign=middle><b>Total Geral:</b></td>
		<td style="border-right: 1px solid #000000" align="left">R$ {{$budget->grand_total}}</td>
	</tr>
	<tr>
		<td style="border-left: 1px solid #000000" colspan=8 height="17" align="left" valign=middle>{{$budget->customer()->getBillingAddress()->text}} - {{$budget->customer()->getBillingAddress()->cep}} / {{$budget->customer()->getBillingAddress()->city_text}}, {{$budget->customer()->getBillingAddress()->uf() == null ? "N.I." : $budget->customer()->getBillingAddress()->uf()->uf}}</td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td style="border-right: 1px solid #000000" align="left"><br></td>
	</tr>
	<tr>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" height="17" align="left"><br></td>
		<td style="border-bottom: 1px solid #000000" align="left"><br></td>
		<td style="border-bottom: 1px solid #000000" align="left"><br></td>
		<td style="border-bottom: 1px solid #000000" align="left"><br></td>
		<td style="border-bottom: 1px solid #000000" align="left"><br></td>
		<td style="border-bottom: 1px solid #000000" align="left"><br></td>
		<td style="border-bottom: 1px solid #000000" align="left"><br></td>
		<td style="border-bottom: 1px solid #000000" align="left"><br></td>
		<td style="border-bottom: 1px solid #000000" align="left"><br></td>
		<td style="border-bottom: 1px solid #000000" align="left"><br></td>
		<td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
	</tr>
	<tr>
		<td height="17" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 height="17" align="center" valign=middle><b>Imagem</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center" valign=middle><b>Produto</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center"><b>Quantidade</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center"><b>Preço Unit.</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" align="center"><b>Total</b></td>
	</tr>
    @foreach ($budget->getProducts() as $p)
    <tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 height="68" align="center" valign=middle><br><img src="http://dfc.scene7.com/is/image/DFC/{{trim($p->product()->sku)}}-B1.tif?fmt=jpeg,rgb&wid=70&hei=51" alt="">
		</td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="left" valign=top><b> {{$p->product()->sku}}</b><br>{{$p->product()->description_pt}}</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="2" sdnum="1046;">{{$p->quantity}}</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="2506,72" sdnum="1046;">{{$p->price_c_discount}}</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" align="center" valign=middle sdval="5013,44" sdnum="1046;">{{$p->total_price}}</td>
	</tr>
    @endforeach
    <tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 height="17" align="center" valign=middle><b>Totais:</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center" valign=middle</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center"><b>{{collect($budget->getProducts())->reduce(function ($carry, $item) { return $carry + $item->quantity; }) }}</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center"></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" align="center"><b>{{collect($budget->getProducts())->reduce(function ($carry, $item) { return $carry + $item->total_price; }) }}</b></td>
	</tr>
    <tr>
        <td height="5"></td>
    </tr>
    <tr>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=12 height="17" align="left" valign=middle>
            PREÇOS COM IPI, EMBALAGEM, ICMS DE ACORDO COM CLASSIFICAÇÃO FISCAL - NCM, <b>NÃO CONSIDERA SUBSTITUIÇÃO TRIBUTÁRIA</b> - FINANCEIRO PROPORCIONAL A CONDIÇÃO DE PAGAMENTO. PARA COMPRAS PARCELADAS OS IMPOSTOS SERÃO COBRADOS NA PRIMEIRA PARCELA. APÓS A CONFERÊNCIA E RECEBIMENTO DAS MERCADORIAS NÃO SERÃO ACEITAS DEVOLUÇÕES DE PRODUTOS, CUJOS MOTIVOS NÃO SEJAM DE NOSSA RESPONSABILIDADE. PRAZO DE ENTREGA CONTARÁ APÓS A APROVAÇÃO DO PEDIDO PELA DELTA FAUCET - PEDIDO SUJEITO A ANÁLISE DE CREDITO.
        </td>
    </tr>
  </table>
<!-- ************************************************************************** -->
</body>

</html>