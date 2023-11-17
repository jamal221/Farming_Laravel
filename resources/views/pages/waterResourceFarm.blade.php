@extends('layouts.main')
@section('content2')
<div class="card-header" id="all"style="width: 200%">
        <div class="card-header">
            @if(session()->has('Transaction_Response_water_add'))
                <div class="alert alert-success" id="User_registered">
                    {{ session()->get('Transaction_Response_water_add') }}
                </div>
            @endif
            @if(session()->has('Transaction_Response_water_add_fail'))
                <div class="alert alert-warning" id="User_registered2">
                    {{ session()->get('Transaction_Response_water_add_fail') }}
                </div>
            @endif
        </div>
        {{-- @dd($fetched_farms) --}}
        
            <div class="card card-primary">
                <h1>You are adding water Resources option to this farm</h1>
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
            <div class="form-group">
                <h1 class="h1">Number of Water Resources is showing in below table</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Row</th>
                            <th>Water Resource</th>
                            <th>count</th>
                            <th>Operation</th>
                        </tr>
                        </thead>
                        <tbody>
                            {{-- @dd({{$count_pits}}) --}}
                            <tr>
                                <td class="column_name" name="row">1</td>
                                <td class="column_name" name="pits">Pits</td>
                                <td class="column_name" name="pitsData"><span class="span">{{$count_pits}}</span></td>
                                @if($count_pits!=0)
                                    <td>
                                        <button type="button" class="btn btn-success btn-xs view_pits" data-id={{ $fetched_farms[0]->FarmID}}>View Defined Pits</button>
                                    </td>
                                @endif
                            </tr>
                            <tr>
                                <td class="column_name" name="row">2</td>
                                <td class="column_name" name="pools">Pool</td>
                                <td class="column_name" name="poolsData"><span class="span">{{$count_pool}}</span></td>
                                @if($count_pool)
                                    <td>
                                        <button type="button" class="btn btn-success btn-xs view_pool" data-id={{ $fetched_farms[0]->FarmID}}>View Defined Pools</button>
                                    </td>
                                @endif
                            </tr>
                            <tr>
                                <td class="column_name" name="row">3</td>
                                <td class="column_name" name="tanks">Tank</td>
                                <td class="column_name" name="tanksData"><span class="span">{{$count_tank}}</span></td>
                                @if($count_tank)
                                    <td>
                                        <button type="button" class="btn btn-success btn-xs view_tank" data-id={{ $fetched_farms[0]->FarmID}}>View Defined Tanks</button>
                                    </td>
                                @endif
                            </tr>
                            <tr>
                                <td class="column_name" name="row">4</td>
                                <td class="column_name" name="river">River</td>
                                <td class="column_name" name="riverData"><span class="span">{{$count_river}}</span></td>
                                @if($count_river)
                                    <td>
                                        <button type="button" class="btn btn-success btn-xs view_river" data-id={{ $fetched_farms[0]->FarmID}}>View Defined Rivers</button>
                                    </td>
                                @endif
                            </tr>
                            <tr>
                                <td class="column_name" name="row">5</td>
                                <td class="column_name" name="pipe">Pipe</td>
                                <td class="column_name" name="pipeData"><span class="span">{{$count_pipe}}</span></td>
                                @if($count_pipe)
                                    <td>
                                        <button type="button" class="btn btn-success btn-xs view_pipe" data-id={{ $fetched_farms[0]->FarmID}}>View Defined Pipes</button>
                                    </td>
                                @endif
                            </tr>
                            <tr>
                                <td class="column_name" name="row">6</td>
                                <td class="column_name" name="channel">Channel</td>
                                <td class="column_name" name="channelData"><span class="span">{{$count_channel}}</span></td>
                                @if($count_channel)
                                    <td>
                                        <button type="button" class="btn btn-success btn-xs view_channel" data-id={{ $fetched_farms[0]->FarmID}}>View Defined Channels</button>
                                    </td>
                                @endif
                            </tr>
                        </tbody>

                </table>

            </div>
            {{-- @dd(var_dump($fetched_unit_irrigated_count)) --}}
            <h3 class="text"> Please select each water resource in below page and add it Manualy</h3>
            <div class="form-group">
                    <div class="container-flouid">
                        <div class="row">
                                <label for="Resources"> Resources: </label>
                                <select id="Resources" class="form-group">
                                    <option> Select Resource</option>
                                    <option value="1"> Pit</option>
                                    <option value="2"> Pool</option>
                                    <option value="3">Tank </option>
                                    <option value="4"> River</option>
                                    <option value="5">Network pipe</option>
                                    <option value="6">Network channel</option>
                                </select>                        
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-4 col-lg-4"  id="add_pit_div">
                                <button type="button" class="btn btn-success btn-md add_resource"  onclick="addwaterResourceFomr()" data-id={{ $fetched_farms[0]->FarmID}}>Add Water Resource</button>
                            </div>
                        </div>
                    </div>
                </div>

            @include('pages.waterResourcesCat')
            
                    
              
        
        
        

        
        <script >
            var _token = $('input[name="_token"]').val();
            function addwaterResourceFomr(){
                var res_list=document.getElementById("Resources").value;
                // alert(res_list);
                switch(res_list){
                    case "1":
                        document.getElementById('div_pit').style.display="block";
                        document.getElementById('div_pool').style.display="none";
                        document.getElementById('div_tank').style.display="none";
                        document.getElementById('div_river').style.display="none";
                        document.getElementById('div_pipes').style.display="none";
                        document.getElementById('div_channel').style.display="none";

                        break;
                    case "2":
                        document.getElementById('div_pit').style.display="none";
                        document.getElementById('div_pool').style.display="block";
                        document.getElementById('div_tank').style.display="none";
                        document.getElementById('div_river').style.display="none";
                        document.getElementById('div_pipes').style.display="none";
                        document.getElementById('div_channel').style.display="none";
                        break;
                    case "3":
                        document.getElementById('div_pit').style.display="none";
                        document.getElementById('div_pool').style.display="none";
                        document.getElementById('div_tank').style.display="block";
                        document.getElementById('div_river').style.display="none";
                        document.getElementById('div_pipes').style.display="none";
                        document.getElementById('div_channel').style.display="none";
                        break;
                    case "4":
                        document.getElementById('div_pit').style.display="none";
                        document.getElementById('div_pool').style.display="none";
                        document.getElementById('div_tank').style.display="none";
                        document.getElementById('div_river').style.display="block";
                        document.getElementById('div_pipes').style.display="none";
                        document.getElementById('div_channel').style.display="none";
                        break;
                    case "5":
                        document.getElementById('div_pit').style.display="none";
                        document.getElementById('div_pool').style.display="none";
                        document.getElementById('div_tank').style.display="none";
                        document.getElementById('div_river').style.display="none";
                        document.getElementById('div_pipes').style.display="block";
                        document.getElementById('div_channel').style.display="none";
                        break;
                    case "6":
                        document.getElementById('div_pit').style.display="none";
                        document.getElementById('div_pool').style.display="none";
                        document.getElementById('div_tank').style.display="none";
                        document.getElementById('div_river').style.display="none";
                        document.getElementById('div_pipes').style.display="none";
                        document.getElementById('div_channel').style.display="block";
                        break;
                    
                    default:
                        document.getElementById('div_pit').style.display="none";
                        document.getElementById('div_pool').style.display="none";
                        document.getElementById('div_tank').style.display="none";
                        document.getElementById('div_river').style.display="none";
                        document.getElementById('div_pipes').style.display="none";
                        document.getElementById('div_channel').style.display="none";
                        break;
                }                    
            }
            

              $(document).on('click', '#reg_pit_detials_btn', function() {
                if(!confirm("Did you want to add the detials of this pit to this farm?")) {
                      return false;
                  }
                  try{
                      $.ajax({
                          url:"{{route('regChah')}}",
                          method:"POST",
                          data:$(this).parents("form"),
                      });
                  }
                  catch (e) {
                    alert(e.name);
                    //   document.getElementById("demo").innerHTML = e.name;
                  }
              });
              
            
              $(document).on('click', '#reg_pool_detials_btn', function() {
                if(!confirm("Did you want to add the detials of this Pool to this farm?")) {
                      return false;
                  }
                  try{
                      $.ajax({
                          url:"{{route('regPool')}}",
                          method:"POST",
                          data:$(this).parents("form"),
                      });
                  }
                  catch (e) {
                    alert(e.name);
                    //   document.getElementById("demo").innerHTML = e.name;
                  }
              });
            
              $(document).on('click', '#reg_tank_detials_btn', function() {
                if(!confirm("Did you want to add the detials of this Tank to this farm?")) {
                      return false;
                  }
                  try{
                      $.ajax({
                          url:"{{route('regTank')}}",
                          method:"POST",
                          data:$(this).parents("form"),
                      });
                  }
                  catch (e) {
                    alert(e.name);
                    //   document.getElementById("demo").innerHTML = e.name;
                  }
              });

              $(document).on('click', '#reg_river_detials_btn', function() {
                if(!confirm("Did you want to add the detials of this River to this farm?")) {
                      return false;
                  }
                  try{
                      $.ajax({
                          url:"{{route('regRiver')}}",
                          method:"POST",
                          data:$(this).parents("form"),
                      });
                  }
                  catch (e) {
                    alert(e.name);
                    //   document.getElementById("demo").innerHTML = e.name;
                  }
              });

              

              $(document).on('click', '#reg_pipe_detials_btn', function() {
                if(!confirm("Did you want to add the detials of this Pipe network to this farm?")) {
                      return false;
                  }
                  try{
                      $.ajax({
                          url:"{{route('regPipe')}}",
                          method:"POST",
                          data:$(this).parents("form"),
                      });
                  }
                  catch (e) {
                    alert(e.name);
                    //   document.getElementById("demo").innerHTML = e.name;
                  }
              });

              $(document).on('click', '#reg_channel_detials_btn', function() {
                if(!confirm("Did you want to add the detials of this Channel to this farm?")) {
                      return false;
                  }
                  try{
                      $.ajax({
                          url:"{{route('regChannel')}}",
                          method:"POST",
                          data:$(this).parents("form"),
                      });
                  }
                  catch (e) {
                    alert(e.name);
                    //   document.getElementById("demo").innerHTML = e.name;
                  }
              });

              $(document).on('click', '.view_pits', function() {
                var id2=$(this).attr("data-id");
                        console.log({
                                        id_farm:id2,
                                        _token:_token
                                        });
                        if(id2 != '' )
                        {

                            if(!confirm("Do You like to view Defined Pits")) {
                                return false;
                            }
                            try
                            {
                                url_change_content="{{route('viewPits', 'id_farm')}}";
                                url_change_content = url_change_content.replace('id_farm', id2);
                                location.href = url_change_content; 
                            }
                            catch (e) {
                                $('#message').html("<div class='alert alert-danger'>در دریافت و ارسال به پایگاه  خطای روی داده است.</div>");
                            }
                        }// end if check empty box
                        else {
                            $('#message').html("<div class='alert alert-danger'>پیام مدیر نباید خالی باشد</div>");
                        }

              });

              $(document).on('click', '.view_pool', function() {
                var id2=$(this).attr("data-id");
                        console.log({
                                        id_farm:id2,
                                        _token:_token
                                        });
                        if(id2 != '' )
                        {

                            if(!confirm("Do You like to view Defined Pool")) {
                                return false;
                            }
                            try
                            {
                                url_change_content="{{route('viewPools', 'id_farm')}}";
                                url_change_content = url_change_content.replace('id_farm', id2);
                                location.href = url_change_content; 
                            }
                            catch (e) {
                                $('#message').html("<div class='alert alert-danger'>در دریافت و ارسال به پایگاه  خطای روی داده است.</div>");
                            }
                        }// end if check empty box
                        else {
                            $('#message').html("<div class='alert alert-danger'>پیام مدیر نباید خالی باشد</div>");
                        }

              });

              $(document).on('click', '.view_river', function() {
                var id2=$(this).attr("data-id");
                        console.log({
                                        id_farm:id2,
                                        _token:_token
                                        });
                        if(id2 != '' )
                        {

                            if(!confirm("Do You like to view Defined River")) {
                                return false;
                            }
                            try
                            {
                                url_change_content="{{route('viewRiver', 'id_farm')}}";
                                url_change_content = url_change_content.replace('id_farm', id2);
                                location.href = url_change_content; 
                            }
                            catch (e) {
                                $('#message').html("<div class='alert alert-danger'>در دریافت و ارسال به پایگاه  خطای روی داده است.</div>");
                            }
                        }// end if check empty box
                        else {
                            $('#message').html("<div class='alert alert-danger'>پیام مدیر نباید خالی باشد</div>");
                        }

              });

              $(document).on('click', '.view_tank', function() {
                var id2=$(this).attr("data-id");
                        console.log({
                                        id_farm:id2,
                                        _token:_token
                                        });
                        if(id2 != '' )
                        {

                            if(!confirm("Do You like to view Defined Tank")) {
                                return false;
                            }
                            try
                            {
                                url_change_content="{{route('viewTanks', 'id_farm')}}";
                                url_change_content = url_change_content.replace('id_farm', id2);
                                location.href = url_change_content; 
                            }
                            catch (e) {
                                $('#message').html("<div class='alert alert-danger'>در دریافت و ارسال به پایگاه  خطای روی داده است.</div>");
                            }
                        }// end if check empty box
                        else {
                            $('#message').html("<div class='alert alert-danger'>پیام مدیر نباید خالی باشد</div>");
                        }

              });

              $(document).on('click', '.view_pipe', function() {
                var id2=$(this).attr("data-id");
                        console.log({
                                        id_farm:id2,
                                        _token:_token
                                        });
                        if(id2 != '' )
                        {

                            if(!confirm("Do You like to view Defined Network Pipe")) {
                                return false;
                            }
                            try
                            {
                                url_change_content="{{route('viewPipe', 'id_farm')}}";
                                url_change_content = url_change_content.replace('id_farm', id2);
                                location.href = url_change_content; 
                            }
                            catch (e) {
                                $('#message').html("<div class='alert alert-danger'>در دریافت و ارسال به پایگاه  خطای روی داده است.</div>");
                            }
                        }// end if check empty box
                        else {
                            $('#message').html("<div class='alert alert-danger'>پیام مدیر نباید خالی باشد</div>");
                        }

              });

              $(document).on('click', '.view_channel', function() {
                var id2=$(this).attr("data-id");
                        console.log({
                                        id_farm:id2,
                                        _token:_token
                                        });
                        if(id2 != '' )
                        {

                            if(!confirm("Do You like to view Defined Channel")) {
                                return false;
                            }
                            try
                            {
                                url_change_content="{{route('viewChannel', 'id_farm')}}";
                                url_change_content = url_change_content.replace('id_farm', id2);
                                location.href = url_change_content; 
                            }
                            catch (e) {
                                $('#message').html("<div class='alert alert-danger'>در دریافت و ارسال به پایگاه  خطای روی داده است.</div>");
                            }
                        }// end if check empty box
                        else {
                            $('#message').html("<div class='alert alert-danger'>پیام مدیر نباید خالی باشد</div>");
                        }

              });
        </script>
</div>
@endsection