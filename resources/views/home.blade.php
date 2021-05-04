@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Movies') }} <a href="/movies/create" type="button"
                            class="btn  btn-success" style="float: right">Add</a></div>
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @elseif(session()->has('danger'))
                    <div class="alert alert-danger">
                        {{ session()->get('danger') }}
                    </div>
                    @endif
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row col-md-12" style="float: right">
                           <div class="col-md-6"></div>
                        

                    </div>
                        <table class="table table-sm">
                            <tr>
                                <th>ID</th>
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
                                    <td><a href="/movies/{{ $movie->id }}" class="btn btn-primary btn-sm"><b>View</b></a>   </td>  
                                    @if ($movie->status == 'no')
                                        <td><a class="btn btn-primary btn-sm" type="button"
                                                href="/movies/{{ $movie->id }}/edit" style="margin:5px">Get</a></td>
                                    @endif
                                                  
                                 </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
