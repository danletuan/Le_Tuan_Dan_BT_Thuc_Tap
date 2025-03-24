<!DOCTYPE html>
<html>
<head>
    <title>Quản lý Nhân Viên</title>
</head>
<body>
    <h2>Chọn Truy Vấn</h2>
    <form method="GET" action="{{ route('nhanvien.truyvan') }}">
        <select name="queryType" id="queryType">
            <option value="danh_sach_nhan_vien" {{ request('queryType') == 'danh_sach_nhan_vien' ? 'selected' : '' }}>Danh sách nhân viên và phòng ban</option>
            <option value="tong_luong" {{ request('queryType') == 'tong_luong' ? 'selected' : '' }}>Tính tổng lương</option>
            <option value="nhan_vien_phong_ban" {{ request('queryType') == 'nhan_vien_phong_ban' ? 'selected' : '' }}>Nhân viên trong phòng ban</option>
        </select>
        
        <input type="month" name="thang_nam" value="{{ request('thang_nam') }}">
        
        <button type="submit">Truy vấn</button>
    </form>

    <h2>Kết quả</h2>
    @if ($queryType == 'danh_sach_nhan_vien' && $data)
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Họ Tên</th>
                <th>Phòng Ban</th>
                <th>Chức Vụ</th>
            </tr>
            @foreach ($data as $nv)
            <tr>
                <td>{{ $nv->id_nhan_vien }}</td>
                <td>{{ $nv->ho_ten }}</td>
                <td>
                    @foreach ($nv->phongBan as $pb)
                        {{ $pb->ten_phong_ban }}
                    @endforeach
                </td>
                <td>
                    @foreach ($nv->phongBan as $pb)
                        {{ $pb->pivot->chuc_vu }}
                    @endforeach
                </td>
            </tr>
            @endforeach
        </table>
    @elseif ($queryType == 'tong_luong')
        <p>Tổng lương tháng {{ request('thang') }}: {{ number_format($data) }} VND</p>
    @elseif ($queryType == 'nhan_vien_phong_ban' && $data)
        @foreach ($data as $pb)
            <h3>Phòng Ban: {{ $pb->ten_phong_ban }}</h3>
            <ul>
                @foreach ($pb->nhanVien as $nv)
                    <li>{{ $nv->ho_ten }} - {{ $nv->pivot->chuc_vu }}</li>
                @endforeach
            </ul>
        @endforeach
    @endif
</body>
</html>
