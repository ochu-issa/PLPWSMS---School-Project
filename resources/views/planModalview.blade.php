{{-- <div class="modal fade" id="viewplan{{ $topic->id }}" tabindex="-1" role="dialog"> --}}
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
                    <div class="col col-md-1"> Status </div>
                </div>
                @foreach ($plans as $index => $plan)
                    <div class="row">
                        <div class="col col-md-1"> {{ $index + 1 }} </div>
                        <div class="col col-md-2"> {{ $plan->topic->topic_name }} </div>
                        <div class="col col-md-2">
                            {{ \Carbon\Carbon::parse($plan->plandate)->format('d / m / Y') ?? 'null' }}
                        </div>
                        <div class="col col-md-3"> {{ $plan->toolused }} </div>
                        <div class="col col-md-3"> {{ $plan->knowledgeacquired }}</div>
                        <div class="col col-md-1">
                            @php
                                $fromDate = optional($schemeDetail)->from_Date ?? 'null';
                                $toDate = optional($schemeDetail)->to_Date ?? 'null';
                                $plandate = \Carbon\Carbon::parse($plan->plandate) ?? 'null';

                                if ($plandate !== 'null' && $fromDate !== 'null' && $toDate !== 'null') {
                                    $fromDate = \Carbon\Carbon::parse($fromDate);
                                    $toDate = \Carbon\Carbon::parse($toDate);

                                    if ($plandate->between($fromDate, $toDate)) {
                                        // Date is within the range
                                        $status = 'Within Range';
                                    } else {
                                        // Date is outside the range
                                        $status = 'Outside Range';
                                    }
                                } else {
                                    $status = 'null';
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
{{-- </div> --}}
<!-- /.modal -->



