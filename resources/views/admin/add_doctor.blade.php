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


      <div class="container-fluid page-body-wrapper">



        <div class="container" align="center" style="padding-top: 100px">


        
          @if(session()->has('message'))
          <div class="alert alert-success"> 
  
            <button type="button" class="close" data-dismiss="alert"> X </button>
            {{session()->get('message')}}
          </div>
  
          @endif

          <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name">Doctor Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Write name">
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="Write the number">
            </div>
            <div class="form-group">
              <label for="specialite">Specialite</label>
              <select class="form-control" id="specialite" name="specialite">
                <option value="">--- Select ---</option>
                <option value="skin">Skin</option>
                <option value="heart">Heart</option>
                <option value="eye">Eye</option>
                <option value="nose">Nose</option>
              </select>
            </div>
            <div class="form-group">
              <label for="room">Room Number</label>
              <input type="text" class="form-control" id="room" name="room" placeholder="Write the number of room">
            </div>
            <div class="form-group">
              <label for="image">Image</label>
              <input type="file" class="form-control-file"  name="file" ">
            </div>
            <button type="submit" style="background-color: rgb(0, 164, 33);color:aliceblue" class="btn btn-success">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @include('admin.js')
</body>



</html>
