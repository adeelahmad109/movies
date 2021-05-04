@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                   
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
                      
                        <table class="table table-sm">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Cast</th>
                                <th>Rented</th>
                                <th>Date</th>
                                <th>Due Date</th>
                            </tr>
                                    <td>{{ $movie->id }}</td>
                                    <td>{{ $movie->name }}</td>
                                    <td>{{ $movie->cast }}</td>
                                    <td>{{ $movie->status }}</td>
                                    <td>{{ $movie->date }}</td>   
                                    <td>{{ $movie->rdate }}</td>                                                                                  
                                 </tr>
                          
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
