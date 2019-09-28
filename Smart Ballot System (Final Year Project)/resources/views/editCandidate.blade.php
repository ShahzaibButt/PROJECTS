@extends('layout.admin')

@section('content')
<!-- Page Content -->

<div class="card mb-3">
  <div class="card-header"><i class="far fa-address-card"></i> Update a Candidates</div>
  <div class="card-body">
   <form action="update" method="POST" class="form-horizontal form-label-left">


<div class="form-row">
<div class="form-group col-md-6">
  <label for="inputFirstName">First Name</label>
  <input type="name" name="firstName" class="form-control" value="{{ $candidate['firstName'] }}" id="inputfname" pattern="^[A-Z]{1}[a-z]{2,}$" maxlength="10" placeholder="Imran" onkeypress="return onlyAlphabets(event)" onkeyup="btnDisable()" required>
</div>
<div class="form-group col-md-6">
  <label for="inputLastName">Last Name</label>
  <input type="name" name="lastName" class="form-control" value="{{ $candidate['lastName'] }}"  id="inputlname" pattern="^[A-Z]{1}[a-z]{2,}$" maxlength="10" placeholder="Khan"onkeypress="return onlyAlphabets(event)" onkeyup="btnDisable()" required>
</div>
<div class="form-group col-md-6">
  <label for="inputPartyName">Party Name</label>
  <input type="name" name="party" class="form-control" value="{{ $candidate['party'] }}"  id="inputpname" maxlength="30" placeholder="PTI" onkeypress="return alphaOnlyWithSpace(event)" onkeyup="btnDisable()" required>
</div>
</div>
{{-- <div class="form-group">
<label for="inputElectorialSign">Electorial Sign</label>
<input type="text" class="form-control" id="inputSign" placeholder="Bat" onkeyup="btnDisable()" maxlength="25" required>
</div> --}}


<!--Gender-->

<div class="form-group">
  <label for="inputGender">Gender</label>
  <select id="inputGender" name="gender" selected="{{ $candidate['gender'] }}" class="form-control" onkeyup="btnDisable()" required>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
  </select>
</div>

<!--!!!!END Gender!!!!!-->

    <div class="form-group">
        <label for="inputCNIC">CNIC</label>
        
        <input type="text" name="cnic" value="{{ $candidate['cnic'] }}"  maxlength="13" onkeypress="return isCNIC(event)" pattern="^[0-9+]{5}[0-9+]{7}[0-9]{1}$" name="cnic" class="form-control" name="cnic" id="inputCNIC" onkeyup="btnDisable()" placeholder="XXXXXXXXXXXXX" aria-describedby="basic-addon1" required>    
    </div>


<!-- NA CONSTITUENCY-->

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputNA">NA-CONSTITUENCY</label>
        <input type="text" name="na" value="{{ $candidate['na'] }}"  class="form-control" id="inputNA" onkeyup="btnDisable()" placeholder="NAXXX" pattern="^[A-Z]{2}[0-9+]{1,}$">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPS">PA-CONSTITUENCY</label>
      <input type="name" name="pa" value="{{ $candidate['pa'] }}" name="pa" class="form-control" id="inputPS" placeholder="PAXXX">
  </div>

</div>
<!--!!!!!END NA & PS CONSTITUENCY!!!!!-->

<div class="form-row">

 <div class="form-group col-md-2">
  <label for="inputGender">Province/State</label>
  <select id="inputGender" name="state" selected = "{{ $candidate['state'] }}"  class="form-control" onkeyup="btnDisable()" required>
    <option value="Sindh">Sindh</option>
    <option value="Punjab">Punjab</option>
    <option value="Balochistan">Balochistan</option>
    <option value="Kpk">Kpk</option>
    <option value="Gilgit Baltistan">Gilgit Baltistan</option>
  </select>
</div>
</div>




<div>
<button type="submit"  class="btn btn-primary" id='btnRegister'><b>Update</b></button>
</div>  
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
</form>
  </div>
</div>

<!-- /.container-fluid Add Candidate -->
 @endsection