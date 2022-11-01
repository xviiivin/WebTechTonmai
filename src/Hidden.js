function ToggleButton() {
  var x = document.getElementById("Toggle");
  if (x.style.display == "none") {
    Summary.innerText = "Hide summary";
    x.style.display = "block";
    gsap.from("#Toggle", {
      opacity: 0,
      y: -20,
      duration: 0.5
    });
  }
  else {
    Summary.innerText = "Show summary";
    x.style.display = "none";
  }
}


