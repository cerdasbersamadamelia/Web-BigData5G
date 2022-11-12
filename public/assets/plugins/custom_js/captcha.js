window.onload = function() {
    var $recaptcha = document.querySelector('#g-recaptcha');

    if ($recaptcha) {
        $recaptcha.setAttribute("required", "required");
    }
};

// Resize reCAPTCHA to fit width of container
// Since it has a fixed width, we're scaling
// using CSS3 transforms
// ------------------------------------------
// captchaScale = containerWidth / elementWidth

function scaleCaptcha(elementWidth) {
    // Width of the reCAPTCHA element, in pixels
    var reCaptchaWidth = 304;
    // Get the containing element's width
      var containerWidth = $('.container_captcha').width();
    
    // Only scale the reCAPTCHA if it won't fit
    // inside the container
    if(reCaptchaWidth > containerWidth) {
      // Calculate the scale
      var captchaScale = containerWidth / reCaptchaWidth;
      // Apply the transformation
      $('.g-recaptcha').css({
        'transform':'scale('+captchaScale+')'
      });
    }
  }
  
  $(function() { 
   
    // Initialize scaling
    scaleCaptcha();
    
    // Update scaling on window resize
    // Uses jQuery throttle plugin to limit strain on the browser
    $(window).resize($.throttle(100, scaleCaptcha));
    
  });