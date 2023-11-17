@extends('layouts.main')
@section('content2')
<div class="card-header">
    @if(session()->has('Transaction_Response_farm'))
        <div class="alert alert-success" id="User_registered">
            {{ session()->get('Transaction_Response_farm') }}
        </div>
    @endif
    @if(session()->has('Transaction_Response_farm_fail'))
        <div class="alert alert-warning" id="User_registered2">
            {{ session()->get('Transaction_Response_farm_fail') }}
        </div>
    @endif
          <h3 class="card-title" style="align-items: end;">User Register</h3>
</div>

@foreach($user_fetched as $key => $value)
            <div class="card card-primary">
                <form action="{{route('RegFarmOfUser')}}"  method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="costumerName">Name: </label>
                            <input type="text" readonly="true" class="form-control" name="costumerName" id="costumerName" value="{{$value->name}}">
                        </div>
                        <div class="form-group">
                            <label for="costumerFamily">Family:</label>
                            <input type="text" readonly="true" class="form-control" name="costumerFamily" id="costumerFamily" value="{{$value->family}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="farmSize">Farm size_hektar</label>
                            <input type="text" class="form-control" id="farmSize" name="farmSize" placeholder=" For example: 5000 ">
                        </div>
                        <div class="form-group">
                            <label for="unitNum">Number of Unit per Farm:</label>
                            <input type="text" class="form-control" id="unitNum" name="unitNum" placeholder="For example: 4">
                        </div>
                            <input hidden type="text" class="form-control" id="costumerID" name="costumerID"  value="{{$value->id}}">
                    </div>
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="reg_farm_btn">Register</button>
                    </div>
                </form>
            </div>
@endforeach  
      
       

        <table class="table table-bordered"  id="Costumer_Table" style="width: 150%">
            <thead>
            <tr>
                <th>Row</th>
                <th>Farm Size</th>
                <th>Number of Unit</th>
                <th>Operation</th>
            </tr>
            </thead>
            <tbody>
            @php
                $count_row=1
            @endphp
            @if(!empty($fetched_farm))
                @foreach($fetched_farm as $key => $value)
                    <tr>
                        <td  class="column_name" data-column_name="costumer_count" data-id={{ $value->id }}>{{$count_row}}</td>
                        <td   class="column_name" data-column_name="farmSize"  data-id={{ $value->id }}> {{ $value->farm_size }}     </td>
                        <td   class="column_name" data-column_name="unitNum"  data-id={{ $value->id }}> {{ $value->farm_unit }}     </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-xs delete" data-id={{ $value->id }}>Delete</button>
                            <button type="button" class="btn btn-warning btn-xs add_unit" data-id={{ $value->id}}>Units Registeraion</button>
                            <button type="button" class="btn btn-info btn-xs info" id={{$value->id."_".$count_row}}>Edit</button>    
                        </td>
                    </tr>
                    @php
                        $count_row+=1
                    @endphp
    
                @endforeach
            @else
                <tr>
                    <td colspan="10">There are no data.</td>
                </tr>
            @endif
            </tbody>
        </table>
        <script type="text/javascript">
            var _token = $('input[name="_token"]').val();
            $(document).on('click', '#reg_farm_btn', function() {
              if(!confirm("Did you want to add this Farm?")) {
                      return false;
                  }
                  try{
                      $.ajax({
                          url:"{{route('RegFarmOfUser')}}",
                          method:"POST",
                          data:$(this).parents("form"),
                      });
                  }
                  catch (e) {
                      document.getElementById("demo").innerHTML = e.name;
                  }
              });
          
            $(document).on('click', '.add_unit', function(){
                var _token = $('input[name="_token"]').val();

                        var id2=$(this).attr("data-id");
                        console.log({
                                        id_farm:id2,
                                        _token:_token
                                        });
                        if(id2 != '' )
                        {

                            if(!confirm("Would you like to define unit for this farm")) {
                                return false;
                            }
                            try
                            {
                                url_change_content="{{route('regUnitforFarm', ':id_farm')}}";
                                url_change_content = url_change_content.replace(':id_farm', id2);
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
          
@endsection