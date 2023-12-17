@extends('layouts.main')
@section('content2')
<div class="card-header" id="all"style="width: 200%">
        {{-- @dd($fetched_farms) --}}
        
            <div class="card card-primary">
                <h1 style="padding-left: 30px">You are adding Channel analyze result to this farm</h1>
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
                        <div class="form-group">
                            <label for="ChannelNum">Number of Channels for this Farm:</label>
                            <input type="text" readonly="true" class="form-control" id="ChannelNum" name="ChannelNum" value="{{$fetched_Channels_count}}">
                        </div>
                            <input hidden type="text" class="form-control" id="costumerID" name="costumerID"  value="{{$fetched_farms[0]->UserID}}">
                    </div>
            </div>
</div>
<div id="Res_Response" ></div>
<div class="card-header" id="Div_Reg_Analyze_able"  style="display: none">
<table class="table table-bordered"  id="Reg_Analyze_able" style="width: 200%;">
    <thead>
        <tr>
            <th>Row</th>
            <th>Items</th>
            <th>Value(Pleasse Insert Here)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Electrical conductivity/EC</td>
            <td contenteditable  class="column_name" id="EC"></td>
        </tr>
        <tr>
            <td>2</td>
            <td>PH</td>
            <td contenteditable  class="column_name" id="PH"></td>
        </tr>
        <tr>
            <td>3</td>
            <td>SAR</td>
            <td contenteditable  class="column_name"  id="SAR"></td>
        </tr>
        <tr>
            <td>4</td>
            <td>Hardness</td>
            <td contenteditable  class="column_name" id="Hardness"></td>
        </tr>
        <tr>
            <td>5</td>
            <td>TDS</td>
            <td contenteditable  class="column_name" id="TDS"></td>
        </tr>
        <tr>
            <td>6</td>
            <td>aluminum</td>
            <td contenteditable  class="column_name" id="aluminum"></td>
        </tr>
        <tr>
            <td>7</td>
            <td>Arsenic</td>
            <td contenteditable  class="column_name" id="Arsenic"></td>
        </tr>
        <tr>
            <td>8</td>
            <td>beryllium</td>
            <td contenteditable  class="column_name" id="beryllium"></td>
        </tr>
        <tr>
            <td>9</td>
            <td>cadmium</td>
            <td contenteditable  class="column_name" id="cadmium"></td>
        </tr>
        <tr>
            <td>10</td>
            <td>Cobalt</td>
            <td contenteditable  class="column_name" id="Cobalt"></td>
        </tr>
        <tr>
            <td>11</td>
            <td>chromium</td>
            <td contenteditable  class="column_name" id="chromium"></td>
        </tr>
        <tr>
            <td>12</td>
            <td>copper</td>
            <td contenteditable  class="column_name" id="copper"></td>
        </tr>
        <tr>
            <td>13</td>
            <td>Fe</td>
            <td contenteditable  class="column_name" id="Fe"></td>
        </tr>
        <tr>
            <td>14</td>
            <td>lithium</td>
            <td contenteditable  class="column_name" id="lithium"></td>
        </tr>
        <tr>
            <td>15</td>
            <td>Manganese</td>
            <td contenteditable  class="column_name" id="Manganese"></td>
        </tr>
        <tr>
            <td>16</td>
            <td>molybdenum</td>
            <td contenteditable  class="column_name" id="molybdenum"></td>
        </tr>
        <tr>
            <td>17</td>
            <td>nickel</td>
            <td contenteditable  class="column_name" id="nickel"></td>
        </tr>
        <tr>
            <td>18</td>
            <td>palladium</td>
            <td contenteditable  class="column_name" id="palladium"></td>
        </tr>
        <tr>
            <td>19</td>
            <td>Selenium</td>
            <td contenteditable  class="column_name" id="Selenium"></td>
        </tr>
        <tr>
            <td>20</td>
            <td>vanadium</td>
            <td contenteditable  class="column_name" id="vanadium"></td>
        </tr>
        <tr>
            <td>21</td>
            <td>Zinc</td>
            <td contenteditable  class="column_name" id="Zinc"></td>
        </tr>
        <tr>
            <td>22</td>
            <td>Fluorine</td>
            <td contenteditable  class="column_name" id="Fluorine"></td>
        </tr>
        <tr>
            <td>23</td>
            <td>Br</td>
            <td contenteditable  class="column_name" id="Br"></td>
        </tr>
        <tr>
            <td>24</td>
            <td>Nitrate nitrogen</td>
            <td contenteditable  class="column_name" id="Nitrate_nitrogen"></td>
        </tr>
        <tr>
            <td>25</td>
            <td>microbial</td>
            <td contenteditable  class="column_name" id="microbial"></td>
        </tr>
        <tr>
            <td>26</td>
            <td>water salinity</td>
            <td contenteditable  class="column_name" id="water_salinity"></td>
        </tr>
        <tr>
            <td>27</td>
            <td>animosity</td>
            <td contenteditable  class="column_name" id="animosity"></td>
        </tr>
            <td colspan="3">
                <button type="button" class="btn btn-success btn-xs add_water_analyze" style="width: 100%" >Register Data</button>
            </td>
        <tr>
        </tr>
    </tbody>
