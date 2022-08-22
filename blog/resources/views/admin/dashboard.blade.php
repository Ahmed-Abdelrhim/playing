@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="row ">
            @isset($countries)
                <div class="col-md-6 col-sm-12 ">
                    <select class="form-select " aria-label="Default select example" name="university" id="country">
                        @foreach($countries as $c)
                            <option value="{{$c->id}}">
                                {{$c->name}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 col-sm-12">
                    <select class="form-select" aria-label="Default select example" name="university" id="university">
                    </select>
                </div>
            @endisset
        </div>

    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#country').on('change', function () {
                let id = $(this).val();
                $('#university').empty();
                $.ajax({
                    type: 'GET',
                    url: 'getUniversities/' + id,
                    success: function (response) {
                        let data = JSON.parse(response);
                        console.log(response);
                        $('#university').empty();
                        data.forEach(element => {
                            $('#university').append(`<option value= " ${element['id']} " >${element['name']}</option>`);

                        });
                    }
                })
            });
        });
    </script>
@endsection
