$(".accordion-button").click(function () {
  $(".accordion-button").children("span").removeClass("zoom");
  if (!$(this).children("span").hasClass("zoom")) {
    $(this).children("span").addClass("zoom");
  } else {
    $(this).children("span").removeClass("zoom");
  }
});

var windowLoc = $(location).attr("pathname");
var homePage = '/index.php';


if (windowLoc === homePage || windowLoc === "/") {
  $(".navbar ").css({
    background: "transparent",
    "backdrop-filter": " none",
    "box-shadow": "none",
  });
  window.addEventListener("scroll", (event) => {
    if ($(this).scrollTop() < 150) {
      $(".navbar ").css({
        background: "transparent",
        "backdrop-filter": " none",
        "box-shadow": "none",
      });
    } else {
      $(".navbar ").css({
        "background":
          "linear-gradient(0deg,rgba(255, 255, 255, 0.01),rgba(255, 255, 255, 0.01)),linear-gradient(107.02deg,rgba(19, 19, 19, 0.22) 12.09%,rgba(68, 67, 67, 0.22) 49.53%,rgba(0, 0, 0, 0.22) 89.26%)",
        "backdrop-filter": "blur(35px)",
        "box-shadow":
          "0px 0px 8px rgba(0, 0, 0, 0.11),0px 2px 16px 18px rgba(0, 0, 0, 0.02)",
      });
    }
  });
}

$('.navbar-toggler').click(function () {
  $('.navbar').toggleClass('toggle')
})
