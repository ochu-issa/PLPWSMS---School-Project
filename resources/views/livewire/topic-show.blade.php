<div>
    <!-- Content Header (Page header) -->
    @include('livewire.topicModal')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Topics</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Topics</li>
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
                    <h3 class="card-title">All Topic (s)</h3>
                    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addtopic"><span
                            class="fa fa-plus"> Add Topics</span></button>
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

                            @foreach ($topics as $index => $topic)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $topic->topic_name }}</td>
                                    <td>{{ $topic->subject->subjectname }}</td>
                                    <td>{{ $topic->subject->std }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" data-toggle="modal" data-target="#updatetopic"
                                                wire:click="updateTopic({{ $topic->id }})"
                                                class="btn btn-sm btn-secondary"><span
                                                    class="fa fa-edit"></span></button>
                                            <button type="button" wire:click="deleteTopic({{ $topic->id }})"
                                                data-toggle="modal" data-target="#deletetopic"
                                                class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></button>
                                        </div>
                                    </td>
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
