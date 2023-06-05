@extends('layout/app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
   <!-- Main content -->
   <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>FNAME</th>
                        <th>LNAME</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>kide</td>
                        <td>gesho</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>kide</td>
                        <td>gesho</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>kide</td>
                        <td>gesho</td>
                    </tr>
                </tbody>
            </table>
      {{-- your codes comes here --}}
    </div>
    </section>
@endsection