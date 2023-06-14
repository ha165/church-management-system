function confirmDelete(id) {
   if (confirm("Are You sure you want to delete this record?")){
      document.getElementById("deleteform").submit();
   }
 }
const body = document.querySelector("body"),
      modeToggle = body.querySelector(".mode-toggle");
      sidebar = body.querySelector("nav");
      sidebarToggle = body.querySelector(".sidebar-toggle");
      
      let getMode = localStorage.getItem("mode");
      if(getMode && getMode ==="dark"){
        body.classList.toggle("dark"); 
      }
       
modeToggle.addEventListener("click", () =>{
   body.classList.toggle("dark"); 
   if(body.classList.contains("dark")){
     localStorage.setItem("mode","dark");
   }else{
    localStorage.setItem("mode","light");
   }
});

sidebarToggle.addEventListener("click",() => {
   sidebar.classList.toggle("close");
});
function myfunction () {
   document.getElementById("mydropdown").classList.toggle("show");
}
window.onclick=function(event){
   if(!event.target.matches('.link-name')){
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
       for(i=0;i<dropdowns.length; i++) {
         var opendropdown = dropdowns[i];
         if(opendropdown.classlist.contains('show')) {
            opendropdown.classList.remove('show');
         }
       }
   }
}
