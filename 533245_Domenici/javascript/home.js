function openBar() 
{
  document.getElementById("menu").style.width = "300px";
  document.getElementById("main_page").style.marginLeft = "300px";
  document.getElementsByTagName("footer")[0].style.marginLeft = "300px";
  document.getElementById("main_page").style.opacity = "0.4"
}

function closeBar() 
{
  document.getElementById("menu").style.width = "0";
  document.getElementById("main_page").style.marginLeft= "0";
  document.getElementsByTagName("footer")[0].style.marginLeft = "0";
  document.getElementById("main_page").style.opacity = "1"
}