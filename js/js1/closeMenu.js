
document.querySelectorAll(".overlay-menu a").forEach(link => {
    console.log("test")
    link.addEventListener("click", function () {
      document.querySelector(".overlay").classList.remove("open");
      document.querySelector(".button_container").classList.remove("active");
    });
  });
  