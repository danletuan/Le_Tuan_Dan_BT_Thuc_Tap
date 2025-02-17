// document.addEventListener("DOMContentLoaded", function () {
//     let $NhanVien = {
//         ho_ten: "",
//         ngay_sinh: "",
//         so_dien_thoai: "",
//         email: "",
//         gender: "",
//         address: ""
//     };

//     const form = document.getElementById("employeeForm");
//     const inputs = form.querySelectorAll("input");

//     // Validate số điện thoại
//     function validatePhone(phone) {
//         return /^[0-9]{10,11}$/.test(phone);
//     }

//     // Validate email
//     function validateEmail(email) {
//         return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
//     }

//     // Hàm cập nhật dữ liệu khi nhập
//     function updateData(event) {
//         let { id, value, type } = event.target;

//         if (type === "radio") {
//             $NhanVien.gender = document.querySelector('input[name="gender"]:checked')?.value || "";
//         } else {
//             $NhanVien[id] = value.trim();
//         }

//         // Hiển thị lỗi nếu có
//         let errorMessage = event.target.nextElementSibling;
//         if (id === "soDienThoai" && value && !validatePhone(value)) {
//             errorMessage.textContent = "Số điện thoại không hợp lệ!";
//         } else if (id === "email" && value && !validateEmail(value)) {
//             errorMessage.textContent = "Email không hợp lệ!";
//         } else {
//             errorMessage.textContent = "";
//         }

//         console.log($NhanVien);
//     }

//     // Lắng nghe sự kiện keyup & change trên form
//     inputs.forEach(input => {
//         input.addEventListener("keyup", updateData);
//         input.addEventListener("change", updateData);
//     });
// });
