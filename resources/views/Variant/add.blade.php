@extends('Layouts.main')

@section('title', 'Variant')

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
                        <a href="/variant" class="btn btn-primary">Variant</a>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <form action="/variant" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <select name="savol_id" class="form-select">
                                        @foreach ($datas as $data)
                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endforeach
                                    </select><br>
                                    <input type="text" class="form-control" name="variant" placeholder="Enter name"><br>
                                    @error('variant')
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