</table>
</div>
@if($fetched_Channels_count)
@php
    $count=1;
    $div_width=100/(int)$fetched_Channels_count;
@endphp
   
<div style="width: 100%">       
    @foreach($fetched_Channels as $key=>$value)
       
        
                {{-- @dd($fetched_farms) --}}
                <div class="card-header" id="ChannelsAll" style="width:{{$div_width}}%">
                    <div class="card card-primary" >
                        <div class="card-body" >
                                        <div class="form-group" >
                                            <label for="Channels{{$value->id}}">Channels : {{$count++}}</label>
                                            @if(in_array($value->id, $fetched_Channels_Analyzed))
                                                <button type="button" name="Channels{{$value->id}}" id="Channels{{$value->id}}" onclick="updateValues({{$value->id}}, {{$fetched_farms[0]->FarmID}})" class="btn btn-success btn-xs show_analyze_table"  >Show Table to Update</button>
                                            @else
                                                <button type="button" name="Channels{{$value->id}}" id="Channels{{$value->id}}" onclick="regValues({{$value->id}}, {{$fetched_farms[0]->FarmID}})" class="btn btn-info btn-xs show_analyze_table"  >Show Table to Register</button>
                                            @endif
                                        </div>
                        </div>  
                    </div>  
                </div>
            
       
    @endforeach
<div>
        
    

@else
    <h1 style="color: red">There is no Channels to register analyze</h1>

@endif

