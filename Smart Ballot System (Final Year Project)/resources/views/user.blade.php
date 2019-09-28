@extends('layout.admin')

@section('content')

  <div class="row">
          <div class="col-lg-12">
            <div class="card mb-3">
              <div class="card-header"><i class="fas fa-user"></i> User Manage</div>
              <div class="card-body">
                  <br>

  <div class="container">
      <div class="row">
              <div class="col-sm-8"><h2><b><i class="fas fa-user"></i> USER MANAGE</b></h2>
                        <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
              </div>
      </div>
      <br>
      <table class="table table-hover table-responsive">
        <thead class="thead-dark">
         <th>First Name</th>
         <th>Last Name</th>
         <th>Date</th>
         <th>Role</th>
         <th>Action</th>
        </thead>
        <tbody>
         <tr>
            <td>Kashan</td>
            <td>Baig</td>
            <td>24-Feb-19</td>
            <td>Super Admin</td>
            <td>
           
             <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
             <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
             <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
           </td>
        
         </tr>

          <tr>
            <td>Hamza</td>
            <td>ALam</td>
            <td>24-Feb-19</td>
            <td>Admin</td>
            <td>
           
             <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
             <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
             <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
           </td>
         </tr>
        </tbody>
      </table>
  </div>

   </div>
              <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
          </div>
</div>

@endsection
