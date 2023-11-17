@extends('layouts.main')
@section('content2')
<div class="card-header">
    @if(session()->has('Transaction_Response_costumer'))
        <div class="alert alert-success" id="User_registered">
            {{ session()->get('Transaction_Response_costumer') }}
        </div>
    @endif
    @if(session()->has('Transaction_Response_costumer_fail'))
        <div class="alert alert-warning" id="User_registered2">
            {{ session()->get('Transaction_Response_costumer_fail') }}
        </div>
    @endif
          <h3 class="card-title" style="align-items: end;">User Register</h3>
</div>
      
        <div class="card card-primary">
            <form action="{{route('RegUser')}}"  method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="costumerName">Name: </label>
                        <input type="text" class="form-control" name="costumerName" id="costumerName" placeholder="For Example: Jamal">
                    </div>
                    <div class="form-group">
                        <label for="costumerFamily">Family:</label>
                        <input type="text" class="form-control" name="costumerFamily" id="costumerFamily" placeholder="For example: GolGOli">
                    </div>
                    <div class="form-group">
                        <label for="costumerEmail">Email:</label>
                        <input type="email" class="form-control" id="costumerEmail" name="costumerEmail" placeholder="For example: jamal@gmail.com">
                    </div>
                    <div class="form-group">
                        <label for="costumerAdd">Address:</label>
                        <input type="text" class="form-control" id="costumerAdd" name="costumerAdd" placeholder="For example: Boukan">
                    </div>
                    <div class="form-group">
                        <label for="costumerMob">Mobile:</label>
                        <input type="text" class="form-control" id="costumerMob" name="costumerMob" placeholder="For example: 04446281234">
                    </div>
                    <div class="form-group">
                        <label for="costumerTell">Mobile:</label>
                        <input type="text" class="form-control" id="costumerTell" name="costumerTell" placeholder="For example: 09143805648">
                    </div>
                </div>
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="reg_costumer_btn">Register</button>
                </div>
            </form>
        </div>

        <table class="table table-bordered"  id="Costumer_Table" style="width: 150%">
            <thead>
            <tr>
                <th>Row</th>
                <th>Name</th>
                <th>Famiy</th>
                <th>Address</th>
                <th>Telephone</th>
                <th>Mobile</th>
                <th>Operation</th>
            </tr>
            </thead>
            <tbody>
            @php
                $count_row=1
            @endphp
            @if(!empty($fetch_user))
                @foreach($fetch_user as $key => $value)
                    <tr>
                        <td  class="column_name" data-column_name="costumer_count" data-id={{ $value->id }}>{{$count_row}}</td>
                        <td  contenteditable class="column_name" data-column_name="costumer_name" data-id={{ $value->id }}>{{ $value->name }}</td>
                        <td  contenteditable class="column_name" data-column_name="costumer_family" data-id={{ $value->id }}>{{ $value->family }}</td>
                        <td  contenteditable class="column_name" data-column_name="costumer_add"  data-id={{ $value->id }}> {{ $value->Address }}     </td>
                        <td  contenteditable class="column_name" data-column_name="costumer_tel"  data-id={{ $value->id }}> {{ $value->tel }}     </td>
                        <td  contenteditable class="column_name" data-column_name="costumer_mobile"  data-id={{ $value->id }}> {{ $value->mobile }}     </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-xs delete" data-id={{ $value->id }}>Delete</button>
                            <button type="button" class="btn btn-warning btn-xs add_unit" data-id={{ $value->id}}>Farms Register</button>
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
            $(document).on('click', '#reg_costumer_btn', function() {
              if(!confirm("Did you want to add this costumer?")) {
                      return false;
                  }
                  try{
                      $.ajax({
                          url:"{{route('RegUser')}}",
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
                                        id_ajax:id2,
                                        _token:_token
                                        });
                        if(id2 != '' )
                        {

                            if(!confirm("Would you like to define Farm for this member")) {
                                return false;
                            }
                            try
                            {
                                url_change_content="{{route('regFarm', ':id_ajax')}}";
                                url_change_content = url_change_content.replace(':id_ajax', id2);
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