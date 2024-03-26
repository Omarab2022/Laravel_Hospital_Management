

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



  <div style="padding: 70px">
    <table id="appointmentsTable" class="table table-striped">
      <thead>
          <tr>
              
              <th>Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Doctor</th>
              <th>Date</th>
              <th>Message</th>
              
              <th>Status</th>
             
              <th>Approved</th>
              <th>Canceled</th>
              <th>Mail</th>
          </tr>
      </thead>
      <tbody>
          @foreach($appointment as $appointments)
          <tr>
              
              <td>{{ $appointments->name }}</td>
              <td>{{ $appointments->phone }}</td>
              <td>{{ $appointments->email }}</td>
              <td>{{ $appointments->doctor }}</td>
              <td>{{ $appointments->date }}</td>
              <td>{{ $appointments->message }}</td>
              
              <td ><a class="btn btn-info">{{ $appointments->status }}</a>
                 </td>
  
                

                   <td><a class="btn btn-success" 
                    href="{{url('approved',$appointments->id)}}">Approved</a></td>

                    <td><a class="btn btn-danger" 
                        href="{{url('canceled',$appointments->id)}}">Canceled</a></td>

                        <td><a class="btn btn-warning" 
                            href="{{url('email',$appointments->id)}}">Send</a></td>
          </tr>
          @endforeach
      </tbody>
  </table>

    

    @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>