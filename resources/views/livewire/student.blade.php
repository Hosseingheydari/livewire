    <div>

        <div class="container ">
            <div class="row">
                <div class="col-lg-11">
                    <div class="card">
                        <div class="card-header" style="float:left">
                            <h6><strong>All Students</strong></h6>
                            <button class="btn btn-sm btn-primary" style="float:right" data-bs-toggle="modal"
                                data-bs-target="#addNewStudent">add new student</button>
                        </div>
                        <div class="card-body">
                            @if (session()->has('message'))
                                <div class="alert  alert-success text-center">{{ session('message') }}</div>
                            @endif
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>num</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th class="col-md-5">Email</th>
                                        <th>Phone</th>
                                        <th class="col-md-5" style="text-align:center">
                                        </th>
                                    </tr>
                                </thead>
                                <?php $a = 1; ?>
                                @foreach ($students as $student)
                                    <tbody>
                                        <tr>
                                            <td>{{ $a++ }}</td>
                                            <td>{{ $student->student_id }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->phone }}</td>
                                            <td style="text-align:center">
                                                <button class="btn btn-sm btn-primary">View</button>
                                                <button class="btn btn-sm btn-secondary"
                                                    wire:click="editStudent({{ $student->id }})  ">Edit</button>
                                                <button class="btn btn-sm btn-danger" wire:click ="delete()">Delete</button>

                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                                <div class="d-flex">
                                </div>
                            </table>
                            {!! $students->links() !!}

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Modalstore -->
        <div wire:ignore.self class="modal fade" id="addNewStudent" tabindex="-1" aria-labelledby="new"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="new">Add New</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>

                    <div class="modal-body">
                        <form wire:submit.prevent="storeNewStudent">

                            <div class="form-group">
                                <label for="student_id" class="col-3">Student ID</label>
                                <div class="col-9">
                                    <input type="number" class="form-control" wire:model="student_id">
                                    @error('student_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="name" class="col-3">Name</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" wire:model="name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-3">email</label>
                                <div class="col-9">
                                    <input type="email" class="form-control" wire:model="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="col-3">phone</label>
                                <div class="col-9">
                                    <input type="number" class="form-control" wire:model="phone">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="model-footer">
                                <div class="form-group">
                                    <div class="col-9">
                                        <button type="submit" class="btn btn-primary ">Add
                                            Student</button>
                                        <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Close
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
        <!-- Modaledit -->
        <div wire:ignore.self class="modal fade" id="editStudent" tabindex="-1" aria-labelledby="new"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="new">Edit Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="editStudentData">

                            <div class="form-group">
                                <label for="student_id" class="col-3">Student ID</label>
                                <div class="col-9">
                                    <input type="number" class="form-control" wire:model="student_id">
                                    @error('student_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-3">Name</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" wire:model="name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-3">email</label>
                                <div class="col-9">
                                    <input type="email" class="form-control" wire:model="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="col-3">phone</label>
                                <div class="col-9">
                                    <input type="number" class="form-control" wire:model="phone">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="model-footer">
                                <div class="form-group">
                                    <div class="col-9">
                                        <button type="submit" class="btn btn-primary ">Edit Student
                                        </button>
                                        <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
        <!-- Modaldelete -->
        <div wire:ignore.self class="modal fade" id="delete" tabindex="-1" aria-labelledby="new"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="new">Delete Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body pt-4 pb-4" >
                        <h6>Are you sure?</h6>
                        <div class="model-footer">
                            <div class="form-group">
                                <div class="col-9">
                                    <button type="submit" class="btn btn-primary "  wire:click="editStudent({{ $student->id }})">Delete
                                    </button>
                                    <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Close
                                    </button>
                                </div>
                            </div>
                        </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            // modal-store
            window.addEventListener('close-modal', event => {
                $('#addNewStudent').modal('hide')
            });

            // modal-update
            window.addEventListener('edit-student-show-modal', event => {
                $('#editStudent').modal('show')
            });

            window.addEventListener('close-edit-modal', event => {
                $('#editStudent').modal('hide')
            });
        </script>
    @endpush
