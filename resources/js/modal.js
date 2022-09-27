
// phần modal
const pointHead = document.querySelector(".js-point")
const modal = document.querySelector(".js-modal")
const modalContainer = document.querySelector(".js-modalContainer")
const modalClose = document.querySelector(".js-modal-close")

// hàm hiển thị modal point (thêm class open vào modal)
function showModalpoint() {
  modal.classList.add("open")
}

// hàm ẩn modal point (xóa class open khỏi của modal)
function hideModalpoint() {
  modal.classList.remove("open")
}

function redirectHome() {
  window.location.replace(window.location.origin + "?page=test.index");
}

// nghe hành vi click vào phần point trên header
pointHead.addEventListener("click", showModalpoint)

// nghe hành vi click vào phần close trong modal
modalClose.addEventListener("click", redirectHome)

// modal.addEventListener("click", hideModalpoint)

modalContainer.addEventListener("click", function (event) {
  event.stopPropagation()
})