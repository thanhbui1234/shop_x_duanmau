const allCheckBoxes = document.querySelector("#selectAllBoxes");

const selectAllBoxesChild = document.querySelectorAll(".selectAllBoxesChild");

allCheckBoxes.addEventListener("click", function () {
  if (this.checked) {
    selectAllBoxesChild.forEach((checkbox) => {
      checkbox.checked = true;
    });
  } else {
    selectAllBoxesChild.forEach((checkbox) => {
      checkbox.checked = false;
    });
  }
});
