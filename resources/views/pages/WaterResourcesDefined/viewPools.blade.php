@extends('layouts.main')
@section('content2')

<div class="card-primary">
    <h3 class="card-title" style="align-items: end;">Pool Defined: </h3>
</div>
@foreach( $fetched_pools as $key=>$value)
<div class="card-body" id="div_pool{{$value->id}}" >
    <div style="padding: 20px" class="card card-primary"  >
        <div id="message{{$value->id}}"></div>
       <h1 class="text">Pool Options</h1>
            <div class="form-group">
                <div class="container-flouid">
                    <div class="row">
                            <label for="pool_type"> Pool Type: </label>
                            <select class="form-group" id="pool_type" name="pool_type">
                                <option value=""> Select pools</option>
                                <option value="1" <?php if(($value->type_pool)==1) echo "selected"; ?> > Soil</option>
                                <option value="2" <?php if(($value->type_pool)==2) echo "selected"; ?> > Stone</option>
                                <option value="3" <?php if(($value->type_pool)==3) echo "selected"; ?> > Soil Covered</option>
                            </select>                        
                    </div>
                    
                </div>
            </div>
                <div class="form-group">
                    <label for="length">Pool length(meters): </label>
                    <input type="text"  class="form-control" name="length" id="length" value="{{$value->lenght}}">
                </div>
                <div class="form-group">
                    <label for="width">Pool width:</label>
                    <input type="text"  class="form-control" name="width" id="width"  value="{{$value->width}}">
                </div>
                
                <div class="form-group">
                    <label for="deep">Pool deep:</label>
                    <input type="text"   class="form-control" id="deep" name="deep" value="{{$value->depth}}">
                </div>
                <div class="form-group">
                    <label for="YearMade">Year of operation of the pool</label>
                    <input type="text"   class="form-control" id="YearMade" name="YearMade" value="{{$value->buildTime}}">
                </div>
                <div class="form-group">
                    <label for="YearUse">Year of using the pool</label>
                    <input type="text"   class="form-control" id="YearUse" name="YearUse" value="{{$value->applyTime}}">
                </div>
                <div class="form-group">
                    <label for="water_height">pool water height (cm):</label>
                    <input type="text"  class="form-control" id="water_height" name="water_height" value="{{$value->water_height}}">
                </div>
                
                <div class="form-group">
                    <label for="inside_water">Volume of water (cubic meters):</label>
                    <input type="text"  class="form-control" id="inside_water" name="inside_water" value="{{$value->inside_water}}">
                </div>
                <div class="form-group">
                    <label for="permission_water">Permission watter(Litter/ Second):</label>
                    <input type="text"  class="form-control" id="permission_water" name="permission_water" value="{{$value->water_permission_amount}}">
                </div>
                <div class="form-group">
                    <button class="btn btn-warning" id="update_pool_detials_btn" onclick="updatewaterResorce({{$value->id}})">Update pool Detials</button>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden"  type="text" class="inputTable" name="pool_id_input" value="{{$value->id}}">
        </div>
    </div>

@endforeach
      
    
        <script type="text/javascript">
          function updatewaterResorce(WaterResource_id){
            var _token = $('input[name="_token"]').val();
            if(!confirm("Did you want to Update the detials of this pool to this farm?")) {
                  return false;
              };
            const main_div = document.querySelector('#div_pool'+WaterResource_id);
            const pool_type=main_div.querySelector('#pool_type').value;
            const length=main_div.querySelector('#length').value;
            const width=main_div.querySelector('#width').value;
            const deep=main_div.querySelector('#deep').value;
            const YearMade=main_div.querySelector('#YearMade').value;
            const YearUse=main_div.querySelector('#YearUse').value;
            const water_height=main_div.querySelector('#water_height').value;
            const inside_water=main_div.querySelector('#inside_water').value;
            const permission_water=main_div.querySelector('#permission_water').value;
            const tokenA=_token;
            const objectID=WaterResource_id;
            try{
                $.ajax({
                    url:"{{ route('updatePool') }}",
                    method:"POST",
                    data:{
                        pool_type:pool_type,
                        length:length,
                        width:width,
                        deep:deep,
                        YearMade:YearMade,
                        YearUse:YearUse,
                        water_height:water_height,
                        inside_water:inside_water,
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