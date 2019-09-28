@extends('layout.admin')

@section('content')

<div class="container-fluid">
  <button type="button" class="btn btn-success" onclick="AddCandidateForm()">ADD CANDIDATES</button>
  <button type="button" class="btn btn-primary" onclick="UpdateCandidateForm()">UPDATE CANDIDATES</button>
  <button type="button" class="btn btn-danger" onclick="DeleteCandidateForm()">DELETE CANDIDATES</button>
  </div>
  
   <!-- Page Content Add Candidate-->
  <div id="Add" style="display: none;">
    <br>
      <div class="card mb-3">
        <div class="card-header"><i class="far fa-address-card"></i> Register an Candidates</div>
        <div class="card-body">
         <form action="addCandidate" method="POST" class="form-horizontal form-label-left">
  
  
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputFirstName">First Name</label>
        <input type="name" name="first_name" class="form-control" id="inputfname" pattern="^[A-Z]{1}[a-z]{2,}$" maxlength="10" placeholder="Imran" onkeypress="return onlyAlphabets(event)" onkeyup="btnDisable()" required>
      </div>
      <div class="form-group col-md-6">
        <label for="inputLastName">Last Name</label>
        <input type="name" name="last_name" class="form-control" id="inputlname" pattern="^[A-Z]{1}[a-z]{2,}$" maxlength="10" placeholder="Khan"onkeypress="return onlyAlphabets(event)" onkeyup="btnDisable()" required>
      </div>
      <div class="form-group col-md-6">
        <label for="inputPartyName">Party Name</label>
        <input type="name" name="party" class="form-control" id="inputpname" maxlength="30" placeholder="PTI" onkeypress="return alphaOnlyWithSpace(event)" onkeyup="btnDisable()" required>
      </div>
    </div>
    <div class="form-group">
      <label for="inputElectorialSign">Electorial Sign</label>
      <input type="text" name="electorial" class="form-control" id="inputSign" placeholder="Bat" onkeyup="btnDisable()" maxlength="25" required>
    </div>
  
    
    <!--Gender-->
  
    <div class="form-group">
        <label for="inputGender">Gender</label>
        <select id="inputGender" name="gender" class="form-control" onkeyup="btnDisable()" required>
          <option ></option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
    </div>
  
  <!--!!!!END Gender!!!!!-->
  
          <div class="form-group">
              <label for="inputCNIC">CNIC</label>
              
              <input type="text" name="cnic" maxlength="13" onkeypress="return isCNIC(event)" pattern="^[0-9+]{5}[0-9+]{7}[0-9]{1}$" name="cnic" class="form-control" name="cnic" id="inputCNIC" onkeyup="btnDisable()" placeholder="XXXXXXXXXXXXX" aria-describedby="basic-addon1" required>    
          </div>

   <!-- NA & PS CONSTITUENCY-->
   <div class="container">

            
    <label class="checkbox-inline">
    NA-CONSTITUENCY <input type="checkbox" value="" id="chkNA" onclick="checkStatusChk(this);">
    </label>
    <label class="checkbox-inline">
    PA-CONSTITUENCY <input type="checkbox" value="" id="chkPS" onclick="checkStatusChk(this);">
    </label>
    <label class="checkbox-inline">
      BOTH <input type="checkbox" value="" id="chkBoth" onclick="checkStatusChk(this);">
    </label>
  
  </div>
  <div class="form-row">
          <div class="form-group col-md-6">
              <label for="inputNA">NA-CONSTITUENCY</label>
              <input type="text" name="na" class="form-control" id="inputNA" placeholder="NA-XXX">
          </div>
          <div class="form-group col-md-6">
              <label for="inputPS">PS-CONSTITUENCY</label>
              <input type="name" name="pa" class="form-control" id="inputPS" placeholder="PA-XXX">
          </div>
      </div>
  <!--!!!!!END NA & PS CONSTITUENCY!!!!!-->
  <!--!!!!!END NA & PS CONSTITUENCY!!!!!-->
  
    <div class="form-row">
  
       <div class="form-group col-md-2">
        <label for="inputGender">Province/State</label>
        <select id="inputGender" name="state" name="ps" class="form-control" onkeyup="btnDisable()" required>
          <option ></option>
          <option value="Sindh">Sindh</option>
          <option value="Punjab">Punjab</option>
          <option value="Balochistan">Balochistan</option>
          <option value="KPK">Kpk</option>
          <option value="Gilgit Baltistan">Gilgit Baltistan</option>
        </select>
    </div>
    </div>
  
  
  
  
    <div>
    <button type="button" class="btn btn-warning"><b>Scan Finger Print</b></button>   
    <button type="submit"  class="btn btn-primary" id='btnRegister'><b>Register</b></button>
  </div>  
  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
  </form>
        </div>
      </div>
  </div>
  <!-- /.container-fluid Add Candidate -->
  
  
   <!-- Page Content Update Candidate-->
  <div id="Update" style="display: none;">
    <br>
      <div class="card mb-3">
        <div class="card-header"><i class="fa fa-address-card"></i> Update a Candidates</div>
        <div class="card-body">
  
          <div class="app-container app-login">
         <div class="flex-center">
         <div class="app-body">
         <div class="app-block">
         <div class="app-form">
          <div class="form-header">
              <div class="app-brand text-center"><b>ENTER CNIC NUMBER</b></div>
              </div>
              <br>
                <form action="edit" method="POST">
                  <div class="input-group">   
  
                    <input type="text" maxlength="13" onkeypress="return isCNIC(event)" pattern="^[0-9+]{5}[0-9+]{7}[0-9]{1}$" name="cnic" class="form-control" name="cnic" id="inputCNIC" placeholder="XXXXXXXXXXXXX" aria-describedby="basic-addon1" required>     
  
                  </div>
                      <div class="text-center">
                        <br>
                       <button type="submit" class="btn btn-success"><b>SUBMIT</b></button>
                      </div>
                      <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                  </form>
          </div>
      </div>         
  </div>    
  </div>
  </div>
  
         </div>
       </div>
     </div>
  
  <!-- /.container-fluid Update Candidate -->
  
  
   <!-- Page Content Delete Candidate-->
  <div id="Delete" style="display: none;">
    <br>
      <div class="card mb-3">
        <div class="card-header"><i class="fa fa-trash"></i> Delete an Candidates</div>
        <div class="card-body">
  
          <div class="app-container app-login">
         <div class="flex-center">
         <div class="app-body">
         <div class="app-block">
         <div class="app-form">
          <div class="form-header">
              <div class="app-brand text-center"><b>ENTER CNIC NUMBER</b></div>
              </div>
              <br>
                <form action="delete" id="deleteCandidate" method="POST">
                  <div class="input-group">   
  
                    <input type="text" maxlength="13" onkeypress="return isCNIC(event)" pattern="^[0-9+]{5}[0-9+]{7}[0-9]{1}$" name="cnic" class="form-control" name="cnic" id="inputCNIC" placeholder="XXXXXXXXXXXXX" aria-describedby="basic-addon1" required>     
                  </div>
                      <div class="text-center">
                        <br>
                        <a href="#deleteEmployeeModal" type="button" class="btn btn-danger" data-toggle="modal"><b>DELETE</b></a>
                      </div>
                      <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                  </form>
          </div>
      </div>         
  </div>    
  </div>
  </div>
  
         </div>
       </div>
     </div>  
    <!--/.container-fluid-->

    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <form>
              <div class="modal-header">						
                <h4 class="modal-title">Delete Candidate</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">					
                <p>Are you sure you want to delete this Record?</p>
              </div>
              <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <button type="button" onClick="deleteCandidate()" class="btn btn-danger">Delete</button>
              </div>
              <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
            </form>
          </div>
        </div>
      </div>

    <script type="text/javascript">
      function deleteCandidate(){
        $("#deleteCandidate").submit();
      }
    </script>
  
  
  
