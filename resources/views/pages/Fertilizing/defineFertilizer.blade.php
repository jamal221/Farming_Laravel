@extends('layouts.main')
@section('content2')

<div class="card-primary">
    <h3 class="card-title" style="align-items: end;">Farm Information:</h3>
</div>
      
 <div style="width: 200%">      
        <table class="table table-bordered"  id="Costumer_Table" style="width: 200%">
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
                <tr>
                    <td  class="column_name" data-column_name="costumer_count" data-id={{ $fetched_farms[0]->FarmID}}>1</td>
                    <td   class="column_name" data-column_name="costumer_name" data-id={{ $fetched_farms[0]->FarmID }}>{{ $fetched_farms[0]->name }}</td>
                    <td   class="column_name" data-column_name="costumer_family" data-id={{ $fetched_farms[0]->FarmID }}>{{ $fetched_farms[0]->family }}</td>
                    <td   class="column_name" data-column_name="costumer_add"  data-id={{ $fetched_farms[0]->FarmID }}> {{ $fetched_farms[0]->Address }}     </td>
                    <td   class="column_name" data-column_name="costumer_mobile"  data-id={{ $fetched_farms[0]->FarmID}}> {{ $fetched_farms[0]->mobile }}     </td>
                    <td  hidden class="column_name" data-column_name="costumer_farm_main"  data-id={{ $fetched_farms[0]->FarmID }}> {{ $fetched_farms[0]->farm_size }} </td>
                    <td   class="column_name" data-column_name="costumer_farm"  data-id={{ $fetched_farms[0]->FarmID }}> {{ number_format($fetched_farms[0]->farm_size) }}  m^2   </td>
                    <td   class="column_name" data-column_name="costumer_farm"  data-id={{ $fetched_farms[0]->FarmID }}> {{ $fetched_farms[0]->farm_unit }}     </td>
                </tr>
            </tbody>
        </table>
 </div>
 @if($Fertilizer_defined_count)
        <div class="card-primary">
            <h3 class="card-title" style="align-items: end;">Defined Fertilizer</h3>
        </div>

        <div name="Fertilizer_list" style="width: 200%">  
            <div id="message_edit_Fertilizer"></div>    
            <table class="table table-bordered"  id="Edite_Fertilizer_Table" style="width: 200%">
                <thead>
                    <tr>
                        <th>Row</th>
                        <th>Injection System</th>
                        <th>Type</th>
                        <th>Fertilizer Material</th>
                        <th>Tank Amount</th>
                        <th>Input Pipline Number</th>
                        <th>Out Pipline Number</th>
                        <th>Control Debby pipline number</th>
                        <th>Check Tank Number</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $count_row=1
                @endphp
            
                    @foreach($fetched_Fertilizer as $key => $value)
                        <tr>
                            <td  class="column_name" data-column_name="costumer_count" data-id={{ $value->id }}>{{$count_row}}</td>
                            <td contenteditable  class="column_name" data-column_name="InjectionSystem" id="InjectionSystem_forEdit" >
                                
                                                <select  class="form-group" name="InjectionSystem" id="InjectionSystem">
                                                    <option> Select Injection system:</option>
                                                    <option value="1" <?php if (($value->InjectionSystem)==1) echo "selected"; ?> > under pressure</option>
                                                    <option value="2" <?php if (($value->InjectionSystem)==2) echo "selected"; ?> > Injectable injection</option>
                                                    <option value="3" <?php if (($value->InjectionSystem)==3) echo "selected"; ?> > Injection with a pump</option>
                                                    <option value="4" <?php if (($value->InjectionSystem)==4) echo "selected"; ?> > Gravitational</option>
                                                </select>                        
                                       
                            </td>
                            <td contenteditable class="column_name" data-column_name="type" data-id={{ $value->id }}>
                                
                                                <select  class="form-group" name="type" id="type_forEdit">
                                                    <option> Select Fertilizer Type:</option>
                                                    <option value="1" <?php if (($value->type)==1) echo "selected"; ?> > Polymeric</option>
                                                    <option value="2" <?php if (($value->type)==2) echo "selected"; ?> > Steel</option>
                                                    <option value="3" <?php if (($value->type)==3) echo "selected"; ?> > concrete</option>
                                                </select>                        
                            </td>
                            <td contenteditable  class="column_name" data-column_name="fertilizers"  id="fertilizers_forEdit"> {{ $value->fertilizers}}     </td>
                            <td contenteditable  class="column_name" data-column_name="tank_amount"  id="tank_amount_forEdit"> {{ $value->tank_amount}}     </td>
                            <td contenteditable  class="column_name" data-column_name="input_pip_num"  id="input_pip_num_forEdit"> {{ $value->input_pip_num}}     </td>
                            <td contenteditable  class="column_name" data-column_name="out_pip_num"  id="out_pip_num_forEdit"> {{ $value->out_pip_num }}     </td>
                            <td contenteditable  class="column_name" data-column_name="control_debby_pip_num"  id="control_debby_pip_num_forEdit"> {{ $value->control_debby_pip_num }}     </td>
                            <td contenteditable  class="column_name" data-column_name="check_tank_num"  id="check_tank_num_forEdit"> {{ $value->check_tank_num }}     </td>
                            <td>
                                <button type="button" class="btn btn-success btn-xs edit_Fertilizer"  id_fertilizer={{ $value->id}} row_id={{$count_row}}>Edit Fertilizer</button>
                                <button type="button" class="btn btn-danger btn-xs delete_Fertilizer" id_fertilizer={{ $value->id}}>Delete Fertilizer</button>
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
     
        <div class="card-body" id="div_fertilizer">
            <div style="padding: 20px" class="card card-primary"  >
                <div id="message"></div>
                     <h1 class="text">Fertilizer Definition  </h1>
                   
                    </div>
                    <div class="form-group">
                        <div class="container-flouid">
                            <div class="row">
                                    <label for="InjectionSystem"> Injection System: </label>
                                    <select id="InjectionSystem" class="form-group" name="InjectionSystem">
                                        <option> Select Injection system:</option>
                                        <option value="1" > under pressure</option>
                                        <option value="2" > Injectable injection</option>
                                        <option value="3" > Injection with a pump</option>
                                        <option value="4" > Gravitational</option>
                                    </select>                        
                            </div>
                            
                        </div>
                    </div>
                        <div class="form-group">
                            <div class="container-flouid">
                                <div class="row">
                                        <label for="type"> Fertilizer type: </label>
                                        <select id="type" class="form-group" name="type">
                                            <option> Select Fertilizer Type:</option>
                                            <option value="1" > Polymeric</option>
                                            <option value="2" > Steel</option>
                                            <option value="3" > concrete</option>
                                        </select>                        
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fertilizers">Fertilizers Material:</label>
                            <input type="text"  class="form-control" name="fertilizers" id="fertilizers" >
                        </div>
                        <div class="form-group">
                            <label for="tank_amount">Tank Amount:</label>
                            <input type="text"  class="form-control" name="tank_amount" id="tank_amount" >
                        </div>
                        <div class="form-group">
                            <label for="input_pip_num">Input pipline number:</label>
                            <input type="text"  class="form-control" name="input_pip_num" id="input_pip_num" >
                        </div>
                        <div class="form-group">
                            <label for="out_pip_num">Out pipline number:</label>
                            <input type="text"  class="form-control" name="out_pip_num" id="out_pip_num" >
                        </div>
                        <div class="form-group">
                            <label for="control_debby_pip_num">Control debby pipline:</label>
                            <input type="text"  class="form-control" name="control_debby_pip_num" id="control_debby_pip_num" >
                        </div>
                        <div class="form-group">
                            <label for="check_tank_num">Check tank number:</label>
                            <input type="text"  class="form-control" name="check_tank_num" id="check_tank_num" >
                        </div>
                        <div class="form-group">
                            <button  class="btn btn-info" id="register_Fertilizer" onclick="RegisterFertilizer({{$fetched_farms[0]->FarmID}})">Register Fertilizer</button>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden"  type="text" class="inputTable" name="farm_id_input" value={{$fetched_farms[0]->FarmID}}>
                    </div>
            </div>

      

    <script type="text/javascript">
   
        function RegisterFertilizer(farm_id){
            var _token = $('input[name="_token"]').val();
            if(!confirm("Did you want to Register the detials of this Fertilizer to this Farm?")) {
                  return false;
              };
            const main_div = document.querySelector('#div_fertilizer');
            const InjectionSystem=main_div.querySelector('#InjectionSystem').value;
            const type=main_div.querySelector('#type').value;
            const fertilizers=main_div.querySelector('#fertilizers').value;
            const tank_amount=main_div.querySelector('#tank_amount').value;
            const input_pip_num=main_div.querySelector('#input_pip_num').value;
            const out_pip_num=main_div.querySelector('#out_pip_num').value;
            const control_debby_pip_num=main_div.querySelector('#control_debby_pip_num').value;
            const check_tank_num=main_div.querySelector('#check_tank_num').value;
            const tokenA=_token;
            try{
                $.ajax({
                    url:"{{ route('RegFertilizer') }}",
                    method:"POST",
                    data:{
                        InjectionSystem:InjectionSystem,
                        type:type,
                        fertilizers:fertilizers,
                        tank_amount:tank_amount,
                        input_pip_num:input_pip_num,
                        out_pip_num:out_pip_num,
                        control_debby_pip_num:control_debby_pip_num,
                        check_tank_num:check_tank_num,
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
            
            $(document).on('click', '.edit_Fertilizer', function(){
                var _token = $('input[name="_token"]').val();

                        // var allid=$(this).attr("").split("_");
                        // console.log(allid);
                        var id_fertilizer=$(this).attr("id_fertilizer");
                        var countRow=Number($(this).attr("row_id"));
                        const InjectTd = document.querySelector('#Edite_Fertilizer_Table').rows[countRow].cells.item(1);
                        const InjectionSystem=InjectTd.querySelector('#InjectionSystem').value;
                        const TypeTd=document.querySelector('#Edite_Fertilizer_Table').rows[countRow].cells.item(2);
                        var type = TypeTd.querySelector("#type_forEdit").value;
                        var fertilizers = document.getElementById("Edite_Fertilizer_Table").rows[countRow].cells.item(3).innerHTML;
                        var tank_amount = document.getElementById("Edite_Fertilizer_Table").rows[countRow].cells.item(4).innerHTML;
                        var input_pip_num = document.getElementById("Edite_Fertilizer_Table").rows[countRow].cells.item(5).innerHTML;
                        var out_pip_num = document.getElementById("Edite_Fertilizer_Table").rows[countRow].cells.item(6).innerHTML;
                        var control_debby_pip_num = document.getElementById("Edite_Fertilizer_Table").rows[countRow].cells.item(7).innerHTML;
                        var check_tank_num = document.getElementById("Edite_Fertilizer_Table").rows[countRow].cells.item(8).innerHTML;
                        console.log({
                                    "countRow":countRow,
                                    "InjectionSystem":InjectionSystem,
                                    "type":type,
                                    "fertilizers":fertilizers,
                                    "tank_amount":tank_amount,
                                    "input_pip_num":input_pip_num,
                                    "out_pip_num":out_pip_num,
                                    "control_debby_pip_num":control_debby_pip_num,
                                    "check_tank_num":check_tank_num,
                                    "id_fertilizer":id_fertilizer,
                                    "_token":_token
                                        });
                        if(
                            InjectionSystem != ''
                            && type!=''
                            && fertilizers!='' 
                            && tank_amount!='' 
                            && input_pip_num!='' 
                            && out_pip_num!=''
                            && control_debby_pip_num!=''
                            && check_tank_num!=''
                           )
                        {

                            if(!confirm("Did you want to edit this Fertlize unit")) {
                                return false;
                            }
                            try
                            {
                                $.ajax({
                                    url:"{{ route('EditFertilizeUnit') }}",
                                    method:"POST",
                                    data:{
                                        InjectionSystem:InjectionSystem,
                                        type:type,
                                        fertilizers:fertilizers,
                                        tank_amount:tank_amount,
                                        input_pip_num:input_pip_num,
                                        out_pip_num:out_pip_num,
                                        control_debby_pip_num:control_debby_pip_num,
                                        check_tank_num:check_tank_num,
                                        id_fertilizer:id_fertilizer,
                                        _token:_token},
                                    success: function(data){ // What to do if we succeed
                                        $('#message_edit_Fertilizer').html(data);
                                        location.reload();
                                    },
                                    error: function(data){
                                        alert('Error'+data);
                                        location.reload();
                                        // console.log(data);
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