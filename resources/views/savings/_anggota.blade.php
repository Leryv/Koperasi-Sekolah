<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Saldo masuk</th>
            <th scope="col">Tanggal saldo masuk</th>
        </tr>
    </thead>
    <tbody>
        @forelse (auth()->user()->savings as $simpanan)
        <!-- Ini diambil dri nama table savings -->
            <tr>
                <td>Rp.{{number_format($simpanan->saldo, 2)}}</td>
                <td>{{$simpanan->created_at->format('d-m-Y')}}</td>
            </tr>
        @empty
            <tr>
                <td colspan="2">Data simpanan anda belum tersedia.</td>
            </tr>
        @endforelse
    </tbody>
</table>
