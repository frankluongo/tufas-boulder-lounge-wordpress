function Carousel(carousel) {
  const arrows = carousel.querySelectorAll("[data-arrow]");
  const slides = Array.from(carousel.querySelectorAll(".js\\:carousel-slide"));
  const dotsContainer = carousel.querySelector(".js\\:carousel-dots");
  buildDots();
  const dots = dotsContainer.querySelectorAll("[data-dot]");

  const autoSlide = carousel?.dataset?.autoslide === "1";
  const limit = slides.length - 1;
  const state = { active: 0, interval: null };
  const timing = parseInt(carousel?.dataset?.timing) * 1000;

  function buildDots() {
    const cntrls = slides
      .map(
        (_, i) =>
          `<button class="tbl:button tbl:button--dot" data-dot="${i}" title="Go to Slide ${i + 1}"></button>`,
      )
      .join("");
    dotsContainer.innerHTML = cntrls;
  }

  // Happens on Interval
  function goNext() {
    updateState(validate(state.active + 1));
  }

  // Happens when clicking a dot
  function goTo(number) {
    clearInterval(state.interval);
    updateState(validate(number));
  }

  // Happens when clicking an arrow
  function increment(next) {
    clearInterval(state.interval);
    updateState(validate(state.active + next));
  }

  function numberify(input) {
    const number = parseInt(input);
    if (isNaN(number))
      throw new Error(`Not a valid number: ${input} | ${typeof input}`);
    return number;
  }

  function setActive() {
    slides.forEach((slide) => slide.setAttribute("aria-hidden", true));
    slides[state.active].setAttribute("aria-hidden", false);

    dots.forEach((dot) => dot.setAttribute("aria-current", false));
    dots[state.active].setAttribute("aria-current", true);
  }

  function validate(input) {
    if (input < 0) return limit;
    if (input > limit) return 0;
    return input;
  }

  function updateState(number) {
    state.active = number;
    setActive();
  }

  setActive();
  arrows.forEach((arrow) =>
    arrow.addEventListener("click", () =>
      increment(numberify(arrow.dataset.arrow)),
    ),
  );
  dots.forEach((dot) =>
    dot.addEventListener("click", () => goTo(numberify(dot.dataset.dot))),
  );
  if (autoSlide) state.interval = setInterval(goNext, timing);
}

function Carousels() {
  const carousels = document.querySelectorAll(".js\\:carousel");
  if (!carousels.length) return;
  carousels.forEach(Carousel);
}

Carousels();
