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
     <h3 class=" text-center">Add new Product</h3><br>
     <div class="row" style="margin-bottom:20px;">
        <div class="col-md-10">
        <a href="{{route('add.product')}}" class=" col-md-12 btn btn-primary"><i class="fa fa-plus"></i> Add New Product</a><br>
        </div>

     </div>
     <div class="row">
        <div class="col-md-12">
        <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search by title...">
        </div>

     </div>
    
      
  
    <!-- Table -->
    <table class="table table-striped">
      <thead>
        <tr>
          <th>SN</th>
          <th>Main Category</th>
          <th>Sub Category</th>
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
          <td> 
            @php
            $maincats = App\Models\Procategory::where('id' , $category->main_Cat)->get();
        
            @endphp
          
        
          {{ $maincats[0]['proCat_name'] }}
         
        </td>
          

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