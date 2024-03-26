

<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     

      @include('admin.sidebar')


      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->


        @include('admin.nav')


       @include('admin.body')
    <!-- container-scroller -->
    

    @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>