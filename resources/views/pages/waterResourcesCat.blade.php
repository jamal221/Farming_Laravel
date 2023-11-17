<div class="card-body" id="div_pit" style="display: none">
    <div style="padding: 20px" class="card card-primary"  >
       <h1 class="text">Pit Options</h1>
        <form action="{{route('regChah')}}"  method="POST" id="pitForm">
            <div class="form-group">
                <div class="container-flouid">
                    <div class="row">
                            <label for="pit_type"> Pit Types: </label>
                            <select class="form-group" id="pit_type" name="pit_type">
                                <option> Select pits</option>
                                <option value="1"> wide opening</option>
                                <option value="2"> Deep</option>
                            </select>                        
                    </div>
                    
                </div>
            </div>
            <div class="form-group">
                <div class="container-flouid">
                    <div class="row">
                            <label for="pit_body"> Pit Body type: </label>
                            <select id="pit_body" class="form-group" name="pit_body">
                                <option> Select pits body</option>
                                <option value="1"> Soil</option>
                                <option value="2"> Stone</option>
                            </select>                        
                    </div>
                    
                </div>
            </div>
                <div class="form-group">
                    <label for="Diameter">Diameter of the well opening (centimeters): </label>
                    <input type="text"  class="form-control" name="Diameter" id="Diameter" >
                </div>
                <div class="form-group">
                    <label for="pit_height">Height:</label>
                    <input type="text"  class="form-control" name="pit_height" id="pit_height" >
                </div>
                
                <div class="form-group">
                    <label for="drilling">Year of drilling the well:</label>
                    <input type="text"   class="form-control" id="drilling" name="drilling_year" >
                </div>
                <div class="form-group">
                    <label for="YearMade">Year of operation of the well</label>
                    <input type="text"   class="form-control" id="YearMade" name="apply_year" >
                </div>
                <div class="form-group">
                    <label for="water_height">water height (cm):</label>
                    <input type="text"  class="form-control" id="water_height" name="water_height" >
                </div>
                
                <div class="form-group">
                    <label for="incide_water">Volume of water (cubic meters):</label>
                    <input type="text"  class="form-control" id="incide_water" name="incide_water" >
                </div>
                <div class="form-group">
                    <label for="permission_water">Permission watter(Litter/ Second):</label>
                    <input type="text"  class="form-control" id="permission_water" name="permission_water" >
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="reg_pit_detials_btn">Register Pit Detials</button>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden"  type="text" class="inputTable" name="farm_id_input" value={{$fetched_farms[0]->FarmID}}>

            </form>
        </div>
