<div>
    @include('livewire.subjectModal')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Subject</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Subjects</li>
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
                    <h3 class="card-title">All Subject (s)</h3>
                    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addsubject"><span
                            class="fa fa-plus"> Add Subject</span></button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S/No</th>
                                <th>Subject Name</th>
                                <th>Class</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subjects as $subject)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $subject->subjectname }}</td>
                                    <td>{{ $subject->std }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" data-toggle="modal" data-target="#updatesubject"
                                                wire:click="editSubject({{ $subject->id }})"
                                                class="btn btn-sm btn-secondary"><span
                                                    class="fa fa-edit"></span></button>
                                            <button type="button" data-toggle="modal" data-target="#deletesubject"
                                            wire:click="deleteSubject({{ $subject->id }})" class="btn btn-sm btn-danger"><span
                                                    class="fa fa-trash"></span></button>
                                        </div>
                                    </td>
                                </tr>
                                @php
                                    $no++;
                                @endphp
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
