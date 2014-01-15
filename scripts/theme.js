$(function() {
	$('.navbar-nav a').click(function (e) {
		e.preventDefault();
		$(this).parent('li').toggleClass('active');
		$(this).parent('li').siblings('.active').removeClass('active');
	})

	$('.header .navbar-nav a').smoothScroll();
});

function scrollTo(elem) {
  $('body,html').animate({
    scrollTop: elem.offset().top
  }, 500);
}

$(function() {
  $('#jump2top').css('bottom', '-100px');
  $(window).scroll(function () {
    var btn = $('#jump2top');
    if ($(this).scrollTop() > 100) {
      btn.stop().animate({'bottom' : '0'}, 200);
    } else {
      btn.stop().animate({'bottom' : '-100px'}, 200); 
  	}
  });

  $('#jump2top').smoothScroll();
  var applyNow=function(btn,eml){
      var email=eml.val();eml.hide();
      $.post("apply.php",{email:email},function(){
        btn.html("Thank you!");
      })
  }

  $("#form-apply").on("submit",function(e){
    e.preventDefault();
    applyNow($(this).find("button[type=submit]"),$(this).find("input[type=email]"));
  })
  $("#apply-button").on("click",function(e){
      e.preventDefault();
      applyNow($(this),$(this).closest("form").find("input[type=email]"));
  });
});