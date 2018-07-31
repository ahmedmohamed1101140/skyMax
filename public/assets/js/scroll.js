var infiniteScrolling = (function() {
  'use strict';

  var limit = 0,
    counter = 0,
    $loading;

  function scrollTo(offset){

    $(window).scrollTop(offset);

  }

  function loadMore() {

    $('.list').after( $loading );
    $(document).off('scroll', scrollController);
    $('.load-more').addClass('is-hidden');

    setTimeout(function(){

      $loading.remove();
      $('.list').append( $('.hidden-content').html() );
	  
      $('.list').find('.element').not('.element-in').each(function(i){

        var $this = $(this);

        setTimeout(function(){

          requestAnimationFrame( function(){ $this.addClass('element-in') } )

        }, ( 100 * Math.ceil( (i+1)/4 )) )

      })

      $('.message .bottom').text( $('.list').height() );
      
      $(document).on('scroll touchmove', scrollController);

      if( counter == limit ){

        $('.load-more').removeClass('is-hidden');

      }
    }, 1000);
    

  }

  function scrollController() {

    $('.message .scroll').text( $(window).scrollTop() );

    if( $(window).scrollTop() + $(window).height() >=  $('.list').height() && counter < limit ){

      $('.message').addClass('ok');
      loadMore();
      counter+=1;

      return;

    } 

    $('.message').removeClass('ok');
    

  }

  function bindUI() {

    $(document).on('scroll', scrollController);


    $('.load-more').on('click', loadMore);

  }

  function init(limite) {

    limit = limite;

    bindUI();

    $('.message .bottom').text( $('.list').height() );
    $('.message .height').text($(window).height());

    $loading = $('<div class="loading">Loading</div>');
    
  }

  return {
    init:init
  };

}());

$(function(){

  infiniteScrolling.init( 1 );

})