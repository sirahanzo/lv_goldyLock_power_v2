@extends('layouts.gp')

@section('css')
    <link rel="stylesheet" href="{{asset('/')}}css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="{{asset('/')}}css/clockpicker.css">
@endsection

@section('content')
    <form class="form-horizontal form-stripe" id="dateTime">
        {{csrf_field()}}

        {{--<h5 class="mb-lg">To enjoy more, sing in!</h5>--}}
        <div class="form-group">
            <label for="default-datepicker" class="col-sm-2 control-label ">Date</label>
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon x-primary"><i class="fa fa-calendar"></i></span>
                    <input type="text" name="date" class="form-control" id="default-datepicker">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Time</label>
            <div class="col-sm-4">
                <div class="input-group clockpicker" data-autoclose="true">
                    <span class="input-group-addon x-primary"><i class="fa fa-clock-o"></i></span>
                    <input class="form-control timepicker" id="timepicker1" name="time" value="" type="text"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="button" class="btn blue btn120" id="store">Save</button>
                <button type="reset" class="btn default btn120">Refresh</button>
            </div>
        </div>
    </form>




@endsection

@section('js')
    <script src="{{ asset('/') }}js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('/') }}js/clockpicker.js"></script>
    <script>

        $('#default-datepicker,#datepicker').datepicker({
            format: "yyyy-mm-dd",
            weekStart: 1,
            todayBtn: "linked",
            todayHighlight: true,
            autoclose: true
        });

        $('.clockpicker').clockpicker();

        $('#store').click(function (e) {
            //do something


            show_loading();

            console.log('ajax request to store');
            $.ajax({
                url: '{{ route('save date') }}',
                type: 'POST',
                data: $('#dateTime').serialize(),
                //if success
                success: function (data) {
                    console.log(data);
//                    $('#progress').modal('hide');
                    hide_loading();
                    reloadPage();
                    console.log('reload page');

                    swal({
                        type: 'success',
                        title: "Success!",
                        text: "Data Saved!",
                        timer: 1000,
                        showConfirmButton: false,
                    }).then(
                        function () {
                        },
                        function (dismiss) {
                            if (dismiss === 'timer') {
                                console.log('I was closed by the timer');

                            }
                        }
                    )
                },
                //if error
                error: function (jqXhr) {
                    var errorHtml = '';
                    $('#progress').modal('hide');

                    $.each(jqXhr.responseJSON, function (index, value) {
                        errorHtml += '<div class="text-left col-sm-offset-1 text-capitalize"><li>' + value + '</li></div>';

                    });
                    swal({
                        title: "Error!",
                        html: errorHtml,
                        type: 'error'
                    });
                }
            });

            e.preventDefault(); //This is to Avoid Page Refresh and Fire the Event "Click"
        });
    </script>
@endsection