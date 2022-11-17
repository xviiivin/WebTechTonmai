let featured_dropdown = gsap.timeline({
  paused: true,
  repeat: 0,
});
const featured = document.getElementById("featured");
const featured_dropdown_hover = featured_dropdown.from("#featured_dropdown", {
  duration: 0.3,
  y: 5,
  ease: "expo-out",
  opacity: 0,
  display: "hidden",
});
featured.addEventListener("mouseenter", () => featured_dropdown_hover.play());
featured.addEventListener("mouseleave", () =>
  featured_dropdown_hover.reverse()
);
