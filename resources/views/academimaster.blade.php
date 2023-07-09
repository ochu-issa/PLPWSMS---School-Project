@extends('layout/app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Academic Master</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Academic Master</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    @if (session('success'))
        <script>
            $(document).ready(function() {
                toastr.success('{{ session('success') }}');
            });
        </script>
    @elseif (session('error'))
        <script>
            $(document).ready(function() {
                toastr.error('{{ session('error') }}');
            });
        </script>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                $(document).ready(function() {
                    toastr.error('{{ $error }}');
                });
            </script>
        @endforeach
    @endif

    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All user(s)</h3>
                    <button type="button" class="btn btn-small btn-primary float-right" data-toggle="modal"
                        data-target="#modal-lg"><i class="fa fa-plus"></i> Register new user</button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S/No</th>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Role Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($academicmasters as $index => $academicmaster)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $academicmaster->f_name }} {{ $academicmaster->f_name }}</td>
                                    <td>{{ $academicmaster->gender }}</td>
                                    <td>{{ $academicmaster->email }}</td>
                                    <td>{{ $academicmaster->phone_number }}</td>
                                    @if ($academicmaster->getRoleNames() == '["Academic-Master"]')
                                        <td><span class="badge badge-primary">Academic Master</span> </td>
                                    @else
                                        <td><span class="badge badge-info">Super Admin</span> </td>
                                    @endif
                                    <td>
                                        <button class="btn btn-sm btn-danger"><span class="fa fa-trash"> </span></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>

    <!-- Add Doctor Modal -->
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Register User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('createacademicmaster') }}">
                        @csrf
                        <p>
                        <div class="row">
                            <div class="col col-md-6">
                                <label for="">First Name</label>
                                <input type="text" name="f_name" class="form-control" id=""
                                    placeholder="Enter first name here ..." required>
                            </div>
                            <div class="col col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" name="l_name" class="form-control" id=""
                                    placeholder="Enter last name here ..." required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-6">
                                <label for="">Gender</label>
                                <select name="gender" class="form-control" id="" required>
                                    <option value="">--</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col col-md-6">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" id=""
                                    placeholder="Enter active email here ..." required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-6">
                                <label for="">Phone Number</label>
                                <input type="text" name="phone_number" class="form-control" id=""
                                    placeholder="255626560698" required>
                            </div>
                            <div class="col col-md-6">
                                <label for="">Choose Role</label>
                                <select name="rolename" class="form-control" id="" required>
                                    <option value="" disabled selected>--Choose Role--</option>
                                    <option value="Academic-Master">Academic Master</option>
                                    <option value="Super-Admin">Super Admin</option>
                                </select>
                            </div>
                        </div>
                        </p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Register </button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
