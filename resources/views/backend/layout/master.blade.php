<!DOCTYPE html>
<html lang="en">

<head>
  @include('backend.partial.header')
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('backend.partial.nav')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">      
      @include('backend.partial.sidebar')
      
      @yield('content')

      @include('backend.partial.footer')
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  @include('backend.partial.script')
</body>

</html>