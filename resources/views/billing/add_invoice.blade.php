<div class="panel">
    <div class="panel-heading">
        <span class="panel-ttile">Adicionar NF ao Pedido: {{$order->distribuitor()->delta_code . $order->order_id}}</span>
    </div>
    <div class="panel-body">
        <fieldset class="col-sm-12">
            <legend>Adicionar NF</legend>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Total Produto (Base Comissão)</label>
                        <input type="text" disabled="disabled" id="invoice_total_product" class="form-control" value="{{collect($order->getProducts())->reduce(function ($carry, $item) { return $carry + ($item->quantity * ($item->price_s_ipi * (1 - ($item->discount / 100)))); })}}">
                    </div>
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Valor Total c/ IPI s/ ST da NF</label>
                        <input type="number" disabled="disabled" step="any" id="invoice_total" class="form-control" value="{{$order->grand_total}}">
                    </div>
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Arquivo</label>
                        <input type="file" id="invoice_file">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Número da NF</label>
                        <input type="text" id="invoice_cod" class="form-control" >
                    </div>
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Data Emissão</label>
                        <input type="date" id="invoice_original_date" class="form-control" value="{{date('Y-m-d')}}">
                    </div>
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Data Vencimento</label>
                        <input type="date" id="invoice_due_date" class="form-control" value="{{date('Y-m-d')}}">
                    </div>
                </div>
            </div>

            <table id="product_table" class="table">

                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Produto</th>
                        <th>Imagem</th>
                        <th>Quantidade</th>
                        <th>Preço Unitário</th>
                        <th>Valor Total</th>
                    </tr>
                </thead>

                <tbody id="table_products">
                    @foreach($order->getProducts() as $product)

                    <tr data-product-id="{{$product->product()->product_id}}" data-price-s-ipi="{{$product->price_s_ipi - ($product->price_s_ipi * ($product->discount / 100))}}">
                        <td>
                            <button onclick="removeProduct({{$product->product()->product_id}})" class="btn btn-danger btn-xs btn-flat"><span class="btn-label icon fa fa-times"></span>
                            </button>
                        </td>
                        <td>{{$product->product()->sku}}</td>
                        <td>
                            <img src="http://dfc.scene7.com/is/image/DFC/{{$product->product()->sku}}-B1.tif?fmt=jpeg,rgb&amp;wid=70&amp;hei=51">
                        </td>
                        <td class="quantity_editable" data-unit-price="{{$product->price_c_discount}}">{{$product->quantity}}</td>
                        <td >{{number_format($product->price_c_discount, 2, ',', '.')}}</td>
                        <td>{{number_format($product->total_price, 2, '.', '')}}</td>
                    </tr>

                    @endforeach
                </tbody>

                <tfoot>
                    <th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>Valor Total</strong>
                        </td>
                        <td ><strong id="table_total_product">{{number_format( collect($order->getProducts())->reduce(function ($carry, $item) { return $carry + $item->total_price; }) , 2, ',', '.')}}</strong>
                        </td>
                    </th>
                </tfoot>
            </table>
    </fieldset>

        <fieldset class="col-sm-12">
            <legend>Adicionar Duplicata</legend>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Valor à Pagar</label>
                        <input type="number" step="any" id="installment_total" class="form-control">
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
            <div class="row">
                <button id="add_installment" style="float:right;margin-right:5px;" class="btn btn-info btn-flat">Adicionar Duplicata</button>
            </div>
            
            <table id="installmentTable" class="table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Anexo</th>
                        <th>Valor à Pagar</th>
                        <th>Data Emissão</th>
                        <th>Data Vencimento</th>
                    </tr>
                </thead>
                
                <tbody>
                    
                </tbody>
            
            </table>
            
        </fieldset>

    </div>
    <div class="panel-footer">
        <button id="add_invoice" class="btn btn-success btn-flat" >Adicionar NF</button>
    </div>
</div>


