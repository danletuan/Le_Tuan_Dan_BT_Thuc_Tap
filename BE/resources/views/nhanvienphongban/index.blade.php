<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh Sách Nhân Viên - Phòng Ban</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center">Danh Sách Nhân Viên - Phòng Ban</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID Phòng Ban</th>
                <th>Tên Phòng Ban</th>
                <th>ID Nhân Viên</th>
                <th>Tên Nhân Viên</th>
                <th>Chức Vụ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{ $row->id_phong_ban }}</td>
                <td>{{ $row->phongBan->ten_phong_ban ?? 'N/A' }}</td>
                <td>{{ $row->id_nhan_vien }}</td>
                <td>{{ $row->nhanVien->ho_ten ?? 'N/A' }}</td>
                <td>{{ $row->chuc_vu }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
