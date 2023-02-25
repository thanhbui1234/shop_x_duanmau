const formProfile = document.querySelector("#formProfile");
console.log(formProfile);

var userName = document.querySelector("input[name=userName]");
var fullName = document.querySelector("input[name=fullName]");
var email = document.querySelector("input[name=email]");
var phone = document.querySelector("input[name=phone]");

formProfile.addEventListener("submit", (e) => {
  if (userName.value.length < 5) {
    e.preventDefault();
    return Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Lỗi tên đăng nhập!",
    });
  }

  if (fullName.value.length < 9 || !isNaN(Number(fullName.value))) {
    e.preventDefault();

    return Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Họ tên có vấn đề",
    });
  }

  if (email.value.length < 4) {
    e.preventDefault();

    return Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Lỗi email",
    });
  }

  if (
    phone.value.length < 10 ||
    isNaN(phone.value) ||
    !phone.value.startsWith("0")
  ) {
    e.preventDefault();

    return Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Lỗi số điện thoại rồi!",
    });
  }
});
