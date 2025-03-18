<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bảng Lương Nhân Viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center">Bảng Lương Nhân Viên</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nhân Viên</th>
                <th>Số Tiền Lương</th>
                <th>Tháng Nhận Lương</th>
            </tr>
        </thead>
        <tbody>
            @foreach($luongs as $luong)
            <tr>
                <td>{{ $luong->id }}</td>
                <td>{{ $luong->nhanVien->ho_ten ?? 'Không có dữ liệu' }}</td>
                <td>{{ number_format($luong->so_tien_luong) }} VNĐ</td>
                <td>{{ $luong->thang_nhan_luong }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
