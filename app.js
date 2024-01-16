console.log("Koden körs iaf");


/* För navbaren */
var dropdown = document.getElementsByClassName("dropdown-link");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function () {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
var dropdownLinks = document.querySelectorAll(".dropdown-link");

dropdownLinks.forEach(function (link) {
  link.addEventListener("click", function () {
    var dropdownContainer = this.nextElementSibling; // Assumes the dropdown is the next element
    var dropdownArrow = this.querySelector(".fa-caret-down");

    dropdownContainer.classList.toggle("show");
    dropdownArrow.classList.toggle("rotate");

    // Force a style recalculation
    void dropdownArrow.offsetWidth;
  });
});

/*   Scroll funktion för headern   */

document.addEventListener("DOMContentLoaded", function () {
  var sideMenu = document.getElementById("sideMenu");
  var header = document.querySelector("header");

  sideMenu.style.left = "-300px"; // Ensure the initial state is off-screen

  function toggleMenu() {
    console.log("Det körs här");
    sideMenu.style.left = sideMenu.style.left === "0px" ? "-300px" : "0";
  }

  // Attach the event listener to the toggle button
  var menuToggle = document.querySelector(".menu-toggle");
  menuToggle.addEventListener("click", toggleMenu);

  // Close the menu when clicking outside of it
  document.addEventListener("click", function (event) {
    var isClickInsideMenu = sideMenu.contains(event.target);
    var isClickOnToggle = menuToggle.contains(event.target);

    if (!isClickInsideMenu && !isClickOnToggle) {
      sideMenu.style.left = "-300px";
    }
  });

  // Function to handle scroll event
  function handleScroll() {
    var scrollPosition = window.scrollY;
    if (scrollPosition > 200) {
      // Change 100 to the desired scroll position
      // Change header and footer properties
      header.style.backgroundColor = "black";
    } else {
      // Restore header and footer properties to their default values
      header.style.backgroundColor = "initial"; // Restore to default or specify another color
    }
  }

  // Attach the handleScroll function to the scroll event
  window.addEventListener("scroll", handleScroll);
});
