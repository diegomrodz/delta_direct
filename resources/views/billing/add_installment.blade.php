<div class="panel">
    <div class="panel-heading">
        <span class="panel-ttile">Adicionar Duplicata à Fatura: #{{$invoice->code}} do Pedido #{{$invoice->order()->distribuitor()->delta_code . $invoice->order()->order_id}}</span>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Valor à Pagar</label>
                    <input type="number" step="any" id="installment_total" class="form-control" value="{{$invoice->grand_total}}">
                </div>
                <div class="form-group no-margin-hr">
                    <label class="control-label">Arquivo</label>
                    <input type="file" id="installment_file">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Data Emissão</label>
                    <input type="date" id="installment_original_date" class="form-control" value="{{date('Y-m-d')}}">
                </div>
                <div class="form-group no-margin-hr">
                    <label class="control-label">Data Vencimento</label>
                    <input type="date" id="installment_due_date" class="form-control" value="{{date('Y-m-d')}}">
                </div>
            </div>
        </div>
        
    </div>
    <div class="panel-footer">
        <button id="add_installment" class="btn btn-success btn-flat" >Adicionar Duplicata</button>
    </div>
</div>


<script type="text/javascript">

    $(".quantity_editable").each(function (key, value) {
        $(value).editInPlace({
            url: "#",
            callback: function (original_element, html, original) {
                var new_val = parseFloat($(value).attr("data-unit-price"),10) * parseFloat(html,10);
                var grand_total = 0, product_values = 0;
                
                $("#table_total_product").text(grand_total.toFixed(2));
                $("#installment_total").val(grand_total.toFixed(2));
                
                return html;
            }
        });
    });
    
    function removeProduct(product_id) {
        var grand_total = 0, product_values = 0;
        
        $("tr[data-product-id="+product_id+"]").remove();
        
        $("#table_products").children('tr').each(function (key, tr) {
            grand_total += parseFloat($(tr).children('td').last().text(), 10);
            product_values += parseFloat($(tr).attr("data-price-s-ipi"), 10) + parseFloat($(tr).children('td')[3].text(),10);
        });
        
        $("#table_total_product").text(grand_total.toFixed(2));
        $("#installment_total").val(grand_total.toFixed(2));
        $("#installment_total_product").val((product_values).toFixed(2));
    }
        
    
    $("#add_installment").click(function () {
        var data = new FormData();
        
        data.append("installment_total", $("#installment_total").val());
        
        data.append("installment_original_date", $("#installment_original_date").val());
        data.append("installment_due_date", $("#installment_due_date").val());
        
        if ($("#installment_file").prop('files')[0]) {
            data.append("installment_file", $("#installment_file").prop('files')[0], $("#installment_file").prop('files')[0].name);
        } else {
            alert("Por favor, não deixe de anexar o documento correspondente!");
            return;
        }
        
        data.append('_token', $("#_token").val());
        
        var req = $.ajax({
            url: "http://deltafaucetrep.com/billing/add_installment/{{$invoice->invoice_id}}", 
            data: data,
            type: "POST",
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false
        });
        
       window.location.reload();
    });

</script>