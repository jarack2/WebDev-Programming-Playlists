$(document).ready(function() {
  $('.videos').slick({
    slidesToShow: 1,
  });
});

$(document).ready(function() {
  $('#favorites').click(function() {
    const favorite = ($('.slick-current').attr("data-src"))
    
    $.ajax({
      type: "POST",
      url:"favorite_handler.php",
      data: {favorite: favorite},
      success: function(data){
        alert("The video was successfully added to favorites!");
        // $('#favorites')
      }
    })
  })
  
});


