@extends('layouts.main')
@section('content2')

{{-- @php
function count_ID(arr, num){
    // $Count=0;
    // for (int $i=0; $i<length(arr); $i++){
    //     if (arr[$i]==num)
    //         $count++
    // }
    return "Jamal";
}

@endphp

{{ dd(count_ID([1,2,3,2,2,2,2,2], 2))}} --}}
{{-- {{dd($fetched_Fertilized_farm_ID[0]->farmID)}} --}}
<div class="card-primary">
    <h3 class="card-title" style="align-items: end;">Fertilizers/Nutritions Control Panel</h3>
</div>
      
 <div style="width: 150%"> 
    <div id="message"></div>     
        <table class="table table-bordered"  id="Edit_Fertilize_count_table">
            <thead>
            <tr>
                <th>Row</th>
                <th>Name</th>
                <th>Famiy</th>
                <th>Address</th>
                <th>Mobile</th>
                <th>Farm Size</th>
                <th>Unit Count</th>
                <th>Fertilize Count</th>
                <th>Fertilized Count</th>
                <th>Operation</th>
            </tr>
            </thead>
            <tbody>
            @php
                $count_row=1
            @endphp
            @if(!empty($fetched_farms_count))
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
                        
                        @if(($value->FertilizerCount)==0)
                            <td style="background-color: rgb(194, 142, 142)"  contenteditable class="column_name" data-column_name="costumer_farm"  data-id={{ $value->FarmID }}> {{ $value->FertilizerCount }}</td>
                            <td   class="column_name" data-column_name="costumer_farm" name="Fetilized_count" data-id={{ $value->FarmID }}>
                                0                   
                            </td>
                                <td>
                                    <button type="button" class="btn btn-success btn-xs define_fertilizer_count" row_id={{$count_row}} data-id={{ $value->FarmID}}>Add Fertilizer Count</button>
                                </td>

                        @else
                        <td  contenteditable class="column_name" data-column_name="costumer_farm"  data-id={{ $value->FarmID }}> {{ $value->FertilizerCount}}     </td>
                        <td   class="column_name" data-column_name="costumer_farm"  data-id={{ $value->FarmID }}> 
                            <?php $detected=0; ?>
                            @for($i=0; $i<count($fetched_Fertilized_farm_ID); $i++)
                                @if($fetched_Fertilized_farm_ID[$i]->farmID==$value->FarmID)
                                        {{number_format($fetched_Fertilized_farm_ID[$i]->count_fram)}}
                                        @php
                                            $detected++
                                        @endphp
                                @endif
                            @endfor
                            @if($detected==0)
                                0
                            @endif
                        </td>
                            <td>
                                <button type="button" class="btn btn-success btn-xs add_fertilizer" data-id={{ $value->FarmID}}>Define Fertilizer</button>
                                <button type="button" class="btn btn-info btn-xs Edit_Fertilizer_Count" data-id={{ $value->FarmID}}>Edit Fertilizers Count</button>
                            </td>
                        @endif
                        
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
 </div>
        <script type="text/javascript">
        var _token = $('input[name="_token"]').val();
            $(document).on('click', '.define_fertilizer_count', function(){
                        var id2=$(this).attr("data-id");
                        var countRow=Number($(this).attr("row_id"));
                        var frt_count = document.getElementById("Edit_Fertilize_count_table").rows[countRow].cells.item(8).innerHTML;
                        console.log({
                                        id_farm:id2,
                                        frt:frt_count,
                                        _token:_token
                                        });
                        if(frt_count != '0' )
                        {

                            if(!confirm("Would you like to define Fertilizer for this farm")) {
                                return false;
                            }
                            try
                            {
                                $.ajax({
                                        url:"{{ route('RegFertilizersCount') }}",
                                        method:"POST",
                                        data:{
                                            frt:frt_count,
                                            FarmID:id2,
                                            _token:_token
                                        },
                                        success: function(data){ // What to do if we succeed
                                            $('#message').html(data);
                                            setTimeout(()=>{
                                            window.location.reload();
                                            },2000);
                                        },
                                        error: function(data){
                                            $('#message').html(data);
                                            setTimeout(()=>{
                                            window.location.reload();
                                            },2000);
                                        }
                                    })
                            }
                            catch (e) {
                                $('#message').html("<div class='alert alert-danger'>در دریافت و ارسال به پایگاه  خطای روی داده است.</div>");
                            }
                        }// end if check empty box
                        else {
                            $('#message').html("<div class='alert alert-danger'>پیام مدیر نباید خالی باشد</div>");
                        }

                });

        $(document).on('click', '.add_fertilizer', function(){
            var id_farm=$(this).attr("data-id");
            if(!confirm("Would you like to define Irrigation to this farm")) {
                return false;
                }
                try
                {
                    url_change_content="{{route('viewDefineFertilizePage', 'id_farm')}}";
                    url_change_content = url_change_content.replace('id_farm', id_farm);
                    location.href = url_change_content; 
                }
                catch (e) {
                    $('#message').html("<div class='alert alert-danger'>در دریافت و ارسال به پایگاه  خطای روی داده است.</div>");
                }

        })

         
         </script>
          
@endsection