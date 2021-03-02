@extends('layouts.app')

@section('content')
    <!-- Main section-->
    <section class="content">
        <header class="content__title px-0 border-0">
               <span class="rev-title-container">
                 <h1 class="text-capitalize stream_name m-0">Welcome back: {{ Session::get('resource')[0]['user_full_name'] }}</h1>
               </span>
            <small>Showing number of test results <strong class="stream_name">made in all labs</strong></small>
        </header>

        <div class="row quick-stats">
            <div class="col-md-12">
                <div class="quick-stats__item bg-primary-green bg-pattern">
                    <div class="quick-stats__info">

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" >
                        <h4 class="card-title">Nairobi Health department</h4>
                        <hr>
                        <blockquote>
                            <ul>
                                <li>Central Sterile Processing
                                </li>
                                <p>The central sterile processing technician plays a vital role in maintaining the cleanliness, functionality and inventory of health care instrumentation and equipment.

                                </p>
                                <li>Patient Care Technician Program
                                </li>
                                <p>As a patient care technician (PCT), you will have daily hands-on experiences with patients by helping them with procedures such as taking vital signs.

                                </p>
                                <li>Emergency Medical Technician
                                </li>
                                <p>EMTs are clinicians, trained to respond quickly to emergency situations regarding medical issues, traumatic injuries and accident scenes.
                                </p>
                                <li>Phlebotomy Technician Program
                                </li>
                                <p>Phlebotomy is the practice of drawing blood from patients and taking the blood specimens to the laboratory to prepare for testing.

                                </p>

                                <li>Emergency Medical Technician
                                </li>
                                <p>EMTs are clinicians, trained to respond quickly to emergency situations regarding medical issues, traumatic injuries and accident scenes.

                                </p>
                            </ul>
                        </blockquote>


                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">The </h4>
                        <hr>

                        <img src="{{ asset('img/docs.svg') }}">
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
@endsection
