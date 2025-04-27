// document.body.classList.toggle("DarkMode"); //Auto Dark Mode set
// For Loding
// let LodingGoToTop = false;


// For Dark Mode
// const NavModeMode = document.getElementById("NavModeBtn");
// NavModeMode.addEventListener("click", () => {
//   document.body.classList.toggle("DarkMode");
//   NavModeMode.classList.toggle("fa-toggle-on");
//   NavModeMode.classList.toggle("fa-toggle-off");
// });

//Menu Button Function
const NavMenuBtn = document.querySelector(".NavMenuPhone");
const NavMenuBtnDesktop = document.querySelector(".NavMenuDesktop");
const NavMenuButtonToggle = () => {
  NavMenuBtn.classList.toggle("fa-bars");
  NavMenuBtn.classList.toggle("fa-circle-xmark");
  NavMenuBtnDesktop.classList.toggle("fa-bars");
  NavMenuBtnDesktop.classList.toggle("fa-circle-xmark");
  document.querySelector("#mainBody").classList.toggle("WindowsSideBar");

  if (NavElementVarForToggle) {
    NavElementVar.style.display = "none";
  } else {
    NavElementVar.style.display = "flex";
  }

  // Toggle the state
  NavElementVarForToggle = !NavElementVarForToggle;
};

let NavElementVarForToggle = false; // Initialize outside to maintain state between clicks

NavMenuBtn.addEventListener("click", () => {
  NavMenuButtonToggle();
});
NavMenuBtnDesktop.addEventListener("click", () => {
  NavMenuButtonToggle();
});

document.querySelector("#NavCloseInBlank").addEventListener("click", () => {
  NavMenuButtonToggle();
});
const NavElementVar = document.querySelector("#NavElementSection");

// Select all parent list items
NavElementVar.addEventListener("click", function (event) {
  if (event.target.tagName === "A") {
    if (window.innerWidth <= 600) {
      NavMenuButtonToggle();
    }
  }
});

document.addEventListener("keydown", function (event) {
  if (event.altKey && event.key === "n") {
    NavMenuButtonToggle(); // Call the custom action function
  }
});

const updateMenuVisibility = () => {
  if (window.innerWidth >= 600) {
    document.querySelector(".NavMenuPhone").style.display = "none";
    document.querySelector(".NavMenuDesktop").style.display = "block";
    // NavMenuButtonToggle();
  } else {
    document.querySelector(".NavMenuPhone").style.display = "block";
    document.querySelector(".NavMenuDesktop").style.display = "none";
  }
};

window.addEventListener("resize", updateMenuVisibility);
updateMenuVisibility(); // Call it initially to set the correct state

const NavItems = document.querySelectorAll("#NavElementSection li > p");

// Add a click event listener to each parent item
NavItems.forEach((NavItem) => {
  NavItem.addEventListener("click", function () {
    const NavParentLi = this.parentElement;
    const NavAngleIcon = this.querySelector("p >.NavAngleToggle");

    NavParentLi.classList.toggle("HideOtherElement");

    // Toggle the angle icon
    NavAngleIcon.classList.toggle("fa-angle-right");
    NavAngleIcon.classList.toggle("fa-angle-down");
    // Close other open menus (optional)
    NavItems.forEach((NavOtherItem) => {
      if (NavOtherItem !== this) {
        NavOtherItem.parentElement.classList.remove("HideOtherElement");

        // Toggle the angle icon
        const NavOtherAngleIcon =
          NavOtherItem.querySelector("p >.NavAngleToggle");
        NavOtherAngleIcon.classList.add("fa-angle-right");
        NavOtherAngleIcon.classList.remove("fa-angle-down");
      }
    });
  });
});
