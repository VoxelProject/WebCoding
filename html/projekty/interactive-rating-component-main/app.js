const VOTE = document.querySelector("#vote");
const VOTE__BUTTON = document.querySelector("#vote__submit-button");
const THANKYOU = document.querySelector("#thankyou");
const STORADGE_RESET = document.querySelector("#localStorage--reset");
const SELECT = document.querySelector(".select>a");
const VOTE__1 = document.querySelector("#re1");
const VOTE__2 = document.querySelector("#re2");
const VOTE__3 = document.querySelector("#re3");
const VOTE__4 = document.querySelector("#re4");
const VOTE__5 = document.querySelector("#re5");
const LSKEY = "rating";
let numberofVote = null;
const showVotingSystem = () => {
  if (VOTE.classList.contains("display")) {
    VOTE.classList.remove("display");
  }
  if (!THANKYOU.classList.contains("display")) {
    THANKYOU.classList.add("display");
  }
};
const hiddenVoteSystem = () => {
  if (!VOTE.classList.contains("display")) {
    VOTE.classList.add("display");
  }
  if (THANKYOU.classList.contains("display")) {
    THANKYOU.classList.remove("display");
  }
};
const classVoteElement = (id, option) => {
  const list = [1, 2, 3, 4, 5];
  const element = document.querySelector("#re" + id);
  if (list[id - 1]) {
    if (
      element.classList.contains("vote__button--interacted") &&
      option === "remove"
    ) {
      element.classList.remove("vote__button--interacted");
    }
    if (
      !element.classList.contains("vote__button--interacted") &&
      option === "add"
    ) {
      element.classList.add("vote__button--interacted");
    }
  } else {
    console.error("Invalid inside values");
    console.log(list);
  }
};
const storadgeReset = () => {
  localStorage.clear();
  showVotingSystem();
  numberofVote = null;
};
const voteClick = (e) => {
  const id = e.srcElement.innerText;
  if (
    !document
      .querySelector("#re" + id)
      .classList.contains("vote__button--interacted")
  ) {
    classVoteElement(1, "remove");
    classVoteElement(2, "remove");
    classVoteElement(3, "remove");
    classVoteElement(4, "remove");
    classVoteElement(5, "remove");
    classVoteElement(id, "add");
    numberofVote = Number(id);
  } else {
    classVoteElement(id, "remove");
    numberofVote = null;
  }
};
const renderScore = () => {
  SELECT.innerHTML = "You selected " + numberofVote + " out of 5";
};
const buttonClick = () => {
  if (numberofVote === null) {
    renderScore();
    hiddenVoteSystem();
    localStorage.setItem(LSKEY, true);
  } else {
    console.error("ser");
  }
};
for (let i = 1; i <= 5; i++) {
  document.querySelector("#re" + i).addEventListener("click", voteClick);
}
VOTE__BUTTON.addEventListener("click", buttonClick);
STORADGE_RESET.addEventListener("click", storadgeReset);
const init = () => {
  if (localStorage.getItem(LSKEY) === "true") {
    hiddenVoteSystem();
  } else {
    showVotingSystem();
  }
  console.log("alos");
};
init();
// FIXME:classVoteElement(2, "remove");
