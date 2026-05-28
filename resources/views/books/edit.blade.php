@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">{{ __('Kitap Düzenle') }}</div>
                            <div class="col-6 d-flex justify-content-end"><a href="{{ route('books.index') }}">Kitaplar</a></div>
                        </div>
                    </div>

                    <div class="card-body">
                        <h1>Edit Book</h1>
                        <form action ="{{ route('books.update', $book->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Book Name</label>
                                <input type="text" class="form-control" value="{{ $book->name }}" name="name"
                                    placeholder="Book Name">
                            </div>
                            <div class="form-group">
                                <label for="">Book Price</label>
                                <input type="text" class="form-control" value="{{ $book->price }}" name="price"
                                    placeholder="Book Price">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Update Book</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
