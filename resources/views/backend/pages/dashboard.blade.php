@extends('backend.layout.template')
@section('title')
    Dashboard
@endsection
@section('body-content')


<!-- Page Sidebar Ends-->
    <div class="container-fluid">
      <div class="page-header">
        <div class="row">
          <div class="col-sm-6">
            <h3>Dashboard</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
          <div class="col-sm-6">

          </div>
        </div>
      </div>
    </div>

    @php
      $blogs = App\Models\Blog::orderBy('created_at', 'desc')->get();
    
        $count=0;
     @endphp
        <!-- Table rows with data -->
        @foreach( $blogs as $blog)
        @php
     
        $count++;
        @endphp
        @endforeach;
    <!-- Container-fluid starts-->
    <div class="container-fluid general-widget">
        <div class="row">
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                    <div class="align-self-center text-center"><i class="fa fa-newspaper-o fa-2x"></i></div>
                    <div class="media-body"><span class="m-0">Blogs</span>
                        <h4 class="mb-0 counter">{{$count}}</h4><i class="fa fa-newspaper-o fa-5x icon-bg" ></i>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                <div class="bg-secondary b-r-4 card-body">
                    <div class="media static-top-widget">
                    <div class="align-self-center text-center"><i class="fa fa-eye fa-2x"></i></div>
                    <div class="media-body"><span class="m-0">Views</span>
                        <h4 class="mb-0 counter"> </h4><i class="fa fa-eye fa-5x icon-bg" ></i>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                    <div class="align-self-center text-center"><i data-feather="message-circle"></i></div>
                    <div class="media-body"><span class="m-0">Messages</span>
                        <h4 class="mb-0 counter"> </h4><i class="icon-bg" data-feather="message-circle"></i>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                    <div class="align-self-center text-center"><i data-feather="user-plus"></i></div>
                    <div class="media-body"><span class="m-0">New User</span>
                        <h4 class="mb-0 counter"> </h4><i class="icon-bg" data-feather="user-plus"></i>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
<!-- Page Sidebar Ends-->
@endsection

@section('script')
    <script>

    </script>
@endsection
