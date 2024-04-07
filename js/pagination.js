// pagination.js

function next() {
  document.getElementById('part5').setAttribute("style","display:none");
  document.getElementById('part7').setAttribute("style","display:block");
  document.getElementById('previous').setAttribute("style","display:block");
  document.getElementById('next').setAttribute("style","display:none");
}
function previous() {
  document.getElementById('part5').setAttribute("style","display:block");
  document.getElementById('part7').setAttribute("style","display:none");
  document.getElementById('next').setAttribute("style","display:block");
  document.getElementById('previous').setAttribute("style","display:none");
}
