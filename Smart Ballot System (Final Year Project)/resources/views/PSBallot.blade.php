@extends('layout.main')

@section('content')

<link rel="stylesheet" href="./assets/css/ballot.css">

<script>
    let valueToPass = null;
  </script>

<article id="home" class="content"><br>

  <div class="row d-flex justify-content-center">
    <div class="col-lg-8">
      <h2 class="sub-header " style="color: black; text-align: center;">PROVINCIAL ASSEMBLY OF SINDH</h2>
    </div>
    <div class="col-lg-2">
        <button type="button" id="btnSuccess" class="btn btn-success"  onclick="goToPS()" disabled>Proceed Logout</button>
      <script>
          document.querySelector('#btnSuccess').disabled = false;
        </script>
    </div>
  </div>


  <table class="table text-center">
      <tbody>
          <form name="myForm">
          <?php foreach($rows as $row): ?>
            <tr>
                <td class="col-sm-2"><img src="./public/flag_images/{{ $row['PARTY_FLAG'] }}"></td>
                <td class="col-sm-2"><img src="./public/Elect_flag_images/{{ $row['PARTY_ELECTORIAL_SIGN'] }}"></td>
                <td class="col-sm-3" style="font-size: 20px; font-weight: bold; ">{{ $row['PARTY_NAME'] }}‬‎</td>
                <td class="col-sm-2">
                  
                    <label>
                    <input type="radio"  name="radio"  onclick="saveName('<?php echo $row['PARTY_NAME'] ?>')"> <span class="label-text"></span>
                    </label>
                  
                </td>
            </tr>
          <?php endforeach ?>
        </form>
          
        </tr>
      </tbody>
  </table>
</article>

<script type="text/javascript">

function saveName(name){
  valueToPass = name;
}

function goToPS() {
  if(valueToPass !== null){
        $.ajax({
          url: root + 'PABallotSave',
          method: 'post',
          dataType: 'json',
          data: {
            name: valueToPass,
            _token: '{{ csrf_token() }}'

          },
          success: function(data){
            window.location = root + 'logout';
          },
          error: function(e){
            console.log(e.responseText);
            window.location = root + 'logout';
          }
        })
      }
      else{
        alert('Select A Party First');
      }
}

</script>
    
@endsection