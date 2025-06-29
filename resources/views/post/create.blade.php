@extends('admin.layouts.template')
@section('content')
<div class="container">
    <h2>Create Post</h2>
    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label>Short Description</label>
            <textarea name="short_description" class="form-control" required></textarea>
        </div>
  
        <div class="mb-3">
            <label>Post Image</label>
            <input type="file" name="post_image" class="form-control">
        </div>
        <button class="btn btn-primary" style="cursor: pointer;">Submit</button>
    </form>
</div>

@endsection