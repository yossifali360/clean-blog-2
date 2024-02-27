@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Post</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @include('admin.layouts.message')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title"
                                placeholder="Enter Title">
                        </div>
                        <div class="form-group">
                            <label for="title">Category</label>
                            <select class="form-control" name="category_id" id="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Body</label>
                            <textarea name="body" id="body" class="form-control" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Body</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
