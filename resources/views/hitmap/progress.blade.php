@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="content__inner">
            <h4 class="card-title"> Test Progress</h4>

            <div class="card">
                <div class="table-responsive" id="res-table">
                    <table id="data-table" class="table table-bordered">
                        <thead class="thead-default">
                        <tr>
                            <th>idNo</th>
                            <th>billNo</th>
                            <th>labTechName</th>
                            <th>approvedBy</th>
                            <th>uniquePatientId</th>
                            <th>testDate</th>
                            <th>noOfTest</th>
                            <th>noOfTestPass</th>
                            <th>noOfTestFailed</th>
                            <th>With Cert</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody class="table-striped">
                        @foreach ($hitMap->data as $key=>$item)
                            <tr class="gradeX">
                                <td>{{ $item->idNo }}</td>
                                <td>{{ $item->billNo }} </td>
                                <td>{{ $item->labTechName }}</td>
                                <td>{{ $item->approvedBy }}</td>
                                <td>{{ $item->uniquePatientId }}</td>
                                <td>{{ $item->testDate }}</td>
                                <td>{{ $item->noOfTest }}</td>
                                <td>{{ $item->noOfTestPass }}</td>
                                <td>{{ $item->noOfTestFailed }}</td>
                                @if ($item->withResult === "true")
                                    <td class="alert alert-success">Yes</td>
                                @else
                                    <td>No</td>
                                @endif

                                @if ($item->printable === "2")
                                    <td class="alert alert-success" style="color: white">Approved</td>
                                @else
                                    <td>Not Approved</td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
    <script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            // code to read selected table row cell data (values).
            $("#data-table").on('click','.btnSelect',function(){
                // alert("clicked");
                // get the current row
                var currentRow=$(this).closest("tr");

                var col1=$(this).parent().siblings().eq(0).text(); // get current row 1st TD value
                var col2=$(this).parent().siblings().eq(2).text();// get current row 2nd TD
                var id_num=$(this).parent().siblings().eq(1).text();
                var col3=$(this).parent().siblings().eq(3).text(); // get current row 3rd TD

                var results=$(this).parent().siblings('.test-results').text();
                var the_lab=$(this).parent().siblings('.the-lab').text();
                var lab_val=0;


                //alert(col1);

                $("#get-id textarea").val(results);
                $("#get-id #labId").val(lab_val);


                $('#get-id .modal-body .the-id0').val(col1);
                $('#get-id .modal-body .the-id1').val(col2);
                $('#get-id .modal-body .the-id2').val(col3);
                $('#testTittle').html('<h4 class"mb-0"><strong>  '+col2+'</strong><hr></h4><span class="thin">Confirm the booking date to corporates.</span><p><strong>Business  Number:'+id_num+'</strong></p>');


            });
        });
    </script>
    <script type="text/javascript">
        //getting selected test name
        // var test_name=$('#testNam').val();
        $('.btn-update-approve').click(function(e){
            e.preventDefault();

            var status = $('#status').val();
            var approvedBy = $("#approvedBy").val();
            var inspectionCode = $("#inspectionCode").val();

            if(status === "" || approvedBy ==="" || inspectionCode === "" ) {
                swal({
                    title: "Required fields",
                    text:"Please Fill All Required Field",
                    icon: "danger",
                });
                return false;
            }
            $('#loader14').removeClass('d-none');
            $.ajax({

                url: "update-approvals" ,
                type: "POST",
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {approvedBy:approvedBy, status:status, inspectionCode:inspectionCode},

                success:function(data){
                    $("#cform")[0].reset();

                    console.log(data.success.message);
                    $('#loader14').addClass('d-none');
                    $('#get-id').modal('hide');
                    location.reload();

                    //$("#res-table").load(window.location + " #res-table");
                    swal({
                        title: data.success.message,
                        text:data.success.message,
                        icon: "success",
                    });
                } ,
                error: function(data) {

                    //console.log(data.success.message);
                    $('#get-id').modal('hide');
                    $('#loader14').addClass('d-none');
                    swal({
                        title: "Error!",
                        text:data.success.message,
                        icon: "success",
                    });
                }
            });

        })
    </script>


@endsection

