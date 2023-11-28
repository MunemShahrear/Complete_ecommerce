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
      <form action="{{ route('create.product')}}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="blogCategory">Product Title:</label>
                  <input type="text" class="form-control" id="pro_title" name="pro_title" placeholder="Enter Title" required>
                </div>
                <div class="row">
                @php
                    $cats = App\Models\Procategory::orderBy('created_at', 'asc')->get();
                  
                      $count=0;
                @endphp
                <div class="form-group col-md-4">
                    <label for="category">Choose Main Category:</label>
                    <select class="form-control" id="main_category" name="main_category" required>
                    <option >Select Main category</option>
                              @foreach( $cats as $category)
                                  @php
                              
                                  $count++;
                                  @endphp    
                              <option value="{{ $category->id }}">{{ $category->proCat_name }}</option>
                              
                              @endforeach
                    </select>
                </div>


                @php
                
                    $subcats = App\Models\Prosubcategory::orderBy('created_at', 'asc')->get();
                  
                      $count=0;
                @endphp
               
                  <div class="form-group col-md-4">
                    <label for="category">Choose Sub Category:</label>
                    <select class="form-control" id="sub_category" name="sub_category" required>
                    <option >Select Sub category</option>
                              @foreach( $subcats as $subcategory)
                                  @php
                              
                                  $count++;
                                  @endphp    
                              <option value="{{ $subcategory->id }}">{{ $subcategory->proSubCat_name }}</option>
                              
                              @endforeach
                    </select>
                </div>


                @php
                
                    $brandsql = App\Models\Probrand::orderBy('created_at', 'asc')->get();
                  
                      $count=0;
                @endphp
                <div class="form-group col-md-4">
                    <label for="category">Choose Brand:</label>
                    <select class="form-control" id="pro_brand" name="pro_brand" required>
                    <option >Select Brand</option>
                              @foreach( $brandsql as $brand)
                                  @php
                              
                                  $count++;
                                  @endphp    
                              <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                              
                              @endforeach
                    </select>
                </div>
               

                <div class="form-group col-md-4">
                  <label for="pro_model">Model:</label>
                  <input type="text" class="form-control" id="pro_model" name="pro_model" placeholder="Enter Model" required>
                </div>
                
                  <div class="form-group col-md-4">
                    <label for="pro_price">Price:</label>
                    <input type="text" class="form-control" id="pro_price" name="pro_price" placeholder="Enter Price" required>
                  </div>

                 <div class="form-group col-md-4">
                    <label for="pro_sprice">Special Price:</label>
                    <input type="text" class="form-control" id="pro_sprice" name="pro_sprice" placeholder="Enter Special Price" required>
                 </div>
                 <div class="form-group col-md-4">
                    <label for="pro_qty">Quantity:</label>
                    <input type="number" class="form-control" id="pro_qty" name="pro_qty" placeholder="qty" required min="0">
                </div>
                 <div class="form-group col-md-4">
                    <label for="pro_waranty">Warranty:</label>
                    <input type="text" class="form-control" id="pro_waranty" name="pro_waranty" placeholder="Warranty" required>
                 </div>
              
                    <div class="form-group col-md-4">
                      <label for="pro_datasheet">Upload Data sheet</label><br>        
                      <input type="file" class="form-control-file" id="pro_datasheet" name="pro_datasheet" accept="application/pdf">
                    </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="pro_img1">Upload Product Image(800x800 pixels)</label><br>        
                        <input type="file" class="form-control-file" id="pro_img1" name="pro_img1" accept="image/*" onchange="validateImage(this)">
                    </div>
                              <script>
                                  function validateImage(input) {
                                      var file = input.files[0];

                                      // Check if the file is an image
                                      if (file && file.type.startsWith('image/')) {
                                          var img = new Image();

                                          // Create a FileReader to read the image dimensions
                                          var reader = new FileReader();
                                          reader.onload = function (e) {
                                              img.src = e.target.result;
                                          };
                                          reader.readAsDataURL(file);

                                          // Check the image dimensions
                                          img.onload = function () {
                                              if (img.width === 800 && img.height === 800) {
                                                  // Valid image dimensions
                                                  // You can perform additional actions if needed
                                              } else {
                                                  // Invalid image dimensions
                                                  alert('Image must be 800x800 pixels.');
                                                  input.value = ''; // Clear the file input
                                              }
                                          };
                                      } else {
                                          // Not an image
                                          alert('Please upload a valid image file.');
                                          input.value = ''; // Clear the file input
                                      }
                                  }
                              </script>


                    <div class="form-group">
                        <label for="pro_desc">Description:</label>
                        <textarea class="form-control" id="pro_desc" name="pro_desc" placeholder="Product Description" required></textarea>
                    </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                
      

                
                <!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

                  <script>
                      tinymce.init({
                          selector: '#pro_desc',
                          plugins: 'advlist autolink lists link image charmap print preview anchor',
                          toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | table',
                          height: 300,
                      });
                  </script> -->
      </form>





      
 

@endsection

@section('script')
    <script>

    </script>
@endsection