<script type="text/javascript">

    $(".quantity_editable").each(function (key, value) {
        $(value).editInPlace({
            url: "#",
            callback: function (original_element, html, original) {
                var new_val = parseFloat($(value).attr("data-unit-price"),10) * parseFloat(html,10);
                var grand_total = 0, product_values = 0;
                
                $(value).closest('tr').children('td').last().text(new_val.toFixed(2));
                
                $("#table_products").children('tr').each(function (key, tr) {
                    grand_total += parseFloat($(tr).children('td').last().text(),10);
                    product_values += parseFloat($(tr).attr("data-price-s-ipi"), 10) * parseFloat($($(tr).children('td')[3]).text(),10);
                });
                
                $("#table_total_product").text(grand_total.toFixed(2));
                $("#invoice_total").val(grand_total.toFixed(2));
                $("#invoice_total_product").val((product_values).toFixed(2));
                
                return html;
            }
        });
    });
    
    var Installments = [];
    
    var InstallmentTable = $("#installmentTable").DataTable({
        sDom: "",
        paging: false,
        ordering: false,
        createdRow: function (row, data, index) {
            $('td', row).eq(0).html("").append(data[0]);
        }
    });
    
    function removeProduct(product_id) {
        var grand_total = 0, product_values = 0;
        
        $("tr[data-product-id="+product_id+"]").remove();
        
        $("#table_products").children('tr').each(function (key, tr) {
            grand_total += parseFloat($(tr).children('td').last().text(), 10);
            product_values += parseFloat($(tr).attr("data-price-s-ipi"), 10) * parseFloat($($(tr).children('td')[3]).text(),10);
        });
        
        $("#table_total_product").text(grand_total.toFixed(2));
        $("#invoice_total").val(grand_total.toFixed(2));
        $("#invoice_total_product").val((product_values).toFixed(2));
    }
    
    function removeInstallment() {
        var that = this, i = 0;
        
        for (i = 0; i < Installments.length; i += 1) {
            if (Installments[i].id == $(this).data("installment-temp-id")) {
                Installments.splice(i, 1);
                drawInstallments();
                return;
            }
        }

    };
    
    function drawInstallments() {
        InstallmentTable.clear().draw();
        
        for (var i = 0; i < Installments.length; i += 1) {
            var row = [];
            
            var btn = $(document.createElement("button"));
            
            btn.addClass("installment_item btn btn-danger btn-xs btn-flat");
            btn.attr("data-installment-temp-id", Installments[i].id);
           
            var span = $(document.createElement("span"));
            
            span.addClass("btn-label icon fa fa-times");
        
            btn.append(span);
            
            btn.click(function () { removeInstallment.call(this); });
            
            row.push(btn);
            
            row.push(Installments[i].att == undefined ? "Sem Anexo" : Installments[i].att.name);
            
            row.push(Installments[i].total);
            
            row.push(Installments[i].emission);
            
            row.push(Installments[i].due);
            
            InstallmentTable.row.add(row);
        }
        
        InstallmentTable.draw();
    }
           
    
    $("#add_installment").click(function () {
        var installment = {};
        
        installment.id = Installments.length + 1;
        installment.total = $("#installment_total").val();
        installment.att =  $("#installment_file").prop('files')[0];
        installment.emission = $("#installment_original_date").val();
        installment.due = $("#installment_due_date").val();
        
        Installments.push(installment);
        
        drawInstallments();
    });
    
    $("#add_invoice").click(function () {
        var data = new FormData();
        
        data.append("invoice_total_product", $("#invoice_total_product").val());
        data.append("invoice_total", $("#invoice_total").val());
        
        if ($("#invoice_cod").val() == "") {
            alert("Por favor, insira o número do respectivo documento.");
            return;
        }
        
        data.append("invoice_cod", $("#invoice_cod").val());
        data.append("invoice_original_date", $("#invoice_original_date").val());
        data.append("invoice_due_date", $("#invoice_due_date").val());
        
        if ($("#invoice_file").prop('files')[0]) {
            data.append("invoice_file", $("#invoice_file").prop('files')[0], $("#invoice_file").prop('files')[0].name);
        } else {
            alert("Por favor, não deixe de anexar a nota fiscal correspondente!");
            return;
        }
        
        var products = [];
            
        $("#table_products").children('tr').each(function (key, value) {
            var product = {};
            
            product.id = $(value).attr('data-product-id');
            product.quantity = $($(value).children('td')[3]).text();
            product.unit_price = $($(value).children('td')[4]).text();
            product.total = $(value).children('td').last().text();
            
            products.push(product);
        });
        
        data.append('products',  JSON.stringify(products));
        
        var installments = [];
        
        $.each(Installments, function (key, value) {
            var installment = {};
            
            data.append("installments_" + key + "_att", value.att, value.att.name);
            installment.due = value.due;
            installment.emission = value.emission;
            installment.total = value.total;
        
            installments.push(installment);
        });
        
        data.append("installments", JSON.stringify(installments));
        
        data.append('_token', $("#_token").val());
        
        $("#loadingModal").modal("toggle");
        
        var req = $.ajax({
            url: "http://deltafaucetrep.com/billing/add_invoice/{{$order->sub_order_id}}", 
            data: data,
            type: "POST",
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false
        }).done(function () {
            $("#loadingModal").modal("toggle");
            window.location.reload();    
        });
        
        window.setTimeout(function () {
            window.location.reload();    
        }, 2000);
        
    });

</script>