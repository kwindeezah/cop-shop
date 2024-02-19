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
            <div class="div_center">
                <h2>Add Category</h2>

                <form action="{{url('add_category')}}" method="POST">
                  @csrf
                    <input type="text" name="category" placeholder="Enter category name">
                    <input class="btn btn-primary" name="submit" type="submit" value="Add Category">
                </form>
            </div>
        </div>
      </div>
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>