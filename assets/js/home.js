const songdang = gsap.timeline({
  paused: true,
  repeat: 0,
});
const recommend_tree_dropdown = songdang.to("#recommend_tree_dropdown", {
  duration: 0.3,
  y: 50,
  ease: "expo-out",
  opacity: 1,
  display: "block",
});
const recommend_tree_hover = document.getElementById("recommend_tree");
recommend_tree_hover.addEventListener("mouseenter", () =>
  recommend_tree_dropdown.play()
);
recommend_tree_hover.addEventListener("mouseleave", () =>
  recommend_tree_dropdown.reverse()
);
