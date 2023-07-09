<div class="modal fade" id="viewplan{{ $topic->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Plans for <b><u class="text-primary">{{ $topic->topic_name }}</u></b> topic</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row text-bold">
                    <div class="col col-md-1"> SN </div>
                    <div class="col col-md-2"> Topic Name </div>
                    <div class="col col-md-2"> Date Plan </div>
                    <div class="col col-md-3"> Tool Used </div>
                    <div class="col col-md-3"> Knowledge Acquired </div>
                    <div class="col col-md-1"> Statusss </div>
                </div>
                @foreach ($plans as $index => $plan)
                    <div class="row">
                        <div class="col col-md-1"> {{ $index + 1 }} </div>
                        <div class="col col-md-2"> {{ $plan->topic->topic_name }} </div>
                        <div class="col col-md-2"> {{ \Carbon\Carbon::parse($plan->plandate)->format('d / m / Y') }} </div>
                        <div class="col col-md-3"> {{ $plan->toolused }} </div>
                        <div class="col col-md-3"> {{ $plan->knowledgeacquired }}</div>
                        <div class="col col-md-1">
                            @php
                                $fromDate = \Carbon\Carbon::parse($schemeDetail->from_Date);
                                $toDate = \Carbon\Carbon::parse($schemeDetail->to_Date);
                                $plandate = \Carbon\Carbon::parse($plan->plandate);

                                if ($plandate->between($fromDate, $toDate)) {
                                    // Date is within the range
                                    $status = 'Within Range';
                                } else {
                                    // Date is outside the range
                                    $status = 'Outside Range';
                                }
                            @endphp
                            @if ($status == 'Within Range')
                                <span class="badge badge-success">Within Plan</span>
                            @else
                                <span class="badge badge-danger">Outside Plan</span>
                            @endif
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<!-- Modal -->
<div class="modal fade" id="addplan{{ $topic->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                @if ($schemeDetail = $schemeDetails->where('topic_id', $topic->id)->first())
                    <label for="">learning Period</label> :
                    From: <span
                        class="badge badge-primary">{{ \Carbon\Carbon::parse($schemeDetail->from_Date)->format('d . m . Y') }}</span>
                    To: <span
                        class="badge badge-primary">{{ \Carbon\Carbon::parse($schemeDetail->to_Date)->format('d . m . Y') }}</span>
                    <form action="{{ route('addplan') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="Enter Subject Name...">Plan Date</label>
                                <input type="date" min="{{ date('Y-m-d') }}" name="plandate" class="form-control"
                                    placeholder="" required>
                            </div>
                            <div class="col-md-12">
                                <label for="Enter Subject Name...">Tool used</label>
                                <textarea class="form-control" cols="8" name="toolused"
                                    placeholder="Write tool used for teaching this topic,  separate each tools by (,)" required></textarea>
                            </div>
                            <input type="hidden" name="topicid" value="{{ $topic->id }}">
                            <div class="col-md-12">
                                <label for="Enter Subject Name...">Knowledge acquired</label>
                                <textarea class="form-control" name="knowledgeacquired" cols="8"
                                    placeholder="What knowledge do student acquired to learn this topic" required></textarea>
                            </div>

                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Plan</button>
            </div>
            </form>
        @else
            <span class="badge badge-warning">Create Learning Period</span>
            @endif
        </div>
    </div>
</div>
{{-- end of modal --}}
