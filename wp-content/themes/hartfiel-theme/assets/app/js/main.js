jQuery(document).ready(function($){

    /*********************************
    Determine Header Image Widths
    *********************************/

    //Header Image with Black Box
    function colThreeimgHeight(){
      $(window).on('load resize', function(){
        var $head_img = $('.header-imgs'),
            $col_3 = $head_img.find('.col-3-head'),
            winWidth = window.innerWidth;

        if( (winWidth >= 770) && (winWidth <= 960) ) {
          $head_img.css('height', (winWidth/3.2));
          $col_3.css('height', (winWidth/3.2));
        } else if( winWidth > 960 ) {
          $head_img.css('height', (winWidth/4.2));
          $col_3.css('height', (winWidth/4.2));
        } else {
          $head_img.css('height', 320);
        }
      });
    };

    colThreeimgHeight();

  //   function colThreeimgHeight(){
  //     $(window).on('load resize', function(){

  //     	var winWidth = window.innerWidth,
  //           $head_first = $('.col-3-head').first(),
  //           $head_last = $('.col-3-head').last();

  //       if((winWidth >= 700) && (winWidth <= 960)) {
  //         $('.header-imgs').css('height', (winWidth/4.2));
  //         $head_first.css('height', ((winWidth/4.2)-100));
  //         $('.col-3-head:nth-child(2)').css('height', ((winWidth/4.2)-100));
  //         $head_last.css('height', (winWidth/4.2));
  //       } else if(winWidth >= 960) {
        
		//     	$('.header-imgs').css('height', (winWidth/4.2));
  //         $head_first.css('height', ((winWidth/4.2)-100));
  //         $('.col-3-head:nth-child(2)').css('height', ((winWidth/3.3)-100));
  //         $head_last.css('height', (winWidth/3.3));
  //       } else {
  //         $('.header-imgs').css('height', 320);
  //       }
  //     });
		// };

  //   colThreeimgHeight();

 //   function colTwoimgHeight(){
 //  	$(window).on('load resize', function(){

 //      var winWidth = window.innerWidth;
 //      if((winWidth >= 700) && (winWidth <= 960)) {
 //        $('.col-2-head:first-child').css('height', ((winWidth/4.2)-100));
 //        $('.col-2-head:nth-child(2)').css('height', (winWidth/4.2));
 //      } else if(winWidth >= 960) {
      
 //        $('.col-2-head:first-child').css('height', ((winWidth/4.2)-100));
 //        $('.col-2-head:nth-child(2)').css('height', winWidth/4.2);
 //      }
 //    });
	// };

 //  colTwoimgHeight();

  // function fullWidthHeight(){
  //     var $fullImg = $('.full-img'); //cache the selector

  //     $(window).on('load resize', function(){
  //       //set the title to full-width when the header image is full width
  //       $fullImg.closest('.header-img-container').next('.title').css('width', 100 +"%");
  //       var winWidth = window.innerWidth;
  //       if((winWidth >= 700) && (winWidth <= 960)) {
  //         $fullImg.css('height', (winWidth/2));
  //       } else if(winWidth >= 960) {
  //         $fullImg.css('height', winWidth/3.2);
  //       }
  //     });
  // }

  // fullWidthHeight();


  /*********************************
    Mobile Menu
  *********************************/

  //Open/close mobile menu
  function mobMenu(){
    $('nav.mobile').on('click', function(){
      var $self = $(this),
          $menu_primary = $self.find('.menu-primary-menu-container'),
          $menu = $self.find('.menu');

      $self.toggleClass('open');
      if($menu_primary.hasClass('active')){
        $self.closest('header').next('#main').css('position', 'initial');
        $menu.slideUp();
        $menu_primary.removeClass('active');
      } else {
          $menu_primary.addClass('active');
          $menu.slideDown();
          $self.parent().next('#main').css('position', 'fixed');
      }
    });
  };

  mobMenu();

  /*********************************
    Center Images
  *********************************/
  function centerImg(){
    $(window).on('load resize', function(){

      var imgContain = $('.img-container');

      $(imgContain).each(function(){

        var containWidth = $(this).width(), //obtain width of container around img
        containHeight = $(this).height(), //obtain height of container around img
        imgWidth = $(this).find('img').width(), //get image width
        imgHeight = $(this).find('img').height(), //get image height
        heightDiff = ((imgHeight - containHeight)/2), //find difference between container height and image height and then divide by 2
        imgDiff = imgWidth - containWidth, //find difference between container width and container width
        marginLocation = (imgDiff)/2;

        if(imgWidth > containWidth) {

          $(this).find('img').css('margin-left', -(marginLocation));
        }
        if(imgHeight > containHeight) {
          $(this).find('img').css('margin-top', -(heightDiff));
        }
      }); 
    });  
  }

  centerImg();


  /*********************************
    Gallery Archive Functions
  *********************************/ 

  //Open the full-width image "on click" for the gallery archive page. 
  function galleryClickReveal(){

    //Define the variables
    var $gallArchive = $('.gallery-archive'),
        galleryCategory = $gallArchive.children('.images'),
        ImgNumber = galleryCategory.length,
        widthValue = (100/ImgNumber) + "%",
        $images = $('.images'),
        $active = $('.active'),
        winWidth = window.innerWidth,
        winHeight = window.innerHeight;
      
    //Code to determine width of each featured image on the Gallery Archive page for devices greater than 400px
    if(winWidth >= 400){
      $(window).on('load', function(){
        galleryCategory.css('width', widthValue);
        galleryCategory.css('height', '100%');
      });
    };  

    //Set the width on the gallery-archive div
    $(window).on('load resize', function(){
      var winWidth = window.innerWidth,
          winHeight = window.innerHeight;
      $gallArchive.css('height', winHeight);    
      if(winWidth > 770){
        $gallArchive.css('width', winWidth-250);
      } else if(winWidth >= 400) {
        $gallArchive.css('width', winWidth);
      } else {
        $gallArchive.css('width', '100%');
      }
    });  

    //Open the gallery on click and ensure appropriate resizing when items are "active"
    galleryCategory.on('click', function(e){
      e.preventDefault();
      //Define variables
      var $self = $(this);

      if( $images.hasClass('active') ) {
        $self.prevAll().css({'display': 'block'});
        $self.nextAll().css({'display': 'block'});
        $images.children('h1').show();
        if(winWidth >= 400){
          $self.removeClass('active').css('width', widthValue).find('.image-reveal').hide();
        } else {
          $self.removeClass('active').css('width', '100%').find('.image-reveal').hide();
        }
        
      } else {
        $(this).prevAll().css({'display': 'none'});
        $(this).nextAll().css({'display': 'none'});
        $self.addClass('active').css({'width': 100+'%'}).find('.image-reveal').show();
        $active.find('img').css('filter', 'grayscale(60%)');
        $images.children('h1').hide();
            $self.find('.button').on('click', function(e){
              e.stopPropagation();
        });
      };
    });
  }

  galleryClickReveal();


  /*********************************
    Get Letter of Gallery Image
  *********************************/
  //Get the first letter of each Gallery to display on gallery archive page
  function galleryTitleLetter(){
    var $gallArchive = $('.gallery-archive');

    $gallArchive.find('.images').each(function(){
      var text = $(this).children('h1').text().charAt(0);
      $(this).children('h1').html(text);
    });
  };
  galleryTitleLetter();

  /*********************************
    Gallery Hover Effect
  *********************************/
  //Change the color of the gallery background on hover. Only applies when gallery is opened.
  function galleryOpenHover(){
    $('.gallery-archive').find('.image-reveal').on('mouseenter', function(){
      $(this).closest('.images').find('img').css({'-webkit-filter': 'none', 'filter': 'none'});
    });
     $('.gallery-archive').find('.image-reveal').on('mouseleave', function(){
      $(this).closest('.images').find('img').css({'-webkit-filter': 'grayscale(60%)', 'filter': 'grayscale(60%)'});
    });
  }

  galleryOpenHover();


  /*********************************
    Accordion Module
  *********************************/
  function accordionOpen(){
    var $question = $('.question');

    $question.on('click', function(){

      if($question.not(this).hasClass('open') ){
        $question.not(this).removeClass('open').next('.answer').slideUp();
        $(this).addClass('open').next('.answer').slideDown();
      } else if($(this).hasClass('open')){
        $(this).removeClass('open').next('.answer').slideUp();
      } else {
        $(this).addClass('open').next('.answer').slideDown();
      }
    });
  }
  accordionOpen();
  
  /*********************************
    Single Post Pages - Title
  *********************************/
  //Animate title on Single Posts Page
  function dropPostTitle(){
    $(window).on('load', function(){
      $('.single-post-img').fadeIn(1000);
      $('.single-title').slideDown(1500);
    });
  }
  dropPostTitle();
});



    
