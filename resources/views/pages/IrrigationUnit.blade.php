@extends('layouts.main')
@section('content2')
<div class="card-header" id="all"style="width: 200%">
        <div class="card-header">
            @if(session()->has('Transaction_Response_abiari_add'))
                <div class="alert alert-success" id="User_registered">
                    {{ session()->get('Transaction_Response_abiari_add') }}
                </div>
            @endif
            @if(session()->has('Transaction_Response_abiari_add_fail'))
                <div class="alert alert-warning" id="User_registered2">
                    {{ session()->get('Transaction_Response_abiari_add_fail') }}
                </div>
            @endif
        </div>
        {{-- @dd($fetched_farms) --}}
        
            <div class="card card-primary">
                <h1>You are adding Irrigation option to this farm</h1>
                <form >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="costumerName">Name: </label>
                            <input type="text" readonly="true" class="form-control" name="costumerName" id="costumerName" value="{{$fetched_farms[0]->name}}">
                        </div>
                        <div class="form-group">
                            <label for="costumerFamily">Family:</label>
                            <input type="text" readonly="true" class="form-control" name="costumerFamily" id="costumerFamily" value="{{$fetched_farms[0]->family}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="farmSize">Farm size_hektar</label>
                            <input type="text"  readonly="true" class="form-control" id="farmSize" name="farmSize" value="{{$fetched_farms[0]->farm_size}}">
                        </div>
                        <div class="form-group">
                            <label for="unitNum">Number of Unit per Farm:</label>
                            <input type="text" readonly="true" class="form-control" id="unitNum" name="unitNum" value="{{$fetched_farms[0]->farm_unit}}">
                        </div>
                            <input hidden type="text" class="form-control" id="costumerID" name="costumerID"  value="{{$fetched_farms[0]->UserID}}">
                    </div>
                </form>
            </div>
            {{-- @dd(var_dump($fetched_unit_irrigated_count)) --}}
            @for($i=0; $i<$fetched_farms[0]->farm_unit; $i++)
                {{-- <h1>{{$value->farm_unit}}</h1> --}}
                @if(in_array($i+1, $fetched_unit_irrigated))
                    <h2 style="background-color: aqua"  class="card-title">You previosely added this unit</h2>
                    
                @else
                    <h2 class="card-title ">Please press + to add new unit {{$i+1}} of this farm</h2>
                @endif
                <div class="card card-primary">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card-body" >
                        <button type="submit" class="btn btn-primary" onclick="callFormUnitDetials({{$i+1}}, {{$fetched_farms[0]->id}})"   id="reg_unit_btn" >+</button>
                    <div id="div{{$i+1}}" style="display: none">
                        
                        <form action="{{route('regUnitDetailsIrrigation')}}"  method="POST"  id="form{{$i+1}}">
                            <table  class="table table-bordered myclassTable"  id="Costumer_Table" style="width: 150%;">
                            
                                <tbody>
                                    <tr><td colspan="2" style="text-align: center">Irrigation timing</td></tr>
                                        <tr>
                                            <td    class="col_me1" data-column_name="costumer_count"  >Unit ID:</td>
                                            <td    class="column_name" id="Unit ID" ><input type="text" name="Unit_ID" class="inputTable" value="{{$i+1}}" readonly ></td>
                                        </tr>
                                        <tr>
                                            <td    class="col_me1" data-column_name="costumer_count"  >Irrigation Period( Hour ):</td>
                                            <td    class="column_name" id="Irrigation_Period"  ><input name="Irrigation_Period" type="text" class="inputTable" style="width: 100%"></td>
                                        </tr>
                                        <tr>
                                            <td class="col_me1" data-column_name="costumer_count"  >Irrigation Duration (Hour ):</td>
                                            <td    class="column_name" id="Irrigation_duration"  ><input name="Irrigation_duration" type="text" class="inputTable" style="width: 100%"></td>
                                       </tr>
                                       <tr>
                                            <td class="col_me1" data-column_name="costumer_count"  >Soil moisture level:</td>
                                            <td    class="column_name" id="Soil_moisture_level"  ><input name="Soil_moisture_level" type="text" class="inputTable" style="width: 100%"></td>
                                       </tr>
                                       <tr>
                                            <td class="col_me1" data-column_name="costumer_count"  >Completion of unneeded irrigation:</td>
                                            <td    class="column_name" id="unneededـirrigation"  >
                                                <div class="form-group" style="width: 100%">
                                                    <label for="unneededـirrigation" style="background-color: antiquewhite">unneeded Irrigation On/Off</label>
                                                    <select class="form-control" name="unneededـirrigation" id="unneededـirrigation" >
                                                        <option  >Slect one of them</option>
                                                        <option  value="1">ON</option>
                                                        <option value="2">OFF </option>
                                                    </select> 
                                                </div>
                                            </td>
                                       </tr>
                                       <tr>
                                        <td class="col_me1" data-column_name="costumer_count"  >Manualy Turn ON or OFF this Unit:</td>
                                        <td    class="column_name" id="Manual_key"  >
                                            <div class="form-group" style="width: 100%">
                                                <label for="Manual_key" style="background-color: antiquewhite">Manualy Turn ON or OFF this Unit</label>
                                                <select class="form-control" name="Manual_key" id="Manual_key" >
                                                    <option  >Slect one of them</option>
                                                    <option  value="1">ON</option>
                                                    <option value="2">OFF </option>
                                                </select> 
                                            </div>
                                        </td>
                                   </tr>
                                       <tr>
                                            <td    class="col_me1" data-column_name="costumer_count"  >Irrigation method:</td>
                                            <td    class="column_name" id="Irrigation_method">
                                                <div class="form-group" style="width: 100%">
                                                    <label for="Irrigation_Method" style="background-color: antiquewhite">Irrigation method</label>
                                                    <select class="form-control" name="Irrigation_Method" id="Irrigation_Method" >
                                                        <option  >Slect one of them</option>
                                                        <option  value="1">Smart</option>
                                                        <option value="2">Automatic </option>
                                                        <option value="3">Schedule </option>
                                                        <option value="4">Manual </option>
                                                    </select> 
                                                </div>
                                            </td>
                                       </tr>
                                       <tr>
                                        <td    class="col_me1" data-column_name="costumer_count"  >Irrigation priority:</td>
                                        <td    class="column_name" id="Irrigation priority">
                                            <div class="form-group" style="width: 100%">
                                                <label for="Irrigation_priority" style="background-color: antiquewhite">Irrigation priority</label>
                                                <select class="form-control" name="Irrigation_priority" id="Irrigation_priority" >
                                                    <option  >select one of them</option>
                                                    @for($j=0; $j<$fetched_farms[0]->farm_unit; $j++)
                                                        <option  value="{{$j+1}}">Periority {{$j+1}}</option>
                                                    @endfor
                                                </select> 
                                            </div>
                                        </td>
                                   </tr>
                                        
                                </tbody>
                            </table>
                            <input type="hidden" type="text" class="inputTable" name="unit_id_input" value={{$i+1}}>
                            <input type="hidden"  type="text" class="inputTable" name="farm_id_input" value={{$fetched_farms[0]->FarmID}}>
                            <div class="card card-primary" id="div_btn" >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="card-body" >
                                    <button type="submit" class="btn btn-primary" id="reg_unit_detials_btn">Register Detials</button>
                                </div>               
                            </div>
                        </form>
                    </div>
                        
                    </div>               
                </div>
            @endfor        
        
        
        

        
        <script >
              function callFormUnitDetials(unit_id, farm_id){
                
                  try{
                    var div_id="div"+unit_id;
                    // alert(div_id);
                    var div_unit=document.getElementById(div_id);
                    if(div_unit.style.display!="block")
                        {
                            document.querySelector('#reg_unit_btn').innerHTML='-';
                            div_unit.style.display="block";
                        }

                        
                    else
                        {
                            document.querySelector('#reg_unit_btn').innerHTML='+';
                           div_unit.style.display="none";
                        }
                  }
                  catch (e) {
                    // document.getElementById("demo").innerHTML = e.name;
                    console.log({
                        'The error is':e.name
                    })
                }
                
              }

              var _token = $('input[name="_token"]').val();
            $(document).on('click', '#reg_unit_detials_btn', function() {
              if(!confirm("Did you want to add this Detials of this unit?")) {
                      return false;
                  }
                  try{
                      $.ajax({
                          url:"{{route('regUnitDetails')}}",
                          method:"POST",
                          data:$(this).parents("form"),
                      });
                  }
                  catch (e) {
                      document.getElementById("demo").innerHTML = e.name;
                  }
              });
        </script>
</div>
@endsection