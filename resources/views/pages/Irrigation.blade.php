@extends('layouts.main')
@section('content2')

<div class="card-primary">
    <h3 class="card-title" style="align-items: end;">Irrigation Management</h3>
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
                <th>Operation</th>
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
                            <button type="button" class="btn btn-danger btn-xs delete" data-id={{ $value->id }}>Delete</button>
                            <button type="button" class="btn btn-success btn-xs add_unit_irrigation" data-id={{ $value->FarmID}}>Define Farms Irrigation</button>
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
            $(document).on('click', '.add_unit_irrigation', function(){
                        var id2=$(this).attr("data-id");
                        console.log({
                                        id_farm:id2,
                                        _token:_token
                                        });
                        if(id2 != '' )
                        {

                            if(!confirm("Would you like to define Irrigation to this farm")) {
                                return false;
                            }
                            try
                            {
                                url_change_content="{{route('regFarmIrrigation', 'id_farm')}}";
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