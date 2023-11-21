@extends('layouts.main')
@section('content2')
<p class="card-title" style="align-items: end;">Specifications of the pumping station, such as the number of electricity subscriptions, the source of electricity supply, the number of phases, the amount of amperes allowed to draw electricity, etc.:</p>
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
</div>

      
        <div class="card card-primary">
            <form action="{{route('RegUser')}}"  method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="Elctropupms_Num">Number of electropumps: </label>
                        <input type="text" class="form-control" name="Elctropupms_Num" id="Elctropupms_Num" placeholder="For Example: 3">
                    </div>
                    <div class="form-group">
                        <label for="diesel_pumps_num">Number of diesel pumps:</label>
                        <input type="text" class="form-control" name="diesel_pumps_num" id="diesel_pumps_num" placeholder="For example: 2">
                    </div>
                    <div class="form-group">
                        <label for="costumerEmail">Email:</label>
                        <input type="email" class="form-control" id="diesel_pumps_num" name="diesel_pumps_num" placeholder="For example: jamal@gmail.com">
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
            
            </tbody>
        </table>
        <script type="text/javascript">
           
        </script>
          
@endsection