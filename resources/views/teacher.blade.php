@extends('layout/app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Teachers</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Teachers</li>
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
                    <h3 class="card-title">All Teacher(s)</h3>
                    <button type="button" class="btn btn-small btn-primary float-right" data-toggle="modal"
                        data-target="#modal-lg"><i class="fa fa-plus"></i> Register new
                        Teacher</button>
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
                                <th>Subjects</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($teachers as $index => $teacher)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $teacher->f_name }} {{ $teacher->f_name }}</td>
                                    <td>{{ $teacher->gender }}</td>
                                    <td>{{ $teacher->email }}</td>
                                    <td>{{ $teacher->phone_number }}</td>
                                    <td>
                                        @foreach ($teacher->HasUser as $subject)
                                            <ul>
                                                <li>
                                                    {{ $allsubject->where('id', $subject->subject_id)->first()->subjectname }}
                                                    =>
                                                    {{ $allsubject->where('id', $subject->subject_id)->first()->std }}
                                                </li>
                                            </ul>
                                        @endforeach
                                    </td>
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
                    <h4 class="modal-title">Register new Teacher</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('createteacher') }}">
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

                                <div class="form-group">
                                    <label>Assign Subjects</label>
                                    <select class="select2" name="subject_id[]" multiple="multiple"
                                        data-placeholder="Select Subjects" style="width: 100%;" required>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->subjectname }} =>
                                                {{ $subject->std }}</option>
                                        @endforeach
                                    </select>
                                </div>
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
