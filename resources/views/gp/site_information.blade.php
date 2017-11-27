@extends('layouts.gp')


@section('content')
    <form class="form-horizontal form-stripe" id="siteinformation">
        {{csrf_field()}}

        {{--<h5 class="mb-lg">To enjoy more, sing in!</h5>--}}
        @if( Auth::user()->level == 'super')
            <div class="form-group">
                <label class="col-sm-3 control-label">Part Number</label>
                <div class="col-sm-7">
                    <input type="text" name="pn" class="form-control" id="pn" placeholder="Part Number" value="{{ $site->pn }}" {{ (Auth::user()->level != 'super')?'disabled':'' }} >
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Serial Number</label>
                <div class="col-sm-7">
                    <input type="text" name="sn" class="form-control" id="sn" placeholder="Serial Number" value="{{ $site->sn }}" {{ (Auth::user()->level != 'super')?'disabled':'' }}>
                </div>
            </div>
        @else
            <div class="form-group">
                <label class="col-sm-3 control-label">Part Number</label>
                <div class="col-sm-7">
                    <input type="text" name="part_number" class="form-control" id="pn" placeholder="Part Number" value="{{ $site->pn }}" {{ (Auth::user()->level != 'super')?'disabled':'' }} >
                    <input type="hidden" name="pn" class="form-control" id="pn" placeholder="Part Number" value="{{ $site->pn }}"  >
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Serial Number</label>
                <div class="col-sm-7">
                    <input type="text" name="serial_number" class="form-control" id="sn" placeholder="Serial Number" value="{{ $site->sn }}" {{ (Auth::user()->level != 'super')?'disabled':'' }}>
                    <input type="hidden" name="sn" class="form-control" id="sn" placeholder="Serial Number" value="{{ $site->sn }}" >
                </div>
            </div>
        @endif
        <div class="form-group">
            <label class="col-sm-3 control-label">Site Id</label>
            <div class="col-sm-7">
                <input type="text" name="site_id" class="form-control" id="site_id" placeholder="Site Id" value="{{ $site->site_id }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Site Name</label>
            <div class="col-sm-7">
                <input type="text" name="site_name" class="form-control" id="site_name" placeholder="Site Name" value="{{ $site->site_name }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Site Address</label>
            <div class="col-sm-7">
                <textarea class="form-control" rows="3" name="address">{!! $site->address !!}</textarea>
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="button" class="btn blue btn120" id="store">Save</button>
                <button type="reset" class="btn default btn120">Refresh</button>
            </div>
        </div>

    </form>
@endsection

@section('js')
    <script>


        $('#store').click(function (e) {
            //do something


            show_loading();

            console.log('ajax request to store');
            $.ajax({
                url: '{{ route('save site') }}',
                type: 'POST',
                data: $('#siteinformation').serialize(),
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