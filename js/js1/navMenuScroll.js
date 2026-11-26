document.addEventListener("DOMContentLoaded", function () {
  var t;
  document.querySelectorAll(".tooltip-btn").forEach(function (btn) {
    btn.addEventListener("click", function () {
      document.querySelector(".project-full-rera").classList.toggle("selected");
    });
  });

  var clearHeader = document.querySelector(".clearHeader");
  window.addEventListener("scroll", function () {
    if (window.scrollY >= 50) {
      clearHeader.classList.remove("clearHeader");
      clearHeader.classList.add("darkHeader");
    } else {
      clearHeader.classList.remove("darkHeader");
      clearHeader.classList.add("clearHeader");
    }
  });

  document.getElementById("toggle").addEventListener("click", function () {
    this.classList.toggle("active");
    document.getElementById("overlay").classList.toggle("open");
  });

  document.querySelectorAll(".menu ul li.dropdown > span").forEach(function (span) {
    span.addEventListener("click", function (e) {
      e.preventDefault();
      this.nextElementSibling.classList.toggle("open");
    });
  });

  document.querySelectorAll('.menu ul li a[href^="#"]').forEach(function (link) {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      var target = document.querySelector(this.hash);
      window.scrollTo({
        top: target.offsetTop - 82,
        behavior: "smooth"
      });
    });
  });

});