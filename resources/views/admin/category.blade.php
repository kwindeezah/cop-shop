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
          @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true" aria-label="close">&times;</button>
              {{session()->get('message')}}
            </div>
          @endif

            <div class="div_center">
                <h2 class="cath2">Add Category</h2>

                <form action="{{url('add_category')}}" method="POST">
                  @csrf
                    <input class="catinput" type="text" name="category" placeholder="Enter category name">
                    <input id="catbtn" class="btn btn-primary large" name="submit" type="submit" value="Add Category">
                </form>
            </div>

            <table class="center" >
              <tr>
                <td>Category Name</td>
                <td>Action</td>
              </tr>
              
              @foreach ($data as $category)
              <tr>
                <td>{{$category->category_name}}</td>
                <td>
                  <a onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-danger" href="{{url('delete_category', $category->id)}}">Delete</a>
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