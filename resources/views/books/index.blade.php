<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
</head>
<body>
    <h1>Daftar Buku</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Genre</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author->name }}</td>
                <td>{{ $book->genre->name }}</td>
                <td>Rp {{ number_format($book->price, 0, ',', '.') }}</td>
                <td>{{ $book->stock }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>