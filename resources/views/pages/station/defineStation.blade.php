@extends('layouts.main')
@section('content2')

<div class="card-primary">
    <h3 class="card-title" style="align-items: end;">Water Resources Management</h3>
</div>
      
 <div style="width: 150%">      
        <table class="table table-bordered"  id="Costumer_Table" style="width: 150%">
            <thead>
            <tr>
                <th>Row</th>
                <th>Name</th>
                <th>Famiy</th>
                <th>Address</th>
                <th>Mobile</th>
                <th>Farm Size</th>
                <th>Unit Count</th>
                <th>Operation</th>
            </tr>
            </thead>
            <tbody>
            @php
                $count_row=1
            @endphp
            {{-- @if(!empty($fetched_farms)) --}}
            @if(1==1)
                @foreach($fetched_farms as $key => $value)
                    <tr>
                        <td  class="column_name" data-column_name="costumer_count" data-id={{ $value->FarmID }}>{{$count_row}}</td>
                        <td   class="column_name" data-column_name="costumer_name" data-id={{ $value->FarmID }}>{{ $value->name }}</td>
                        <td   class="column_name" data-column_name="costumer_family" data-id={{ $value->FarmID }}>{{ $value->family }}</td>
                        <td   class="column_name" data-column_name="costumer_add"  data-id={{ $value->FarmID }}> {{ $value->Address }}     </td>
                        <td   class="column_name" data-column_name="costumer_mobile"  data-id={{ $value->FarmID }}> {{ $value->mobile }}     </td>
                        <td  hidden class="column_name" data-column_name="costumer_farm_main"  data-id={{ $value->FarmID }}> {{ $value->farm_size }} </td>
                        <td   class="column_name" data-column_name="costumer_farm"  data-id={{ $value->FarmID }}> {{ number_format($value->farm_size) }}  m^2   </td>
                        <td   class="column_name" data-column_name="costumer_farm"  data-id={{ $value->FarmID }}> {{ $value->farm_unit }}     </td>
                    </tr>
                    @php
                        $count_row+=1
                    @endphp
    
           
            </tbody>
        </table>
 </div>
        
        <div class="card-body" id="div_station">
            <div style="padding: 20px" class="card card-primary"  >
                <div id="message"></div>
                     <h1 class="text">Station Pump Detials </h1>
                   
                    </div>
                        <div class="form-group">
                            <label for="BarOut"> Adjust Out BAR of Station: </label>
                            <input type="text"  class="form-control" name="BarOut" id="BarOut" >
                        </div>
                        <div class="form-group">
                            <label for="BarPresent">Adjust Present BAR of Station:</label>
                            <input type="text"  class="form-control" name="BarPresent" id="BarPresent" >
                        </div>
                        <div class="form-group">
                            <button  class="btn btn-info" id="register_station_detials_btn" onclick="RegisterStationPump({{$fetched_farms[0]->FarmID}})">Register Station Pump</button>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden"  type="text" class="inputTable" name="farm_id_input" value={{$fetched_farms[0]->FarmID}}>
                    </div>
            </div>
            @endforeach
        @endif
    

    <script type="text/javascript">
        function RegisterStationPump(farm_id){
            var _token = $('input[name="_token"]').val();
            if(!confirm("Did you want to Register the detials of this Station Pump to this farm?")) {
                  return false;
              };
            const main_div = document.querySelector('#div_station');
            const BarOut=main_div.querySelector('#BarOut').value;
            const BarPresent=main_div.querySelector('#BarPresent').value;
            const tokenA=_token;
            console.log({
                "BarOut":BarOut,
                "BarPresent":BarPresent,
                "tokenA":tokenA
            });
            try{
                $.ajax({
                    url:"{{ route('RegStation') }}",
                    method:"POST",
                    data:{
                        BarOut:BarOut,
                        BarPresent:BarPresent,
                        FarmID:farm_id,
                        _token:tokenA
                    },
                    success: function(data){ // What to do if we succeed
                        $('#message').html(data);
                        // location.reload();
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