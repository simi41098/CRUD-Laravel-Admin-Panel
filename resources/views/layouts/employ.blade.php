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
    <h1>Employee</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <!-- <li class="breadcrumb-item">Tables</li> -->
        <li class="breadcrumb-item">Company</li>
        <li class="breadcrumb-item active">Employees</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Employees Information</h5>
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
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Company</th>
                  <th scope="col">Phone No.</th>
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
                @foreach ($employees as $employee)
                <tr>
                    <th scope="row">{{$employee->id}}</th>
                    <td>{{$employee->fname}}</td>
                    <td>{{$employee->lname}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->company}}</td>
                    <td>{{$employee->phone}}</td>
                    <td>
                        <form action="" method="POST">
    
                            <a href="" title="show">
                                <i class="fas fa-eye text-success  fa-lg"></i>
                            </a>
    
                            <a href="">
                                <i class="fas fa-edit  fa-lg"></i>
                            </a>
    
                            @csrf
                            @method('DELETE')
    
                            <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                <i class="fas fa-trash fa-lg text-danger"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
              </tbody>
            </table>
            {!! $employees->links() !!}
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

@endsection