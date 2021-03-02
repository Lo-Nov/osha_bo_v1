@extends('layouts.app')

@section('content')
    <!-- Main section-->
    <section class="content">
        <header class="content__title px-0 border-0">
            <h1 class="text-capitalize stream_name m-0">Health Report Summary</h1>

            <button class="float-right" onclick="myFunction()"> <i class="zmdi zmdi-search-for"></i> Filter</button>
            <div id="myDIV" style="display: none">
               <div class="row">
                   <div class="col-md-4 ">

                   </div>
                   <div class="col-md-8 ">
                       <form action="{{ route('health-reports') }}" method="post">
                           @csrf
                       <div class="row">

                        <div class="col-sm-4">
                            <label>Date From</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                </div>
                                <input type="date" class="form-control hidden-md-up" placeholder="Pick Date from">
                                <input type="text" name="from" class="form-control date-picker hidden-sm-down" placeholder="Pick Date from">
                            </div>
                        </div>
                           <div class="col-sm-4">
                               <label>Date To</label>

                               <div class="input-group">
                                   <div class="input-group-prepend">
                                       <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                   </div>
                                   <input type="date" class="form-control hidden-md-up" placeholder="Pick Date to">
                                   <input type="text" name="to" class="form-control date-picker hidden-sm-down" placeholder="Pick Date to">
                               </div>
                           </div>
                           <div class="col-sm-4">
                               <label style="color: transparent">D</label>
                               <div class="input-group">
                                   <button type="submit" class="btn btn-primary">Submit</button>
                               </div>
                           </div>

                       </div>
                       </form>
                   </div>
               </div>
            </div>
        </header>
        <br>
        <div class="row quick-stats">
            <div class="col-md-4">
                <div class="quick-stats__item bg-primary-green bg-pattern">
                    <div class="quick-stats__info quick-stats owl-carousel">
                        @foreach($getDashboard->data->perSubCounty as $item)
                        <div class="subcounty-container quick-stats__info">
                            <h3>{{ $item->subCountyName }}</h3>
                            <h2>KES {{ $item->amount }}</h2>
                            <small class="m-0">Collected revenue</small>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="quick-stats__item bg-primary-green bg-pattern">
                    <div class="quick-stats__info">

                        <h3 class="">Today</h3>
                        <h2 class="mt-3">{{ number_format($getDashboard->data->summary[0]->today) }}</h2>
                        <small class="today m-0">Collections Today</small>
                        <!--<strong>32 transactions</strong>-->
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="quick-stats__item bg-primary-green bg-pattern">
                    <div class="quick-stats__info">

                        <h3 class="">This Week</h3>
                        <h2  class="mt-3">{{ number_format($getDashboard->data->summary[0]->thisWeek) }}</h2>
                        <small class="week-full m-0">Collections This week</small>
                        <!--<strong>32 transactions</strong>-->
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="quick-stats__item bg-primary-green bg-pattern ">
                    <div class="quick-stats__info">

                        <h3 class="">This Month</h3>
                        <h2  class="mt-3">{{ number_format($getDashboard->data->summary[0]->thisMonth) }}</h2>
                        <small class="full-month m-0">Collections This month</small>
                        <!--<strong>32 transactions</strong>-->
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="quick-stats__item bg-primary-green bg-pattern ">
                    <div class="quick-stats__info">

                        <h3 class="">This Year</h3>
                        <h2  class="mt-3">{{ number_format($getDashboard->data->summary[0]->thisYear)  }}</h2>
                        <small class="full-year m-0">Collections This year</small>
                        <!--<strong>32 transactions</strong>-->
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-7 col-sm-12">
                <div class="card by-stream calc-29">
                    <div class="card-body business-body">
                        <div class="contact-header">
                            <h4 class="text-capitalize">Collections per revenue streams</h4>
                            <p>Table showing revenue collections by revenue streams</p>


                        </div>

                          <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th scope="col">Revenue stream</th>
                                  <th scope="col">Account</th>
                                  <th>Count</th>
                                  <th scope="col" class="text-right">Amount (KSH)</th>
                              </thead>
                              <tbody>
                              @foreach($getDashboard->data->revenuePerStream as $item)
                                <tr>
                                  <td>{{ $item->accountName }}</td>
                                  <td>{{ $item->accountNo }}</td>
                                  <td>{{ number_format($item->count) }}</td>
                                  <td class="text-right">{{ number_format($item->amount) }} </td>
                                </tr>
                              @endforeach
                              </tbody>
                            </table>

                    </div>
                </div>

            </div>
            <div class="col-md-5 col-sm-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card by-stream">
                            <div class="card-body business-body">
                                <div class="contact-header">
                                    <h4 class="text-capitalize">Tests per Lab</h4>
                                    <p>Number of tests done per lab</p>

                                </div>
                                <table id="datatablefixSbp" class="table table-striped" >
                                    <thead>
                                    <tr>
                                        <th>Lab Name</th>
                                        <th class="text-right">Tests Done</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($getDashboard->data->testPerLab as $item)
                                        <tr>
                                            <td>{{ $item->ClinicName }}</td>
                                            <td class="text-right">{{ $item->noOFTest }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>



                            </div>
                        </div>

                    </div>

                    <div class="col-12">
                        <div class="card by-stream">
                            <div class="card-body business-body">
                                <div class="contact-header">
                                    <h4>Revenue sources</h4>
                                    <p>Collections by sources </p>

                                </div>
                                <table id="datatablefixSbp" class="table table-striped" >
                                    <thead>
                                    <tr>
                                        <th>Sources</th>
                                        <th class="text-right">Amount collected (KES)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($getDashboard->data->revenueSources as $item)
                                    <tr>
                                        <td>{{ $item->source }}</td>
                                        <td class="text-right">{{ number_format($item->amount) }} </td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>



                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="card">
                    <div class="card-body some-stats">
                        <div class="contact-header">
                            <h4 class="text-capitalize">Lab tests summary </h4>
                            <p>Below is an analysed report of test done.</p>


                        </div>
                        <hr>

                        <div class="row mt-">
                            <div class="col-md-2 col-sm-12">
                                <center>
                                    <p><strong class="text-capitalize">Total Tests</strong></p>
                                    <h6>
                                        {{ explode(':::', $getDashboard->data->getTestsSummary[0]->total)[0] }}<br>
                                        <hr style="">

                                        {{ explode(':::', $getDashboard->data->getTestsSummary[0]->total)[1] }}<br>
                                        {{ explode(':::', $getDashboard->data->getTestsSummary[0]->total)[2] }}
                                    </h6>
                                </center>
                            </div>

                            <div class="col-md-2 col-sm-12">
                                <center>
                                    <p><strong class="text-capitalize">Tests with no results</strong></p>
                                    <h6 class="text-danger">
                                        {{ explode(':::', $getDashboard->data->getTestsSummary[0]->WithNoResults)[0] }}<br>
                                        <hr style="">

                                        {{ explode(':::', $getDashboard->data->getTestsSummary[0]->WithNoResults)[1] }}<br>
                                        {{ explode(':::', $getDashboard->data->getTestsSummary[0]->WithNoResults)[2] }}
                                    </h6>
                                </center>
                            </div>

                            <div class="col-md-2 col-sm-12">
                                <center>
                                    <p><strong class="text-capitalize">Tests with results</strong></p>
                                    <h6 class="text-success">
                                        {{ explode(':::', $getDashboard->data->getTestsSummary[0]->withResults)[0] }}<br>
                                        <hr style="">

                                        {{ explode(':::', $getDashboard->data->getTestsSummary[0]->withResults)[1] }}<br>
                                        {{ explode(':::', $getDashboard->data->getTestsSummary[0]->withResults)[2] }}
                                    </h6>
                                </center>
                            </div>




                            <div class="col-md-2 col-sm-12">
                                <center>
                                    <p><strong class="text-capitalize">Pending Approvals</strong></p>
                                    <h6 class="text-align-left-0">
                                        {{ explode(':::', $getDashboard->data->getTestsSummary[0]->pending)[0] }}<br>
                                        <hr style="">
                                        {{ explode(':::', $getDashboard->data->getTestsSummary[0]->pending)[1] }}<br>
                                        {{ explode(':::', $getDashboard->data->getTestsSummary[0]->pending)[2] }}
                                    </h6>


                                </center>
                            </div>

                            <div class="col-md-2 col-sm-12">
                                <center>
                                    <p><strong class="text-capitalize">Approved Tests</strong></p>
                                    <h6 class="">
                                        {{ explode(':::', $getDashboard->data->getTestsSummary[0]->approved)[0] }}<br>
                                        <hr style="">

                                        {{ explode(':::', $getDashboard->data->getTestsSummary[0]->approved)[1] }}<br>
                                        {{ explode(':::', $getDashboard->data->getTestsSummary[0]->approved)[2] }}
                                    </h6>
                                </center>
                            </div>

                            <div class="col-md-2 col-sm-12">
                                <center>
                                    <p>
                                        <strong class="text-capitalize">Declined Tests</strong>
                                    </p>
                                    <h6 class="">
                                        {{ explode(':::', $getDashboard->data->getTestsSummary[0]->declined)[0] }}<br>
                                        <hr style="">

                                        {{ explode(':::', $getDashboard->data->getTestsSummary[0]->declined)[1] }}<br>
                                        {{ explode(':::', $getDashboard->data->getTestsSummary[0]->declined)[2] }}
                                    </h6>

                                </center>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-7 col-sm-12">
                <div class="card calc-29 by-stream">
                    <div class="card-body calc-29">
                        <div class="contact-header">
                            <h4 class="text-capitalize">Approvals done per doctor</h4>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th class="text-right">Tests Done</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($getDashboard->data->perDoctor as $item)
                                <tr>
                                    <td>{{ $item->approvedBy }}</td>
                                    <td class="text-right">{{ $item->counts }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           <div class="col-md-5 col-sm-12">
               <div class="row">
                   <div class="col-12">
                    <div class="card by-stream">
                        <div class="card-body">
                            <div class="contact-header">
                                <h4 class="text-capitalize">Paid clients</h4>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tested</th>
                                        <th class="">Not Tested</th>
                                        <th class="text-right">Total Paid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="badge badge-soft-success badge-pill">{{ $getDashboard->data->paidClients->tested }}</span></td>
                                        <td class=""><span class="badge badge-soft-danger badge-pill">{{ $getDashboard->data->paidClients->notTested }}</span></td>
                                        <td class="text-right"><strong>{{ $getDashboard->data->paidClients->paidClients }}</strong></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                   </div>
                   <div class="col-12">
                    <div class="card by-stream">
                        <div class="card-body">
                            <div class="contact-header">
                                <h4 class="text-capitalize">Testing Kits</h4>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Kit</th>
                                        <th class="text-right">Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($getDashboard->data->getPerTestKit as $item)
                                    <tr>
                                        <td>{{ $item->movementName }}</td>
                                        <td class="text-right">{{ $item->count }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                   </div>
               </div>
           </div>
        </div>
        <div data-columns>
        </div>
    </section>
    <script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/highchart/highcharts.js') }}"></script>
    <script src="{{ asset('js/highchart/data.js') }}"></script>
    <script src="{{ asset('js/highchart/exporting.js') }}"></script>
    <script src="{{ asset('js/highchart/export-data.js') }}"></script>

    <script>
        Highcharts.chart('fleetSbp', {
            data: {
                table: 'datatablefixSbp'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Amount'
                }
            },
            plotOptions: {
                column: {
                    colorByPoint: true
                }
            },
            colors: [
                '#ffdf00', '#115700'
            ],
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        this.point.y + ' ' + this.point.name.toLowerCase();
                }
            }
        });
    </script>
        <script>
            function myFunction() {
                var x = document.getElementById("myDIV");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
        </script>

@endsection
