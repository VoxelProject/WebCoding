const WINDOW = document.querySelector(".window");
const WINDOW_CLOSE = document.querySelector(".window__close");
const WINDOW_BUTTON = document.querySelector(".lk");
const SUBMIT = document.querySelector("#submit");
const MASK = document.querySelector(".mask");

const closeWindow = () => {
  MASK.classList.add("hidden");
};
const showWindow = () => {
  MASK.classList.remove("hidden");
};

SUBMIT.addEventListener("click", showWindow);
WINDOW_CLOSE.addEventListener("click", closeWindow);
document.addEventListener("keydown", (event) => {
  if (
    event.key === "Escape" ||
    event.keyCode === 27 ||
    event.code === "Escape"
  ) {
    closeWindow();
  }
});
MASK.addEventListener("click", (event) => {
  if (event.target === MASK) {
    closeWindow();
  }
});
