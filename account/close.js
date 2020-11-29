$(function() {
  $(".close").click(function() {
    $(this).parent().fadeOut(1000, () => console.log("complete"))
  });  
});