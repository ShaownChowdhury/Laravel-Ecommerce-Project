@extends('layouts.backendLayout')
@section('backend')

   <section>
    <div class="container mt-5">
      <div class="row">
        <div class="col-lg-4 m-auto">
          <div class="card shadow">
            <div class="card-header bg-primary ">
              <h4 class="text-light">Edit Category</h4>
            </div>
            <div class="card-body">
              {{--  FORM STARTS  --}}
              <form action="{{ route('dashboard.categoryUpdate',$categoryEdit->id) }}" method="POST">
                @csrf

                <label for="category"><b>Category : </b></label>
                <input name="category" type="text" class="form-control mt-2" id="category" value="{{ $categoryEdit->category }}">
                <div class="inline-block">
                    <button type="submit" class="btn btn-primary w-40 mt-3 position-relative">Submit</button>
                    <a href="{{ route('dashboard.categoryInsert') }}" style="margin-left: 1rem" class="btn btn-danger w-40 mt-3 position-absolute">Return</a>
                </div>
              </form>
              {{-- FORM ENDS   --}}
            </div>
          </div>
        </div>
      </div>
    </div>
   </section>

@endsection
