<body class="g-sidenav-show  bg-gray-200">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
      <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
          <img src="{{ asset('backend/img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
          <span class="ms-1 font-weight-bold text-white">Material Dashboard 2</span>
        </a>
      </div>
      <hr class="horizontal light mt-0 mb-2">
      <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-white active bg-gradient-primary" href="{{ route('home') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">dashboard</i>
              </div>
              <span class="nav-link-text ms-1">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="{{ route('categories.index') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">table_view</i>
              </div>
              <span class="nav-link-text ms-1">Category</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="{{ route('products.index') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">receipt_long</i>
              </div>
              <span class="nav-link-text ms-1">Product</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="{{ route('sliders.index') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">view_in_ar</i>
              </div>
              <span class="nav-link-text ms-1">Slider</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="{{ route('testimonials.index') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">view_in_ar</i>
              </div>
              <span class="nav-link-text ms-1">Testimonial</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="{{ route('experiences.index') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
              </div>
              <span class="nav-link-text ms-1">Experiences</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="{{ route('blogs.index') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">notifications</i>
              </div>
              <span class="nav-link-text ms-1">Blogs</span>
            </a>
          </li>
          <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="{{ route('profiles.index') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">person</i>
              </div>
              <span class="nav-link-text ms-1">Profile</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="../pages/sign-in.html">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">login</i>
              </div>
              <span class="nav-link-text ms-1">Key Skill</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
          <a class="btn btn-outline-primary mt-4 w-100" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            </div>
            <span class="nav-link-text ms-1"> Logout</span>
          </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
         </div>
      </div>
    </aside>