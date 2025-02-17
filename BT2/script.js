document.addEventListener("DOMContentLoaded", function () {
    const avatar = document.getElementById("avatar");
    const uploadAvatar = document.getElementById("uploadAvatar");
    const interestList = document.getElementById("interestList");
    const newInterest = document.getElementById("newInterest");
    const addInterest = document.getElementById("addInterest");
    const clearAll = document.getElementById("clearAll");

    // Upload & Lưu ảnh đại diện
    uploadAvatar.addEventListener("change", function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                avatar.src = e.target.result;
                localStorage.setItem("avatar", e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });

    // Load ảnh đại diện từ localStorage
    const savedAvatar = localStorage.getItem("avatar");
    if (savedAvatar) avatar.src = savedAvatar;

    // Load danh sách sở thích từ localStorage
    function loadInterests() {
        const interests = JSON.parse(localStorage.getItem("interests")) || [];
        interestList.innerHTML = "";
        interests.forEach((item, index) => {
            const li = document.createElement("li");
            li.innerHTML = `${item} <button onclick="removeInterest(${index})">X</button>`;
            interestList.appendChild(li);
        });
    }
    loadInterests();

    // Thêm sở thích mới
    addInterest.addEventListener("click", function () {
        let interest = newInterest.value.trim();
        if (interest) {
            let interests = JSON.parse(localStorage.getItem("interests")) || [];
            interests.push(interest);
            localStorage.setItem("interests", JSON.stringify(interests));
            newInterest.value = "";
            loadInterests();
        }
    });

    // Xóa một sở thích
    window.removeInterest = function (index) {
        let interests = JSON.parse(localStorage.getItem("interests")) || [];
        interests.splice(index, 1);
        localStorage.setItem("interests", JSON.stringify(interests));
        loadInterests();
    };

    // Xóa tất cả sở thích
    clearAll.addEventListener("click", function () {
        localStorage.removeItem("interests");
        loadInterests();
    });
});
