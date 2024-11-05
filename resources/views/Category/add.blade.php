@extends('Layouts.main')

@section('title', 'Category')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create</h1>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-6 mt-2">
                        <a href="/category" class="btn btn-primary">Category</a>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <form action="/category" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    @error('name')
                                        <spam class="text-danger">
                                            {{ $message }}
                                        </spam>
                                    @enderror
                                    <input type="text" class="form-control" name="name" placeholder="Enter name"><br>
                                    @error('tr')
                                        <spam class="text-danger">
                                            {{ $message }}
                                        </spam>
                                    @enderror
                                    <input type="number" class="form-control" name="tr" placeholder="Tartib raqami">
                                    <input type="hidden" name="is_active" value="1">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
