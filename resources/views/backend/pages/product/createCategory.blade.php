@extends('backend.layout.template')
@section('title')
    Dashboard
@endsection
@section('body-content')
<div class="container card ">
    <div class="content-container p-4 ">
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
      <h3 class=" text-center">Create new Category</h3><br>
      <form action="{{ route('blog.category')}}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="blogCategory">Blog Category:</label>
          <input type="text" class="form-control" id="blog_category" name="blog_category" placeholder="Enter the blog Category" required>
        </div>
       
        

        <button type="submit" class="btn btn-primary">Submit</button>
      </form><hr>




      <!-- <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search by title..."> -->
  
    <!-- Table -->
    <table class="table table-striped">
      <thead>
        <tr>
          <th>SN</th>
          <th>Name</th>
         
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      @php
      $cats = App\Models\Category::orderBy('created_at', 'asc')->get();
    
        $count=0;
     @endphp
        <!-- Table rows with data -->
        @foreach( $cats as $category)
        @php
     
        $count++;
        @endphp
        <tr>
          <td>{{ $count }}</td>
          <td> {{ $category->cat_name }}</td>
  
          <td>
         
          <!-- <a href="">
              <button class="btn btn-primary btn-sm">Edit</button>
          </a> -->
         
          <form method="post" action="{{ route('category.destroy',$category->id) }}">
            @csrf
            <input type="hidden" name="id" value="{{ $category->id }}">
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
          </form>  
          
          </td>
        </tr>
        @endforeach
        
        <!-- Add more rows as needed -->
      </tbody>
    </table> 
    </div>
    
  </div>
 

  <!-- Add Bootstrap JS and jQuery scripts (optional but may be required for certain features) -->
 

@endsection

@section('script')
    <script>

    </script>
@endsection