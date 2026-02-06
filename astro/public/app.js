const animatedItems = document.querySelectorAll("[data-animate]");

const revealOnScroll = () => {
  const trigger = window.innerHeight * 0.88;

  animatedItems.forEach((item) => {
    const rect = item.getBoundingClientRect();
    if (rect.top < trigger) {
      item.classList.add("visible");
    }
  });
};

window.addEventListener("scroll", revealOnScroll);
window.addEventListener("load", () => {
  revealOnScroll();

  const buttons = document.querySelectorAll(".button");
  buttons.forEach((button, index) => {
    button.style.transitionDelay = `${index * 60}ms`;
  });
});

const noteForm = document.querySelector(".note-form");
if (noteForm) {
  noteForm.addEventListener("submit", (event) => {
    event.preventDefault();
    noteForm.classList.add("submitted");
    const button = noteForm.querySelector("button[type='submit']");
    if (button) {
      button.textContent = "Saved (demo)";
    }
  });
}
