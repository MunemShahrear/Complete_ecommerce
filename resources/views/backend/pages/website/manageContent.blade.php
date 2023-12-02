@extends('backend.layout.template')
@section('title')
    Dashboard
@endsection
@section('body-content')

@php 
                $content = App\Models\Content::first();
            
              @endphp

              @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container card">
    <div class="content-container p-4">
        <h3 class="text-center">Edit Slider</h3><br>
        <form action="{{ route('content.updatec')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="greetings">Slider 1 Header</label>
                <input type="text" class="form-control" id="greetings" name="greetings" Value=" {{ $content->greetings }}" >
            </div>
           
                <div class="form-group">
                    <!-- <label for="pro_image">Slider 1 image</label><br> -->
                    <td><img src="{{ asset('uploads/'. $content->pro_image) }}" alt="Slide 1" width="250"></td><br><br>           
                    <input type="file" class="form-control-file" id="pro_image" name="pro_image" accept="image/*">
                </div> <hr>
                <div class="form-group">
                <label for="intro">Slider 2 header</label>
                <input type="text" class="form-control" id="intro" name="intro" Value=" {{ $content->intro }}" >
            </div>
                <div class="form-group">
                    <!-- <label for="about_image">Slider 2 image</label><br> -->
                    <td><img src="{{ asset('uploads/'. $content->about_image) }}" alt="Slide 2" width="250"></td><br><br>           
                    <input type="file" class="form-control-file" id="about_image" name="about_image" accept="image/*">
                </div>
    <hr>
            <div class="form-group">
                <label for="intro">Slide 3 header</label>
                <input type="text" class="form-control" id="intro" name="intro" Value=" {{ $content->intro }}" >
            </div>
            <div class="form-group">
                <!-- <label for="about_intro">slide 3 image</label><br> -->
                <td><img src="{{ asset('uploads/'. $content->about_intro) }}" alt="Slide 2" width="250"></td><br><br>           
                    <input type="file" class="form-control-file" id="about_intro" name="about_intro" accept="image/*">
           
            </div>

          

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div><br>



  <!-- Add Bootstrap JS and jQuery scripts (optional but may be required for certain features) -->
 

@endsection

@section('script')
    <script>

    </script>
@endsection