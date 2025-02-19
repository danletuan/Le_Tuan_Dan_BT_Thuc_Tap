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
            li.innerHTML = `
                <span id="interest-${index}">${item}</span>
                <div class="btn-group">
                    <button class="edit-btn" onclick="editInterest(${index})">Sửa</button>
                    <button class="delete-btn" onclick="removeInterest(${index})">Xóa</button>
                </div>
            `;
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

    // Chỉnh sửa sở thích
    window.editInterest = function (index) {
        let interests = JSON.parse(localStorage.getItem("interests")) || [];
        let interestSpan = document.getElementById(`interest-${index}`);

        // Tạo input để chỉnh sửa
        let input = document.createElement("input");
        input.type = "text";
        input.value = interests[index];

        // Thay thế nội dung hiện tại bằng ô input
        interestSpan.replaceWith(input);

        // Thêm nút Lưu
        let saveButton = document.createElement("button");
        saveButton.innerText = "Lưu";
        saveButton.onclick = function () {
            let updatedValue = input.value.trim();
            if (updatedValue) {
                interests[index] = updatedValue;
                localStorage.setItem("interests", JSON.stringify(interests));
                loadInterests();
            }
        };

        // Thay thế nút "Sửa" thành "Lưu"
        input.nextSibling.replaceWith(saveButton);
    };


    // // Load danh sách sở thích từ localStorage
    // function loadInterests() {
    //     const interests = JSON.parse(localStorage.getItem("interests")) || [];
    //     interestList.innerHTML = "";
    //     interests.forEach((item, index) => {
    //         const li = document.createElement("li");
    //         li.innerHTML = `${item} <button onclick="removeInterest(${index})">X</button>`;
    //         interestList.appendChild(li);
    //     });
    // }
    // loadInterests();

    // // Thêm sở thích mới
    // addInterest.addEventListener("click", function () {
    //     let interest = newInterest.value.trim();
    //     if (interest) {
    //         let interests = JSON.parse(localStorage.getItem("interests")) || [];
    //         interests.push(interest);
    //         localStorage.setItem("interests", JSON.stringify(interests));
    //         newInterest.value = "";
    //         loadInterests();
    //     }
    // });

    // // Xóa một sở thích
    // window.removeInterest = function (index) {
    //     let interests = JSON.parse(localStorage.getItem("interests")) || [];
    //     interests.splice(index, 1);
    //     localStorage.setItem("interests", JSON.stringify(interests));
    //     loadInterests();
    // };

    // Xóa tất cả sở thích
    clearAll.addEventListener("click", function () {
        localStorage.removeItem("interests");
        loadInterests();
    });
});
