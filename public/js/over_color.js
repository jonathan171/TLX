 $(document).ready(function(){
    $("p").hover(function(){
      $(this).css("background-color", "#04B486");
      $(this).css("color", "white");
    }, function(){
      $(this).css("background-color", "white");
      $(this).css("color", "#04B486");

    });
  });