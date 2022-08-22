@extends('layouts.admin')
@section('content')
    <div class="container">

        <div class="row">
            <h1 class="display-5">Select All</h1>
            <input class="form-check-input mt-0" type="checkbox"
                   aria-label="Checkbox for following text input" id="select_all">
        </div>

        <div class="ourcheckboxes">
            <div class="row">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                           aria-describedby="basic-addon1">
                    <input class="form-check-input mt-0" name="username1" type="checkbox" value=""
                           aria-label="Checkbox for following text input">
                </div>
            </div>

            <div class="row">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                           aria-describedby="basic-addon1">
                    <input class="form-check-input mt-0" name="username2" type="checkbox" value=""
                           aria-label="Checkbox for following text input">
                </div>

            </div>

            <div class="row">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                           aria-describedby="basic-addon1">
                    <input class="form-check-input mt-0" name="username3" type="checkbox" value=""
                           aria-label="Checkbox for following text input">
                </div>

            </div>

            <div class="row">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                           aria-describedby="basic-addon1">
                    <input class="form-check-input mt-0" name="username4" type="checkbox" value=""
                           aria-label="Checkbox for following text input">
                </div>

            </div>
        </div>

        <div class="row">
            <button class="btn btn-primary btn-sm " id="accept-selected">Accept Selected</button>
            <button class="btn btn-danger btn-sm ml-1" id="reject-selected">Reject Selected</button>
        </div>

        {{-- Modal --}}
        <div class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modal-body">
                        {{--<p>Modal body text goes here.</p>--}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close_modal">Close
                        </button>
                        <button type="button" class="btn btn-primary" id="save-changes">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal --}}

        {{--        <h1>JQuery</h1>--}}
        {{--        <select>--}}
        {{--            <option value="Ahmed">Ahmed</option>--}}
        {{--            <option value="Mohamed">Mohamed</option>--}}
        {{--            <option value="Khaled">Khaled</option>--}}
        {{--        </select>--}}
        {{--        <button class="btn btn-primary btn-sm"> Click Me</button>--}}
        {{--    </div>--}}
        @endsection

        @section('script')
            <script>
                $(document).ready(function () {
                    $('#select_all').click(function () {
                        if ($(this).is(':checked')) {
                            $('input[type="checkbox"]').prop('checked', true);
                        } else {
                            $('input[type="checkbox"]').prop('checked', false);
                        }
                    });



                    $('#reject-selected').click(function () {
                        let arr  = [];
                        $('.modal').modal('show');
                        if( ($('modal-body').length === 0) ) {

                            $('.ourcheckboxes input[type="checkbox"]').each(function() {
                                if($(this).is(':checked'))
                                    if(arr.includes($(this).attr('name')) !== true )
                                    {
                                        arr.push($(this).attr('name'));
                                        console.log($(this).attr('name'));
                                    }
                            });
                            for(let i = 0 ; i < arr.length ; ++i) {
                                $('#modal-body').append(
                                    '<label>'+ arr[i] +'</label>' +
                                    '<input  type="text" width="80%" name="'+ arr[i] +'" class="form-control mt-2" aria-label="Username"aria-describedby="basic-addon1">'
                                );
                            }
                        }

                        $('#close_modal').click(function () {
                            $('.modal').modal('hide');
                        });

                        $('#save-changes').click(function () {
                            $.ajax({
                                method: "POST",
                                data : {
                                    "_token" : "{{csrf_token()}}",
                                    "data" : arr,
                                },
                                url : '{{route('rejected-submit-data')}}',
                                success : function(response) {
                                    console.log('success');
                                },
                                error : function() {

                                }
                            });
                        });

                    });



                });

            </script>
@stop
