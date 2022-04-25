let togg1 = document.getElementById("togg1");
let d1 = document.getElementById("d1");
togg1.addEventListener("click", () => {
  if(getComputedStyle(d1).visibility != "none"){
    d1.style.visibility = "block";
  } else {
 
  }
})
