function checkValue(element) {
    if ($(element).val())
      $(element).addClass('has-value');
    else
      $(element).removeClass('has-value');
}
  
$(function() {
    $('.form-control').each(function() {
      checkValue(this);
    })
    $('.form-control').blur(function() {
      checkValue(this);
    });
});