$(function() {
  $(".close").click(function() {
    $(this).parent().fadeOut(500, () => console.log("complete"))
  });  
});