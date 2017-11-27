@extends('layouts.gp')

@section('content')
    <div class="row">
        <div class="col-lg-6">

            <table class="table table-bordered table-condensed table-hover ">
                <tbody>
                @for ($i = 0; $i < 11; $i++)
                    <form action="#" method="post" role="form" id="alarm_form{{$i}}">
                        {{ csrf_field() }}
                        <tr>
                            <td>{{ $param_alarm[$i]->name }}</td>
                            <td class="col-sm-3">
                                <select name="id[{{ $param_alarm[$i]->id }}][severity]" id="inputID" class="form-control text-capitalize">
                                    <option value="{{ $param_alarm[$i]->severity }}">{{ $param_alarm[$i]->severity }}</option>
                                    @if($param_alarm[$i]->severity == 'major' )
                                        <option value="minor">Minor</option>
                                    @else
                                        <option value="major">Major</option>
                                    @endif

                                </select>
                            </td>
                            <td class="col-sm-3">
                                <select name="id[{{$param_alarm[$i]->id}}][state]" id="inputID" class="form-control text-capitalize">
                                    <option value="{{ $param_alarm[$i]->state }}">{{ $param_alarm[$i]->state }}</option>
                                    @if($param_alarm[$i]->state == 'enable' )
                                        <option value="disable">Disable</option>
                                    @else
                                        <option value="enable">Enable</option>
                                    @endif

                                </select>
                            </td>
                            <td class="text-center ">
                                <button type="button" class="btn btn-info btn-sm btn1201 store_alarm1" onclick="store({{$i}})">WRITE</button>
                            </td>
                        </tr>
                    </form>

                @endfor
                </tbody>
            </table>
        </div>

        <div class="col-lg-6">
            <table class="table table-bordered table-condensed table-hover ">
                <tbody>
                @for ($i = 11; $i < 22; $i++)
                    <form action="#" method="post" role="form" id="alarm_form{{$i}}">
                        {{ csrf_field() }}
                        <tr>
                            <td>{{ $param_alarm[$i]->name }}</td>
                            <td class="col-sm-3">
                                <select name="id[{{ $param_alarm[$i]->id }}][severity]" id="inputID" class="form-control text-capitalize">
                                    <option value="{{ $param_alarm[$i]->severity }}">{{ $param_alarm[$i]->severity }}</option>
                                    @if($param_alarm[$i]->severity == 'major' )
                                        <option value="minor">Minor</option>
                                    @else
                                        <option value="major">Major</option>
                                    @endif

                                </select>
                            </td>
                            <td class="col-sm-3">
                                <select name="id[{{$param_alarm[$i]->id}}][state]" id="inputID" class="form-control text-capitalize">
                                    <option value="{{ $param_alarm[$i]->state }}">{{ $param_alarm[$i]->state }}</option>
                                    @if($param_alarm[$i]->state == 'enable' )
                                        <option value="disable">Disable</option>
                                    @else
                                        <option value="enable">Enable</option>
                                    @endif

                                </select>
                            </td>
                            <td class="text-center ">
                                <button type="button" class="btn btn-info btn-sm btn1201 store_alarm1" onclick="store({{$i}})">WRITE</button>
                            </td>
                        </tr>
                    </form>

                @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function store(id) {
            console.log('Store Form with id:' + id);
            $('#loading-text').html('write');

            show_loading();
            $.ajax({
                url: '{{ route('save alarm') }}',
                data: $('#alarm_form' + id).serialize(),
                type: 'POST',
                //if success
                success: function () {
                    hide_loading();
                    swal({
                        type: 'success',
                        title: "Success!",
                        text: "Alarm Config Changed",
                        timer: 2000,
                        showConfirmButton: false,
                    });
                    reloadPage();
                },
                //if error
                error: function (jqXhr) {
                    var errorHtml = '';
                    hide_loading();

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

        }

    </script>
@endsection