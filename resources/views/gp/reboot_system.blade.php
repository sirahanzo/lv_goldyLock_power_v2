@extends('layouts.gp')


@section('content')
    <button type="button" class="btn red btn120" id="reboot"> REBOOT</button>
@endsection

@section('js')
    <script>

        $('#reboot').click(function () {
            //do something
            console.log('reboot the system');

            request_reboot();
        });

        function request_reboot() {
            console.log('request ajax to request_reboot');
            swal({
                title: 'Reboot System',
//                text: "To Take Effect IP Changed",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
//                cancelButtonColor: '#555',
                confirmButtonText: 'Reboot Now'
            }).then(
                function () {
                    console.log('Call Function Rebooted');
                    /*var url = "http://" + $('#ipaddress').val() + '/login';
                     console.log(url);
                     window.open(url, '_blank');*/
                    rebooted();
                },
                function (dismiss) {
                    if (dismiss == 'cancel') {
                        console.log('Canceled');
                    }
                }
            )
        }

        function rebooted() {
            $.ajax({
                url: '{{ route('reboot') }}',
                type: 'POST',
                //if success
                success: function () {
//                    newAddress();

                },
                //if error
                error: function () {
                    swal({
                        type: 'success',
                        title: "SYSTEM REBOOTED",
                        text: 'Wait 10seconds',
                        timer: 2000,
                        showConfirmButton: false,
                    }).then(
                        function () {

                        },
                        function (dismiss) {
                            if (dismiss === 'timer') {
                                console.log('redirect page to dashboard');
                                redirect();
                            }
                        }
                    );
                }
            })
        }

        function redirect() {
            window.location = "{{ URL::to('/') }}";
        }
    </script>
@endsection