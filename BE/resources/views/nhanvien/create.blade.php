@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Thêm Nhân Viên</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Chỉnh sửa enctype để hỗ trợ upload file --}}
    <form action="{{ url('/nhanvien/store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Họ Tên</label>
            <input type="text" name="ho_ten" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Ngày Sinh</label>
            <input type="date" name="ngay_sinh" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Giới Tính</label>
            <select name="gioi_tinh" class="form-control" required>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Số Điện Thoại</label>
            <input type="text" name="so_dien_thoai" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Địa Chỉ</label>
            <input type="text" name="dia_chi" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Ảnh Đại Diện</label>
            <input type="file" name="avatar" class="form-control" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary">Thêm Nhân Viên</button>
    </form>
</div>
@endsection
