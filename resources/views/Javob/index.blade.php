@extends('Layouts.main')

@section('title', 'Javob')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                @if (session('delete'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('delete') }}
                    </div>
                @endif
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Javob</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Savol</th>
                                    <th>Javob</th>
                                    <th>User_IP</th>
                                    <th>Count javoblar</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody id="userTableBody">
                                @foreach ($models as $model)
                                    <tr>
                                        <th>{{ $model->id }}</th>
                                        <td>{{ $model->question->name }}</td>
                                        <td>{{ $model->variant->variant }}</td>
                                        <td>{{ $model->user_ip }}</td>
                                        <td>
                                            <form action="/count" method="POST">
                                                @csrf
                                                <input type="hidden" name="savol_id" value="{{ $model->savol_id }}">
                                            </form>
                                        </td>
                                        <td>
                                            <form action="delete-javob" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $model->id }}">
                                                <button class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path
                                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col">
                            <div class="me-3">
                                {{ $models->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
