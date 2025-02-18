let $NhanVien = {};

document.querySelectorAll('#employeeForm input, #employeeForm select').forEach(input => {
    input.addEventListener('keyup', updateNhanVien);
    input.addEventListener('change', updateNhanVien);
});

function updateNhanVien() {
    $NhanVien = {
        ho_ten: document.getElementById('fullName').value,
        ngay_sinh: document.getElementById('dob').value,
        so_dien_thoai: document.getElementById('phone').value,
        email: document.getElementById('email').value,
        gender: document.getElementById('gender').value,
        address: document.getElementById('address').value
    };
    console.log($NhanVien);
}
