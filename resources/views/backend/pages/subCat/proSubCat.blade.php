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
      <h3 class=" text-center">Add new Sub Category</h3><br>
      <form action="{{ route('create.proSubCategory')}}" method="POST"  enctype="multipart/form-data">
        @csrf
        @php
      $cats = App\Models\Procategory::orderBy('created_at', 'asc')->get();
    
        $count=0;
     @endphp
        <div class="form-group">
            <label for="category">Choose Main Category:</label>
            <select class="form-control" id="main_category" name="main_category" required>
            <option >Choose a category</option>
            @foreach( $cats as $category)
        @php
     
        $count++;
        @endphp    
            <option value="{{ $category->id }}">{{ $category->proCat_name }}</option>
            
            @endforeach
                <!-- Add more category options as needed -->
            </select>
        </div>

        <div class="form-group">
          <label for="blogCategory">Product Sub Category:</label>
          <input type="text" class="form-control" id="pro_Subcategory" name="pro_Subcategory" placeholder="Enter the Product Category" required>
        </div>
       
        

        <button type="submit" class="btn btn-primary">Submit</button>
      </form><hr>




      <!-- <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search by title..."> -->
  
    <!-- Table -->
    <table class="table table-striped">
      <thead>
        <tr>
          <th>SN</th>
          <th>Category Name</th>
         
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      @php
      $cats = App\Models\Prosubcategory::orderBy('created_at', 'asc')->get();
    
        $count=0;
     @endphp
        <!-- Table rows with data -->
        @foreach( $cats as $category)
        @php
     
        $count++;
        @endphp
        <tr>
          <td>{{ $count }}</td>
          <td> {{ $category->proSubCat_name }}</td>
  
          <td>
         
          <!-- <a href="">
              <button class="btn btn-primary btn-sm">Edit</button>
          </a> -->
         
          <form method="post" action="{{ route('destroy.proSubCategory') }}">
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