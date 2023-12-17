@extends('layouts.main')
@section('content2')

<div class="card-primary">
    <h3 class="card-title" style="align-items: end;">Water Resources Management</h3>
</div>
      
        
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
                <th>Pits</th>
                <th>Pool</th>
                <th>Tank</th>
                <th>River</th>
                <th>Pipe</th>
                <th>Channel</th>
            </tr>
            </thead>
            <tbody>
            @php
                $count_row=1
            @endphp
            @if(!empty($fetched_farms))
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
                        <td>
                            <button type="button" class="btn btn-success btn-ls add_Pits_analyze" data-id={{ $value->FarmID}}>Pits Result</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-success btn-ls add_Pool_analyze" data-id={{ $value->FarmID}}>Pool Result</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-success btn-ls add_Tank_analyze" data-id={{ $value->FarmID}}>Tank Result</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-success btn-ls add_River_analyze" data-id={{ $value->FarmID}}>River Result</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-success btn-ls add_Pipe_analyze" data-id={{ $value->FarmID}}>Pipe Result</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-success btn-ls add_Channel_analyze" data-id={{ $value->FarmID}}>Channel Result</button>
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
            @csrf
        </table>
        <script type="text/javascript">
        var _token = $('input[name="_token"]').val();
            $(document).on('click', '.add_Pits_analyze', function(){
                        var id2=$(this).attr("data-id");
                        console.log({
                                        id_farm:id2,
                                        _token:_token
                                        });
                        if(id2 != '' )
                        {

                            if(!confirm("Would you like to register River analyze water to this farm")) {
                                return false;
                            }
                            try 
                            {
                                url_change_content="{{route('viewPitsForAnalyze', 'id_farm')}}";
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

                $(document).on('click', '.add_River_analyze', function(){
                        var id2=$(this).attr("data-id");
                        console.log({
                                        id_farm:id2,
                                        _token:_token
                                        });
                        if(id2 != '' )
                        {

                            if(!confirm("Would you like to register river analyze water to this farm")) {
                                return false;
                            }
                            try
                            {
                                url_change_content="{{route('viewRiverForAnalyze', 'id_farm')}}";
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

                $(document).on('click', '.add_Pipe_analyze', function(){
                        var id2=$(this).attr("data-id");
                        console.log({
                                        id_farm:id2,
                                        _token:_token
                                        });
                        if(id2 != '' )
                        {

                            if(!confirm("Would you like to register NetPipe analyze water to this farm")) {
                                return false;
                            }
                            try
                            {
                                url_change_content="{{route('viewNetPipeForAnalyze', 'id_farm')}}";
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

                $(document).on('click', '.add_Channel_analyze', function(){
                        var id2=$(this).attr("data-id");
                        console.log({
                                        id_farm:id2,
                                        _token:_token
                                        });
                        if(id2 != '' )
                        {

                            if(!confirm("Would you like to register Channel analyze water to this farm")) {
                                return false;
                            }
                            try
                            {
                                url_change_content="{{route('viewChannelForAnalyze', 'id_farm')}}";
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
                $(document).on('click', '.add_Pool_analyze', function(){
                        var id2=$(this).attr("data-id");
                        console.log({
                                        id_farm:id2,
                                        _token:_token
                                        });
                        if(id2 != '' )
                        {

                            if(!confirm("Would you like to register Pool analyze water to this farm")) {
                                return false;
                            }
                            try
                            {
                                url_change_content="{{route('viewPoolForAnalyze', 'id_farm')}}";
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
                $(document).on('click', '.add_Tank_analyze', function(){
                        var id2=$(this).attr("data-id");
                        console.log({
                                        id_farm:id2,
                                        _token:_token
                                        });
                        if(id2 != '' )
                        {

                            if(!confirm("Would you like to register Tank analyze water to this farm")) {
                                return false;
                            }
                            try
                            {
                                url_change_content="{{route('viewTankForAnalyze', 'id_farm')}}";
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
          
@endsection