@extends('admin.layouts.app')
@section('content')
    <div class="row">
        = <div class="col-md-6 mx-auto">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Category Info</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('admin.posts.update', $category->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        @include('admin.layouts.message')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" value="{{ $category->name }}" name="name"
                                id="name" placeholder="Enter Name">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
