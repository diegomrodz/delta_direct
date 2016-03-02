@extends('layouts.master')

@section('content')

<script type="text/javascript">

    window.document.body.className += " page-mail";
    
</script>

<div class="mail-container" style="margin-left:0px;">
    <div class="col-sm-12">

        <div class="mail-container-header">
            {{trans('tracker_dp.title')}} <i style="font-size: 15px;">
            @if ($interval == 1)
                <span id="interval_considered">1</span> {{trans('tracker_dp.month')}}
            @else
                <span id="interval_considered">{{$interval or 2}}</span> {{trans('tracker_dp.months')}}
            @endif
            </i>
        </div>

        <div class="mail-controls clearfix">
            <div class="btn-toolbar wide-btns pull-left" role="toolbar">

                <div class="btn-group">
                    <button id="btn_inc_interval" title="{{trans('tracker_dp.raise_int')}}" type="button" class="btn "><i class="fa fa-arrow-left"></i></i>
                    </button>
                    <button id="btn_dsc_interval" title="{{trans('tracker_dp.decrease_int')}}" type="button" class="btn"><i class="fa fa-arrow-right"></i>
                    </button>
                </div>

            </div>

        </div>

        <div class="table-responsive">
            <table id="products_table" class="table table-striped">
                <thead>
                    <tr>
                        <th>SKU</th>
                        <th>{{trans('tracker_dp.serie')}}</th>
                        <th>{{trans('tracker_dp.description')}}</th>
                        <th>{{trans('tracker_dp.projects')}}</th>
                        <th>{{trans('tracker_dp.est_qty_brazil')}}</th>
                        <th>{{trans('tracker_dp.units')}}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $p)
                    <tr>
                        <td><a onclick='productDetail({{$p["ID"]}})' data-toggle="modal" data-target="#productDetailModal">{{$p["SKU"]}}</a></td>
                        <td>{{$p["SERIE"]}}</td>
                        <td>{{$p["DESC_EN"]}}</td>
                        <td>{{$p["QTD_PRJ"]}}</td>
                        <td>{{$p["QTD_BR"]}}</td>
                        <td>{{$p["QTD_PRODUCT"]}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="productDetailModal" class="modal fade">
    <div style="width:900px" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">{{trans('tracker_dp.product_detail')}}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="panel" id="product_detail_body">

                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
    
@endsection

@section('end')

<script type="text/javascript">
    function productDetail(id) {
        var response = $.ajax({
            url: "http://deltafaucetrep.com/product/detail/" + id,
            type: 'GET',
            dataType: 'html'
        });

        response.done(function(data) {
            $("#product_detail_body").html(data);
        });
    }
    
    $("#btn_inc_interval").click(function () {
        var int = parseInt($("#interval_considered").text(), 10);

        window.location.href = "http://deltafaucetrep.com/tracker/dp?q=" + (int + 1);
    });
    
    $("#btn_dsc_interval").click(function () {
        var int = parseInt($("#interval_considered").text(), 10);
        
        if (int == 1) {
            return alert("{{trans('tracker_dp.alert')}}");
        }
        
        window.location.href = "http://deltafaucetrep.com/tracker/dp?q=" + (int - 1);
    });
</script>

@endsection