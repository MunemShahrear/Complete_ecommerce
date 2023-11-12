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
        <h3 class="text-center">Edit Content</h3><br>
        <form action="{{ route('content.updatec')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="greetings">Greeting note</label>
                <input type="text" class="form-control" id="greetings" name="greetings" Value=" {{ $content->greetings }}" >
            </div>
            <div class="form-group">
                <label for="intro">Intro</label>
                <input type="text" class="form-control" id="intro" name="intro" Value=" {{ $content->intro }}" >
            </div>
                <div class="form-group">
                    <label for="pro_image">Top Image:</label><br>
                    <td><img src="{{ asset('uploads/'. $content->pro_image) }}" alt="Pro Image" width="250"></td><br><br>           
                    <input type="file" class="form-control-file" id="pro_image" name="pro_image" accept="image/*">
                </div>

                <div class="form-group">
                    <label for="about_image">About Image:</label><br>
                    <td><img src="{{ asset('uploads/'. $content->about_image) }}" alt="About Image" width="250"></td><br><br>           
                    <input type="file" class="form-control-file" id="about_image" name="about_image" accept="image/*">
                </div>
    
        
            <div class="form-group">
                <label for="about_intro">About intro:</label>
                <input type="text" class="form-control" id="about_intro" name="about_intro" Value=" {{ $content->about_intro }}" >
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