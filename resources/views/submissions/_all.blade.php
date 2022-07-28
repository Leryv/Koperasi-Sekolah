<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <th scope="col">NIK</th>
            <th scope="col">Nama anggota</th>
            <th scope="col">Jenis pinjaman</th>
            <th scope="col">Jumlah pinjaman</th>
            <th scope="col">Bunga</th>
            <th scope="col">Jumlah angsuran</th>
            <th scope="col">Lama angsuran</th>
            <th scope="col">Tanggal persetujuan</th>
            @role('bendahara')
                <th scope="col">Persetujuan</th>
            @endrole
        </thead>
        <tbody>
                {{-- jika data kosong --}}
                <tr>
                    <td colspan="9">
                        Data pengajuan pinjaman belum tersedia.
                    </td>
                </tr>
           
        </tbody>
    </table>
</div>