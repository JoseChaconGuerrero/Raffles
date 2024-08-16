const show = document.querySelector(".bi-caret-right-fill");
const wrapper = document.querySelector(".content-wrapper")
const sidebar = document.querySelector(".sidebar")

show.addEventListener("click", (e) => {
  sidebar.classList.toggle("hidden-nav")
  wrapper.classList.toggle("hidden-wrapper")
});
