

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh Sách Nhân Viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center">Danh Sách Nhân Viên</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Họ Tên</th>
                <th>Ngày Sinh</th>
                <th>Giới Tính</th>
                <th>Số Điện Thoại</th>
                <th>Email</th>
                <th>Địa Chỉ</th>
                <th>Avatar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nhanviens as $nv)
            <tr>
                <td>{{ $nv->id_nhan_vien }}</td>
                <td>{{ $nv->ho_ten }}</td>
                <td>{{ $nv->ngay_sinh }}</td>
                <td>{{ $nv->gioi_tinh }}</td>
                <td>{{ $nv->so_dien_thoai }}</td>
                <td>{{ $nv->email }}</td>
                <td>{{ $nv->dia_chi }}</td>
                <td>
                    @if($nv->avatar)
                        <img src="{{ asset('storage/' . $nv->avatar) }}" alt="Avatar" width="50">
                    @else
                        Không có ảnh
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
