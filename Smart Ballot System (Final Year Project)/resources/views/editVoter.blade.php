@extends('layout.admin')

@section('content')
 <!-- Page Content -->

 <div class="card mb-3">
  <div class="card-header"><i class="far fa-address-card"></i> Edit Voter</div>
  <div class="card-body">
   <form action="update" method="POST" class="form-horizontal form-label-left">

   <form>
<div class="form-row">
<div class="form-group col-md-6">
  <label for="inputFirstName">First Name</label>
  <input type="name" value="{{ $voter['firstName'] }}" name="first_name" class="form-control" id="inputfname"  maxlength="10" placeholder="Imran" onkeypress="return onlyAlphabets(event)" onkeyup="btnDisable()" required>
</div>
<div class="form-group col-md-6">
  <label for="inputLastName">Last Name</label>
  <input type="name" value="{{ $voter['lastName'] }}" name="last_name" class="form-control" id="inputlname"  maxlength="10" placeholder="Khan" onkeypress="return onlyAlphabets(event)" onkeyup="btnDisable()" required>
</div>
<div class="form-group col-md-6">
  <label for="inputFatherName">Father Name</label>
   <input type="name" value="{{ $voter['fatherName'] }}" name="father_name" class="form-control" id="inputfaname"  maxlength="22" placeholder="Muhammad Jinnah" onkeypress="return alphaOnlyWithSpace(event)" onkeyup="btnDisable()" required>
</div>
</div>
<div class="form-group">
<label for="inputAddress">Address</label>
<input type="text" value="{{ $voter['address'] }}" name="address" class="form-control" id="inputAddress" placeholder="B-413, Bisma Residency, Block#13, Gulistan-e-Jauhar, Karachi" onkeyup="btnDisable()" required>
</div>

<!--Date of birth + Age + Gender-->
<div class="form-row">
<div class="well"> 
  <div class="form-group">
  <label for="DOB">Date of Birth</label>
  <input type="date" value="{{ $voter['birthdate'] }}" name="dob" class="form-control" id="inputDOB" placeholder="Date of Birth" onkeyup="btnDisable()" required>
</div>
</div>
<div class="well"> 
</div>
<div class="well"> 

<div class="form-group col-md-6">
    <label for="inputAge">Age</label>
    <input type="number" value="{{ $voter['age'] }}" name="age"  id="inputAge" placeholder="18+" min="18" max="150" onkeyup="btnDisable()" required>
</div>
</div>

<div class="form-group col-md-2">
  <label for="inputGender">Gender</label>
  <select id="inputGender" selected="{{ $voter['gender'] }}" name="gender" class="form-control" onkeyup="btnDisable()" required>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
  </select>

</div>

</div>
<!--!!!!END Date of birth + Age + Gender!!!!!-->
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputNationality">Nationality</label>
       <input type="name" value="{{ $voter['nationality'] }}" name="nationality" class="form-control" id="inputNationality" onkeypress="return onlyAlphabets(event)" pattern="[A-Z]{1}[a-z]{2,}" placeholder="Pakistan" maxlength="12" onkeyup="btnDisable()" required>
    </div>
    <div class="form-group col-md-6">
        <label for="inputCNIC">CNIC</label>
          <input type="text" value="{{ $voter['cnic'] }}" name="cnic" maxlength="13" onkeypress="return isCNIC(event)" pattern="^[0-9+]{5}[0-9+]{7}[0-9]{1}$" name="cnic" class="form-control" name="cnic" id="inputCNIC"  placeholder="XXXXXXXXXXXXX" aria-describedby="basic-addon1" onkeyup="btnDisable()" required> 
    </div>
</div>

<!-- NA & PS CONSTITUENCY-->
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputNA">NA-CONSTITUENCY</label>
        <input type="text" value="{{ $voter['naConst'] }}" name="na" class="form-control" id="inputNA"  placeholder="NAXXX" pattern="^[A-Z]{2}[0-9+]{1,}$" required>
    </div>
    <div class="form-group col-md-6">
        <label for="inputPS">PA-CONSTITUENCY</label>
        <input type="name" value="{{ $voter['psConst'] }}" name="pa" class="form-control" id="inputPS" placeholder="PSXXX" pattern="^[A-Z]{2}[0-9+]{1,}$" onkeyup="btnDisable()" required>
    </div>
</div>
<!--!!!!!END NA & PS CONSTITUENCY!!!!!-->

<div class="form-row">
<div class="form-group col-md-6">
  <label for="inputCity">City</label>
  <input type="text" value="{{ $voter['city'] }}" name="city" class="form-control" onkeypress="return onlyAlphabets(event)" pattern="(?:[A-Z][a-z.-]+[ ]?)+" placeholder="Karachi" id="inputCity" onkeyup="btnDisable()" required>
</div>
<div class="form-group col-md-2">
  <label for="inputGender">Province/State</label>
  <select id="inputGender" selected="{{ $voter['province'] }}" name="state" class="form-control" onkeyup="btnDisable()" required>
   
    <option value="Sindh">Sindh</option>
    <option value="Punjab">Punjab</option>
    <option value="Balochistan">Balochistan</option>
    <option value="KPK">KPK</option>
    <option value="Gilgit Baltistan">Gilgit Baltistan</option>
  </select>
</div>
</div>

<div>  
<button type="submit"  class="btn btn-primary" id='btnRegister'>Update</button>
</div>  
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
</form>
  </div>
</div>

@endsection