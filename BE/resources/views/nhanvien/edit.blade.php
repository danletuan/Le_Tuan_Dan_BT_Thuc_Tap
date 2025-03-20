@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Chỉnh Sửa Nhân Viên</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/nhanvien/' . $nhanvien->id_nhan_vien) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Họ Tên</label>
            <input type="text" name="ho_ten" class="form-control" value="{{ old('ho_ten', $nhanvien->ho_ten) }}" required>
            @error('ho_ten') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Ngày Sinh</label>
            <input type="date" name="ngay_sinh" class="form-control" value="{{ old('ngay_sinh', $nhanvien->ngay_sinh) }}" required>
            @error('ngay_sinh') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Giới Tính</label>
            <select name="gioi_tinh" class="form-control" required>
                <option value="Nam" {{ old('gioi_tinh', $nhanvien->gioi_tinh) == 'Nam' ? 'selected' : '' }}>Nam</option>
                <option value="Nữ" {{ old('gioi_tinh', $nhanvien->gioi_tinh) == 'Nữ' ? 'selected' : '' }}>Nữ</option>
            </select>
            @error('gioi_tinh') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Số Điện Thoại</label>
            <input type="text" name="so_dien_thoai" class="form-control" value="{{ old('so_dien_thoai', $nhanvien->so_dien_thoai) }}" required>
            @error('so_dien_thoai') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $nhanvien->email) }}" required>
            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Địa Chỉ</label>
            <input type="text" name="dia_chi" class="form-control" value="{{ old('dia_chi', $nhanvien->dia_chi) }}" required>
            @error('dia_chi') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Ảnh Đại Diện</label>
            @if($nhanvien->avatar)
                <div>
                    <img src="{{ asset('storage/' . $nhanvien->avatar) }}" alt="Avatar" width="100">
                </div>
            @endif
            <input type="file" name="avatar" class="form-control" accept="image/*">
            @error('avatar') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
        <a href="{{ url('/nhanvien') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
