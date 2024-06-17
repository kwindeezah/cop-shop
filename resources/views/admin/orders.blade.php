<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
      .div_center {
        text-align: center;
        padding-top: 40px;
      }

      .table_deg {
        border: 2px solid white;
        width: 100%;
        margin: auto;
        padding-top: 50px;
        text-align: center;
      }

      .th_class {
        background-color: chocolate;
      }

      .img_size {
        width: 200px;
        height: 180px;
      }
      </style>
  </head>
  <body>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
      {{-- main content --}}
      <div class="main-panel">
        <div class="content-wrapper">
          @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true" aria-label="close">&times;</button>
              {{session()->get('message')}}
            </div>
          @endif

            <div class="div_center">
                <h2 class="cath2">All Orders</h2>
            </div>

            <table class="table_deg">
              <tr class="th_class">
                <th style="padding:15px;">Customer Name</th>
                <th style="padding:15px;">Email</th>
                <th style="padding:15px;">Address</th>
                <th style="padding:15px;">Phone Number</th>
                <th style="padding:15px;">Product Name</th>
                <th style="padding:15px;">Price</th>
                <th style="padding:15px;">Quantity</th>
                <th style="padding:15px;">Payment Status</th>
                <th style="padding:15px;">Delivery Status</th>
                <th style="padding:15px;">Payment Method</th>
                <th style="padding:15px;">Product Image</th>
                <th style="padding:15px;">Delivered</th>
              </tr>
              
              @foreach ($orders as $order)
              <tr>
                <td>{{$order->name}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->phone_number}}</td>
                <td>{{$order->product_name}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->delivery_status}}</td>
                <td>{{$order->payment_method}}</td>
                <td>
                    <img class="img_size" src="/products/{{$order->image}}">
                </td>
                <td>

                  @if($order->delivery_status == 'In progress')
                    <a href="{{url('delivered', $order->id)}}" onclick="return confirm('Are you sure this item has been delivered?')" class="btn btn-primary">Delivered</a>
                    @else
                    <p style="background-color:green;padding:9px;border-radius:8px;">Item has been delivered</p>
                  @endif

                </td>
                <td>
                  {{-- <a onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-danger" href="{{url('delete_category', $category->id)}}">Delete</a> --}}
                </td>
              </tr>
              @endforeach

            </table>

        </div>
      </div>
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>