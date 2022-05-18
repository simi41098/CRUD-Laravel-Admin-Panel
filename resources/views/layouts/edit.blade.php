@extends('layouts.app')

@section('main')
    
{{-- <div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title --> --}}


<main id="main" class="main">
  <div class="pagetitle">
    <h1>Company</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <!-- <li class="breadcrumb-item">Tables</li> -->
        <li class="breadcrumb-item active">Companies</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Companies Information</h5>
            <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->

            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p></p>
            </div>
             @endif
           
             <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Edit Companies</h5>
    
                  <!-- Horizontal Form -->
                  <form action="{{ route('update')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row mb-3">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Company Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputText" name="name">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" name="email">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Website</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputWeb" name="web">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Logo</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" id="inputLogo" name="image">
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                  </form><!-- End Horizontal Form -->
    
                </div>
              </div>

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

@endsection