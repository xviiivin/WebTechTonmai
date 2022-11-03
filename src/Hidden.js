const btn = document.getElementById('aToggle');
btn.addEventListener('click', function () {
  var x = document.getElementById("Toggle");
  if (x.style.display == "block") {
    Summary.innerText = "Show summary";
    x.style.display = "none";
  }
  else {
    Summary.innerText = "Hide summary";
    x.style.display = "block";
    gsap.from("#Toggle", {
      opacity: 0,
      y: -20,
      duration: 0.5
    });
  }
});

