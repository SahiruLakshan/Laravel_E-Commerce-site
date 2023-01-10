<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body{
            background-color: #F6F6F6; 
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: red;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }

        .watermark
        {
         position:absolute;
         opacity:0.5;
         z-index:99;
         color:rgb(23, 14, 14);
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-black">Tec Com</h1>
                    
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <h2 class="heading">Invoice No: {{$id}}</h2>
                    <p class="sub-heading">Order Date: {{$date}} </p>
                    <p class="sub-heading">Email Address: {{$email}} </p>
                </div>
                <div class="col-6">
                    <p class="sub-heading">Full Name: {{$fname}} {{$lname}}</p>
                    <p class="sub-heading">Address: {{$address}} </p>
                    <p class="sub-heading">Phone Number: {{$phone}} </p>
                    <p class="sub-heading">City: {{$city}} </p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Ordered Items</h3>
            <br>
            <div class="col-md-6">
                <table class="table table-bordered">
                  <thead>
                  <tr>
                      <th>Order ID</th>
                      <th>Name</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Color</th>
                      {{-- <th>Image</th> --}}
                  </tr>
                  </thead>
                  <tbody>
                      @foreach($items as $item)
                          <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->products->brand_name}} {{$item->products->model_name}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>Rs.{{$item->price}}</td>
                            <td>{{$item->color}}</td>
                            {{-- <td><img src="{{asset('assets/uploads/product/'.$item->products->image)}}" width="50px" alt="Image is here"></td> --}}
                          </tr>

                      @endforeach
                  </tbody>
                </table><br/><br/>
                <h2 class="px-2"><b>Grand Total : Rs. {{$total_price}}</b></h2>
                </div>
            <br> 
            @if($payment_mode=='Online Payment')
                <h3 class="heading">Payment ID: {{$payment_id}}</h3>
            @endif
            <h3 class="heading">Payment Status: 
                @if($payment_mode=='Online Payment')
                    Paid
                @else 
                    Not Paid yet
                @endif
                   
            </h3>
            <h3 class="heading">Payment Mode: {{$payment_mode}}</h3>
        </div>

        <div class="body-section">
            <p>&copy; Copyright 2022 - Tec Com. All rights reserved. 
                <a href="" class="float-right">www.Tec Com.com</a>
            </p><br>
            <h6>Contact - 0766216791 | Email - teccom.srilanka@gmail.com | Address - Anagarika Darmapala Mawatha,Matara</h6>
            <br>
            <h5 class="text-black" style="text-align: center"> THANK YOU!</h5>
        </div>      
    </div>      
    
</body>
</html>