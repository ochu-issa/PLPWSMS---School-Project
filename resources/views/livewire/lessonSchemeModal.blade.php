<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addscheme" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Working Scheme</h5>
                <button type="submit" wire:click="closeModal" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="storeLessonScheme">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="Enter Subject Name...">Select Subject</label>
                            <select wire:model='subject_id' class="form-control">
                                <option value="null" selected disabled>--Select Subject--</option>
                                @foreach ($choosesubject as $subject)
                                    <option value="{{ $subject->SubjectHas->id }}">{{ $subject->SubjectHas->subjectname }} =>
                                        {{ $subject->SubjectHas->std }}
                                    </option>
                                @endforeach
                            </select>
                            @error('subject_id')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="descriptions">Scheme Description</label>
                            <textarea wire:model="description" cols="30" rows="5" class="form-control"
                                placeholder="Write scheme description here ..."></textarea>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" wire:click="closeModal" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>
