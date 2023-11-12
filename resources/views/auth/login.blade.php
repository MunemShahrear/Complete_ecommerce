<!DOCTYPE html>
<html lang="en">
  <head>
  @include('backend.includes.header')
 
    @include('backend.includes.css')
  </head>
  <body>
    <!-- Loader starts-->
    @include('backend.includes.preloader')
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <section>         
      <div class="container-fluid p-0">
        <div class="row">
          <div class="col-12">
            <div class="login-card">
               <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
              <form action="{{ route('login') }}" method="POST" class="theme-form login-form">
                @csrf
                <div class="text-center">
                <h4 class="">Login</h4>
                </div><br>
                
                <div class="form-group">
                  <label>Email Address</label>
                  <div class="input-group"><span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    <input class="form-control" type="email"
                    name="email" value="{{ old('email') }}" required="" placeholder="Test@mail.com">
                    
                  </div>
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
   
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                    <input class="form-control" type="password" name="password" required="" placeholder="*********">
                    <div class="show-hide">
                      <span class="toggle" onclick="togglePasswordVisibility()"> <i class="fa fa-eye " aria-hidden="true"></i></span>
                    </div>
                  </div>
                 <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
 


               <!-- <div class="form-group">
                  <div class="checkbox">
                    <input id="checkbox1" type="checkbox">
                    <label for="checkbox1">Remember password</label>
                  </div><a class="link" href="forget-password.html">Forgot password?</a>
                </div> -->
                <div class="form-group">
                  <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                </div>
               <!-- <div class="login-social-title">                
                  <h5>Sign in with</h5>
                </div>
                <div class="form-group">
                  <ul class="login-social">
                    <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="linkedin"></i></a></li>
                    <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="twitter"></i></a></li>
                    <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="facebook"></i></a></li>
                    <li><a href="https://www.instagram.com/login" target="_blank"><i data-feather="instagram">                  </i></a></li>
                  </ul>
                </div>
                <p>Don't have account?<a class="ms-2" href="{{ route('register') }}">Create Account</a></p> --> 
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- page-wrapper end-->
    @include('backend.includes.scripts')
  </body>
</html>