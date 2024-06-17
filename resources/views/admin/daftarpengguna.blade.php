@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col">
        <div class="table-responsive">
            <table class="table table-bordered" id="table_id">
                <thead>
                    <tr style="text-align: center">
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr style="text-align: center">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
</div>

@endsection
@section('script')
    <script>
        window.addEventListener('closeModal', event => {
            $('#createAntrian').modal('hide')
            $('#editUser').modal('hide')
            $('#deleteUser').modal('hide')
        })
    
    </script>
@endsection