$(document).ready(function () {
   
    var fields = (function() {
        
        var o =  {
           customer : {
               company_name : $("#customer_company_name"),
               fantasy_name : $("#customer_fantasy_name"),
               cnpj : $("#customer_cnpj"),
               ie : $("#customer_ie"),
               city : $("#customer_city"),
               uf : $("#customer_uf"),
               address : $("#customer_address"),
               district : $("#customer_district"),
               cep : $("#customer_cep"),
               phone: $("#customer_phone"),
               email: $("#customer_email"),
               type : $("#customer_type"),
               icms_taxpayer : $("#customer_icms_taxpayer")
           },
           delivery_address : {
               city : $("#delivery_address_city"),
               uf : $("#delivery_address_uf"),
               address : $("#delivery_address_address"),
               district : $("#delivery_address_district"),
               cep : $("#delivery_address_cep")
           },
           billing_address : {
               city : $("#billing_address_city"),
               uf : $("#billing_address_uf"),
               address : $("#billing_address_address"),
               district : $("#billing_address_district"),
               cep : $("#billing_address_cep")
           },
           business_contact : {
               name : $("input[name=business_contact_name]"),
               email : $("input[name=business_contact_email]"),
               phone : $("input[name=business_contact_phone]"),
               dept : $("input[name=business_contact_dept]")
           },
           partner : {
               name : $("input[name=partners_name]"),
               email : $("input[name=partners_email]"),
               phone : $("input[name=partners_phone]"),
               cpf : $("input[name=partners_cpf]")
           },
           main_provider : {
              name : $("input[name=main_provider_name]"),
              email : $("input[name=main_provider_email]"),
              phone : $("input[name=main_provider_phone]"),
              company : $("input[name=main_provider_company]")
           },
           suppliers : {
               sanitary : $("#sanitary_metals_suppliers"),
               ware : $("#sanitary_ware_suppliers")
           },
           own_seat : $("#customer_own_seat"),
           annual_income : $("#annual_income"),
           bank_account : {
               bank : $("input[name=bank_account_bank]"),
               agency : $("input[name=bank_account_agency]"),
               number : $("input[name=bank_account_number]")
           }
        };
        
        return o;
    }());
    
    $("#btn_copy_delivery_address").click(function() {
        fields.delivery_address.city.val(fields.customer.city.val());
        fields.delivery_address.district.val(fields.customer.district.val());
        fields.delivery_address.uf.val(fields.customer.uf.val());
        fields.delivery_address.address.val(fields.customer.address.val());
        fields.delivery_address.cep.val(fields.customer.cep.val());
    });
    
    $("#btn_copy_billing_address").click(function() {
        fields.billing_address.city.val(fields.customer.city.val());
        fields.billing_address.district.val(fields.customer.district.val());
        fields.billing_address.uf.val(fields.customer.uf.val());
        fields.billing_address.address.val(fields.customer.address.val());
        fields.billing_address.cep.val(fields.customer.cep.val());
    });
    
    
    $("#btn_salvar_cliente").click(function () {
        var data = {}, i = 0, j = 0, k = 0, l = 0;
        
        data.customer = {};
        
        data.customer.company_name = fields.customer.company_name.val();
        data.customer.fantasy_name = fields.customer.fantasy_name.val();
        data.customer.cnpj = fields.customer.cnpj.val();
        data.customer.ie = fields.customer.ie.val();
        data.customer.city = fields.customer.city.val();
        data.customer.uf = fields.customer.uf.val();
        data.customer.address = fields.customer.address.val();
        data.customer.district = fields.customer.district.val();
        data.customer.cep = fields.customer.cep.val();
        data.customer.phone = fields.customer.phone.val();
        data.customer.email = fields.customer.email.val();
        data.customer.icms_taxpayer = fields.customer.icms_taxpayer.val();
        data.customer.type = fields.customer.type.val();
        
        data.delivery_address = {};
        
        data.delivery_address.city = fields.delivery_address.city.val();
        data.delivery_address.district = fields.delivery_address.district.val();
        data.delivery_address.uf = fields.delivery_address.uf.val();
        data.delivery_address.address = fields.delivery_address.address.val();
        data.delivery_address.cep = fields.delivery_address.cep.val();
        
        data.billing_address = {};
        
        data.billing_address.city = fields.billing_address.city.val();
        data.billing_address.district = fields.billing_address.district.val();
        data.billing_address.uf = fields.billing_address.uf.val();
        data.billing_address.address = fields.billing_address.address.val();
        data.billing_address.cep = fields.billing_address.cep.val();
    
        data.business_contact = [];
        
        for (; i <= 1; i++) {
            data.business_contact.push({});
            
            data.business_contact[i].name = fields.business_contact.name[i].value;
            data.business_contact[i].email = fields.business_contact.email[i].value;
            data.business_contact[i].phone = fields.business_contact.phone[i].value;
            data.business_contact[i].dept = fields.business_contact.dept[i].value;
        }
        
        data.partner = [];
        
        for (; j <= 3; j++) {
            data.partner.push({});
            
            data.partner[j].name = fields.partner.name[j].value;
            data.partner[j].email = fields.partner.email[j].value;
            data.partner[j].phone = fields.partner.phone[j].value;
            data.partner[j].cpf = fields.partner.cpf[j].value;
        }
        
        data.main_provider = [];
        
        for (; k <= 1; k++) {
            data.main_provider.push({});
            
            data.main_provider[k].name = fields.main_provider.name[k].value;
            data.main_provider[k].email = fields.main_provider.email[k].value;
            data.main_provider[k].phone = fields.main_provider.phone[k].value;
            data.main_provider[k].company = fields.main_provider.company[k].value;
        }
        
        data.suppliers = {};
        
        data.suppliers.sanitary = fields.suppliers.sanitary.val();
        data.suppliers.ware = fields.suppliers.ware.val();
        
        data.own_seat = fields.own_seat.val();
        data.annual_income = fields.annual_income.val();
        
        data.bank_account = [];
        
        for (; l <= 2; l++) {
            data.bank_account.push({});
            
            data.bank_account[l].bank = fields.bank_account.bank[l].value;
            data.bank_account[l].agency = fields.bank_account.agency[l].value;
            data.bank_account[l].number = fields.bank_account.number[l].value;
        }
        
        data._token = $("#_token").val();
        
        $.ajax({
            url: "http://deltafaucetrep.com/portfolio/new",
            type: "post",
            data: data,
            success: function (d) {
                window.location.href = "http://deltafaucetrep.com/portfolio/list";
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
                $("#ui-error-alert").modal("toggle");
            }
        });
        
    });
    
});