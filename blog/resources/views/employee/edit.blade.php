@extends('layouts.admin')
@section('content')
    <form method="POST" action="" >
        @csrf
        <div class="form-group">
            <label for="name">Name </label>
            <input type="text" class="form-control" id="name" name="name" value="{{$admin->name}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{$admin->email}}">
        </div>
        <div class="form-group">
            <label for="phoneNumber">Phone </label>
            <input type="number" class="form-control" id="phoneNumber" name="phone" value="{{$admin->phone}}">
        </div>


        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </form>
@endsection
