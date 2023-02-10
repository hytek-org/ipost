
let themeToggleDarkIcon = document.querySelector('.themeToggleDarkIcon');
let themeToggleLightIcon = document.querySelector('.themeToggleLightIcon');
let themeToggleDarkIcon1 = document.querySelector('.themeToggleDarkIcon1');
let themeToggleLightIcon1 = document.querySelector('.themeToggleLightIcon1');

let themeToggleBtn = document.getElementById('theme-toggle');
let themeToggleBtn1 = document.getElementById('theme-toggle1');


// theme vars
const userTheme = localStorage.getItem("theme")
const systemTheme = window.matchMedia("(prefer-color-scheme: dark)").matches;

// icon toggling
const iconToggle = () =>{
 themeToggleDarkIcon.classList.toggle("hidden");
 themeToggleDarkIcon1.classList.toggle("hidden");
 themeToggleLightIcon.classList.toggle("hidden");
 themeToggleLightIcon1.classList.toggle("hidden");

};

// initial theme check
const themeCheck = () => {
    if (userTheme === "dark" || (!userTheme && systemTheme)){
        document.documentElement.classList.add("dark");
        themeToggleDarkIcon.classList.add("hidden");
        themeToggleDarkIcon1.classList.add("hidden");
        return;
       
    }
     themeToggleLightIcon.classList.add("hidden");
     themeToggleLightIcon1.classList.add("hidden");
};

// manual theme switch
const themeSwitch = () => {
    if(document.documentElement.classList.contains("dark")){
        document.documentElement.classList.remove("dark");
        localStorage.setItem("theme", "light");
        iconToggle();
        return;
    }
    document.documentElement.classList.add("dark");
    localStorage.setItem("theme","dark");
    iconToggle();
};
// call theme switch
themeToggleLightIcon.addEventListener("click", () => {
    themeSwitch();
})
themeToggleLightIcon1.addEventListener("click", () => {
    themeSwitch();
})
themeToggleDarkIcon.addEventListener("click", () => {
    themeSwitch();
})
themeToggleDarkIcon1.addEventListener("click", () => {
    themeSwitch();
})
themeCheck()





