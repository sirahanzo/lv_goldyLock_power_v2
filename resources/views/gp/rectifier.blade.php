@extends('layouts.gp')

@section('css')
    <style>
        #alarm {
            background: #F44336;
            color: white;
        }

        #rect_no {
            background: #607D8B;
            color: white;
        }

        #shutdown_btn {
            margin-bottom: -10px;
            margin-top: -15px;
        }

        #table_rect {
            margin-top: -10px;
        }

        #option {
            background: #29aba4;
            color: white;
        }
    </style>
@endsection

@section('content')
    <table class="table table-bordered table-hover table-condensed " id="table_rect">
        <thead>
        <tr class="bg-primary1">
            <th></th>
            <th></th>
            <th class="text-center bg-primary" colspan="3"> Curr. Module (A)</th>
            <th></th>
            <th class="text-center" id="alarm">Module</th>
            <th class="text-center" id="alarm">Comm.</th>
            <th class="text-center" id="alarm">Protect</th>
            <th class="text-center" id="alarm">StartUp/</th>
            <th class="text-center " id="alarm">Hiber</th>
            <th class="text-center" id="alarm">Curr</th>
            <th class="text-center" id="alarm">Rect.</th>
            <th class="text-center" id="alarm">AC</th>
            <th class="text-center" id="alarm">Fan</th>
            <th class="text-center" id="alarm">Hi</th>
            <th class="text-center" id="rect_no">Remote</th>
        </tr>
        <tr class="bg-primary1">
            <th id="rect_no"> Rect. #</th>
            <th class="text-center bg-primary"> Volt (V)</th>
            <th class="text-center bg-primary" data-toggle="tooltip" title="Module Rectifer A"> a</th>
            <th class="text-center bg-primary"> b</th>
            <th class="text-center bg-primary"> c</th>
            <th class="text-center bg-primary"> T (&deg;C)</th>
            <th class="text-center" id="alarm"> Fail</th>
            <th class="text-center " id="alarm"> Lost</th>
            <th class="text-center" id="alarm"> Fail</th>
            <th class="text-center" id="alarm"> S.Down</th>
            <th class="text-center" id="alarm"> nate</th>
            <th class="text-center" id="alarm"> Limit</th>
            <th class="text-center" id="alarm"> Fail</th>
            <th class="text-center" id="alarm"> Fail</th>
            <th class="text-center" id="alarm"> Fail</th>
            <th class="text-center" id="alarm"> Temp</th>
            <th class="text-center col-sm-1 " id="rect_no"> Shutdown</th>
        </tr>
        </thead>
        <tbody>
        @for($i = 1;$i<17;$i++)
        <tr class="">
            <td><b> {{ $i }}</b></td>
            <td class="text-center">0</td>
            <td class="text-center">0</td>
            <td class="text-center">0</td>
            <td class="text-center">0</td>
            <td class="text-center">0</td>
            <td class="text-center">Normal</td>
            <td class="text-center">Normal</td>
            <td class="text-center">Normal</td>
            <td class="text-center">Normal</td>
            <td class="text-center">Normal</td>
            <td class="text-center">Normal</td>
            <td class="text-center">Normal</td>
            <td class="text-center">Normal</td>
            <td class="text-center">Normal</td>
            <td class="text-center">Normal</td>
            <td class="text-center">
                    <button type="button" class="btn btn-xs btn120  green btn-outline1">....</button>
            </td>
        </tr>
            @endfor
        </tbody>
    </table>
@endsection

@section('js')
    <script>
        $('th[data-toggle="tooltip"]').tooltip();
        {{--setTimeout(function refreshTable() {--}}
        {{--console.log('Get Request Ajax Rectifier:');--}}

        {{--$.ajax({--}}
        {{--url:"{{ route('ajax rectifier') }}",--}}
        {{--dataType:'html',--}}

        {{--success:function(data) {--}}
        {{--$('#data').find('section').empty().append(data);--}}
        {{--setTimeout(refreshTable,3000);--}}
        {{--}--}}
        {{--});--}}
        {{--}, 1000);--}}

        function remote1(rect) {
//           var rectifier = $('#rectifier').val();
            console.log('Shutdown Rectifier! =' + rect);
//           $('#loading-text').html('remoting');
//           show_loading();
            var form = $('#shutdown_form' + rect).serialize();
            console.log(form);
        }

        function remote(rect, cmd) {
//            var remote = $('#value').val();
//            var rectifier = $('#rectifier').val();

            swal({
                title: 'Are you sure?',
                text: "Remote ShutDown " + cmd + " Rectifier " + rect + "!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
//                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes !'
            }).then(
                function () {
                    console.log('Call ajax delete request');
                    $('#loading-text').html('remoting');

                    show_loading();
//                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url: "{{ url('shutdown-rectifier') }}",
                        type: "POST",
                        data: $('#shutdown_form' + rect).serialize(),
                        //if success
                        success: function () {
                            hide_loading();
                            swal({
                                title: "Success!",
                                text: "Rectifier " + rect + " Proccesing To Turning " + cmd,
                                type: "success",
                                showConfirmButton: false,
                                timer: 2000
                            }).then(
                                function () {
                                },
                                function (dismiss) {
                                    if (dismiss === 'timer') {
                                        console.log('I was closed by the timer');

                                    }
                                }
                            );
//                            oTable.draw();
                        },
                        //if error
                        error: function (jqXhr) {
                            var errorHtml = '';
                            hide_loading()

                            $.each(jqXhr.responseJSON, function (index, value) {
                                errorHtml += '<div class="text-left col-sm-offset-1"><li>' + value + '</li></div>';

                            });
                            swal({
                                title: "Error!",
                                html: errorHtml,
                                type: 'error'
                            });
                        }
                    })

                },
                function (dismiss) {
                    if (dismiss == 'cancel') {
                        console.log('Canceled');
                    }
                }
            )
        }

    </script>
@endsection
