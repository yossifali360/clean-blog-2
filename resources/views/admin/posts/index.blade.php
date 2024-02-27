@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Posts</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @include('admin.layouts.message')
                    <table class="table table-borderd">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ \Str::limit($post->body, 200, '...') }}</td>
                                    <td><img src="{{ $post->image() }}" alt="" width="100" height="100"></td>
                                    <td>
                                        <a href="{{ route('admin.posts.edit', $post->id) }}"
                                            class="btn btn-info">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