<script type="text/javascript">
    let Resource_ID_page=0;
    let FarmID_page=0;
    var _token = $('input[name="_token"]').val();
        function regValues(ChannelID,FarmID){
            Resource_ID_page=ChannelID;
            FarmID_page=FarmID;
            // For div refreshing without creating div inside yours with same id, you should use this inside your function
            //https://stackoverflow.com/questions/33801650/how-do-i-refresh-a-div-content
            $("#Div_Reg_Analyze_able").load(" #Div_Reg_Analyze_able > *");
            document.getElementById("Div_Reg_Analyze_able").style.display="block";
            
        }
    
        $(document).on('click', '.add_water_analyze', function(){
            if(!confirm("Did you want to Register the detials of this Analyze to this Channel?")) {
                  return false;
              };
            
            var analyze_res=[];
            var rowsCount=document.getElementById("Reg_Analyze_able").rows.length;
            for( let i=1; i<rowsCount-2; i++){
                analyze_res[i-1]=document.getElementById("Reg_Analyze_able").rows[i].cells.item(2).innerHTML;  
            }

            console.log({
                "Channel_ID":Resource_ID_page,
                "rowsCount":rowsCount,
                "FarmID_page":FarmID_page,
                "analyze_res":analyze_res,
                "Token":_token
            })
    
                                    $.ajax({    
                                        url:"{{ route('RegAnalyzeWaterChannels') }}",
                                        method:"POST",
                                        data:{
                                             Resource_ID:Resource_ID_page,
                                             farm_ID:FarmID_page,
                                             analyze_res:analyze_res,
                                            _token:_token
                                        },
                                        success: function(data){ // What to do if we succeed
                                            $('#Res_Response').html(data);
                                            document.getElementById("Div_Reg_Analyze_able").style.display="none";
                                            location.reload();
                                        },
                                        error: function(data){
                                            alert('Error'+data);
                                            // location.reload();
                                            // console.log(data);
                                        }
                                    })
    
    
        })
    function updateValues(ChannelID, FarmID){
        Resource_ID_page=ChannelID;
        FarmID_page=FarmID;
        console.log({
            "Channel_ID":ChannelID,
            "Farm_ID":FarmID
        })
                                 $.ajax({    
                                        url:"{{ route('AnalyzedChannelsData') }}",
                                        method:"POST",
                                        data:{
                                             Resource_ID:ChannelID,
                                             farm_ID:FarmID,
                                            _token:_token
                                        },
                                        success: function(data){ // What to do if we succeed
                                            // $('#Res_Response').html(data[0]['id']);
                                            document.getElementById("EC").innerHTML=data[0]['EC'];
                                            document.getElementById("PH").innerHTML=data[0]['PH'];
                                            document.getElementById("SAR").innerHTML=data[0]['SAR'];
                                            document.getElementById("Hardness").innerHTML=data[0]['Hardness'];
                                            document.getElementById("TDS").innerHTML=data[0]['TD5'];
                                            document.getElementById("aluminum").innerHTML=data[0]['aluminum'];
                                            document.getElementById("Arsenic").innerHTML=data[0]['Arsenic'];
                                            document.getElementById("beryllium").innerHTML=data[0]['beryllium'];
                                            document.getElementById("cadmium").innerHTML=data[0]['cadmium'];
                                            document.getElementById("Cobalt").innerHTML=data[0]['Cobalt'];
                                            document.getElementById("chromium").innerHTML=data[0]['chromium'];
                                            document.getElementById("copper").innerHTML=data[0]['copper'];
                                            document.getElementById("Fe").innerHTML=data[0]['Fe'];
                                            document.getElementById("lithium").innerHTML=data[0]['lithium'];
                                            document.getElementById("Manganese").innerHTML=data[0]['Manganese'];
                                            document.getElementById("molybdenum").innerHTML=data[0]['molybdenum'];
                                            document.getElementById("nickel").innerHTML=data[0]['nickel'];
                                            document.getElementById("palladium").innerHTML=data[0]['palladium'];
                                            document.getElementById("Selenium").innerHTML=data[0]['Selenium'];
                                            document.getElementById("vanadium").innerHTML=data[0]['vanadium'];
                                            document.getElementById("Zinc").innerHTML=data[0]['Zinc'];
                                            document.getElementById("Fluorine").innerHTML=data[0]['Fluorine'];
                                            document.getElementById("Br").innerHTML=data[0]['Br'];
                                            document.getElementById("Nitrate_nitrogen").innerHTML=data[0]['Nitrate'];
                                            document.getElementById("microbial").innerHTML=data[0]['microbial'];
                                            document.getElementById("water_salinity").innerHTML=data[0]['salinity'];
                                            document.getElementById("animosity").innerHTML=data[0]['animosity'];
                                            document.getElementById("Div_Reg_Analyze_able").style.display="block";


                                        },
                                        error: function(data){
                                            alert('Error'+data);
                                            // location.reload();
                                            // console.log(data);
                                        }
                                    })
        

    }
    </script>


@endsection