</div>

    <div class="card-body" id="div_pool" style="display: none">
        <div style="padding: 20px" class="card card-primary"  >
           <h1 class="text">Pool Options</h1>
            <form action="{{route('regPool')}}"  method="POST" id="poolForm">
                <div class="form-group">
                    <div class="container-flouid">
                        <div class="row">
                                <label for="pool_type"> Pool Type: </label>
                                <select class="form-group" id="pool_type" name="pool_type">
                                    <option value=""> Select pools</option>
                                    <option value="1"> Soil</option>
                                    <option value="2"> Stone</option>
                                    <option value="3"> Soil Covered</option>
                                </select>                        
                        </div>
                        
                    </div>
                </div>
                    <div class="form-group">
                        <label for="length">Pool length(meters): </label>
                        <input type="text"  class="form-control" name="length" id="length" >
                    </div>
                    <div class="form-group">
                        <label for="width">Pool width:</label>
                        <input type="text"  class="form-control" name="width" id="width" >
                    </div>
                    
                    <div class="form-group">
                        <label for="deep">Pool deep:</label>
                        <input type="text"   class="form-control" id="deep" name="deep" >
                    </div>
                    <div class="form-group">
                        <label for="YearMade">Year of operation of the pool</label>
                        <input type="text"   class="form-control" id="YearMade" name="YearMade" >
                    </div>
                    <div class="form-group">
                        <label for="YearUse">Year of using the pool</label>
                        <input type="text"   class="form-control" id="YearUse" name="YearUse" >
                    </div>
                    <div class="form-group">
                        <label for="water_height">pool water height (cm):</label>
                        <input type="text"  class="form-control" id="water_height" name="water_height" >
                    </div>
                    
                    <div class="form-group">
                        <label for="inside_water">Volume of water (cubic meters):</label>
                        <input type="text"  class="form-control" id="inside_water" name="inside_water" >
                    </div>
                    <div class="form-group">
                        <label for="permission_water">Permission watter(Litter/ Second):</label>
                        <input type="text"  class="form-control" id="permission_water" name="permission_water" >
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="reg_pool_detials_btn">Register pool Detials</button>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden"  type="text" class="inputTable" name="farm_id_input" value={{$fetched_farms[0]->FarmID}}>
    
                </form>
            </div>
    </div>


        <div class="card-body" id="div_tank" style="display: none">
            <div style="padding: 20px" class="card card-primary"  >
               <h1 class="text">tank Options</h1>
                <form action="{{route('regTank')}}"  method="POST" id="tankForm">
                    <div class="form-group">
                        <div class="container-flouid">
                            <div class="row">
                                    <label for="tank_type"> Tank Type: </label>
                                    <select class="form-group" id="tank_type" name="tank_type">
                                        <option value=""> Select Types</option>
                                        <option value="1"> Soil</option>
                                        <option value="2"> Stone</option>
                                        <option value="3"> Soil Covered</option>
                                    </select>                        
                            </div>
                            
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="length">Tank length(meters): </label>
                            <input type="text"  class="form-control" name="length" id="length" >
                        </div>
                        <div class="form-group">
                            <label for="width">Tank width:</label>
                            <input type="text"  class="form-control" name="width" id="width" >
                        </div>
                        
                        <div class="form-group">
                            <label for="deep"> Tank Height:</label>
                            <input type="text"   class="form-control" id="height" name="height" >
                        </div>
                        <div class="form-group">
                            <label for="YearMade">Year of Building:</label>
                            <input type="text"   class="form-control" id="YearMade" name="YearMade" >
                        </div>
                        <div class="form-group">
                            <label for="YearUse">Year of use:</label>
                            <input type="text"   class="form-control" id="YearUse" name="YearUse" >
                        </div>
                        <div class="form-group">
                            <label for="water_height">Tank water height (cm):</label>
                            <input type="text"  class="form-control" id="water_height" name="water_height" >
                        </div>
                        
                        <div class="form-group">
                            <label for="inside_water">Volume of water (cubic meters):</label>
                            <input type="text"  class="form-control" id="inside_water" name="inside_water" >
                        </div>
                        <div class="form-group">
                            <label for="permission_water">Permission watter(Litter/ Second):</label>
                            <input type="text"  class="form-control" id="permission_water" name="permission_water" >
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="reg_tank_detials_btn">Register Tank Detials</button>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden"  type="text" class="inputTable" name="farm_id_input" value={{$fetched_farms[0]->FarmID}}>
        
                    </form>
                </div>
        </div>

            <div class="card-body" id="div_river" style="display: none">
                <div style="padding: 20px" class="card card-primary"  >
                   <h1 class="text">River Options</h1>
                    <form action="{{route('regRiver')}}"  method="POST" id="riverForm">
                            <div class="form-group">
                                <label for="depth">placement depth: </label>
                                <input type="text"  class="form-control" name="depth" id="depth" >
                            </div>
                            <div class="form-group">
                                <label for="Pipe">Pipe size of water(inch):</label>
                                <input type="text"  class="form-control" name="Pipe" id="Pipe" >
                            </div>
                            
                            <div class="form-group">
                                <label for="height"> Water height from the valve surface (meters):</label>
                                <input type="text"   class="form-control" id="height" name="height" >
                            </div>
                            <div class="form-group">
                                <label for="permission_water">Permission watter(Litter/ Second):</label>
                                <input type="text"  class="form-control" id="permission_water" name="permission_water" >
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" id="reg_river_detials_btn">Register River Detials</button>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden"  type="text" class="inputTable" name="farm_id_input" value={{$fetched_farms[0]->FarmID}}>
            
                        </form>
                    </div>
            </div>

                <div class="card-body" id="div_pipes" style="display: none">
                    <div style="padding: 20px" class="card card-primary"  >
                       <h1 class="text">Network Pipe Options</h1>
                        <form action="{{route('regPipe')}}"  method="POST" id="pipesForm">
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="container-flouid">
                                        <div class="row">
                                                <label for="pipeType"> Pipe type to Irrigation: </label>
                                                <select class="form-group" id="pipeType" name="pipeType">
                                                    <option value=""> Select Types</option>
                                                    <option value="1"> polymer</option>
                                                    <option value="2"> metallic</option>
                                                    <option value="3"> concrete</option>
                                                </select>                        
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                                <div class="form-group">
                                    <label for="diameterIrrigate">Pipe Diameter Irrigation (inch): </label>
                                    <input type="text"  class="form-control" name="diameterIrrigate" id="diameterIrrigate" >
                                </div>
                                <div class="form-group">
                                    <label for="diameterWater">Pipe Diameter get water (inch):</label>
                                    <input type="text"  class="form-control" name="diameterWater" id="diameterWater" >
                                </div>
                                <div class="form-group">
                                    <label for="permission_water">Permission watter(Litter/ Second):</label>
                                    <input type="text"  class="form-control" id="permission_water" name="permission_water" >
                                </div>
                                
                               
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" id="reg_pipe_detials_btn">Register Pipes Detials</button>
                                </div>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden"  type="text" class="inputTable" name="farm_id_input" value={{$fetched_farms[0]->FarmID}}>
                
                            </form>
                        </div>
            </div>

                    <div class="card-body" id="div_channel" style="display: none">
                        <div style="padding: 20px" class="card card-primary"  >
                           <h1 class="text">Channel Options</h1>
                            <form action="{{route('regChannel')}}"  method="POST" id="channelForm">
                                <div class="form-group">
                                    <div class="form-group">
                                        <div class="container-flouid">
                                            <div class="row">
                                                    <label for="channelType"> Channel type to Irrigation: </label>
                                                    <select class="form-group" id="channelType" name="channelType">
                                                        <option value=""> Select Types</option>
                                                        <option value="1"> polymer</option>
                                                        <option value="2"> Soil</option>
                                                        <option value="3"> concrete</option>
                                                        <option value="4"> Soil Covered</option>
                                                    </select>                        
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <label for="channelWidth">channel width Irrigation( centimeters): </label>
                                        <input type="text"  class="form-control" name="channelWidth" id="channelWidth" >
                                    </div>
                                    <div class="form-group">
                                        <label for="pipSize">Pipe Size get water( inch):</label>
                                        <input type="text"  class="form-control" name="pipSize" id="pipSize" >
                                    </div>
                                    <div class="form-group">
                                        <label for="waterHeightSensor">Water height from the valve surface (meters):</label>
                                        <input type="text"  class="form-control" name="waterHeightSensor" id="waterHeightSensor" >
                                    </div>
                                    <div class="form-group">
                                        <label for="permission_water">Permission watter(Litter/ Second):</label>
                                        <input type="text"  class="form-control" id="permission_water" name="permission_water" >
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" id="reg_channel_detials_btn">Register Channel Detials</button>
                                    </div>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden"  type="text" class="inputTable" name="farm_id_input" value={{$fetched_farms[0]->FarmID}}>
                    
                                </form>
                            </div>
                </div>
    
                
            