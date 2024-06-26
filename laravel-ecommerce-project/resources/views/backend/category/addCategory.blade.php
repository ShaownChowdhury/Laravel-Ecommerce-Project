@extends('layouts.backendLayout')
@section('backend')

   <section>
    <div class="container mt-5">
      <div class="row">
        <div class="col-lg-4">
          <div class="card shadow">
            <div class="card-header bg-primary ">
              <h4 class="text-light">Add Category</h4>
            </div>
            <div class="card-body">
              {{--  FORM STARTS  --}}
              <form action="{{ route('dashboard.categoryInsert') }}" method="POST">
                @csrf

                <label for="category"><b>Category</b></label>
                <input name="category" type="text" class="form-control" id="category">
                <button type="submit" class="btn btn-primary w-100 mt-3">Submit</button>
              </form>
              {{-- FORM ENDS   --}}
            </div>
          </div>
        </div>
        

        {{-- TABLE STARTS --}}
        <div class="col-lg-8">
          <table class="table table-striped text-center">
            <tr>
              <th>Sn</th>
              <th>Category</th>
              <th>Category_slug</th>
              <th>Action</th>
            </tr>
           @forelse ($categories as $key=>$category)
            <tr>
              <td>{{ $categories->firstItem() + $key }}</td>
              <td>{{ $category->category }}</td>
              <td>{{ $category->category_slug }}</td>
              <td>
                <div class="btn-group">
                  <a href="{{ route('dashboard.categoryEdit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                  <a href="{{ route('dashboard.categoryDelete', $category->id) }}" class="btn btn-danger btn-sm">Delete</a>
                  <a href="" class="btn btn-warning btn-sm">Update</a>
                </div>
              </td>
            
           @empty
           
            <td colspan="4" class="bg-danger m-2 "><h4 class="text-light" style="line-height: 33px"> Sorry,No Data Found </h4></td>
          </tr>
           @endforelse
            
          </table>
        </div>
        {{ $categories->links() }}
        {{-- TABLE ENDS  --}}

      </div>
    </div>
   </section>

@endsection
