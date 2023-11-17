@extends('layouts.main')
@section('content2')
    <div class="card-header" style="width: 200%">
        <div  hidden id="load_module" style="color: rgb(0,0,0);">
            @while ($numbed_of_unit)
                <div class="col-md-2 col-sm-6 col-xs-6" style="padding: 5px">
                    <button onclick="msgbranch()" class="rippler module rippler-inverse">
                        <span class="icon_module">
                            <i class="dashboard-icons-colors special_offer_sl">
        
                            </i>
                        </span>
                        <span class="title_module" style="font-size: 10px;">jamal</span>
                    </button>
                </div>
                {{$numbed_of_unit--}}
            @endwhile
        </div>  
    </div>
    <script type="text/javascript">
        var _token = $('input[name="_token"]').val();
        
    </script>
@endsection