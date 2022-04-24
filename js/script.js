let togg1 = document.getElementById("togg1");
let d1 = document.getElementById("d1");
togg1.addEventListener("click", () => {
  if(getComputedStyle(d1).visibility != "none"){
    d1.style.visibility = "none";
  } else {
    d1.style.visibility = "block";
  }
})

function togg(){
  if(getComputedStyle(d2).visibility != "hidden"){
    d2.style.visibility = "hidder";
  } else {
    d2.style.visibility = "visible";
  }
};
togg2.onclick = togg;