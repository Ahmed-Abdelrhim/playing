@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-dark table-dark table-hover" id="table_id">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Job</th>
                        <th scope="col">Salary</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    {{--                    <tbody>--}}
                    {{--                    </tbody>--}}
                </table>

                {{--                <div class="input-group mb-3">--}}
                {{--                    <input class="form-check-input mt-0" name="username" type="checkbox" value=""--}}
                {{--                           aria-label="Checkbox for following text input">--}}
                {{--                    <input type="text" class="form-control" placeholder="Username" aria-label="Username"--}}
                {{--                           aria-describedby="basic-addon1">--}}
                {{--                </div>--}}


            </div>
        </div>
    </div>

    {{-- Start Modal --}}
    <!-- Button trigger modal -->
    {{--    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">--}}
    {{--        Launch demo modal--}}
    {{--    </button>--}}

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    {{--End Modal --}}

@stop
@section('script')
    <script>
        $(document).ready(function () {
            $('#table_id').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('emp.data')}}',
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
                    {
                        data: 'phone',
                        name: 'phone',
                    },
                    {
                        data: 'salary',
                        name: 'salary',
                    },
                    {
                        data: 'job',
                        name: 'job',
                    },
                    {
                        data: 'action',
                        name: 'action',
                    }]
            });
            $('#deleteBtn').click(function() {

            });
        });
    </script>


@endsection
{{--    <script type="text/javascript">--}}
{{--        $(function () {--}}
{{--            // alert("sad");--}}
{{--            let table = $('#table_id').DataTable({--}}
{{--                processing: true,--}}
{{--                serverSide: true,--}}
{{--                order: [0, 'desc'],--}}
{{--                ajax: "{{route('dataTable')}}",--}}
{{--                columns: [--}}
{{--                    {--}}
{{--                        data: 'id',--}}
{{--                        name: 'id',--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data: 'name',--}}
{{--                        name: 'name'--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data: 'email',--}}
{{--                        name: 'email',--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data: 'phone',--}}
{{--                        name: 'phone',--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data: 'salary',--}}
{{--                        name: 'salary',--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data: 'job',--}}
{{--                        name: 'job',--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data: 'action',--}}
{{--                        name: 'action',--}}
{{--                    }--}}

{{--                ],--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
