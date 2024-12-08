<section id="antrian" class="d-flex align-items-center">
    <div class="container" style="margin-top: 150px">

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert"> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div>
    <!-- Tampilkan profil pengguna -->
    <div class="card">
        <div class="card-header">
            <h3>Profil Pengguna</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nama</th>
                    <td><strong>{{ $user->name }}</strong></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td>{{ $user->tgl_lahir }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $user->alamat }}</td>
                </tr>
                <tr>
                    <th>No KTP</th>
                    <td>{{ $user->no_ktp }}</td>
                </tr>
                <tr>
                    <th>No HP</th>
                    <td>{{ $user->no_hp }}</td>
                </tr>
                <tr>
                    <th>Pekerjaan</th>
                    <td>{{ $user->pekerjaan }}</td>
                </tr>
                <!-- Tambahkan data lain sesuai kebutuhan -->
            </table>
        </div>
    </div>
</div>

</section>
