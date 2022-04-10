const tabs = document.querySelectorAll(".tabs li");
const contents = document.querySelectorAll(".content");

tabs.forEach((tab, index) => {
    tab.addEventListener("click", () => {
        // To remove active class from previous tab
        tabs.forEach(tab => tab.classList.remove("active"));

        tab.classList.add("active");

        // To hide previous contents
        contents.forEach(c => c.classList.remove("active"));

        // To show content according to tabs selected
        contents[index].classList.add("active");
    });
});
// To run Animation intial
tabs[0].click();