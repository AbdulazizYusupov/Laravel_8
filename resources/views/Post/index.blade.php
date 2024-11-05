@extends('Layouts.main')

@section('title', 'Post')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                @if (session('create'))
                    <div class="alert alert-success" role="alert">
                        {{ session('create') }}
                    </div>
                @endif
                @if (session('delete'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('delete') }}
                    </div>
                @endif
                @if (session('update'))
                    <div class="alert alert-info" role="alert">
                        {{ session('update') }}
                    </div>
                @endif
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Post</h1>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-6 mt-2">
                        <a href="/create-post" class="btn btn-primary">Create</a>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8">
                        <form action="{{ route('post.search') }}" method="get">
                            @csrf
                            <input type="text" placeholder="Search" class="form-control" id="searchinput" name="search">
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Text</th>
                                    <th>Image</th>
                                    <th>Like</th>
                                    <th>Dislike</th>
                                    <th>View</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody id="userTableBody">
                                @foreach ($models as $model)
                                    <tr>
                                        <th>{{ $model->id }}</th>
                                        <td>{{ $model->category->name }}</td>
                                        <td>{{ $model->title }}</td>
                                        <td>{{ $model->description }}</td>
                                        <td>{{ $model->text }}</td>
                                        <td><img src="{{ $model->img }}" alt="" width="200px"></td>
                                        <td>{{ $model->like }}</td>
                                        <td>{{ $model->dislike }}</td>
                                        <td>{{ $model->view }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#edit{{ $model->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path
                                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                </svg>
                                            </button>

                                            <div class="modal fade" id="edit{{ $model->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                Update
                                                                post
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('post.update', $model->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id"
                                                                    value="{{ $model->id }}">
                                                                <input class="form-control" type="text" name="title"
                                                                    value="{{ $model->title }}"><br><br>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $model->description }}"
                                                                    name="description"><br><br>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $model->text }}" name="text"><br><br>
                                                                <select class="form-select" name="category_id">
                                                                    @foreach ($datas as $data)
                                                                        <option value="{{ $data->id }}">
                                                                            {{ $data->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Edit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <form action="delete-post" method="POST">
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

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#searchinput').on('keyup', function() {
            let query = $(this).val();

            $.ajax({
                url: "{{ route('post.search') }}",
                type: 'GET',
                data: {
                    search: query
                },
                success: function(data) {
                    let rows = '';

                    data.data.forEach(model => {
                        rows += `
                        <tr class="align-middle">
                            <th>${model.id}</th>
                            <td>${model.title}</td>
                            <td>${model.body}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit${model.id}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path
                                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                </svg>
                                </button>
                                <!-- Modallar va boshqa HTML kodlari -->
                            </td>
                            <td>
                                <form action="delete-post" method="POST">
                                    <input type="hidden" name="_token" value="${$('meta[name=csrf-token]').attr('content')}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="id" value="${model.id}">
                                    <button class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path
                                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                    </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        `;
                    });
                    $('#userTableBody').html(rows);
                },
                error: function() {
                    alert('Qidirishda xatolik yuz berdi');
                }
            });
        });
    });
</script>
