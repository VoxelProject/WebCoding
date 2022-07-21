let actveSlideNumber = 1;
let ARROW_LEFT = document.querySelector("#arrow-left");
let ARROW_RIGHT = document.querySelector("#arrow-right");
let SLIDE_LIST = document.querySelectorAll(".slide");

let showNextSlide = () => {
  if (actveSlideNumber >= SLIDE_LIST.length) {
    actveSlideNumber = 1;
  } else {
    actveSlideNumber++;
  }
  showSlide(actveSlideNumber);
};
let showPreviusSlide = () => {
  if (actveSlideNumber <= 1) {
    actveSlideNumber = SLIDE_LIST.length;
  } else {
    actveSlideNumber--;
  }
  showSlide(actveSlideNumber);
};
let showSlide = (slideNumber) => {
  let activeElement = document.querySelector(".active");
  activeElement.classList.remove("active");
  document.querySelector("#slide" + slideNumber).classList.add("active");
  actveSlideNumber = slideNumber;
};
ARROW_LEFT.addEventListener("click", showPreviusSlide);
ARROW_RIGHT.addEventListener("click", showNextSlide);
for (let i = 1; i <= 3; i++) {
  document.querySelector("#dot" + i).addEventListener("click", () => {
    showSlide(i);
  });
}
