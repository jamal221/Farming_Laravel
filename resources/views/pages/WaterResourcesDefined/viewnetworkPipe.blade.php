@extends('layouts.main')
@section('content2')

<div class="card-primary">
    <h3 class="card-title" style="align-items: end;">Network Pipe Defined: </h3>
</div>
@foreach( $fetched_pips as $key=>$value)

<div class="card-body" id="div_pipes{{$value->id}}" >
    <div style="padding: 20px" class="card card-primary"  >
        <div id="message{{$value->id}}"></div>
       <h1 class="text">Network Pipe Options</h1>
                <div class="form-group">
                    <div class="container-flouid">
                        <div class="row">
                                <label for="pipeType"> Pipe type to Irrigation: </label>
                                <select class="form-group" id="pipeType" name="pipeType">
                                    <option value=""> Select Types</option>
                                    <option value="1" <?php if(($value->type)==1) echo "selected"; ?> > polymer</option>
                                    <option value="2" <?php if(($value->type)==2) echo "selected"; ?> > metallic</option>
                                    <option value="3" <?php if(($value->type)==3) echo "selected"; ?> > concrete</option>
                                </select>                        
                        </div>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="diameterIrrigate">Pipe Diameter Irrigation (inch): </label>
                    <input type="text"  class="form-control" name="diameterIrrigate" id="diameterIrrigate" value="{{$value->netpipD}}">
                </div>
                <div class="form-group">
                    <label for="diameterWater">Pipe Diameter get water (inch):</label>
                    <input type="text"  class="form-control" name="diameterWater" id="diameterWater" value="{{$value->pipwaterD}}">
                </div>
                <div class="form-group">
                    <label for="permission_water">Permission watter(Litter/ Second):</label>
                    <input type="text"  class="form-control" id="permission_water" name="permission_water" value="{{$value->water_permission_amount}}">
                </div>
                <div class="form-group">
                    <button  class="btn btn-warning" id="update_pipe_detials_btn" onclick="updatewaterResorce({{$value->id}})">Register Pipes Detials</button>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden"  type="text" class="inputTable" name="pipe_id_input" value={{$value->id}}>
        </div>
</div>
@endforeach
      
    
        <script type="text/javascript">
          function updatewaterResorce(WaterResource_id){
            var _token = $('input[name="_token"]').val();
            if(!confirm("Did you want to Update the detials of this Network pipe to this farm?")) {
                  return false;
              };
            const main_div = document.querySelector('#div_pipes'+WaterResource_id);
            const pipeType=main_div.querySelector('#pipeType').value;
            const diameterIrrigate=main_div.querySelector('#diameterIrrigate').value;
            const diameterWater=main_div.querySelector('#diameterWater').value;
            const permission_water=main_div.querySelector('#permission_water').value;
            const tokenA=_token;
            const objectID=WaterResource_id;
            // console.log({
            //     "channelType":channelType,
            //     "channelWidth":channelWidth,
            //     "pipSize":pipSize,
            //     "waterHeightSensor":waterHeightSensor,
            //     "WaterResouceID":objectID,
            //     "_token":tokenA

            // });
            try{
                $.ajax({
                    url:"{{ route('updatePipe') }}",
                    method:"POST",
                    data:{
                        pipeType:pipeType,
                        diameterIrrigate:diameterIrrigate,
                        diameterWater:diameterWater,
                        WaterResouceID:objectID,
                        permission_water,permission_water,
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