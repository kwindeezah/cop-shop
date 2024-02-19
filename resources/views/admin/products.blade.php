<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style>
        label {
            display: inline-block;
            width: 200px;
        }

        .div_design {
            padding-bottom: 15px;
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
                <div class="div_center">
                    <h2 class="cath2">Add Product</h2>

                    <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label for="product">Product Title :</label>
                            <input class="catinput" type="text" name="product" placeholder="Enter product title" required>
                        </div>
                        <div class="div_design">
                            <label for="description">Product Description :</label>
                            <input class="catinput" type="text" name="description" placeholder="Enter product description" required>
                        </div>
                        <div class="div_design">
                            <label for="price">Product Price :</label>
                            <input class="catinput" type="number" name="price" placeholder="Enter product price" required>
                        </div>
                        <div class="div_design">
                            <label for="discount_price">Product Discounted Price :</label>
                            <input class="catinput" type="number" name="discount_price" placeholder="Enter product discounted price">
                        </div>
                        <div class="div_design">
                            <label for="qty">Product Quantity :</label>
                            <input class="catinput" type="number" min="0" name="qty" placeholder="Enter product quantity" required>
                        </div>
                        <div class="div_design">
                            <label for="category">Product Category :</label>
                            <select class="catinput" name="category" required>
                                <option value="" >Select Category</option>
                                @foreach ($category as $category)
                                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="div_design">
                            <label>Product Image :</label>
                            <input class="text-color" type="file" name="image" required>
                        </div>
                        <div class="div_design">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add Product">
                        </div>
                    </form>
                </div>
            </div>
        </div>
          <!-- partial -->
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>