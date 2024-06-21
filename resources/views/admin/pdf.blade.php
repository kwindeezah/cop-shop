<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .div_center {
          text-align: center;
          padding-top: 40px;
        }
  
        .table_deg {
          width: 100%;
          margin: auto;
          padding-top: 10px;
          text-align: center;
        }

        .row td{
            border:2px solid black;
        }
    </style>
    <title>Order Details</title>
</head>
<body>
    <div>
    <div class="div_center">
        <h2 class="cath2">All Orders</h2>
    </div>

    <table class="table_deg">
        <tr class="th_class" style="border:2px solid black;">
          <th style="padding:15px;">Customer Name</th>
          <th style="padding:15px;">Delivery Address</th>
          <th style="padding:15px;">Product Name</th>
          <th style="padding:15px;">Price</th>
          <th style="padding:15px;">Quantity</th>
          <th style="padding:15px;">Payment Status</th>
          <th style="padding:15px;">Delivery Status</th>
          <th style="padding:15px;">Payment Method</th>
        </tr>
        
        <tr class="row">
          <td>{{$order->name}}</td>
          <td>{{$order->address}}</td>
          <td>{{$order->product_name}}</td>
          <td>{{$order->price}}</td>
          <td>{{$order->quantity}}</td>
          <td>{{$order->payment_status}}</td>
          <td>{{$order->delivery_status}}</td>
          <td>{{$order->payment_method}}</td>
        </tr>
    </table>
    </div>
</body>
</html>