@extends('layouts.app')

@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Operations Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                <div class="col-xs-5">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-7 text-right">
                                        <div class="huge" id="number_sold"></div>
                                        <div>Items sold</div>
                                    </div>
                                    
                                </div>
                                 <div class="row">
                                    <div class="col-xs-5">
                                        <i class="fa fa-rouble fa-5x"></i>
                                    </div>
                                    <div class="col-xs-7 text-right">
                                        <div class="huge" id="total_sold"></div>
                                        <div>Total Item sold</div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                         <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge" id="number_reload"></div>
                                        <div>Reloads</div>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-rouble fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge" id="total_reload"></div>
                                        <div>Total Reload</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-3 col-md-8">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-gift fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge" id="number_reward_claimed"></div>
                                        <div>Rewards Claimed</div>
                                    </div>
                                </div>
                                 <div class="row">
                                     <div class="col-xs-3">
                                        <i class="fa fa-rouble fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge" id="total_reward_claimed"></div>
                                        <div>Total Rewards Claimed</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-8">
                       <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-credit-card fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge" id="number_card_sold"></div>
                                        <div>Cards sold</div>
                                    </div>
                                </div>
                                 <div class="row">
                                     <div class="col-xs-3">
                                        <i class="fa fa-rouble" style="font-size:72px;"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge" id="total_card_sold"></div>
                                        <div>Total Card Sold</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                  <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Top Products of the Day</h3>
                            </div>
                            <div class="panel-body">
                                  <div id="bar-example"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    @endsection
    @section('js')
               <script>
               $(document).ready(function () {
                    dashboards();
                    bargraph();
               });

function dashboards(){
   var id = '1';
   var datefrom = "2017-01-01";
   var dateto = "2017-05-30" 
   $.ajax({
        url: "dashboard/" + id + "/" + datefrom + "/" + dateto,
        type: "GET",
        success: function (data) {
            $('#number_sold').append(data[0]['sales_count']);
            $('#total_sold').append(data[0]['sales_amount']);
            $('#number_reload').append(data[0]['reloads_count']);
            $('#total_reload').append(data[0]['reloads_amount']);
            $('#number_reward_claimed').append(data[0]['claims_count']);
            $('#total_reward_claimed').append(data[0]['claims_amount']);
            $('#number_card_sold').append(data[0]['cards_count']);
            $('#total_card_sold').append(data[0]['cards_amount']);
          }

    });
}


function bargraph(){
var bar = [];
  var id = '1';
   var datefrom = "2017-01-01";
   var dateto = "2017-05-30" 
   $.ajax({
        url: "bargraph/" + id + "/" + datefrom + "/" + dateto,
        type: "GET",
        success: function (data) {
          for (var i = 0; i < data.length; i++) {
            var graph = {y: data[i]['description'], a: data[i]['graph_items_count'], b: data[i]['graph_sales_amount']};
            bar.push(graph);

          }
          Morris.Bar({
  element: 'bar-example',
  data: bar,
  xkey: 'y',
  ykeys: ['a', 'b'],
  labels: ['Number of item', 'Amount of sales for the item']
});
          }

    });

}
               </script>
               @endsection