

<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')

   <style>
    /* Ajoutez le style pour augmenter la largeur de la table */
    #appointmentsTable {
      width: 1000px; /* Vous pouvez ajuster cette valeur selon vos besoins */
    }
  </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     

      @include('admin.sidebar')


      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->


        @include('admin.nav')



  <div style="padding: 100px" >
    <table id="appointmentsTable" class="table table-striped" >
      <thead>
          <tr>
              
              <th>Name</th>
              <th>Phone</th>
              <th>Specialite</th>
              <th>Room</th>
              <th>Image</th>
              <th>Delete</th>
              <th>Update</th>
          </tr>
      </thead>
      <tbody>
          @foreach($doctor as $doctors)
          <tr>
              
              <td>{{ $doctors->name }}</td>
              <td>{{ $doctors->phone }}</td>
              <td style="color: rgb(160, 89, 89)">{{ $doctors->specialite }}</td>
              <td>{{ $doctors->room }}</td>
              <td> <img style="width: 100px ; height:100px" src="doctorimage/{{$doctors->image}}" alt=""></td>
             
              <td><a class="btn btn-danger"  onclick="return confirm('are you sure ???')"
                href="{{url('delete',$doctors->id)}}">Delete</a></td>

                <td><a class="btn btn-success" 
                    href="{{url('update',$doctors->id)}}">Update</a></td>
              
          </tr>
          @endforeach
      </tbody>
  </table>

    

    @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>