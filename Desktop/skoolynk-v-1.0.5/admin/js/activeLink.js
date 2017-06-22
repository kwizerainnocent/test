//this is the js for keeping the side links on the school pages active if you are on the page
$(document).ready(function(){
$("[href]").each(function(){
if(this.href==window.location.href){
$(this).addClass("active");
}
});
});