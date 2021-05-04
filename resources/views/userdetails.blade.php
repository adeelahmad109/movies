@extends('layouts.app')
@section('content')
    <section class="content">
      <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                {{ __('My Profile') }}
            </div>    
            <form action="/user" method="POST">
                  @csrf
                <div class="card-body">
                    <input type="hidden" name="id" value="{{$user->id}}">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                        <input type="password" class="form-control"  name="password" placeholder="Password">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div></div></div>
    </section>
@endsection
