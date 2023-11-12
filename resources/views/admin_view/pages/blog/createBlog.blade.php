@extends('backend.layout.template')
@section('title')
    Dashboard
@endsection
@section('body-content')
<div class="container card ">
    <div class="content-container p-4 ">
      <h3 class=" text-center">Write Blog</h3><br>
      <form action="{{ route('blog.store')}}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="blogTitle">Blog Title:</label>
          <input type="text" class="form-control" id="blog_title" name="blog_title" placeholder="Enter the blog title" required>
        </div>
        @php
      $cats = App\Models\Category::orderBy('created_at', 'asc')->get();
    
        $count=0;
     @endphp
   
        <div class="form-group">
            <label for="category">Category:</label>
            <select class="form-control" id="blog_category" name="blog_category" required>
            @foreach( $cats as $category)
        @php
     
        $count++;
        @endphp    
            <option value="{{ $category->cat_name }}">{{ $category->cat_name }}</option>
            @endforeach
                <!-- Add more category options as needed -->
            </select>
        </div>
     
        <div class="form-group">
          <label for="blogKey">Blog Keywords:</label>
          <input type="text" class="form-control" id="blog_key" name="blog_key" placeholder="Enter keywords" required>
        </div>
        <div class="form-group">
          <label for="blogLink">Link to the Blog:</label>
          <input type="url" class="form-control" id="blog_link" name="blog_link" placeholder="Enter the blog URL" required>
        </div>
       

        <div class="form-group">
          <label for="blogThumbnail">Blog Thumbnail:</label>
          <input type="file" class="form-control-file" id="blog_image" name="blog_image" accept="image/*" required>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div><br>


  <!-- Add Bootstrap JS and jQuery scripts (optional but may be required for certain features) -->
 

@endsection

@section('script')
    <script>

    </script>
@endsection