@include('backend.layouts.header')

@include('backend.layouts.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    @include('backend.layouts.navbar')
    @yield('content')
</main>
@include('backend.layouts.footer')
