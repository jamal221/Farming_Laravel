@extends('layouts.main')
@section('content2')

<div class="card-primary">
    <h3 class="card-title" style="align-items: end;">River Defined: </h3>
</div>
@foreach( $fetched_river as $key=>$value)
        <div class="card-body" id="div_river{{$value->id}}" >
            <div style="padding: 20px" class="card card-primary"  >
                <div id="message{{$value->id}}"></div>
            <h1 class="text">River Options</h1>
                        <div class="form-group">
                            <label for="depth">placement depth: </label>
                            <input type="text"  class="form-control" name="depth" id="depth"  value="{{$value->sensor_depth}}">
                        </div>
                        <div class="form-group">
                            <label for="Pipe">Pipe size of water(inch):</label>
                            <input type="text"  class="form-control" name="Pipe" id="Pipe"  value="{{$value->pip_size}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="height"> Water height from the valve surface (meters):</label>
                            <input type="text"   class="form-control" id="height" name="height"   value="{{$value->height}}">
                        </div>
                        <div class="form-group">
                            <label for="permission_water">Permission watter(Litter/ Second):</label>
                            <input type="text"  class="form-control" id="permission_water" name="permission_water" value="{{$value->water_permission_amount}}">
                        </div>
                        <div class="form-group">
                            <button  class="btn btn-warning" id="update_river_detials_btn" onclick="updatewaterResorce({{$value->id}})">Update River Detials</button>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden"  type="text" class="inputTable" name="river_id_input" value={{$value->id}}>
                </div>
        </div>
   

@endforeach
      
    
        <script type="text/javascript">
          function updatewaterResorce(WaterResource_id){
            var _token = $('input[name="_token"]').val();
            if(!confirm("Did you want to Update the detials of this river to this farm?")) {
                  return false;
              };
            const main_div = document.querySelector('#div_river'+WaterResource_id);
            const depth=main_div.querySelector('#depth').value;
            const Pipe=main_div.querySelector('#Pipe').value;
            const height=main_div.querySelector('#height').value;
            const permission_water=main_div.querySelector('#permission_water').value;
            const tokenA=_token;
            const objectID=WaterResource_id;
            try{
                $.ajax({
                    url:"{{ route('updateRiver') }}",
                    method:"POST",
                    data:{
                        depth:depth,
                        Pipe:Pipe,
                        height:height,
                        permission_water:permission_water,
                        WaterResouceID:objectID,
                        _token:tokenA
                    },
                    success: function(data){ // What to do if we succeed
                        $('#message'+WaterResource_id).html(data);
                        location.reload();
                    },
                    error: function(data){
                        $('#message'+WaterResource_id).html(data);
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