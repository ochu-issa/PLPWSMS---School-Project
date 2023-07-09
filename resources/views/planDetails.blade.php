@extends('layout/app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Scheme Details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Scheme Details</li>
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

    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    Subject : <span class="badge badge-primary">{{ $subjects->subjectname }}</span><br>
                    Class : <span class="badge badge-primary">{{ $subjects->std }}</span>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Subject Name</th>
                                <th>Learning Period</th>
                                <th>View Plan</th>
                                <th>Add Plan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- code comes here -->
                            @foreach ($subjects->topic as $index => $topic)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $topic->topic_name }}</td>
                                    <td>
                                        @if ($schemeDetail = $schemeDetails->where('topic_id', $topic->id)->first())
                                            From: <span
                                                class="badge badge-primary">{{ \Carbon\Carbon::parse($schemeDetail->from_Date)->format('d . m . Y') }}</span>
                                            To: <span
                                                class="badge badge-primary">{{ \Carbon\Carbon::parse($schemeDetail->to_Date)->format('d . m . Y') }}</span>
                                        @else
                                            <span class="badge badge-warning">Create Learning Period</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#viewplan{{ $topic->id }}"><span class="fa fa-folder"></span>
                                            view</button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#addplan{{ $topic->id }}"><span
                                                class="fa fa-plus"></span> add plan</button>
                                    </td>
                                </tr>
                                @include('planModalview')
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
@endsection
