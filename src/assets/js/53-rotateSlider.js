function rotate() {
    var lastChild = $('.slider div:last-child').clone();
    /*$('#test').html(lastChild)*/
    $('.slider div').removeClass('firstSlide')
    $('.slider div:last-child').remove();
    $('.slider').prepend(lastChild)
    $(lastChild).addClass('firstSlide')
  }
  

  window.setInterval(function(){
    rotate()
  }, 8000);


   // Initial rotation
   rotate();

   function nextSlide() {
       rotate();
   }

   function prevSlide() {
       var firstChild = $('.slider div:first-child').clone();
       $('.slider div').removeClass('firstSlide')
       $('.slider div:first-child').remove();
       $('.slider').append(firstChild);
       $(firstChild).addClass('firstSlide');
   }

