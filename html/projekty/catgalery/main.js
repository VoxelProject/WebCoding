const THUMBNAILS = document.querySelectorAll(".catimage");
const POPUP = document.querySelector(".popup");
const POPUP_CLOSE = document.querySelector(".popup__close");
const POPUP_IMG = document.querySelector(".popup__img");
const ARROW_LEFT = document.querySelector(".popup__arrow--left");
const ARROW_RIGHT = document.querySelector(".popup__arrow--right");

let currentImgIndex;

const showNextImg = () => {
  if (currentImgIndex === THUMBNAILS.length - 1) {
    currentImgIndex = 0;
  } else {
    currentImgIndex++;
  }
  POPUP_IMG.src = THUMBNAILS[currentImgIndex].src;
  POPUP_IMG.alt = THUMBNAILS[currentImgIndex].alt;
};

const showPreviousImg = () => {
  if (currentImgIndex === 0) {
    currentImgIndex = THUMBNAILS.length - 1;
  } else {
    currentImgIndex--;
  }
  POPUP_IMG.src = THUMBNAILS[currentImgIndex].src;
  POPUP_IMG.alt = THUMBNAILS[currentImgIndex].alt;
};

const closewindow = () => {
  POPUP.classList.add("fadeOut");
  setTimeout(() => {
    POPUP.classList.add("hidden");
    POPUP.classList.remove("fadeOut");
    THUMBNAILS.forEach((element) => {
      element.setAttribute("tabindex", 1);
    });
  }, 300);
};

THUMBNAILS.forEach((thumbnail, index) => {
  const showPopup = (event) => {
    POPUP.classList.remove("hidden");
    POPUP_IMG.src = event.target.src;
    currentImgIndex = index;
    POPUP_IMG.alt = event.target.alt;
    THUMBNAILS.forEach((element) => {
      element.setAttribute("tabindex", -1);
    });
  };

  thumbnail.addEventListener("click", showPopup);

  thumbnail.addEventListener("keydown", (event) => {
    if (
      event.code === "Enter" ||
      event.keyCode === 13 ||
      event.key === "Enter"
    ) {
      showPopup(event);
    }
  });
});

POPUP_CLOSE.addEventListener("click", closewindow);

ARROW_RIGHT.addEventListener("click", showNextImg);

ARROW_LEFT.addEventListener("click", showPreviousImg);

document.addEventListener("keydown", (event) => {
  if (!POPUP.classList.contains("hidden")) {
    if (
      event.key === "ArrowRight" ||
      event.code === "ArrowRight" ||
      event.keyCode === "39"
    ) {
      showNextImg();
    }
    if (
      event.key === "ArrowLeft" ||
      event.code === "ArrowLeft" ||
      event.keyCode === "37"
    ) {
      showPreviousImg();
    }
    if (
      event.key === "Escape" ||
      event.code === "Escape" ||
      event.keyCode === "27"
    ) {
      closewindow();
    }
  }
});

POPUP.addEventListener("click", (event) => {
  if (event.target === POPUP) {
    closewindow();
  }
});
