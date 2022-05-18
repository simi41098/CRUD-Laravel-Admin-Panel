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
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Logo</th>
                  <th scope="col">Website</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <!-- <tr>
                  <th scope="row">1</th>
                  <td>Brandon Jacob</td>
                  <td>Designer</td>
                  <td>28</td>
                  <td>2016-05-25</td>
                </tr> -->
                @foreach ($companies as $company)
                <tr>
                    <th scope="row">{{$company->id}}</th>
                    <td>{{$company->name}}</td>
                    <td>{{$company->email}}</td>
                    <td>{{$company->logo}}</td>
                    <td>{{$company->web}}</td>
                    <td>
                        <form action="#" method="POST">
    
                            <a href="{{ route('edit') }}">
                              <button>Edit</button>
                            </a>
    
                            @csrf
                            @method('DELETE')
    
                            <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
              </tbody>
            </table>
            {!! $companies->links() !!}
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

@endsection