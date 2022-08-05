<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Nip</th>
            <th scope="col">Nama anggota</th>
            <th scope="col">E-mail</th>
            <th scope="col">Total saldo</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Options</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users as $anggota)
            <tr>
                <td>{{$anggota->nip}}</td>
                <td>{{$anggota->name}}</td>
                <td>{{$anggota->email}}</td>
                <td>Rp. {{number_format($anggota->saldo, 2)}}</td>
                <td>{{$anggota->created_at->format('d-m-Y')}}</td>
                <td>
                </td>
            </tr>
        @empty
            {{-- jika tidak ada data jenis pinjaman --}}
            <tr>
                <td colspan="6">Data belum ada</td>
            </tr>
        @endforelse
    </tbody>
</table>
