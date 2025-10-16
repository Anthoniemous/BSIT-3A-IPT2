const openModalBtn = document.getElementById("openModalBtn");
const closeModalBtn = document.getElementById("closeModalBtn");
const cancelModalBtn = document.getElementById("cancelModalBtn");
const productModal = document.getElementById("productModal");

if (openModalBtn) {
    openModalBtn.addEventListener("click", () => {
        productModal.classList.remove("hidden");
    });
}

const closeModal = () => productModal.classList.add("hidden");
if (closeModalBtn) closeModalBtn.addEventListener("click", closeModal);
if (cancelModalBtn) cancelModalBtn.addEventListener("click", closeModal);

productModal?.addEventListener("click", (e) => {
    if (e.target === productModal) closeModal();
});

// Preview image
const productImageInput = document.getElementById("productImageInput");
if (productImageInput) {
    productImageInput.addEventListener("change", function (e) {
        const file = e.target.files[0];
        const preview = document.getElementById("imagePreview");
        const img = document.getElementById("previewImg");

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                img.src = e.target.result;
                preview.classList.remove("hidden");
            };
            reader.readAsDataURL(file);
        }
    });
}

// ✅ Make these functions global:
window.openEditModal = function (
    id,
    name,
    price,
    category,
    quantity,
    imagePath
) {
    const modal = document.getElementById("editProductModal");
    modal.classList.remove("hidden");

    document.getElementById("editName").value = name;
    document.getElementById("editPrice").value = price;
    document.getElementById("editCategory").value = category;
    document.getElementById("editQuantity").value = quantity;

    // ✅ Show existing image
    const preview = document.getElementById("editImagePreview");
    const img = document.getElementById("editPreviewImg");
    if (imagePath) {
        img.src = `/storage/${imagePath}`;
        preview.classList.remove("hidden");
    } else {
        preview.classList.add("hidden");
    }

    // ✅ Update form action
    const form = document.getElementById("editProductForm");
    form.action = `/products/${id}`;
};

// ✅ Handle new image preview
const editImageInput = document.getElementById("editProductImageInput");
if (editImageInput) {
    editImageInput.addEventListener("change", function (e) {
        const file = e.target.files[0];
        const preview = document.getElementById("editImagePreview");
        const img = document.getElementById("editPreviewImg");

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                img.src = e.target.result;
                preview.classList.remove("hidden");
            };
            reader.readAsDataURL(file);
        }
    });
}

window.closeEditModal = function () {
    document.getElementById("editProductModal").classList.add("hidden");
};
