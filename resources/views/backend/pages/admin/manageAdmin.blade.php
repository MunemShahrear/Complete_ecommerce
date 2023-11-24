@extends('backend.layout.template')
@section('title')
    Dashboard
@endsection
@section('body-content')

@php 
                $admin = App\Models\User::first();
            
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
        <h3 class="text-center">Change Admin Password</h3><br>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('profile.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" Value=" {{ $admin->email }}" >
            </div>
    
        
            <div class="form-group">
                <label for="password">Change Password:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter New Password" >
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