/* 
* javascript ready for shop.megacampro.kz
* scripts start here
*/

/*just scroll up*/
$('.up').on('click', function(e){
    $('html').stop().animate({ scrollTop: $('html').offset().top }, 1000);
    e.preventDefault()
  })
  