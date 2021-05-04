@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">{{ __('My Movies') }}</div>
                        <div class="card-body">
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @elseif(session()->has('danger'))
                                <div class="alert alert-danger">
                                    {{ session()->get('danger') }}
                                </div>
                            @endif
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <table class="table table-sm">
                                <tr>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Rented</th>
                                    <th>Date</th>
                                </tr>
                                @foreach ($movies as $movie)
                                    <tr>
                                        <td>{{ $movie->id }}</td>
                                        <td>{{ $movie->name }}</td>
                                        <td>{{ $movie->status }}</td>
                                        <td>{{ $movie->date }}</td>
                                        <td><a class="btn btn-primary btn-sm" type="button"
                                                href="/movies/{{ $movie->id }}/medit" style="margin:5px">Return</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Form Element sizes -->
                    <div class="card card-success">
                        <div class="card-header">
                            {{ __('My Profile') }}
                        </div>
                        <div class="card-body">

                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <h3 class="profile-username text-center">{{ $user->name }}</h3>
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Movies Rented</b> <a class="float-right">{{ $count }}</a>
                                        </li>

                                    </ul>

                                    <a href="/user/{{ $user->id }}/edit"
                                        class="btn btn-primary btn-block"><b>Edit</b></a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
