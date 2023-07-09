<div>
    @include('livewire.lessonSchemeModal')
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
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Working Scheme</h3>
                    @if (Auth::user()->hasAnyRole(['Super-Admin', 'Teacher']))
                    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addscheme"><span
                        class="fa fa-plus"> Add Working Scheme</span></button>
                    @endif

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S/No</th>
                                <th>Subject Name</th>
                                <th>Scheme Description</th>
                                <th>Class</th>
                                <th>View Scheme</th>
                                {{-- <th>Download</th> --}}
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schemes as $index => $scheme)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $scheme->subject->subjectname }}</td>
                                    <td>{{ $scheme->description }}</td>
                                    <td>{{ $scheme->subject->std }}</td>
                                    <td>
                                        <a href="{{ route('schemedetails', ['id' => $scheme->id]) }}"
                                            class="btn btn-info btn-sm"><span class="fa fa-folder"></span> view</a>
                                    </td>
                                    @if (Auth::user()->hasAnyRole(['Super-Admin', 'Teacher']))
                                    <td>
                                        <button type="button" data-toggle="modal" data-target="#deletesubject"
                                            class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></button>
                                    </td>
                                    @else
                                    <td>
                                        <span class="badge badge-danger">not authorize to delete</span>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            {{-- your codes comes here --}}
        </div>
    </section>
</div>
