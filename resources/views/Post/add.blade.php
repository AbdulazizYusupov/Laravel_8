@extends('Layouts.main')

@section('title', 'Post')

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
                        <a href="/post" class="btn btn-primary">Post</a>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <form action="/post" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" placeholder="Enter title"><br>
                                    @error('title')
                                        <spam class="text-danger">
                                            {{ $message }}
                                        </spam>
                                    @enderror
                                    <input type="text" class="form-control" name="description"
                                        placeholder="Enter description"><br>
                                    @error('description')
                                        <spam class="text-danger">
                                            {{ $message }}
                                        </spam>
                                    @enderror
                                    <textarea class="form-control" name="text" placeholder="Text" cols="30" rows="10"></textarea><br>
                                    @error('text')
                                        <spam class="text-danger">
                                            {{ $message }}
                                        </spam>
                                    @enderror
                                    <input type="file" name="img" class="form-control"><br>
                                    @error('img')
                                        <spam class="text-danger">
                                            {{ $message }}
                                        </spam>
                                    @enderror
                                    <select class="form-select" aria-label="Default select example" name="category_id">
                                        @foreach ($models as $model)
                                            <option value="{{ $model->id }}">{{ $model->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <spam class="text-danger">
                                            {{ $message }}
                                        </spam>
                                    @enderror
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
