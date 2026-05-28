@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Books</div>

                    <div class="card-body">
                        <h1>Create Book</h1>
                        <form action ="{{ route('books.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Book Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Book Name">
                            </div>
                            <div class="form-group">
                                <label for="">Book Price</label>
                                <input type="text" class="form-control" name="price" placeholder="Book Price">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Add Book</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
