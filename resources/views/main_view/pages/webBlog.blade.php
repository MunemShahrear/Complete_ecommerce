<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- metas -->
    <meta charset="utf-8">
    <meta name="author" content="themepaa">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Sajal">
    <meta name="description" content="Sajal">
    @php
    $proName = App\Models\Profile::first();

    if($proName->freelance_status==1){
    $FS='Available';}
    else{
    $FS='Busy';}
    @endphp

    @php
    $content = App\Models\Content::first();

    @endphp
    <!-- title -->
    <title>
        {{ $proName->name }}
    </title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    @include('frontend.include.css')
</head>
<!-- Body Start -->

<body data-spy="scroll" data-target="#navbar-collapse-toggle" data-offset="70">
    <!-- page loading -->

    <!-- end page loading  <div id="loading">
        <div class="load-circle"><span class="one"></span></div>
    </div>-->
    <header>
        <nav class="navbar header-nav header-dark navbar-expand-lg">
            <div class="container">
                <!-- Brand -->
                <a class="navbar-brand" href="{{route('home')}}"> {{ $proName->name }}<span class="theme-bg"></span></a>
                <!-- / -->
                <!-- Mobile Toggle -->
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbar-collapse-toggle" aria-controls="navbar-collapse-toggle" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <!-- / -->
                <!-- Top Menu -->
                <div class="collapse navbar-collapse justify-content-end" id="navbar-collapse-toggle">
                    <ul class="navbar-nav ml-auto">
                        <li><a class="nav-link active" href="{{route('home')}}#home">Home</a></li>
                        <li><a class="nav-link" href="{{ route('home') }}#about">About Us</a></li>
                        <li><a class="nav-link" href="{{ route('home') }}#services">services</a></li>
                        <li><a class="nav-link" href="{{ route('home') }}#work">Portfolio</a></li>
                        <li><a class="nav-link" href="{{route('web.blog')}}#blog">Blog</a></li>
                        <li><a class="nav-link" href="{{ route('home') }}#contactus">Contact</a></li>
                    </ul>
                </div>
                <!-- / -->
            </div><!-- Container -->
        </nav> <!-- Navbar -->
    </header>
    <!-- Main -->
    <main>
        <section class="home-banner-01">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://template.canva.com/EAENvp21inc/1/0/1600w-qt_TMRJF4m0.jpg"
                            class="d-block w-100" alt="Slide 1">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 Style="color:white;">Blogs</h1>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Include jQuery -->




        <section id="blog" class="section">
            <div class="container">

                <div class="container mt-4">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Search and Category Sidebar -->
                            @php
                            $cats = App\Models\Category::orderBy('created_at', 'asc')->get();
                            $count=0;
                            @endphp
                            <div class="mb-4">
                                <h4>Search</h4>
                                <form method="GET" action="{{route('sort.category')}}">
                                    <div class="form-group">
                                        <!-- <label for="category">Category:</label> -->
                                        <select class="form-control" id="blog_category" name="blog_category" required>
                                            <option value="">All Categories</option>
                                            @foreach( $cats as $category)
                                            @php
                                            $count++;
                                            @endphp
                                            @php
                                            // Count the number of blogs for the current category
                                            $blogCount = App\Models\Blog::where('blog_cat',
                                            $category->cat_name)->count();
                                            @endphp
                                            @if($blogCount > 0)
                                            <option value="{{ $category->cat_name }}">{{ $category->cat_name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div>
                                <!-- Category List with Stock Status -->
                                <h4>Categories</h4>
                                <ul class="list-group">

                                    @foreach($cats as $category)
                                    @php
                                    // Count the number of blogs for the current category
                                    $blogCount = App\Models\Blog::where('blog_cat', $category->cat_name)->count();
                                    @endphp
                                    @if($blogCount > 0)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $category->cat_name }}
                                        <span class="badge bg-primary rounded-pill">{{ $blogCount }} Blog</span>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <!-- Product Cards -->
                            <div class="row">
                                <!-- Sample Product Card (Repeat for each product) -->
                                @php
                                $blogs = App\Models\Blog::orderBy('created_at', 'asc')->get();
                                @endphp

                                @foreach( $blogs as $blog)

                                <div class="col-lg-4 m-15px-tb">

                                    <div id="blogContainer" class="blog-grid ">

                                        <div class="blog-grid-item">
                                            <div class="blog-grid-img">
                                                <a href="{{ $blog->blog_link }}" target="_blank">
                                                    <img src="{{ asset('uploads/'. $blog->blog_image) }}" title=""
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="blog-gird-info">
                                                <div class="b-meta">
                                                <span class="date">{{ date('d M y', strtotime($blog->created_at)) }}</span>
                                                </div>
                                                <h5><a href="{{ $blog->blog_link }}"
                                                        target="_blank">{{ $blog->blog_title }}</a></h5>

                                                <div class="btn-grid">
                                                    <a class="m-btn-link" href="{{ $blog->blog_link }}"
                                                        target="_blank">Read More</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div> <!-- col -->

                                @endforeach
                                <!-- Repeat this product card for each product -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </section>
    </main>
    <!-- main end -->
    <!-- Footer-->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 m-10px-tb">
                    <div class="nav justify-content-center justify-content-md-start">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
                <div class="col-md-6 m-10px-tb text-center text-md-right">
                    <a href="{{route('login')}}">Login</a>
                    <!-- jquery -->


                    @include('frontend.include.script')
                    <!-- end -->
                    <!-- end body -->
</body>

</html>