<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .font_style {
            text-align: center;
            font-size: 40px;
            padding-top: 20px;
        }
        .img_size {
            width: 150px;
            height: 150px;
        }
        .th_header {
            background: rgb(25, 28, 36);
            color: white;
        }
        .th_d {
            padding: 30px;
        }
    </style>
  </head>
  <body>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" aria-label="close">&times;</button>
                    {{session()->get('message')}}
                    </div>
                @endif

                <h2 class="font_style">All Products</h2>
                <table class="center">
                    <tr class="th_header">
                        <th class="th_d">Product Title</th>
                        <th class="th_d">Description</th>
                        <th class="th_d">Quantity</th>
                        <th class="th_d">Category</th>
                        <th class="th_d">Price</th>
                        <th class="th_d">Discount Price</th>
                        <th class="th_d">Product Image</th>
                        <th class="th_d">Delete</th>
                        <th class="th_d">Edit</th>
                    </tr>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discount_price}}</td>
                        <td>
                            <img class="img_size" src="products/{{$product->image}}">
                        </td>
                        <td><a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')" href="{{url('delete_product', $product->id)}}">Delete</a></td>
                        <td><a class="btn btn-success" href="{{url('edit_product', $product->id)}}">Edit</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>