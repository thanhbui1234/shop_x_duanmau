const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: "btn btn-success",
    cancelButton: "btn btn-danger",
  },
  buttonsStyling: false,
});

const deleteBtn = document.querySelectorAll(".delete");

deleteBtn.forEach((btn) => {
  const dataId = btn.getAttribute("data-id");

  btn.addEventListener("click", (e) => {
    e.preventDefault();

    swalWithBootstrapButtons
      .fire({
        title: "Bạn có chắc không?",
        text: "Bạn muốn xóa người dùng này phải không",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText:
          '<a class="text-white " href="/shop_xx/admin/index.php?act=listUser&deleteUser=' +
          dataId +
          '">Xóa<a>',
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
      })
      .then((result) => {
        if (result.isConfirmed) {
          return "";
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          swalWithBootstrapButtons.fire(
            "Cancelled",
            "Ok không xóa nữa :)))",
            "error"
          );
        }
      });
  });
});
