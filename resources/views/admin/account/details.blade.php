@extends('admin.master')
@section('title')
    {{$title}}
@endsection
@section('content')

    <div class="content-wrapper">
        <section class="content animated fadeIn">
            <div class="box box-default">
                <div class="box-header with-border">
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-widget widget-user" style="max-height: 300px;">
                                <div class="widget-user-header bg-aqua-active">
                                    <h3 class="widget-user-username">Account Name</h3>
                                    <h5 class="widget-user-desc">
                                        <strong>{{\App\Transaction::account($account_id)->name}}</strong></h5>
                                </div>

                                <div class="box-footer">
                                    <div class="row">
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <span class="description-text">Opening Balance</span>
                                                <h5 class="description-header text text-success"> €{{\App\Transaction::account($account_id)->opening_balance}}</h5>

                                            </div>

                                        </div>
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <span class="description-text">Current Account Balance</span>
                                                <h5 class="description-header text text-info"> €{{number_format(\App\Transaction::account($account_id)->opening_balance + $deposit - $transfer - $withdraw,'2','.','')}}</h5>

                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <span class="description-text">Total Number Of Transactions</span>
                                                <h5 class="description-header text text-danger">{{$total_transactions}}</h5>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="pull-left">
                        <h3 class="box-title">{{strtoupper($title)}}</h3>
                    </div>

                    <div class="box-body min-height">
                        <table id="" class="table table-bordered table-striped datatable"
                               data-form="">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Deposit</th>
                                <th>Transfered</th>
                                <th>Withdraw</th>


                            </tr>
                            </thead>
                            <tbody>

                            @foreach($transactions as $transaction)

                                <tr>
                                    <td>{{$transaction->id}}</td>
                                    <td>{{$transaction->transaction_date->format('m/d/Y')}}</td>
                                    <td>{{$transaction->reference}}</td>
                                    <td>{{$transaction->description}}</td>
                                    @if($transaction->type =='deposit')
                                        <td><span class="text text-success">€{{$transaction->amount}}</span></td>
                                    @else
                                        <td><span> - </span></td>
                                    @endif
                                    @if($transaction->type =='transfer')
                                        <td><span class="text text-danger">€{{$transaction->amount}}</span></td>
                                    @else
                                        <td><span> - </span></td>
                                    @endif
                                    @if($transaction->type =='withdraw')
                                        <td><span class="text text-danger">€{{$transaction->amount}}</span></td>
                                    @else
                                        <td><span> - </span></td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        @include('admin.common.modal')
    </div>
@stop
@section('script')
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Source Sans Pro', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function (n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        // Area Chart Example
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Earnings",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000],
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function (value, index, values) {
                                return '$' + number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function (tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
                        }
                    }
                }
            }
        });


    </script>
@endsection
