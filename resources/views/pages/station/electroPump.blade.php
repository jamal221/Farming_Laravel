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
        
        <div class="card-body" id="div_electro_pump">
            <div style="padding: 20px" class="card card-primary"  >
                <div id="message"></div>
                     <h1 class="text">Electro Pump Definition  </h1>
                   
                    </div>
                        <div class="form-group">
                            <label for="model"> Model: </label>
                            <input type="text"  class="form-control" name="model" id="model" >
                        </div>
                        <div class="form-group">
                            <label for="Voltage">Voltage:</label>
                            <input type="text"  class="form-control" name="Voltage" id="Voltage" >
                        </div>
                        <div class="form-group">
                            <label for="Frequency">Frequency:</label>
                            <input type="text"  class="form-control" name="Frequency" id="Frequency" >
                        </div>
                        <div class="form-group">
                            <label for="Phase">Phase:</label>
                            <input type="text"  class="form-control" name="Phase" id="Phase" >
                        </div>
                        <div class="form-group">
                            <label for="Current">Current:</label>
                            <input type="text"  class="form-control" name="Current" id="Current" >
                        </div>
                        <div class="form-group">
                            <label for="Power_factor">Power Factor:</label>
                            <input type="text"  class="form-control" name="Power_factor" id="Power_factor" >
                        </div>
                        <div class="form-group">
                            <label for="kw">Kilo wate:</label>
                            <input type="text"  class="form-control" name="kw1" id="kw1" >
                        </div>
                        <div class="form-group">
                            <label for="HP1">Hours Press:</label>
                            <input type="text"  class="form-control" name="HP1" id="HP1" >
                        </div>
                        <div class="form-group">
                            <label for="Duty">Operation:</label>
                            <input type="text"  class="form-control" name="Duty" id="Duty" >
                        </div>
                        <div class="form-group">
                            <label for="SN">Serial Number:</label>
                            <input type="text"  class="form-control" name="SN1" id="SN1" >
                        </div>
                        <div class="form-group">
                            <button  class="btn btn-info" id="register_station_detials_btn" onclick="RegisterElectroPump({{$fetched_farms[0]->FarmID}})">Register Electro Pump</button>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden"  type="text" class="inputTable" name="farm_id_input" value={{$fetched_farms[0]->FarmID}}>
                    </div>
            </div>
            @endforeach
        @endif
    

    <script type="text/javascript">
        function RegisterElectroPump(farm_id){
            var _token = $('input[name="_token"]').val();
            if(!confirm("Did you want to Register the detials of this Electro Pump to this Station?")) {
                  return false;
              };
            const main_div = document.querySelector('#div_electro_pump');
            const model=main_div.querySelector('#model').value;
            const Voltage=main_div.querySelector('#Voltage').value;
            const Frequency=main_div.querySelector('#Frequency').value;
            const Phase=main_div.querySelector('#Phase').value;
            const Current=main_div.querySelector('#Current').value;
            const Power_factor=main_div.querySelector('#Power_factor').value;
            const kw1=main_div.querySelector('#kw1').value;
            const HP1=main_div.querySelector('#HP1').value;
            const Duty=main_div.querySelector('#Duty').value;
            const SN1=main_div.querySelector('#SN1').value;
            const tokenA=_token;
            try{
                $.ajax({
                    url:"{{ route('RegElectroPump') }}",
                    method:"POST",
                    data:{
                        model:model,
                        Voltage:Voltage,
                        Frequency:Frequency,
                        Phase:Phase,
                        Current:Current,
                        Power_factor:Power_factor,
                        kw1:kw1,
                        HP1:HP1,
                        Duty:Duty,
                        SN1:SN1,
                        FarmID:farm_id,
                        _token:tokenA
                    },
                    success: function(data){ // What to do if we succeed
                        $('#message').html(data);
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