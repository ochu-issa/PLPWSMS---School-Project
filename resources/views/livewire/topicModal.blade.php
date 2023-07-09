    <!-- Add Modal -->
    <div wire:ignore.self class="modal fade" id="addtopic" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Topic</h5>
                    <button type="button" class="close" wire:click="closeModal" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="storeTopic">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="Enter Subject Name...">Enter Topic Name</label>
                                <input type="text" wire:model="topic_name" class="form-control"
                                    placeholder="Enter Topic Name..." id="">
                                @error('topic_name')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="Enter Subject Name...">Choose Subject</label>
                                <select wire:model="subject_id" id="" class="form-control">
                                    <option value="null" selected disabled>--Choose Subject--</option>
                                    @foreach ($choosesubject as $subject)
                                        <option value="{{ $subject->id }}">[ {{ $subject->subjectname }} =>
                                            {{ $subject->std }} ]</option>
                                    @endforeach
                                </select>
                                @error('subject_id')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
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
    {{-- end of modal --}}

    <!-- Update Modal -->
    <div wire:ignore.self class="modal fade" id="updatetopic" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Topic</h5>
                    <button type="button" class="close" wire:click="closeModal" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="editTopic">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="Enter Subject Name...">Enter Topic Name</label>
                                <input type="text" wire:model="topic_name" class="form-control"
                                    placeholder="Enter Topic Name..." id="">
                                @error('topic_name')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="Enter Subject Name...">Choose Subject</label>
                                <select wire:model="subject_id" id="" class="form-control">
                                    <option value="null" selected disabled>--Choose Subject--</option>
                                    @foreach ($choosesubject as $subject)
                                        <option value="{{ $subject->id }}">[ {{ $subject->subjectname }} =>
                                            {{ $subject->std }} ]</option>
                                    @endforeach
                                </select>
                                @error('subject_id')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
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
    {{-- end of update  --}}


    <!-- Delete - Modal -->
    <div wire:ignore.self class="modal fade" id="deletetopic" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLongTitle">Delete Topic</h5>
                    <button type="button" class="close" wire:click="closeModal" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="destroyTopic">
                        <div class="row">
                            <p>Are you sure you want to delete the Topic?</p>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger btn-primary">Yes! Delete it</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end of modal --}}
