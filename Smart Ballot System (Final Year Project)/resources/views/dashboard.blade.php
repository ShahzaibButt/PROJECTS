@extends('layout.admin')

@section('content')
  <!-- Page Content -->

<div class="row">
       <div class="col-lg-12">
         <div class="card mb-3">
           <div class="card-header">
            <i class="fas fa-chart-pie"></i> Province Votes Result</div>
           <div class="card-body">
               <div class="container table-responsive">
                  <div id='visualization'></div>
               </div>
<br>
<div class="container row">
     
 <div class="">
       <div class="col-sm-12">
         <div class="card mb-3">
           <div class="card-header" style="text-align: center;">SINDH</div>
           <div class="card-body">
             <div id="gaugeSindh"><span class="count">100</span></div>
           </div>
         </div>
       </div>
     </div>
          
  <div class="">
       <div class="col-sm-12">
         <div class="card mb-3">
           <div class="card-header" style="text-align: center;">BALOCHISTAN</div>
           <div class="card-body">
             <div id="gaugeBalochistan"><span class="count">200</span></div>
           </div>
         </div>
       </div>
     </div>

<div class="">
       <div class="col-sm-12">
         <div class="card mb-3">
           <div class="card-header" style="text-align: center;">PUNJAB</div>
           <div class="card-body">
             <div id="gaugePunjab"><span class="count">300</span></div>
           </div>
         </div>
       </div>
     </div>

  <div class="">
       <div class="col-sm-12">
         <div class="card mb-3">
           <div class="card-header" style="text-align: center;">KPK</div>
           <div class="card-body">
             <div id="gaugeKpk"><span class="count">400</span></div>
           </div>
         </div>
       </div>
     </div>

     <div class="">
       <div class="col-sm-12">
         <div class="card mb-3">
           <div class="card-header" style="text-align: center;">ISLAMABAD</div>
           <div class="card-body">
             <div id="gaugeIsl"><span class="count">500</span></div>
           </div>
         </div>
       </div>
     </div>

  <div class="">
       <div class="col-sm-12">
         <div class="card mb-3">
           <div class="card-header" style="text-align: center;">FATA</div>
           <div class="card-body">
             <div id="gaugeFata"><span class="count">600</span></div>
           </div>
         </div>
       </div>
     </div>

<div class="">
       <div class="col-sm-12">
         <div class="card mb-3">
           <div class="card-header" style="text-align: center;">GILGIT BALTISTAN</div>
           <div class="card-body">
             <div id="gaugeGilgit"><span class="count">700</span></div>
           </div>
         </div>
       </div>
     </div>
  
</div>

</div>
</div>

</div>
</div>


<div class="row">
       <div class="col-lg-12">
         <div class="card mb-3">
           <div class="card-header">
            <i class="fas fa-globe-asia"></i> Country Total Population</div>
           <div class="card-body">

             <div class="container table-responsive">

             <div id="regions_div"></div>
           </div>
           </div>
       </div>
   </div>
</div>



<!-- /.container-fluid -->
@endsection
