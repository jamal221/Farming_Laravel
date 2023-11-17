@extends('layouts.main')
@section('content2')

<div class="card-primary">
    <h3 class="card-title" style="align-items: end;">Pits Defined: </h3>
</div>
@foreach( $fetched_pits as $key=>$value)
<div class="card-body" id="div_pit{{$value->id}}" >
    <div style="padding: 20px" class="card card-primary" >
        <div id="message{{$value->id}}"></div>
       <h1 class="text">Pit Options</h1>
        {{-- <form method="POST" name="pitForm"  id="pitForm"> --}}
            <div class="form-group">
                <div class="container-flouid">
                    <div class="row">
                            <label for="pit_type"> Pit Types: </label>
                            <select class="form-group" id="pit_type" name="pit_type">
                                <option> Select pits</option>
                                <option value="1" <?php if (($value->type)==1) echo "selected"; ?>> wide opening</option>
                                <option value="2" <?php if (($value->type)==2) echo "selected"; ?>> Deep</option>
                            </select>                        
                    </div>
                    
                </div>
            </div>
            <div class="form-group">
                <div class="container-flouid">
                    <div class="row">
                            <label for="pit_body"> Pit Body type: </label>
                            <select id="pit_body" class="form-group" name="pit_body">
                                <option> Select pits body</option>
                                <option value="1" <?php if (($value->bodyType)==1) echo "selected"; ?>> Soil</option>
                                <option value="2" <?php if (($value->bodyType)==2) echo "selected"; ?>> Stone</option>
                            </select>                        
                    </div>
                    
                </div>
            </div>
                <div class="form-group">
                    <label for="Diameter">Diameter of the well opening (centimeters): </label>
                    <input  type="text"  class="form-control" name="Diameter" id="Diameter" value="{{$value->diameter}}" >
                </div>
                <div class="form-group">
                    <label for="pit_height">Height:</label>
                    <input type="text"  class="form-control" name="pit_height" id="pit_height" value="{{$value->chahHeight}}" >
                </div>
                <div class="form-group">
                    <label for="YearMade">Year of make of the pit:</label>
                    <input type="text"   class="form-control" id="YearMade" name="apply_year" value="{{$value->year}}">
                </div>
                <div class="form-group">
                    <label for="YearUse">Year of use the pit:</label>
                    <input type="text"   class="form-control" id="YearUse" name="YearUse" value="{{$value->useYear}}">
                </div>
                <div class="form-group">
                    <label for="water_height">water height (cm):</label>
                    <input type="text"  class="form-control" id="water_height" name="water_height" value="{{$value->waterHeight}}">
                </div>
                
                <div class="form-group">
                    <label for="incide_water">Volume of water (cubic meters):</label>
                    <input type="text"  class="form-control" id="incide_water" name="incide_water" value="{{$value->wateramount}}">
                </div>
                <div class="form-group">
                    <label for="permission_water">Permission watter(Litter/ Second):</label>
                    <input type="text"  class="form-control" id="permission_water" name="permission_water" value="{{$value->water_permission_amount}}">
                </div>
                <div class="form-group">
                    <button  class="btn btn-warning" id="update_pit_detials_btn" onclick="updatePit({{$value->id}})">Update Pit Detials</button>
                </div>
                <input type="hidden" name="_token" id="tokenA" value="{{ csrf_token() }}">
                <input type="hidden"  type="text" class="inputTable" name="chah_id_input" value="{{$value->id}}">

            {{-- </form> --}}
        </div>
</div>
@endforeach
      
    
        <script type="text/javascript">
          function updatePit(pit_id){
            var _token = $('input[name="_token"]').val();
            if(!confirm("Did you want to Update the detials of this pit to this farm?")) {
                  return false;
              };
            const main_div = document.querySelector('#div_pit'+pit_id);
            const pit_type=main_div.querySelector('#pit_type').value;
            const pit_body=main_div.querySelector('#pit_body').value;
            const Diameter=main_div.querySelector('#Diameter').value;
            const pit_height=main_div.querySelector('#pit_height').value;
            const YearMade=main_div.querySelector('#YearMade').value;
            const YearUse=main_div.querySelector('#YearUse').value;
            const water_height=main_div.querySelector('#water_height').value;
            const incide_water=main_div.querySelector('#water_height').value;
            const permission_water=main_div.querySelector('#permission_water').value;
            const tokenA=_token;
            const objectID=pit_id;
            try{
                $.ajax({
                    url:"{{ route('UpdateChah') }}",
                    method:"POST",
                    data:{
                        pit_type:pit_type,
                        pit_body:pit_body,
                        Diameter:Diameter,
                        pit_height:pit_height,
                        YearMade:YearMade,
                        YearUse:YearUse,
                        water_height:water_height,
                        incide_water:incide_water,
                        permission_water:permission_water,
                        WaterResouceID:objectID,
                        _token:tokenA
                    },
                    success: function(data){ // What to do if we succeed
                        $('#message'+pit_id).html(data);
                        location.reload();
                    },
                    error: function(data){
                        $('#message').html(data);
                        location.reload();
                    }
                })
            }
            catch (e) {
                alert("Please pay attention to your value again");
            }
          }

          </script>
          
@endsection