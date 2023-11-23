@extends('layouts.main')
@section('content2')

<div class="card-primary">
    <h3 class="card-title" style="align-items: end;">Farm Information:</h3>
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
 @if($count_electro_pump)
 <div class="card-primary">
    <h3 class="card-title" style="align-items: end;">Defined Electro Pump</h3>
</div>

<div name="electro_pump_list" style="width: 150%">  
    <div id="message_edit_electro_pump"></div>    
    <table class="table table-bordered"  id="Edite_Electero_Pump_Table" style="width: 150%">
        <thead>
            <tr>
                <th>Row</th>
                <th>model</th>
                <th>voltage</th>
                <th>Frequency</th>
                <th>Phase</th>
                <th>Current</th>
                <th>Power_factor</th>
                <th>kw</th>
                <th>HP</th>
                <th>Duty</th>
                <th>SN</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
        @php
            $count_row=1
        @endphp
       
            @foreach($fetched_electro_pump as $key => $value)
                <tr>
                    <td  class="column_name" data-column_name="costumer_count" data-id={{ $value->id }}>{{$count_row}}</td>
                    <td contenteditable  class="column_name" data-column_name="model" data-id={{ $value->id }}>{{ $value->model }}</td>
                    <td  contenteditable class="column_name" data-column_name="Voltage" data-id={{ $value->id }}>{{ $value->Voltage}}</td>
                    <td contenteditable  class="column_name" data-column_name="Frequency"  data-id={{ $value->id }}> {{ $value->Frequency}}     </td>
                    <td contenteditable  class="column_name" data-column_name="Phase"  data-id={{ $value->id }}> {{ $value-> Phase}}     </td>
                    <td contenteditable  class="column_name" data-column_name="Current"  data-id={{ $value->id }}> {{ $value-> Current}}     </td>
                    <td contenteditable  class="column_name" data-column_name="Power_factor"  data-id={{ $value->id }}> {{ $value->Power_factor }}     </td>
                    <td contenteditable  class="column_name" data-column_name="kw"  data-id={{ $value->id }}> {{ $value->kw }}     </td>
                    <td contenteditable  class="column_name" data-column_name="HP"  data-id={{ $value->id }}> {{ $value->HP }}     </td>
                    <td contenteditable  class="column_name" data-column_name="Duty"  data-id={{ $value->id }}> {{ $value->Duty }}     </td>
                    <td contenteditable  class="column_name" data-column_name="SN"  data-id={{ $value->id }}> {{ $value->SN }}     </td>
                    <td>
                        <button type="button" class="btn btn-success btn-xs edit_eltro_pump" id_pump={{ $value->id}} row_id={{$count_row}}>Edit Elctro Pump</button>
                        <button type="button" class="btn btn-danger btn-xs delete_eltro_pump" data-id={{ $value->id}}>Delete Elctro Pump</button>
                    </td>
                </tr>
                @php
                    $count_row+=1
                @endphp
            @endforeach

       
        </tbody>
    </table>
</div>
@endif
     
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
    var _token = $('input[name="_token"]').val();
        function RegisterElectroPump(farm_id){
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

$(document).on('click', '.edit_eltro_pump', function(){

        // var allid=$(this).attr("").split("_");
        // console.log(allid);
        var id_electro_pump=$(this).attr("id_pump");
        var countRow=Number($(this).attr("row_id"));
        var model = document.getElementById("Edite_Electero_Pump_Table").rows[countRow].cells.item(1).innerHTML;
        var Voltage = document.getElementById("Edite_Electero_Pump_Table").rows[countRow].cells.item(2).innerHTML;
        var Frequency = document.getElementById("Edite_Electero_Pump_Table").rows[countRow].cells.item(3).innerHTML;
        var Phase = document.getElementById("Edite_Electero_Pump_Table").rows[countRow].cells.item(4).innerHTML;
        var Current = document.getElementById("Edite_Electero_Pump_Table").rows[countRow].cells.item(5).innerHTML;
        var Power_factor = document.getElementById("Edite_Electero_Pump_Table").rows[countRow].cells.item(6).innerHTML;
        var kw = document.getElementById("Edite_Electero_Pump_Table").rows[countRow].cells.item(7).innerHTML;
        var HP = document.getElementById("Edite_Electero_Pump_Table").rows[countRow].cells.item(8).innerHTML;
        var Duty = document.getElementById("Edite_Electero_Pump_Table").rows[countRow].cells.item(9).innerHTML;
        var SN = document.getElementById("Edite_Electero_Pump_Table").rows[countRow].cells.item(10).innerHTML;
        console.log({
                    "countRow":countRow,
                    "model":model,
                    "Voltage":Voltage,
                    "Frequency":Frequency,
                    "Phase":Phase,
                    "Current":Current,
                    "Power_factor":Power_factor,
                    "kw":kw,
                    "HP":HP,
                    "Duty":Duty,
                    "SN":SN,
                    "id_electro_pump":id_electro_pump,
                    "_token":_token
                        });
        if(
            model != ''
            && Voltage!=''
            && Frequency!='' 
            && Phase!='' 
            && Current!='' 
            && Power_factor!=''
            && kw!=''
            && HP!=''
            && Duty!=''
            && SN!='')
        {

            if(!confirm("Did you want to edit this electro pump")) {
                return false;
            }
            try
            {
                $.ajax({
                    url:"{{ route('EditElectroPump') }}",
                    method:"POST",
                    data:{
                        model:model,
                        Voltage:Voltage,
                        Frequency:Frequency,
                        Phase:Phase,
                        Current:Current,
                        Power_factor:Power_factor,
                        kw:kw,
                        HP:HP,
                        Duty:Duty,
                        SN:SN,
                        id_electro_pump:id_electro_pump,
                        _token:_token},
                    success: function(data){ // What to do if we succeed
                        $('#message_edit_electro_pump').html(data);
                        location.reload();
                    },
                    error: function(data){
                        alert('Error'+data);
                        location.reload();
                        //console.log(data);
                    }
                })
            }
            catch (e) {
                $('#message_edit_electro_pump').html("<div class='alert alert-danger'>در دریافت و ارسال به پایگاه  خطای روی داده است.</div>");
            }
        }// end if check empty box
        else {
            $('#message_edit_electro_pump').html("<div class='alert alert-danger'>پیام مدیر نباید خالی باشد</div>");
        }

        });
                        
          </script>
          
@endsection