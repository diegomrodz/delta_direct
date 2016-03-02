<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Delta Direct - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <!-- Open Sans font from Google CDN -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&amp;subset=latin" rel="stylesheet" type="text/css">

    <!-- Pixel Admin's stylesheets -->
    <link href="http://static.deltafaucetrep.com/assets/stylesheets/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="http://static.deltafaucetrep.com/assets/stylesheets/pixel-admin.min.css" rel="stylesheet" type="text/css">
    <link href="http://static.deltafaucetrep.com/assets/stylesheets/widgets.min.css" rel="stylesheet" type="text/css">
    <link href="http://static.deltafaucetrep.com/assets/stylesheets/pages.min.css" rel="stylesheet" type="text/css">
    <link href="http://static.deltafaucetrep.com/assets/stylesheets/rtl.min.css" rel="stylesheet" type="text/css">
    <link href="http://static.deltafaucetrep.com/assets/stylesheets/themes.min.css" rel="stylesheet" type="text/css">


    <link href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" rel="stylesheet" type="text/css">
    <link href="http://static.deltafaucetrep.com/assets/stylesheets/dataTables.responsive.css" rel="stylesheet" type="text/css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
</head>

<body>

    <body style="">

        <script>
            var init = [];
        </script>


        <table id="customers_table" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th><input type="text" data-column-filter=1 class="input-filter form-control" placeholder="Nome Fantasia"></th>
                    <th><input type="text" data-column-filter=2 class="input-filter form-control" placeholder="Razão Social"></th>
                    <th><input type="text" data-column-filter=3 class="input-filter form-control" placeholder="Segmento"></th>
                    <th><input type="text" data-column-filter=4 class="input-filter form-control" placeholder="Canal"></th>
                    <th><input type="text" data-column-filter=5 class="input-filter form-control" placeholder="Tipo"></th>
                    <th><input type="text" data-column-filter=6 class="input-filter form-control" placeholder="Gerente"></th>
                    <th><input type="text" data-column-filter=7 class="input-filter form-control" placeholder="Representante"></th>
                    <th><input type="text" data-column-filter=8 class="input-filter form-control" placeholder="Estado"></th>
                    <th><input type="text" data-column-filter=9 class="input-filter form-control" placeholder="Cidade"></th>
                    <th><input type="text" data-column-filter=10 class="input-filter form-control" placeholder="Região"></th>
                    <th><input type="text" data-column-filter=11 class="input-filter form-control" placeholder="Dist. Atual"></th>
                    <th><input type="text" data-column-filter=12 class="input-filter form-control" placeholder="Dist. Futuro"></th>
                    <th><input type="text" data-column-filter=13 class="input-filter form-control" placeholder="Crédito"></th>
                    <th><input type="text" data-column-filter=14 class="input-filter form-control" placeholder="Cls. Oficial"></th>
                    <th><input type="text" data-column-filter=15 class="input-filter form-control" placeholder="Cls. Potencial"></th>
                    <th >Total Especificado</th>
                    <th >Total Faturado</th>
                    <th >Total Pago</th>
                    <th >Sellout Total</th>
                    <th >Sellout Quantidade</th>
                    <th >Sellout Ticket</th>
                </tr>
            </thead>
        
            <tbody>
                @foreach($customers as $customer)
                <tr data-customer-id="{{$customer->customer_id}}">
                    <td><a target="_blank" href="http://deltafaucetrep.com/portfolio/detail/{{$customer->customer_id}}">{{$customer->customer_id}}</a></td>
                    <td style="max-width:180px;">{{$customer->fantasy_name or "N.I"}}</td>
                    <td style="max-width:180px;">{{$customer->company_name or "N.I"}}</td>
                    <td>{{$customer->getSegment()->name or "N.I"}}</td>
                    <td>{{$customer->getChannel()->description or "N.I"}}</td>
                    <td>{{$customer->getType()->name or "N.I"}}</td>
                    <td>{{$customer->getManager()->name or ($customer->representant() == null ? "Delta" : $customer->representant()->manager()->user()->name)}}</td>
                    <td style="max-width:180px;">{{$customer->representant() == null ? "Delta" : $customer->representant()->company()->name}}</td>
                    <td style="min-width:50px;">{{$customer->getState()->uf or "N.I"}}</td>
                    <td>{{$customer->getCity()->nome or $customer->city_text}}</td>
                    <td>{{$customer->getRegion() == null ? "N.I" : $customer->getRegion()->description}}</td>
                    <td style="min-width:100px;">{{$customer->getActualDistribuitor()->name or "N.I"}}</td>
                    <td style="min-width:100px;">{{$customer->getFutureDistribuitor()->name or "N.I"}}</td>
                    <td>{{$customer->creditAnalysis() == null ? "Pendente" : $customer->creditAnalysis()->getRange()->description}}</td>
                    <td style="min-width:100px;">{{$customer->getOfficialClassification()->name or "N.I"}}</td>
                    <td style="min-width:100px;">{{$customer->getPotentialClassification()->name or "N.I"}}</td>
                    <td style="border-left: 1px solid black;">{{$customer->statedBudgetsAllTime()}}</td>
                    <td >{{$customer->invoicedAllTime()}}</td>
                    <td >{{$customer->paidAllTime()}}</td>
                    <td style="border-left: 1px solid black;">{{$customer->selloutTotal()}}</td>
                    <td >{{$customer->selloutVolume()}}</td>
                    <td >{{$customer->selloutTicket()}}</td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
        

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
        <script src="http://static.deltafaucetrep.com/assets/javascripts/pixel-admin.min.js"></script>
        <script src="http://static.deltafaucetrep.com/assets/javascripts/jquery.dataTables.min.js"></script>
        <script src="http://static.deltafaucetrep.com/assets/javascripts/dataTables0.responsive.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.6/jquery.slimscroll.min.js"></script>
        <script src="//cdn.datatables.net/plug-ins/a5734b29083/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    
        <script type="text/javascript">
           
            var table = $("#customers_table").DataTable({
                paging: false,
                sDom: ""
            });
            
            $(".input-filter").each(function (key, value) {
                $(value).keyup(function () {
                    table.columns($(value).data("column-filter")).search($(this).val()).draw();
                });
            });
            
        </script>
        
    </body>

</html>