@extends('layouts.gp')

@section('css')
    <link rel="stylesheet" href="{{asset('/')}}css/dataTables.bootstrap.min.css">
@endsection

@section('content')
    <div id="form-create" style="display: none">

        <form class="form-horizontal  form-stripe" id="newUserForm">
            {{csrf_field()}}
            <input type="hidden" name="id" id="id">
            <div class="form-group">
                <label class="col-sm-3 control-label">Full Name</label>
                <div class="col-sm-8">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">User Name</label>
                <div class="col-sm-8">
                    <input type="text" name="username" class="form-control" id="username" placeholder="User Name" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-8">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Confirm Password</label>
                <div class="col-sm-8">
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">SNMP Version</label>
                <div class="col-sm-4">
                    <select name="level" id="level" class="form-control">
                        <option value=""> -- Select One --</option>
                        <option value="admin"> Admin</option>
                        <option value="user"> User</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="button" class="btn blue btn120" id="store">Save</button>
                    <button type="reset" class="btn default btn120">Refresh</button>
                    <button type="button" class="btn btn-danger btn-outline btn120" id="cancel">Cancel</button>
                </div>
            </div>
        </form>
    </div>
    <div class="row" id="user-list">
        <table id="myTable" class="data-table table table-striped  table-bordered1 table-hover" >
            <thead>
            <tr>
                {{--<th>No</th>--}}
                <th class="col-sm-5">Name</th>
                <th class="col-lg-4">Username</th>
                <th class="text-center">Option</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <button type="button" class="btn btn-wide btn-info" id="showForm">Add New  <i class="fa fa-plus"></i></button>

    </div>

@endsection

@section('js')
    <script src="{{ asset('/') }}js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}js/dataTables.bootstrap.min.js"></script>
    <script>
        var oTable = $('#myTable').DataTable({
            processing: false,
            serverSide: true,
            searching: false,
            ajax: '{!! url('user-show') !!}',
            columns: [
//                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'username', name: 'username'},
//                {data: 'email', name: 'email'},
                {data: 'option', name: 'option'}
            ]
        });

        $(document).ready(function () {
            $('#showForm').click(function () {
                $('#form-create').toggle('slide');
                $('#user-list').toggle('hide');
                $('#newUserForm').trigger("reset");

            });

            $('#cancel').click(function () {
                $('#form-create').toggle('hide');
                $('#user-list').toggle('slide');

            });

            $('.delete').click(function () {
                var userID = $(this).attr("data-id");
                deleteUser(userID);
            });
        });


        function edit(id) {

            $.get("{{ url('user-edit').'/'}}" + id, function (data) {
                console.log(data);
                $('#newUserForm').trigger("reset");

                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#username').val(data.username);
                $('#email').val(data.email);
                $('#level').val(data.level);
                $('#btn-save').val("update");

                $('#form-create').toggle('slide');
                $('#user-list').toggle('hide');
                $('#store').attr('id', 'update');

            })
        }

        $('#update').click(function (e) {
            //do something
            console.log('Call ajax update request');
            var formData = $('#newUserForm').serialize();

            var id = $('input[name=id]').val();

            show_loading();

            $.ajax({
                url: "{{ url('user-update').'/' }}" + id,
                data: formData,
                type: 'POST',
                //if success
                success: function () {
                    console.log('Update User success');
                    hide_loading();
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
                    );
                    oTable.draw();
                    $('#newUserForm').trigger("reset");
                    e.preventDefault();

                },
                //if error
                error: function (jqXhr) {
                    var errorHtml = '';
                    hide_loading();

                    $.each(jqXhr.responseJSON, function (index, value) {
                        errorHtml += '<div class="text-left col-sm-offset-1"><li>' + value + '</li></div>';

                    });
                    swal({
                        title: "Error!",
                        html: errorHtml,
                        type: 'error'
                    });
                }

            });
//            $('#myModal').modal('hide');

            e.preventDefault();
        });


        function deleteUser(userID) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
//                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it !'
            }).then(
                function () {
                    console.log('Call ajax delete request');
                    $('#loading-text').html('delete');

                    show_loading();
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url: "{{ url('user-delete') }}/" + userID,
                        type: "DELETE",
                        data: {_token: _token},
                        //if success
                        success: function () {
                            hide_loading();
                            swal({
                                title: "Deleted",
                                text: "User has been successfully deleted",
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
                            oTable.draw();
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

        $('#store').click(function (e) {
            show_loading()
            $.ajax({
                url: '{{ url('user-save') }}',
                data: $('#newUserForm').serialize(),
                type: 'POST',
                success: function (data) {
                    console.log(data);
                    //swal("Success!", "Data Saved!", "success");
                    hide_loading();
//                    reloadPage();
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
                    );


                    oTable.draw();
                    $('#form-create').toggle('hide');
                    $('#user-list').toggle('slide');
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
            });
            e.preventDefault(); //This is to Avoid Page Refresh and Fire the Event "Click"
        });


    </script>

@endsection