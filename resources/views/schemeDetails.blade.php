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
            {{-- codes comes here --}}
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Scheme Details</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <dl>
                                <dt>Subject Name</dt>
                                <dd><span class="badge badge-primary">{{ $subjects->subjectname }}</span></dd>
                                <dt>Class</dt>
                                <dd>{{ $subjects->std }}</dd>
                                <dt>Description</dt>
                                <dd>{{ $scheme->description }}</dd>
                                <dt>List of topics.</dt>
                            </dl>
                            @foreach ($subjects->topic as $topic)
                                <blockquote>
                                    <p><b>Topic Name :</b> {{ $topic->topic_name }} </p>
                                    <dl>
                                        <dt>Learning Period</dt>

                                            @if ($schemeDetail = $schemeDetails->where('topic_id', $topic->id)->first())
                                            <dt>From: <span class="badge badge-primary">{{ \Carbon\Carbon::parse($schemeDetail->from_Date)->format('d . m . Y') }}</span>
                                                To : <span class="badge badge-primary">{{ \Carbon\Carbon::parse($schemeDetail->to_Date)->format('d . m . Y') }}</span>
                                            </dt>
                                            <button class="btn btn-sm btn-danger float-right">delete date</button>
                                        </dl>
                                            @else
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#createperiod{{$topic->id}}"><span class="fa fa-plus"></span>
                                                    Create Learning Period</button> <br>
                                            @endif
                                    <small>created on <cite title="Source Title">{{$scheme->created_at}}</cite></small>
                                </blockquote>
                                <hr>
                                <!-- Add Range - Modal -->
                                <div class="modal fade" id="createperiod{{$topic->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLongTitle">Create Learning Period
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{ route('createperiod') }}">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col col-md-6">
                                                            <label for="">From-Date</label>
                                                            <input type="date" min="{{ date('Y-m-d') }}" name="from_date"
                                                                class="form-control">
                                                        </div>
                                                        <input type="hidden" name="topic_id" value="{{ $topic->id }}">
                                                        <input type="hidden" name="scheme_id" value="{{ $scheme->id }}">
                                                        <div class="col col-md-6">
                                                            <label for="">To-Date</label>
                                                            <input type="date" min="{{ date('Y-m-d') }}" name="to_date"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Create</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- end of modal --}}
                            @endforeach


                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
