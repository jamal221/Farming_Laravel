@extends('layouts.main')
@section('content2')

<div class="card-primary">
    <h3 class="card-title" style="align-items: end;">Defined Channels: </h3>
</div>
@foreach( $fetched_channels as $key=>$value)

<div class="card-body" id="div_channel{{$value->id}}" >
    <div style="padding: 20px" class="card card-primary"  >
        <div id="message{{$value->id}}"></div>
       <h1 class="text">Channel Options</h1>

                <div class="form-group">
                    <div class="container-flouid">
                        <div class="row">
                                <label for="channelType"> Channel type to Irrigation: </label>
                                <select class="form-group" id="channelType" name="channelType">
                                    <option value=""> Select Types</option>
                                    <option value="1" <?php if(($value->type)==1) echo "selected"; ?>> polymer</option>
                                    <option value="2" <?php if(($value->type)==2) echo "selected"; ?>> Soil</option>
                                    <option value="3" <?php if(($value->type)==3) echo "selected"; ?>> concrete</option>
                                    <option value="4" <?php if(($value->type)==4) echo "selected"; ?>> Soil Covered</option>
                                </select>                        
                        </div>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="channelWidth">channel width Irrigation( centimeters): </label>
                    <input type="text"  class="form-control" name="channelWidth" id="channelWidth" value="{{$value->width}}">
                </div>
                <div class="form-group">
                    <label for="pipSize">Pipe Size get water( inch):</label>
                    <input type="text"  class="form-control" name="pipSize" id="pipSize" value="{{$value->valveSize}}">
                </div>
                <div class="form-group">
                    <label for="waterHeightSensor">Water height from the valve surface (meters):</label>
                    <input type="text"  class="form-control" name="waterHeightSensor" id="waterHeightSensor" value="{{$value->heightWaterSensor}}">
                </div>
                <div class="form-group">
                    <label for="permission_water">Permission watter(Litter/ Second):</label>
                    <input type="text"  class="form-control" id="permission_water" name="permission_water" value="{{$value->water_permission_amount}}">
                </div>
                   
                <div class="form-group">
                    <button  class="btn btn-warning" id="update_channel_detials_btn"  onclick="updateChannel({{$value->id}})">Register Channel Detials</button>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden"  type="text" class="inputTable" name="channel_id_input" value={{$value->id}}>

        </div>
    </div>
@endforeach
      
    
        <script type="text/javascript">
          function updateChannel(Channel_id){
            var _token = $('input[name="_token"]').val();
            if(!confirm("Did you want to Update the detials of this channel to this farm?")) {
                  return false;
              };
            const main_div = document.querySelector('#div_channel'+Channel_id);
            const channelType=main_div.querySelector('#channelType').value;
            const channelWidth=main_div.querySelector('#channelWidth').value;
            const pipSize=main_div.querySelector('#pipSize').value;
            const waterHeightSensor=main_div.querySelector('#waterHeightSensor').value;
            const permission_water=main_div.querySelector('#permission_water').value;
            const tokenA=_token;
            const objectID=Channel_id;
            try{
                $.ajax({
                    url:"{{ route('updateChannel') }}",
                    method:"POST",
                    data:{
                        channelType:channelType,
                        channelWidth:channelWidth,
                        pipSize:pipSize,
                        waterHeightSensor:waterHeightSensor,
                        permission_water:permission_water,
                        WaterResouceID:objectID,
                        _token:tokenA
                    },
                    success: function(data){ // What to do if we succeed
                        $('#message'+Channel_id).html(data);
                        location.reload();
                    },
                    error: function(data){
                        $('#message'+Channel_id).html(data);
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