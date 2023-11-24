@extends('backend.layout.template')
@section('title')
    Dashboard
@endsection
@section('body-content')
<div class="container card">
<div class="content-container p-4 ">
      <h3 class=" text-center">All Blog's</h3><br>
    <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search by title...">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="table-responsive"><!-- Table -->
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>SN</th>
          <th>Thumbnail</th>
          <th>Blog Title</th>
          <th>Category</th>
          <th>Published Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      @php
      $blogs = App\Models\Blog::orderBy('created_at', 'desc')->get();
    
        $count=0;
     @endphp
        <!-- Table rows with data -->
        @foreach( $blogs as $blog)
        @php
     
        $count++;
        @endphp
        <tr>
          <td>{{ $count }}</td>
          <td><img src="{{ asset('uploads/'. $blog->blog_image) }}" alt="Blog Image" width="50"></td>
          <td> {{ $blog->blog_title }}</td>
          <td> {{ $blog->blog_Cat }}</td>
          <td> {{ date('d M y', strtotime($blog->created_at)) }}</td>
          <td>
         
          <div class="d-flex">
    <a href="{{ route('edit.blog', $blog->id) }}" class="mr-2">
        <button class="btn btn-primary btn-sm" style="margin-right:10px; padding:5px; "><i class="fa fa-pencil"></i> </button>
    </a>
    <form method="post" action="{{ route('blog.destroy', $blog->id) }}">
        @csrf
        <input type="hidden" name="id" value="{{ $blog->id }}">
        <button type="submit" class="btn btn-danger btn-sm "style=" padding:5px; "><i class="fa fa-trash-o"> </i></button>
    </form>
</div>
          
          </td>
        </tr>
        @endforeach
        
        <!-- Add more rows as needed -->
      </tbody>
    </table> </div>
    </div>
  </div><br>


 

@endsection

@section('script')
    <script>

    </script>
@endsection