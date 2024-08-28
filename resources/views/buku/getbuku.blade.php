@foreach ($getBuku as $buku)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $buku->judul_buku }}</td>
        <td>{{ $buku->name }}</td>
        <td>{{ $buku->nama }}</td>
        <td>{{ $buku->kategori }}</td>
        <td>{{ $buku->thn_terbit }}</td>
        <td>{{ $buku->jumlah }}</td>
    </tr>
@endforeach
