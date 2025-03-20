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
                <th>Hành Động</th>
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
                <td>
                    <a href="{{ url('/nhanvien/edit/' . $nv->id_nhan_vien) }}" class="btn btn-warning btn-sm">Sửa</a>

                    <form action="{{ url('/nhanvien/' . $nv->id_nhan_vien) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa nhân viên này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Nút thêm nhân viên -->
    <div class="text-center mt-3">
        <a href="{{ url('/nhanvien/create') }}" class="btn btn-primary">Thêm Nhân Viên</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
