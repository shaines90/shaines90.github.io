$( document ).ready(function() {
  $('.button').attr("disabled","disabled");
  $('#tc').click(function(){
    if($(this).prop("checked") == false){
      $('button').prop('disabled', true);
      $('.button').css("background-color", "#E8DDDE");
      $('.button').text("YOU MUST ACCEPT THE TERMS & CONDITIONS TO CONTINUE");
    }
    else if($(this).prop("checked") == true){
      $('.button').removeAttr('disabled');
      $('.button').css("background-color", "rgb(139,27,29)");
      $('.button').text("SUBMIT");

    }
  });
  $('#fsubmit').click(function() {
    alert('submitted');
  })
});
