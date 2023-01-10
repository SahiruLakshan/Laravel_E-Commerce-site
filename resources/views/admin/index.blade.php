@extends('layouts.admin')

@section('content')

<div id="myPlot" style="width:100%;max-width:700px"></div>

@section('scripts')
<script>
  var xArray = ["January","February","March","April","May","June","July","Auguest","September","October","November","December"];
        var yArray = [{{$January}}, {{$February}}, {{$March}}, {{$April}}, {{$May}},{{$June}}, {{$July}}, {{$Auguest}}, {{$September}}, 
        {{$October}},{{$November}},{{$December}}];
        
        var data = [{
          x: xArray,
          y: yArray,
          type: "bar"  }];
        var layout = {title:"Monthly Sales Quantity"};
        
        Plotly.newPlot("myPlot", data, layout);

</script> 
@endsection

    <div class="card">
        <div class="card-body">
        <h2>Today Sales - {{$date}}</h2></br>
        <table class="table">
                <thead style="background-color: #565353">
                  <tr>
                    
                    <th  style="text-align: center; color:white;">Product_id</th>
                    <th  style="text-align: center; color:white;">Product_Name</th>
                    <th  style="text-align: center; color:white;">Pieces</th>
                    <th  style="text-align: center; color:white;">Total Price</th>
                    <th  style="text-align: center; color:white;">Time</th>
                  </tr>
                </thead>
                @php $total=0; @endphp
                <tbody>
                  @foreach($product as $pr)
                  <tr>
                  
                   <td style="text-align: center; color:black;"> 
                    {{$pr->product_id}}
                   </td>
                   
                  <td style="text-align: center; color:black;">
                    {{$pr->products->brand_name}} {{$pr->products->model_name}}
                  </td>

                  <td style="text-align: center; color:black;"> 
                    {{$pr->quantity}}
                   </td>

                   <td style="text-align: center; color:black;"> 
                    {{$pr->price}}
                   </td>

                   <td style="text-align: center; color:black;">
                    {{date('H:i:s',strtotime($pr->created_at))}}
                   </td>
                  </tr>
                  @php
                    
                    $total=$total+$pr->price;
                  @endphp
                  @endforeach
                </tbody>
              </table>
             </br><h3 style="color:red">Today Total Income: Rs.{{$total}}.00/=</h3><br/><br/><hr>   
              
        </div>          
    </div>   
    
    
@endsection