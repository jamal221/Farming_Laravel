@extends('layouts.main')
@section('content2')
<div class="card-header" id="all"style="width: 200%">

        {{-- @foreach($user_fetched as $key => $value)
            <h3 class="card-title">You are adding unit for this user: <p style="background-color: blueviolet">  {{$value->name}}   {{$value->family}}</p></h3>
            <h2 class="card-title">Please press + to add new unit of this farm user</h2>
        
            <div class="card card-primary">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card-body" >
                        <button type="submit" class="btn btn-primary" id="reg_unit_btn">+</button>
                    </div>               
            </div>
        @endforeach   --}}
        {{-- {{dd($fetched_farm)}} --}}
        <div class="card-header">
            @if(session()->has('Transaction_Response_unit_add'))
                <div class="alert alert-success" id="User_registered">
                    {{ session()->get('Transaction_Response_unit_add') }}
                </div>
            @endif
            @if(session()->has('Transaction_Response_unit_add_fail'))
                <div class="alert alert-warning" id="User_registered2">
                    {{ session()->get('Transaction_Response_unit_add_fail') }}
                </div>
            @endif
        </div>
        @foreach($fetched_farm as $key=>$value)
            @for($i=0; $i<$value->farm_unit; $i++)
                {{-- <h1>{{$value->farm_unit}}</h1> --}}
                <h2 class="card-title">Please press + to add new unit {{$i+1}} of this farm</h2>
                <div class="card card-primary">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card-body" >
                        <button type="submit" class="btn btn-primary" onclick="callFormUnitDetials({{$i+1}}, {{$value->id}})"   id="reg_unit_btn">+</button>
                    <div id="div{{$i+1}}" style="display: none">
                        
                        <form action="{{route('regUnitDetails')}}"  method="POST"  id="form{{$i+1}}">
                            <table  class="table table-bordered myclassTable"  id="Costumer_Table" style="width: 150%;">
                            
                                <tbody>
                                    <tr><td>Fatures of Farm</td><td>Soil Analyze</td></tr>
                                        <tr>
                                            <td   class="col_me1" data-column_name="costumer_count"  >Unit ID</td>
                                            <td    class="column_name" id="Unit ID" ><input type="text" name="Unit_ID" class="inputTable" value="{{$i+1}}" readonly ></td>
                                            <td   class="col_me2" data-column_name="costumer_count"   >electrical conductivity (Ec)</td>
                                            <td    class="column_name" id="electrical conductivity"  ><input name="electrical_conductivity" type="text" class="inputTable" ></td>
                                        </tr>
                                        <tr>
                                            <td class="col_me1" data-column_name="costumer_count"  >Size by Hektar</td>
                                            <td    class="column_name" id="size_hektare"  ><input name="size_hektare" type="text" class="inputTable" ></td>
                                            <td   class="col_me2" data-column_name="costumer_count"   >Soil acidity (Ph)</td>
                                            <td    class="column_name" id="Soil acidity"  ><input name="Soil_acidity"  type="text" class="inputTable" ></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="col_me1" data-column_name="costumer_count"  >Number of the main irrigation valve of the unit:</td>
                                            <td    class="column_name" id="Number of the main irrigation"  ><input name="Number_of_main_irrigation" type="text" class="inputTable" ></td>
                                            <td   class="col_me2" data-column_name="costumer_count"   >soil pattern</td>
                                            <td    class="column_name" id="soil pattern"  ><input name="soil_pattern" type="text" class="inputTable" ></td>
                                        </tr>
                                        <tr>
                                            <td class="col_me1" data-column_name="costumer_count"  >Genetic profile (code):</td>
                                            <td    class="column_name" id="Genetic profile"  ><input  name="Genetic_profile"type="text" class="inputTable" ></td>
                                            <td   class="col_me2" data-column_name="costumer_count"   >Lime (Tnv)</td>
                                            <td    class="column_name" id="Lime"  ><input name="Lime" type="text" class="inputTable" ></td>
                                        </tr>
                                        <tr>
                                            <td class="col_me1" data-column_name="costumer_count"  >Number of plants/trees per unit:</td>
                                            <td    class="column_name" id="Number of plants/trees"  ><input name="Number_of_plants_trees" type="text" class="inputTable" ></td>
                                            <td   class="col_me2" data-column_name="costumer_count"   >organic matter</td>
                                            <td    class="column_name" id="organic matter"  ><input name="organic_matter" type="text" class="inputTable" ></td>
                                        </tr>
                                        <tr>
                                            <td class="col_me1" data-column_name="costumer_count"  >Planting year:</td>
                                            <td    class="column_name" id="planting year"  ><input  name="planting_year"type="text" class="inputTable" ></td>
                                            <td   class="col_me2" data-column_name="costumer_count"   >Nitrate</td>
                                            <td    class="column_name" id="Nitrate"  ><input name="Nitrate" type="text" class="inputTable" ></td>
                                        </tr>
                                        <tr>
                                            <td class="col_me1" data-column_name="costumer_count"  >Year of operation:</td>
                                            <td    class="column_name" id="Year of operation"  ><input name="Year_operation" type="text" class="inputTable" ></td>
                                            <td   class="col_me2" data-column_name="costumer_count"   >nitrogen</td>
                                            <td    class="column_name" id="nitrogen"  ><input name="nitrogen" type="text" class="inputTable" ></td>
                                        </tr>
                                        <tr>
                                            <td class="col_me1" data-column_name="costumer_count"  >Age of plant/tree:</td>
                                            <td    class="column_name" id="Age of plant/tree"  ><input  name="Age_plant_tree" type="text" class="inputTable" ></td>
                                            <td   class="col_me2" data-column_name="costumer_count"   >phosphorus</td>
                                            <td    class="column_name" id="phosphorus"  ><input name="phosphorus" type="text" class="inputTable" ></td>
                                        </tr>
                                        <tr>
                                            <td class="col_me1" data-column_name="costumer_count"  >Average plant/tree height (cm):</td>
                                            <td    class="column_name" id="Average plant/tree height"  ><input name="Average_plant_tree_height" type="text" class="inputTable" ></td>
                                            <td   class="col_me2" data-column_name="costumer_count"   >potassium</td>
                                            <td    class="column_name" id="potassium"  ><input name="potassium" type="text" class="inputTable" ></td>
                                        </tr>
                                        <tr>
                                            <td class="col_me1" data-column_name="costumer_count"  >The average diameter of the plant/tree trunk (centimeters):</td>
                                            <td    class="column_name" id="average diameter"  ><input name="average_diameter" type="text" class="inputTable" ></td>
                                            <td   class="col_me2" data-column_name="costumer_count"   >Calcium</td>
                                            <td    class="column_name" id="Calcium"  ><input name="Calcium" type="text" class="inputTable" ></td>
                                        </tr>
                                        <tr>
                                            <td class="col_me1" data-column_name="costumer_count"  >Unit coordinates (UTM):</td>
                                            <td    class="column_name" id="Unit coordinates"  ><input name="Unit_coordinates" type="text" class="inputTable" ></td>
                                            <td   class="col_me2" data-column_name="costumer_count"   >magnesium</td>
                                            <td    class="column_name" id="magnesium"  ><input name="magnesium" type="text" class="inputTable" ></td>
                                        </tr>
                                        <tr>
                                            <td class="col_me1" data-column_name="costumer_count"  >The number of soil moisture sensors per unit:</td>
                                            <td    class="column_name" id="number of soil"  ><input name="number_of_soil" type="text" class="inputTable" ></td>
                                            <td   class="col_me2" data-column_name="costumer_count"   >sulfur</td>
                                            <td    class="column_name" id="sulfur"><input name="sulfur" type="text" class="inputTable" ></td>
                                        </tr>
                                        <tr>
                                            <td class="col_me1" data-column_name="costumer_count"  >Soil moisture sensor number:</td>
                                            <td    class="column_name" id="Soil moisture"  ><input name="Soil_moisture" type="text" class="inputTable" ></td>
                                            <td   class="col_me2" data-column_name="costumer_count"   >iron</td>
                                            <td    class="column_name" id="iron"  ><input name="iron" type="text" class="inputTable" ></td>
                                        </tr>
                                        <tr>
                                            <td class="col_me1" data-column_name="costumer_count"  >The diameter of the pipes at the foot of the tree (mm):</td>
                                            <td    class="column_name" id="diameter of the pipes"  ><input name="diameter_pipes" type="text" class="inputTable" ></td>
                                            <td   class="col_me2" data-column_name="costumer_count"   >zinc</td>
                                            <td    class="column_name" id="zinc"  ><input name="zinc" type="text" class="inputTable" ></td>
                                        </tr>
                                        <tr>
                                            <td class="col_me1" data-column_name="costumer_count"  >Type of dropper:</td>
                                            <td    class="column_name" id="dropper"  ><input name="dropper" type="text" class="inputTable" ></td>
                                            <td   class="col_me2" data-column_name="costumer_count"   >Manganese</td>
                                            <td    class="column_name" id="Manganese"  ><input name="Manganese" type="text" class="inputTable" ></td>
                                        </tr>
                                        <tr>
                                            <td class="col_me1" data-column_name="costumer_count"  >Number of drippers at the foot of the plant/tree:</td>
                                            <td    class="column_name" id="Number of drippers"  ><input name="Number of drippers" type="text" class="inputTable" ></td>
                                            <td   class="col_me2" data-column_name="costumer_count"   >copper</td>
                                            <td    class="column_name" id="copper"  ><input name="copper" type="text" class="inputTable" ></td>
                                        </tr>
                                        <tr>
                                            <td class="col_me1" data-column_name="costumer_count"  >The total number of droppers per unit:</td>
                                            <td    class="column_name" id="total number"  ><input  name="total number" type="text" class="inputTable" ></td>
                                            <td   class="col_me2" data-column_name="costumer_count"   >Bor</td>
                                            <td    class="column_name" id="Bor"  ><input name="Bor" type="text" class="inputTable" ></td>
                                        </tr>
                                        <tr>
                                            <td class="col_me1" data-column_name="costumer_count"  >Dropper flow rate (liters per hour):</td>
                                            <td    class="column_name" id="Dropper"  ><input name="Dropper" type="text" class="inputTable" ></td>
                                            <td   class="col_me2" data-column_name="costumer_count"   >sodium</td>
                                            <td    class="column_name" id="sodium"  ><input name="sodium" type="text" class="inputTable" ></td>
                                        </tr>
                                        <tr>
                                            <td class="col_me1" data-column_name="costumer_count"  >Total flow rate of single droppers (liters per hour):</td>
                                            <td    class="column_name" id="flow rate of single"  ><input name="flow_rate_of_single" type="text" class="inputTable" ></td>
                                            <td   class="col_me2" data-column_name="costumer_count"   >Sodium Absorption Ratio (Sar)</td>
                                            <td    class="column_name" id="Sodium Absorption"  ><input name="Sodium Absorption" type="text" class="inputTable" ></td>
                                        </tr>
                                        <tr>
                                            
                                    
                                        </tr>
                                        
                                </tbody>
                            </table>
                            <input type="hidden" type="text" class="inputTable" name="unit_id_input" value={{$i+1}}>
                            <input type="hidden"  type="text" class="inputTable" name="farm_id_input" value={{$value->id}}>
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
       
        @endforeach
        
        
        
        

        
        <script >
              function callFormUnitDetials(unit_id, farm_id){
                if(!confirm("Would you like to add unit for this farme?")) {
                      return false;
                  }
                  try{
                    var div_id="div"+unit_id;
                    // alert(div_id);
                    var div_unit=document.getElementById(div_id);
                    if(div_unit.style.display!="block")
                        div_unit.style.display="block";
                    else
                        div_unit.style.display="none";
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