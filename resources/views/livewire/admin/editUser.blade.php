<div wire:ignore.self class="modal fade" id="editUser-{{ $user->id }}" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editUserLabel">Edit Pengguna</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="updateUser">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama:</label>
                        <input type="text" id="name" name="name" class="form-control" wire:model="name" required>
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" wire:model="email" required>
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role_id" class="form-label">Role:</label>
                        <input type="number" id="role_id" name="role_id" class="form-control" wire:model="role_id" required>
                        @error('role_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>