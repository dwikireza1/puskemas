<section id="antrian" class="d-flex align-items-center">
    <div class="container" style="margin-top: 150px">

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert"> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($cekAntrian > 0)
        <div class="row">
    <div class="col">
        <div class="table-responsive">
            <table class="table table-bordered" id="table_id">
                <thead>
                    <tr style="text-align: center">
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr style="text-align: center">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a class="btn btn-warning" wire:click="editUser({{ $user->id }})"
                                role="button" data-bs-toggle="modal" data-bs-target="#editUser"><i
                                    class="bi bi-pencil"></i></a>

                            <button type="button" class="btn btn-danger"
                                wire:click="deleteUser({{ $user->id }})" role="button"
                                data-bs-toggle="modal" data-bs-target="#deleteUser"><i
                                    class="bi bi-trash"></i></button>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
    </div>
        @else
            {{-- Jangan Tampilkan Apa-apa --}}
        @endif

        @include('livewire.antrian.editAntrian')

        @include('livewire.antrian.createAntrian')

        @include('livewire.antrian.deleteAntrian')

    </div>

</section><!-- End Hero -->
