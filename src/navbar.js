const searchbar_tl = gsap.timeline({
  paused: true,
  repeat: 0,
});

searchbar_tl
  .from("#search-bar", {
    opacity: 1,
    y: -150,
    duration: 0.3,
    ease: "expo-out",
  })
  .to(
    "#search-bar",
    {
      display: "block",
      duration: 0.3,
    },
    0
  )
  .to(
    "#fade-bg",
    {
      display: "block",
      opacity: 0.5,
      duration: 0.3,
    },
    0
  );

const OpenModal = (t) => {
  const tle = document.getElementById("fade-bg");
  if (!tle.classList.contains("active")) {
    tle.classList.add("active");
    if (t == "search-bar") {
      searchbar_tl.play();
    } else if (t == "vertical-nav") {
      navside_tl.play();
    }
    console.log("OpenModal() called, opening...");
  } else if (tle.classList.contains("active") && t == "fade-bg") {
    tle.classList.remove("active");
    searchbar_tl.reverse();
    navside_tl.reverse();
    console.log("OpenModal() called, closing...");
  } else {
    tle.classList.remove("active");
    if (t == "search-bar") {
      searchbar_tl.reverse();
    } else if (t == "vertical-nav") {
      navside_tl.reverse();
    }
    console.log("OpenModal() called, closing...");
  }
};

let nav_dropdown = gsap.timeline({
  paused: true,
  repeat: 0,
});

const dropdown = document.querySelector("#nav-dropdown");
const dropdown_hover = nav_dropdown.to("#modal-dropdown", {
  duration: 0.3,
  y: -5,
  ease: "expo-out",
  opacity: 1,
  display: "block",
});
dropdown.addEventListener("mouseenter", () => dropdown_hover.play());
dropdown.addEventListener("mouseleave", () => dropdown_hover.reverse());

let navside_tl = gsap.timeline({
  paused: true,
  repeat: 0,
});
navside_tl
  .from("#vertical-nav", {
    x: "-30em",
    opacity: 1,
    duration: 0.3,
    ease: "expo-out",
    display: "block",
  })
  .to(
    "#fade-bg",
    {
      display: "block",
      opacity: 0.5,
      duration: 0.3,
    },
    0
  );

let type_tree_dropdown = gsap.timeline({
  paused: true,
  repeat: 0,
});

const tree_dropdown = document.querySelector("#asd");
const tree_dropdown_hover2 = type_tree_dropdown.from("#type-tree-dropdown", {
  duration: 0.3,
  y: -25,
  ease: "expo-out",
  display: "none",
  opacity: 0,
});
tree_dropdown.addEventListener("mouseenter", () => tree_dropdown_hover2.play());
tree_dropdown.addEventListener("mouseleave", () =>
  tree_dropdown_hover2.reverse()
);
