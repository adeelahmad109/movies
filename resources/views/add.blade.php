@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Add Movie</h1>
                    </div>
                    <form action="/movies" method="POST">
                        <div class="card-body">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control form-control-sm" value="{{ old('name') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cast">Cast:</label>
                                    <input id=" cast" type="text" class="form-control form-control-sm" name="cast"
                                        value="{{ old('cast') }}">
                                </div>
                            </div>                                                                          
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
