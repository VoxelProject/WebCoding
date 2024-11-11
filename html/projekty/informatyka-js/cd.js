const SEKCJA_MATH = document.getElementById("math");
const SEKCJA_STRING = document.getElementById("string");
const SEKCJA_DATE = document.getElementById("data");
const SEKCJA_KONTAINER = document.getElementById("conteiner");

SEKCJA_MATH.addEventListener("click", function (event) {
  if (event.target.tagName === "A" || event.target.closest("a")) {
    const PARAGRAF_MATH = event.target.closest("a");
    const ELEMENT_MATH = PARAGRAF_MATH.querySelector("em");

    if (ELEMENT_MATH) {
      SEKCJA_KONTAINER.classList.remove("inw");
      let wartoscMATH = ELEMENT_MATH.textContent;
      let wynik = eval(wartoscMATH);
      if (isNaN(wynik) || wynik == undefined) {
        let nazwaFunkcji = wartoscMATH.slice(0, wartoscMATH.indexOf("("));

        let liczbaArgumentow = eval(nazwaFunkcji).length;
        let domyslneArgumenty = Array(liczbaArgumentow).fill(2);
        wartoscMATH = `${nazwaFunkcji}(${domyslneArgumenty.join(", ")})`;
        wynik = eval(wartoscMATH);
      }
      SEKCJA_KONTAINER.innerHTML = wynik;
      setTimeout(() => {
        SEKCJA_KONTAINER.classList.add("inw");
      }, 2500);
    }
  }
});

//

SEKCJA_STRING.addEventListener("click", function (event) {
  if (event.target.tagName === "A" || event.target.closest("a")) {
    const PARAGRAF_STRING = event.target.closest("a");
    const ELEMENT_STRING = PARAGRAF_STRING.querySelector("em");

    if (ELEMENT_STRING) {
      SEKCJA_KONTAINER.classList.remove("inw");
      let wartoscSTRING = ELEMENT_STRING.textContent;

      let testString = "Hello, World!";
      let wynik;
      if (wartoscSTRING == "String.length") {
        wynik = testString.length;
      } else {
        let nazwaFunkcji =
          wartoscSTRING
            .slice(0, wartoscSTRING.indexOf("("))
            .replace(/String/g, `"${testString}"`) + "()";
        wynik = eval(nazwaFunkcji);
      }
      SEKCJA_KONTAINER.innerHTML = wynik;
      setTimeout(() => {
        SEKCJA_KONTAINER.classList.add("inw");
      }, 2500);
    }
  }
});

//

SEKCJA_DATE.addEventListener("click", function (event) {
  if (event.target.tagName === "A" || event.target.closest("a")) {
    const PARAGRAF_DATE = event.target.closest("a");
    const ELEMENT_DATE = PARAGRAF_DATE.querySelector("em");

    if (ELEMENT_DATE) {
      SEKCJA_KONTAINER.classList.remove("inw");
      let wartoscDATE = ELEMENT_DATE.textContent;
      let testDate = new Date();
      let wynik;

      switch (wartoscDATE) {
        case "Date()":
          wynik = eval(wartoscDATE);
          break;
        case "Date.setFullYear()":
          testDate.setFullYear(2025);
          wynik = testDate;
          break;
        case "Date.parse()":
          wynik = Date.parse(testDate);
          break;
        default:
          try {
            let nazwaFunkcji = wartoscDATE.replace("Date.", "testDate.");
            wynik = eval(nazwaFunkcji);
          } catch (e) {
            wynik = "Błąd: nieprawidłowa operacja na Date";
          }
      }

      SEKCJA_KONTAINER.innerHTML = wynik;
      setTimeout(() => {
        SEKCJA_KONTAINER.classList.add("inw");
      }, 2900);
    }
  }
});
