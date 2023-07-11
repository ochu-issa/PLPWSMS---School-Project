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
                {{-- optional method --}}
                @if ($schemeDetail = $schemeDetails->where('topic_id', $topic->id)->first())
                    <label for="">learning Period</label> :
                    From: <span
                        class="badge badge-primary">{{ \Carbon\Carbon::parse($schemeDetail->from_Date)->format('d . m . Y') ?? 'null' }}</span>
                    To: <span
                        class="badge badge-primary">{{ \Carbon\Carbon::parse($schemeDetail->to_Date)->format('d . m . Y') ?? 'null' }}</span>
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
