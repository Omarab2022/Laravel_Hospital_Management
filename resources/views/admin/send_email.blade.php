<!DOCTYPE html>
<html lang="en">
<head>
  <base href="/public">
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
  

    
    <div class="container" style="margin-top: 40px">
        <div class="row justify-content-center mt-5">
          <div class="col-md-6">

            @if(session()->has('message'))
            <div class="alert alert-success"> 
    
              <button type="button" class="close" data-dismiss="alert"> X </button>
              {{session()->get('message')}}
            </div>
    
            @endif
            <form action="{{url('send_email' , $data->id)}}" method="POST">
              
              @csrf
             
                <div class="form-group">
                    <label for="name">Greeting</label>
                    <input type="text" class="form-control" id="name" name="greeting" >
                  </div>

                  <div class="form-group">
                    <label for="name">Body</label>
                    <input type="text" class="form-control" id="name" name="body" >
                  </div>

              <div class="form-group">
                <label for="name">Action Text</label>
                <textarea name="actionText"  style="height: 300px" class="form-control" rows="3" placeholder="Votre message"></textarea>
              </div>

              <div class="form-group">
                <label for="name">Action Url</label>
                <input type="text" name="actionURL" class="form-control" id="name" >
              </div>

              <div class="form-group">
                <label for="name">End Part</label>
                <input type="text" name="endpart" class="form-control" id="name" >
              </div>

              <button type="submit" style="background-color:rgb(112, 57, 112) " class="btn btn-info btn-block">Envoyer</button>
            </form>
          </div>
        </div>
      </div>


    @include('admin.js')
    <!-- End custom js for this page -->
</body>
</html>
