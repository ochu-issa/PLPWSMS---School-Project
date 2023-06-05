@extends('layout/app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Working Scheme</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Working Scheme</li>
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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Working Scheme</h3>
                    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addsubject"><span
                            class="fa fa-plus"> Add Working Scheme</span></button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S/No</th>
                                <th>Topic Name</th>
                                <th>Subject Name</th>
                                <th>Class</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Aina za maneno</td>
                                <td>Kiswahili</td>
                                <td>STD 4</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-sm btn-secondary"><span
                                                class="fa fa-edit"></span></button>
                                        <button type="button" class="btn btn-sm btn-danger"><span
                                                class="fa fa-trash"></span></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            {{-- your codes comes here --}}
        </div>


        <!-- Modal -->
        <div class="modal fade" id="addsubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Working Scheme</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-12">
                                <label for="Enter Subject Name...">Select Subject</label>
                                <select name="classname" id="" class="form-control">
                                    <option value="" selected disabled>--Select Subject--</option>
                                    <option value="std1">Kiswahili</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="Enter Subject Name...">Select Topic</label>
                                <select name="classname" id="" class="form-control">
                                    <option value="" selected disabled>--Choose Subject--</option>
                                    <option value="std1">Aina za maneno</option>
                                </select>
                            </div>
                            <div class="col-md-12 text-center">
                                <label for="Learning Period">Learning Period</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-6 text-center">
                                <label for="">From:</label>
                                <input type="Date" name="fromDate" class="form-control" id="">
                            </div>
                            <div class="col col-md-6 text-center">
                                <label for="">To:</label>
                                <input type="Date" name="toDate" class="form-control" id="">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
