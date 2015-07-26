jQuery(document).ready(function($){

    /*********************************
    Determine Header Image Widths
    *********************************/
    function colThreeimgHeight(){
      $(window).on('load resize', function(){

      	var winWidth = window.innerWidth;
        if((winWidth >= 700) && (winWidth <= 960)) {
          $('.header-imgs').css('height', (winWidth/2));
          $('.col-3-head:first-child').css('height', ((winWidth/2)-100));
          $('.col-3-head:nth-child(2)').css('height', ((winWidth/2)-100));
          $('.col-3-head:last-child').css('height', (winWidth/2));
        } else if(winWidth >= 960) {
        
		    	$('.header-imgs').css('height', (winWidth/3.2));
          $('.col-3-head:first-child').css('height', ((winWidth/3.2)-100));
          $('.col-3-head:nth-child(2)').css('height', ((winWidth/3.2)-100));
          $('.col-3-head:last-child').css('height', (winWidth/3.2));
        } else {
          $('.header-imgs').css('height', 420);
        }
        // console.log(winWidth);
      });
		};

    colThreeimgHeight();

   function colTwoimgHeight(){
  	$(window).on('load resize', function(){

      var winWidth = window.innerWidth;
      if((winWidth >= 700) && (winWidth <= 960)) {
        $('.col-2-head:first-child').css('height', ((winWidth/2)-100));
        $('.col-2-head:nth-child(2)').css('height', (winWidth/2));
      } else if(winWidth >= 960) {
      
        $('.col-2-head:first-child').css('height', ((winWidth/3.2)-100));
        $('.col-2-head:nth-child(2)').css('height', winWidth/3.2);
      }
      // console.log(winWidth);
    });
	};

  colTwoimgHeight();

  function fullWidthHeight(){
      var $fullImg = $('.full-img'); //cache the selector

      $(window).on('load resize', function(){
        //set the title to full-width when the header image is full width
        $fullImg.closest('.header-img-container').next('.title').css('width', 100 +"%");
        var winWidth = window.innerWidth;
        if((winWidth >= 700) && (winWidth <= 960)) {
          $fullImg.css('height', (winWidth/2));
        } else if(winWidth >= 960) {
          $fullImg.css('height', winWidth/3.2);
        }
        // console.log(winWidth);
      });
  }

  fullWidthHeight();


  /*********************************
    Mobile Menu
  *********************************/
  //Open/close mobile menu
  function mobMenu(){
    $('nav.mobile').on('click', function(){
      $(this).toggleClass('open');
      if($(this).find('.menu-primary-menu-container').hasClass('active')){
        $(this).closest('header').next('#main').css('position', 'initial');
        $(this).find('.menu').slideUp();
        $(this).find('.menu-primary-menu-container').removeClass('active');
      } else {
          $(this).find('.menu-primary-menu-container').addClass('active');
          $(this).find('.menu').slideDown();
          $(this).parent().next('#main').css('position', 'fixed');
      }
    })
  }

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
    var $gallArchive = $('.gallery-archive'),
        galleryCategory = $gallArchive.children('.images'),
        ImgNumber = galleryCategory.length,
        widthValue = (100/ImgNumber) + "%",
        $images = $('.images');
        // $imageWidth = $images.each(function(){
        //   $(this).width;
        //   console.log($(this).getPropertyValue(style));
        // })
        //Determine width and height of gallery items 

    //Function to determine width of each featured image on the Gallery Archive page
    var gallerySize = function galleryHomeSize(){
      var winWidth = window.innerWidth,
          winHeight = window.innerHeight;
      if(winWidth >= 400){
        $(window).on('load', function(){
          $gallArchive.find('.images').css('width', widthValue);
          $gallArchive.find('.images').css('height', '90px');
        });
      }  
    };  

    gallerySize();  

   
    $(window).on('load resize', function(){
      var winWidth = window.innerWidth,
          winHeight = window.innerHeight,
          heightValue = (winHeight/ImgNumber) + "%";
      if(winWidth > 700){
        $gallArchive.css('width', winWidth-270);
        $(galleryCategory).css('height', winHeight);
      } else if(winWidth >= 400) {
        $gallArchive.css('width', winWidth);
        $(galleryCategory).css('height', winHeight);
      } else {
        $gallArchive.css('width', '100%');
        $gallArchive.css('height', heightValue);
      }

    //Open the gallery on click and ensure appropriate resizing when items are "active"
      galleryCategory.on('click', function(e){
        e.preventDefault();
       
        var $active = $('.active'),
            $self = $(this);

        if($images.hasClass('active')) {
          $self.prevAll().css({'display': 'block'});
          $self.nextAll().css({'display': 'block'});
          $self.removeClass('active').css('width', widthValue).find('.image-reveal').hide();
          $images.children('h1').show();

        } else {
          $(this).prevAll().css({'display': 'none'});
          $(this).nextAll().css({'display': 'none'});
          $self.addClass('active').css({'width': 100+'%'}).find('.image-reveal').show();
          // $self.addClass('active').find('.image-reveal').show();
          //  $self.addClass('active').css('width', 100+'%').find('.image-reveal').show();
           // $('.active').prevAll().css({'width': '0'});
           // $('.active').nextAll().css({'width': '0'});
           $active.find('img').css('filter', 'grayscale(60%)');
           $images.children('h1').hide();
              $self.find('.button').on('click', function(e){
              e.stopPropagation();
           });
          }
      })
    });
  }

  galleryClickReveal();

 /* function gallTypeWidth(){
    $('.gallery-archive').find('.images').on('mouseenter', function(){
        console.log($(this).offsetWidth);
      })
  }

  gallTypeWidth();*/


  /*********************************
    Get Letter of Gallery Image
  *********************************/
  //Get the first letter of each Gallery to display on gallery archive page
  function galleryTitleLetter(){
   var $gallArchive = $('.gallery-archive');

   $gallArchive.find('.images').each(function(){
      var text = $(this).children('h1').text().charAt(0);
      $(this).children('h1').html(text);
    })
  }
  galleryTitleLetter();


  //Change the color of the gallery background on hover. Only applies when gallery is opened.
  function galleryOpenHover(){
    $('.gallery-archive').find('.image-reveal').on('mouseenter', function(){
      $(this).closest('.images').find('img').css({'-webkit-filter': 'none', 'filter': 'none'});
    })
     $('.gallery-archive').find('.image-reveal').on('mouseleave', function(){
      $(this).closest('.images').find('img').css({'-webkit-filter': 'grayscale(60%)', 'filter': 'grayscale(60%)'});
    })
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



    