<!-- Register Candidate JavaScript-->
<script src="js/sb-admin-register-candidate.js"></script>


<script type="text/javascript">

      function AddCandidateForm() {
        document.getElementById("Add").style.display = "block";
        document.getElementById("Update").style.display = "none";
        document.getElementById("Delete").style.display = "none";
    }

function UpdateCandidateForm() {
        document.getElementById("Add").style.display = "none";
        document.getElementById("Update").style.display = "block";
        document.getElementById("Delete").style.display = "none";
    }

function DeleteCandidateForm() {
        document.getElementById("Add").style.display = "none";
        document.getElementById("Update").style.display = "none";
        document.getElementById("Delete").style.display = "block";
    }
</script>
 
<script>
    document.getElementById("inputNA").disabled = true;
    document.getElementById('inputPS').disabled = true;

  function checkStatusChk(status){
    var checkBoxNA = document.getElementById('chkNA');
    var checkBoxPS = document.getElementById('chkPS');
    var checkBoxBoth = document.getElementById('chkBoth');
    var textBoxPS = document.getElementById('inputPS');
    var textBoxNA = document.getElementById('inputNA');

    textBoxNA.disabled = true;
    textBoxPS.disabled = true;

    if(status == checkBoxPS && checkBoxPS.checked){
      textBoxPS.disabled = false;
      checkBoxPS.checked = true;
      checkBoxNA.checked = false;
      checkBoxBoth.checked = false;
    }
    if(status == checkBoxNA && checkBoxNA.checked){
      textBoxNA.disabled = false;
      checkBoxPS.checked = false;
      checkBoxNA.checked = true;
      checkBoxBoth.checked = false;
    }
    if(status == checkBoxBoth && checkBoxBoth.checked){
      checkBoxPS.checked = false;
      checkBoxNA.checked = false;
      checkBoxBoth.checked = true;
      textBoxPS.disabled = false;
      textBoxNA.disabled = false;
    }
  }
  

</script>
   
@endsection