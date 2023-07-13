<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addsubject" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Subejct</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="storeSubject">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="Enter Subject Name...">Enter Subject Name</label>
                            <input type="text" wire:model="subjectname" class="form-control"
                                placeholder="Enter Subject Name...">
                            @error('subjectname')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="Enter Subject Name...">Choose Classes</label>
                            <select wire:model="std" class="form-control">
                                <option value="null" selected disabled>--Choose Class--</option>
                                <option value="STD-1">STD 1</option>
                                <option value="STD-2">STD 2</option>
                                <option value="STD-3">STD 3</option>
                                <option value="STD-4">STD 4</option>
                                <option value="STD-5">STD 5</option>
                                <option value="STD-6">STD 6</option>
                                <option value="STD-7">STD 7</option>
                            </select>
                            @error('std')
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

<!-- Update - Modal -->
<div wire:ignore.self class="modal fade" id="updatesubject" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLongTitle">Update Subejct</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="updateSubject" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="Enter Subject Name...">Enter Subject Name</label>
                            <input type="text" wire:model="subjectname" class="form-control"
                                placeholder="Enter Subject Name...">
                            @error('subjectname')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="Enter Subject Name...">Choose Classes</label>
                            <select wire:model="std" class="form-control">
                                <option value="selected" disabled {{ $std ? '' : 'selected' }} selected disabled>
                                    --Choose Class--</option>
                                <option value="STD-1">STD 1</option>
                                <option value="STD-2">STD 2</option>
                                <option value="STD-3">STD 3</option>
                                <option value="STD-4">STD 4</option>
                                <option value="STD-5">STD 5</option>
                                <option value="STD-6">STD 6</option>
                                <option value="STD-7">STD 7</option>
                            </select>
                            @error('std')
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



<!-- Delete - Modal -->
<div wire:ignore.self class="modal fade" id="deletesubject" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLongTitle">Delete Subejct</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="destroySubject">
                    <div class="row">
                        <p>Are you sure you want to delete the subject?</p>
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
