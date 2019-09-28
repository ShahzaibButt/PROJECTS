@extends('layout.admin')

@section('content')
	<!-- Page Content -->
 
    <div class="card mb-3">
        <div class="card-header"><i class="fas fa-vote-yea"></i> Manage Ballot Paper</div>
        <div class="card-body">
         <form action="addBallotPaper" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data">
  
         <form>

<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2><i class="fas fa-vote-yea"></i> <b>Manage</b> <b>Ballot Paper</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Ballot Paper</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
                        <th>Flag</th>
                        <th>Electorial Sign</th>
						<th>Party Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
					<form name="myForm">
					<?php foreach($parties as $party): ?>
                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td class="col-xm-2"><img src="../public/flag_images/{{ $party['PARTY_FLAG'] }}"> </td>
                        <td class="col-xm-2"><img src="../public/Elect_flag_images/{{ $party['PARTY_ELECTORIAL_SIGN'] }}"></td>
						<td>{{ $party['PARTY_NAME'] }}</td>
                       
                        <td>
                            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
						<?php endforeach ?>
					</form>
					</tr>
					
                </tbody>
            </table>
			<div class="clearfix">
                <div class="hint-text">Showing <b>15</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
            <form action="addBallotPaper" method="POST" enctype="multipart/form-data">
					<div class="modal-header">						
						<h4 class="modal-title">Add Ballot Paper</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Flag</label>
							 <td>
							 	<div class="form-group">
									<input name="flag" type="file" id="BSbtndanger" required>
								</div>
                        	</td>
						</div>
						<div class="form-group">
							<label>Electorial Sign</label>
							 <td>
							 	<div class="form-group">
									<input name="ElectFlag" type="file" id="BSbtndanger" required>
								</div>
                        	</td>
						</div>
						<div class="form-group">
							<label>Party Name</label>
							<textarea name="partyName" class="form-control" required></textarea>
                        </div>	
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">			
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
                    </div>
                    
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Edit Ballot Paper</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Flag</label>
							 <td>
							 	<div class="form-group">
									<input type="file" id="BSbtndanger" required>
								</div>
                        	</td>
						</div>
						<div class="form-group">
							<label>Electorial Sign</label>
							 <td>
							 	<div class="form-group">
									<input type="file" id="BSbtndanger" required>
								</div>
                        	</td>
						</div>
						<div class="form-group">
							<label>Party Name</label>
							<textarea class="form-control" required></textarea>
						</div>				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Delete Ballot Paper</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>

	</div>
</div>
<!-- /.container-fluid --> 

@endsection