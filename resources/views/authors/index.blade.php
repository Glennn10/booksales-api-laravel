<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Penulis</title>
</head>
<body>
    <h1>Daftar Penulis</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Bio</th>
            <th>Jumlah Buku</th>
        </tr>
        @foreach ($authors as $author)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $author->name }}</td>
                <td>{{ $author->bio }}</td>
                <td>{{ $author->books_count }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>