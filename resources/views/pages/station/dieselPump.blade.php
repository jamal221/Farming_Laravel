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
 @if($count_diesel_pump)
 <div class="card-primary">
    <h3 class="card-title" style="align-items: end;">Defined Disel Pump</h3>
</div>

<div name="diesel_pump_list" style="width: 150%">  
    <div id="message_edit_disel_pump"></div>    
    <table class="table table-bordered"  id="Edite_Disel_Pump_Table" style="width: 150%">
        <thead>
            <tr>
                <th>Row</th>
                <th>model</th>
                <th>Debby</th>
                <th>H Head</th>
                <th>H min</th>
                <th>H max</th>
                <th>kw</th>
                <th>HP</th>
                <th>RPM</th>
                <th>SN</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
        @php
            $count_row=1
        @endphp
       
            @foreach($fetched_diesel_pump as $key => $value)
                <tr>
                    <td  class="column_name" data-column_name="costumer_count" data-id={{ $value->id }}>{{$count_row}}</td>
                    <td contenteditable  class="column_name" data-column_name="model" data-id={{ $value->id }}>{{ $value->model }}</td>
                    <td  contenteditable class="column_name" data-column_name="Q_debby" data-id={{ $value->id }}>{{ $value->Q_debby}}</td>
                    <td contenteditable  class="column_name" data-column_name="H_Head"  data-id={{ $value->id }}> {{ $value->H_Head}}     </td>
                    <td contenteditable  class="column_name" data-column_name="H_min"  data-id={{ $value->id }}> {{ $value-> H_min}}     </td>
                    <td contenteditable  class="column_name" data-column_name="H_max"  data-id={{ $value->id }}> {{ $value->H_max}}     </td>
                    <td contenteditable  class="column_name" data-column_name="kw"  data-id={{ $value->id }}> {{ $value->kw }}     </td>
                    <td contenteditable  class="column_name" data-column_name="HP"  data-id={{ $value->id }}> {{ $value->HP }}     </td>
                    <td contenteditable  class="column_name" data-column_name="RPM"  data-id={{ $value->id }}> {{ $value->RPM }}     </td>
                    <td contenteditable  class="column_name" data-column_name="SN"  data-id={{ $value->id }}> {{ $value->SN }}     </td>
                    <td>
                        <button type="button" class="btn btn-success btn-xs edit_diesel_pump" id_pump={{ $value->id}} row_id={{$count_row}}>Edit Diesel Pump</button>
                        <button type="button" class="btn btn-danger btn-xs delete_diesel_pump" data-id={{ $value->id}}>Delete Elctro Pump</button>
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
     
        <div class="card-body" id="div_diesel_pump">
            <div style="padding: 20px" class="card card-primary"  >
                <div id="message"></div>
                     <h1 class="text">diesel Pump Definition  </h1>
                   
                    </div>
                        <div class="form-group">
                            <label for="model"> Model: </label>
                            <input type="text"  class="form-control" name="model" id="model" >
                        </div>
                        <div class="form-group">
                            <label for="Debby">Debby:</label>
                            <input type="text"  class="form-control" name="Debby" id="Debby" >
                        </div>
                        <div class="form-group">
                            <label for="Head">Head:</label>
                            <input type="text"  class="form-control" name="Head" id="Head" >
                        </div>
                        <div class="form-group">
                            <label for="min">Min:</label>
                            <input type="text"  class="form-control" name="min" id="min" >
                        </div>
                        <div class="form-group">
                            <label for="max">Max:</label>
                            <input type="text"  class="form-control" name="max" id="max" >
                        </div>
                        <div class="form-group">
                            <label for="KW">KW:</label>
                            <input type="text"  class="form-control" name="KW" id="KW" >
                        </div>
                        <div class="form-group">
                            <label for="HP">HP:</label>
                            <input type="text"  class="form-control" name="HP" id="HP" >
                        </div>
                        <div class="form-group">
                            <label for="RPM">RPM:</label>
                            <input type="text"  class="form-control" name="RPM" id="RPM" >
                        </div>
                        <div class="form-group">
                            <label for="SN">Serial Number:</label>
                            <input type="text"  class="form-control" name="SN" id="SN" >
                        </div>
                        <div class="form-group">
                            <button  class="btn btn-info" id="register_station_detials_btn" onclick="RegisterdieselPump({{$fetched_farms[0]->FarmID}})">Register diesel Pump</button>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden"  type="text" class="inputTable" name="farm_id_input" value={{$fetched_farms[0]->FarmID}}>
                    </div>
            </div>
            @endforeach
        @endif

      

    <script type="text/javascript">
    var _token = $('input[name="_token"]').val();
        function RegisterdieselPump(farm_id){
            if(!confirm("Did you want to Register the detials of this diesel Pump to this Station?")) {
                  return false;
              };
            const main_div = document.querySelector('#div_diesel_pump');
            const model=main_div.querySelector('#model').value;
            const Debby=main_div.querySelector('#Debby').value;
            const Head=main_div.querySelector('#Head').value;
            const min=main_div.querySelector('#min').value;
            const max=main_div.querySelector('#max').value;
            const KW=main_div.querySelector('#KW').value;
            const HP=main_div.querySelector('#HP').value;
            const RPM=main_div.querySelector('#RPM').value;
            const SN=main_div.querySelector('#SN').value;
            const tokenA=_token;
            try{
                $.ajax({
                    url:"{{ route('RegdieselPump') }}",
                    method:"POST",
                    data:{
                        model:model,
                        Debby:Debby,
                        Head:Head,
                        min:min,
                        max:max,
                        KW:KW,
                        HP:HP,
                        RPM:RPM,
                        SN:SN,
                        FarmID:farm_id,
                        _token:_token
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
$(document).on('click', '.edit_diesel_pump', function(){

// var allid=$(this).attr("").split("_");
// console.log(allid);
            var id_diesel_pump=$(this).attr("id_pump");
            var countRow=Number($(this).attr("row_id"));
            var model = document.getElementById("Edite_Disel_Pump_Table").rows[countRow].cells.item(1).innerHTML;
            var Debby = document.getElementById("Edite_Disel_Pump_Table").rows[countRow].cells.item(2).innerHTML;
            var head = document.getElementById("Edite_Disel_Pump_Table").rows[countRow].cells.item(3).innerHTML;
            var min = document.getElementById("Edite_Disel_Pump_Table").rows[countRow].cells.item(4).innerHTML;
            var max = document.getElementById("Edite_Disel_Pump_Table").rows[countRow].cells.item(5).innerHTML;
            var KW = document.getElementById("Edite_Disel_Pump_Table").rows[countRow].cells.item(6).innerHTML;
            var HP = document.getElementById("Edite_Disel_Pump_Table").rows[countRow].cells.item(7).innerHTML;
            var RPM = document.getElementById("Edite_Disel_Pump_Table").rows[countRow].cells.item(8).innerHTML;
            var SN = document.getElementById("Edite_Disel_Pump_Table").rows[countRow].cells.item(9).innerHTML;
            console.log({
                        "countRow":countRow,
                        "model":model,
                        "Debby":Debby,
                        "head":head,
                        "min":min,
                        "max":max,
                        "KW":KW,
                        "HP":HP,
                        "RPM":RPM,
                        "SN":SN,
                        "id_diesel_pump":id_diesel_pump,
                        "_token":_token
                            });
            if(
                model != ''
                && Debby!=''
                && head!='' 
                && min!='' 
                && max!='' 
                && KW!=''
                && HP!=''
                && RPM!=''
                && SN!='')
            {

                if(!confirm("Did you want to edit this Diesel pump")) {
                    return false;
                }
                try
                {
                    $.ajax({
                        url:"{{ route('EditDieselPump') }}",
                        method:"POST",
                        data:{
                            model:model,
                            Debby:Debby,
                            head:head,
                            min:min,
                            max:max,
                            KW:KW,
                            HP:HP,
                            RPM:RPM,
                            SN:SN,
                            id_diesel_pump:id_diesel_pump,
                            _token:_token},
                        success: function(data){ // What to do if we succeed
                            $('#message_edit_disel_pump').html(data);
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
                    $('#message_edit_disel_pump').html("<div class='alert alert-danger'>در دریافت و ارسال به پایگاه  خطای روی داده است.</div>");
                }
            }// end if check empty box
            else {
                $('#message_edit_disel_pump').html("<div class='alert alert-danger'>پیام مدیر نباید خالی باشد</div>");
            }

});


             
          </script>
          
@endsection