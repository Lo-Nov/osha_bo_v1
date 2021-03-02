@extends('layouts.app')

@section('content')
    <!-- Main section-->
    <section class="content">
        <header class="content__title px-0 border-0 mb-3">
               <span class="rev-title-container text-center d-block">

               </span>
            <small class="d-none">Showing number of test results <strong class="stream_name">made in all labs</strong></small>
        </header>

        <div class="row">
            <center>
                <div class="col-sm-12 col-md-6">
                    <p class="text-center">
                    <h1 class="text-capitalize stream_name m-0 text-center">Welcome back {{ Session::get('resource')[0]['user_full_name'] }}</h1>
                    <br>
                    Nairobi County Citizen are deeply grateful to all of the healthcare workers who are working tirelessly to help keep our county safe.
                    Your prompt actions assures the public safety and enables others to maintain their employment status!
                    <br>
                    <hr class="title-line">

                    <h6 class="card-subtitle text-center mt-1 font-12 mb-5">Extending a hand to give a hand. <strong class="text-nairobi font-weight-bolder
                            ">Thank You</strong> for the good work.</h6>

                </div>
            </center>


            <div class="col-sm-12 col-md-12 h-100">
                <img class="docs-img mt-3" src="{{ asset('img/imgs/doctors.svg') }}">
            </div>
        </div>



        <div class="row d-none">
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
