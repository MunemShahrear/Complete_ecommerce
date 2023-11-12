@extends('backend.layout.template')
@section('title')
    Dashboard
@endsection
@section('body-content')

@php 
                $proName = App\Models\Profile::first();
            
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
        <h3 class="text-center">Edit Profile</h3><br>
        <form action="{{ route('profile.updatep')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">First Name:</label>
                <input type="text" class="form-control" id="name" name="name" Value=" {{ $proName->name }}" >
            </div>
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" class="form-control" id="lastname" name="lastname" Value=" {{ $proName->lastname }}" >
            </div>
    
        
            <div class="form-group">
                <label for="designation">Designation:</label>
                <input type="text" class="form-control" id="designation" name="designation" Value=" {{ $proName->designation }}" >
            </div>

            <div class="form-group">
                <label for="birthday">Birthday:</label>
                <input type="date" class="form-control" id="birthday" name="birthday" >
            </div>

            <div class="form-group">
                <label for="residence">Residence:</label>
                <input type="text" class="form-control" id="residence" name="residence" Value=" {{ $proName->residence }}" >
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" id="address" name="address" placeholder=" {{ $proName->address }}" ></textarea>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" Value=" {{ $proName->email }}" >
            </div>

            <div class="form-group">
                <label for="officeEmail">Office Email:</label>
                <input type="email" class="form-control" id="officeEmail" name="office_email" Value=" {{ $proName->office_email }}" >
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" class="form-control" id="phone" name="phone" Value=" {{ $proName->phone }}" >
            </div>

            <div class="form-group">
                <label for="officePhone">Office Phone:</label>
                <input type="tel" class="form-control" id="officePhone" name="office_phone" Value=" {{ $proName->office_phone }}" >
            </div>

            <div class="form-group">
                <label for="skype">Skype:</label>
                <input type="text" class="form-control" id="skype" name="skype" Value=" {{ $proName->skype }}" >
            </div>

            
            <div class="form-check form-switch">
                <label for="flexSwitchCheckChecked">Freelance Status:</label> 
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="freelance_status"  value="1"
                 @if($proName->freelance_status == 1)
                     checked
                 @endif
                        ><br>
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