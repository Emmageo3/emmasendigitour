var AvrilThemeJs;

(function( $, avrilConfig ) {
  'use strict';

  AvrilThemeJs = {

    eventID: 'AvrilThemeJs',

    $document: $( document ),
    $window:   $( window ),
    $body:     $( 'body' ),

    classes: {
      toggled:              'toggled',
      isOverlay:            'overlay-enabled',
      headerMenuActive:     'header-menu-active',
      headerSearchActive:   'header-search-active'
    },

    init: function() {
      // Document ready event check
      this.$document.on( 'ready', this.documentReadyRender.bind( this ) );
      this.$document.on( 'ready', this.processAutoheight.bind( this ) );
      this.$document.on( 'ready', this.mobileMenuClone.bind( this ) );
      this.$window.on( 'ready', this.documentReadyRender.bind( this ) );
    },

    documentReadyRender: function() {

      // Document Events
      this.$document
        .on( 'click.' + this.eventID, '.menu-toggle',   this.menuToggleHandler.bind( this ) )
        .on( 'click.' + this.eventID, '.header-close-menu',    this.menuToggleHandler.bind( this ) )

        .on( 'click.' + this.eventID, this.hideHeaderMobilePopup.bind( this ) )

        .on( 'click.' + this.eventID, '.mobile-toggler',  this.verticalMobileSubMenuLinkHandle.bind( this ) )

        .on( 'click.' + this.eventID, '.header-close-menu', this.resetVerticalMobileMenu.bind( this ) )
        .on( 'hideHeaderMobilePopup.' + this.eventID, this.resetVerticalMobileMenu.bind( this ) )

        .on( 'resize.' + this.eventID, this.processAutoheight.bind( this ) )

        .on( 'click.' + this.eventID, '.header-search-toggle', this.searchToggleHandler.bind( this ) )
        .on( 'click.' + this.eventID, '.header-search-close',  this.searchToggleHandler.bind( this ) )

        .on( 'click.' + this.eventID, '.scrollup', this.scrollUpClick.bind( this ) );

      // Window Events
      this.$window
        .on('scroll.' + this.eventID, this.scrollToSticky.bind( this ) )

        .on('scroll.' + this.eventID, this.scrollUp.bind( this ) )

        .on('load.' + this.eventID, this.mobileMenuRight.bind( this ) )

        .on( 'load.' + this.eventID, this.menuFocusAccessibility.bind( this ) )

        .on( 'load.' + this.eventID, this.customQuery.bind( this ) )

        .on( 'load.' + this.customID, this.aboveHeaderMobile.bind( this ) )

        .on( 'resize.' + this.eventID, this.processAutoheight.bind( this ) );
    },

    // Scroll UP
    scrollUp: function( event ) {
      var self        = this,
          $scrollup  = $( '.scrollup' );
      if (self.$window.scrollTop() > 100) {
          $scrollup.addClass('is-active');
      }
      else {
          $scrollup.removeClass('is-active');
      }
    },
    scrollUpClick: function( event ) {
      $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    },

    // Sticky Header
    scrollToSticky: function( event ) {
      var self        = this,
          $stickyNav  = $( '.sticky-nav' );
      if (self.$window.scrollTop() >= 220) {
          $stickyNav.addClass('sticky-menu');
      }
      else {
          $stickyNav.removeClass('sticky-menu');
      }
    },

    // Auto Height Manage On Header
    processAutoheight: function( event ) {
      var self                = this;
      var $naviWrap           = $( '.navigator-wrapper' );
      var $naviWrapAll        = $( '.navigator-wrapper > .theme-mobile-nav' );
      var $naviWrapAllDesk    = $( '.navigator-wrapper > .nav-area *:not(.logo):not(.search-button *):not(.cart-wrapper *):not(.dropdown-menu)' );
      var maxHeight           = 0;

      // This will check first level children ONLY as intended.
      if ($('body').find('div').hasClass("sticky-nav")) {
        if ($('div.theme-mobile-nav').css('display') == 'block') {
            $naviWrapAll.each(function(){
              var height              = $(this).outerHeight(true); // outerHeight will add padding and margin to height total
              if (height > maxHeight ) {
                  maxHeight = height;
              }
            });
            $naviWrap.css('min-height', maxHeight);
        }
        else {
            $naviWrapAllDesk.each(function(){
              var height              = $(this).outerHeight(true); // outerHeight will add padding and margin to height total
              if (height > maxHeight ) {
                  maxHeight = height;
              }
            });
            $naviWrap.css('min-height', maxHeight);
        }
      }
    },

    // Mobile Menu Clone
    mobileMenuRight: function( event ) {
      $(".header-wrap-right").clone().appendTo(".mobile-menu-right");
    },

    // Mobile Menu Clone
    mobileMenuClone: function( event ) {
      $(".menubar .menu-wrap").clone().appendTo(".mobile-menu");
    },

    // Above Header Accessibility
    aboveHeaderAccessibility: function() {
      var links, i, len,
        aboveItem = document.querySelector( '.mobi-head-top' ),
        aboveToggle = document.querySelector( '.header-above-toggle' );
      
      let focusableElements = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
      let firstFocusableElement = aboveToggle; // get first element to be focused inside aboveItem
      let focusableContent = aboveItem.querySelectorAll(focusableElements);
      let lastFocusableElement = focusableContent[focusableContent.length - 1]; // get last element to be focused inside menu

      if ( ! aboveItem ) {
        return false;
      }

      links = aboveItem.getElementsByTagName( 'a' );

      // Each time a aboveItem link is focused or blurred, toggle focus.
      for ( i = 0, len = links.length; i < len; i++ ) {
        links[i].addEventListener( 'focus', toggleFocus, true );
        links[i].addEventListener( 'blur', toggleFocus, true );
      }

      // Sets or removes the .focus class on an element.
      function toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .mobi-head-top.
        while (-1 === self.className.indexOf( 'mobi-head-top' ) ) {
          // On li elements toggle the class .focus.
          if ( 'li' === self.tagName.toLowerCase() ) {
            if ( -1 !== self.className.indexOf( 'focus' ) ) {
              self.className = self.className.replace( ' focus', '' );
            } else {
              self.className += ' focus';
            }
          }
          self = self.parentElement;
        }
      }
      
      // Trap focus inside modal to make it ADA compliant
      document.addEventListener('keydown', function (e) {
        let isTabPressed = e.key === 'Tab' || e.keyCode === 9;

        if ( ! isTabPressed ) {
          return;
        }

        if ( e.shiftKey ) { // if shift key pressed for shift + tab combination
          if (document.activeElement === firstFocusableElement) {
            lastFocusableElement.focus(); // add focus for the last focusable element
            e.preventDefault();
          }
        } else { // if tab key is pressed
          if (document.activeElement === lastFocusableElement) { // if focused has reached to last focusable element then focus first focusable element after pressing tab
            firstFocusableElement.focus(); // add focus for the first focusable element
            e.preventDefault();
          }
        }
      });      
    },

    // Header Above Mobile
    aboveHeaderMobile: function() {
      // Header Widget
      var self            = this,
        $mob_h_top        = $(".mobi-head-top"),
        $headerWidget     = $(".header-widget"),
        $collapsed        = $( '.header-above-toggle' );
      if( !$headerWidget.children().length > 0 ) {
        $headerWidget.hide();
        $collapsed.hide();
      } else {
        $collapsed.show();
        $headerWidget.clone().appendTo(".mobi-head-top");
          $collapsed.on('click', function(e) {
            $mob_h_top.toggleClass("active");
            $collapsed.toggleClass("active");      
            e.preventDefault();
          });
      }
      self.aboveHeaderAccessibility();
    },

    // Add/Remove focus classess for accessibility
    menuFocusAccessibility: function( event ) {
      $('.menubar, .widget_nav_menu').find('a').on('focus blur', function() {
        $( this ).parents('ul, li').toggleClass('focus');
      });
    },

    // Mobile Menu Toggle Handler
    menuToggleHandler: function( event ) {
      var self      = this,
        $toggle     = $( '.menu-toggle' );

      self.$body.toggleClass( self.classes.headerMenuActive );
      self.$body.toggleClass( self.classes.isOverlay );
      $toggle.toggleClass( self.classes.toggled );
      
      if ( self.$body.hasClass( self.classes.headerMenuActive ) ) {
        $( '.header-close-menu' ).focus();
      } else {
        $toggle.focus();
      }

      self.menuAccessibility();
    },

    // Mobile Menu Popup Hide
    hideHeaderMobilePopup: function( event ) {
      var self          = this,
        $toggle         = $( '.menu-toggle' ),
        $mobileMenuBar  = $( '.mobile-menu' );

      if ( $( event.target ).closest( $toggle ).length || $( event.target ).closest( $mobileMenuBar ).length ) {
        return;
      }

      if ( ! self.$body.hasClass( self.classes.headerMenuActive ) ) {
        return;
      }

      self.$body.removeClass( self.classes.headerMenuActive );
      self.$body.removeClass( self.classes.isOverlay );
      $toggle.removeClass( self.classes.toggled );

      self.$document.trigger( 'hideHeaderMobilePopup.' + self.eventID );

      event.stopPropagation();
    },

    // Mobile Sub Menu Link Handler
    verticalMobileSubMenuLinkHandle: function( event ) {
      event.preventDefault();

      var self      = this,
        $target   = $( event.currentTarget ),
        $menu     = $target.closest( '.mobile-menu .menu-wrap' ),
        deep      = $target.parents( '.dropdown-menu' ).length,
        direction = self.isRTL ? 1 : -1,
        translate = direction * deep * 100;

      //$menu.css( 'transform', 'translateX(' + translate + '%)' );

      setTimeout( function() {
        $target.parent().toggleClass("current");
        $target.next().slideToggle();
      }, 250 );
    },

    // Reset Mobile Menu Popup
    resetVerticalMobileMenu: function( event ) {
      var self        = this,
        $menu         = $( '.mobile-menu .menu-wrap' ),
        $menuItems    = $( '.mobile-menu  .menu-item' ),
        $deep         = $( '.mobile-menu .dropdown-menu');

      setTimeout( function() {
        $menuItems.removeClass("current");
        $deep.hide();
      }, 250 );
    },

    // Active focus on menu popup
    menuAccessibility: function() {
      var links, i, len,
        menu = document.querySelector( '.mobile-menu' ),
        iconToggle = document.querySelector( '.header-close-menu' );
      
      let focusableElements = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
      let firstFocusableElement = iconToggle; // get first element to be focused inside menu
      let focusableContent = menu.querySelectorAll(focusableElements);
      let lastFocusableElement = focusableContent[focusableContent.length - 1]; // get last element to be focused inside menu

      if ( ! menu ) {
        return false;
      }

      links = menu.getElementsByTagName( 'a' );

      // Each time a menu link is focused or blurred, toggle focus.
      for ( i = 0, len = links.length; i < len; i++ ) {
        links[i].addEventListener( 'focus', toggleFocus, true );
        links[i].addEventListener( 'blur', toggleFocus, true );
      }

      // Sets or removes the .focus class on an element.
      function toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .mobile-menu.
        while (-1 === self.className.indexOf( 'mobile-menu' ) ) {
          // On li elements toggle the class .focus.
          if ( 'li' === self.tagName.toLowerCase() ) {
            if ( -1 !== self.className.indexOf( 'focus' ) ) {
              self.className = self.className.replace( ' focus', '' );
            } else {
              self.className += ' focus';
            }
          }
          self = self.parentElement;
        }
      }
      
      // Trap focus inside modal to make it ADA compliant
      document.addEventListener('keydown', function (e) {
        let isTabPressed = e.key === 'Tab' || e.keyCode === 9;

        if ( ! isTabPressed ) {
          return;
        }

        if ( e.shiftKey ) { // if shift key pressed for shift + tab combination
          if (document.activeElement === firstFocusableElement) {
            lastFocusableElement.focus(); // add focus for the last focusable element
            e.preventDefault();
          }
        } else { // if tab key is pressed
          if (document.activeElement === lastFocusableElement) { // if focused has reached to last focusable element then focus first focusable element after pressing tab
            firstFocusableElement.focus(); // add focus for the first focusable element
            e.preventDefault();
          }
        }
      });      
    },

    // Search Box Toggle Handler
    searchToggleHandler: function( event ) {
      var self    = this,
        $toggle   = $( '.header-search-toggle' ),
        $field    = $( '.header-search-field' );

      self.$body.toggleClass( self.classes.headerSearchActive );
      self.$body.toggleClass( self.classes.isOverlay );

      if ( self.$body.hasClass( self.classes.headerSearchActive ) ) {
        $field.focus();
      } else {
        $toggle.focus();
      }

      self.searchPopupAccessibility();
    },

    // Active focus on search popup
    searchPopupAccessibility: function() {
      var links, i, len,
        searchItem = document.querySelector( '.header-search-popup' ),
        fieldToggle = document.querySelector( '.header-search-field' );      
      let focusableElements = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
      let firstFocusableElement = fieldToggle;
      let focusableContent = searchItem.querySelectorAll(focusableElements);
      let lastFocusableElement = focusableContent[focusableContent.length - 1];
      if ( ! searchItem ) {
        return false;
      }
      links = searchItem.getElementsByTagName( 'button' );
      for ( i = 0, len = links.length; i < len; i++ ) {
        links[i].addEventListener( 'focus', toggleFocus, true );
        links[i].addEventListener( 'blur', toggleFocus, true );
      }
      function toggleFocus() {
        var self = this;
        while (-1 === self.className.indexOf( 'header-search-popup' ) ) {
          if ( 'input' === self.tagName.toLowerCase() ) {
            if ( -1 !== self.className.indexOf( 'focus' ) ) {
              self.className = self.className.replace( 'focus', '' );
            } else {
              self.className += ' focus';
            }
          }
          self = self.parentElement;
        }
      }
      document.addEventListener('keydown', function (e) {
        let isTabPressed = e.key === 'Tab' || e.keyCode === 9;
        if ( ! isTabPressed ) {
          return;
        }
        if ( e.shiftKey ) {
          if (document.activeElement === firstFocusableElement) {
            lastFocusableElement.focus();
            e.preventDefault();
          }
        } else {
          if (document.activeElement === lastFocusableElement) {
            firstFocusableElement.focus();
            e.preventDefault();
          }
        }
      });
    },

    // Custom Carousel
    customQuery: function() {
        // Service Hover Indicator
        if ($(".service-section-hover").length > 0) {
          $(".service-section-hover").each(function () {
            if ($(window).width() < 991) {
              return;
            }

            $(this)
              .find(".service-row")
              .append('<div class="indicator"></div>');

            var leftPos = $(this)
              .find(".service-row [class*='av-column-']")
              .eq(1)
              .position().left,
              column = $(this).find(".service-row [class*='av-column-']"),
              indicator = ".indicator";

            var topPos = $(this)
              .find(".service-row [class*='av-column-']")
              .eq(1)
              .position().top,
              column = $(this).find(".service-row [class*='av-column-']"),
              indicator = ".indicator";

            column.siblings(indicator).css("width", column.outerWidth());
            column.siblings(indicator).css("height", $('.service-item').innerHeight());
            column.siblings(indicator).css("left", leftPos);
            column.siblings(indicator).css("top", topPos);

            column.on("mouseenter mouseleave", function (event) {
              if (event.type === "mouseenter") {
                $(this)
                  .siblings(indicator)
                  .css({left: $(this).position().left, top: $(this).position().top});
              }
              if (event.type === "mouseleave") {
                $(this)
                  .siblings(indicator)
                  .css({left: leftPos, top: topPos});
              }
            });
          });
        }
        //Set Animation Timing
        var animationDelay = 2500;
        initHeadline();
        //Init Headline
        function initHeadline() {
          //initialise headline animation
          animateHeadline($('.av-heading'));
        }
        //Single Letters
        function singleLetters($words) {
          $words.each(function(){
            var word = $(this),
              letters = word.text().split(''),
              selected = word.hasClass('is-show');
              var newLetters = letters.join('');
              word.html(newLetters).css('opacity', 1);
          });
        }
        //Animate Headline
        function animateHeadline($headlines) {
          var duration = animationDelay;
          $headlines.each(function(){
            var headline = $(this);
            //trigger animation
            setTimeout(function(){ hideWord( headline.find('.is-show').eq(0) ) }, duration);
          });
        }
        //Hide Word
        function hideWord($word) {
          var nextWord = takeNext($word);
            switchWord($word, nextWord);
            setTimeout(function(){ hideWord(nextWord) }, animationDelay);
        }
        //Hide Letter
        function hideLetter($letter, $word, $bool, $duration) {
          $letter.removeClass('in').addClass('out');
          
          if(!$letter.is(':last-child')) {
            setTimeout(function(){ hideLetter($letter.next(), $word, $bool, $duration); }, $duration);  
          } else if($bool) { 
            setTimeout(function(){ hideWord(takeNext($word)) }, animationDelay);
          }

          if($letter.is(':last-child') && $('html').hasClass('no-csstransitions')) {
            var nextWord = takeNext($word);
            switchWord($word, nextWord);
          } 
        }
        //Take Next
        function takeNext($word) {
          return (!$word.is(':last-child')) ? $word.next() : $word.parent().children().eq(0);
        }
        //Take Prev
        function takePrev($word) {
          return (!$word.is(':first-child')) ? $word.prev() : $word.parent().children().last();
        }
        //Switch Word
        function switchWord($oldWord, $newWord) {
          $oldWord.removeClass('is-show').addClass('is-hide');
          $newWord.removeClass('is-hide').addClass('is-show');
        }
        // Button Effect
        document.querySelectorAll('.av-btn:not(.av-search-submit)').forEach(button => button.innerHTML = '<div><span>' + button.textContent.trim().split('').join('</span><span>') + '</span></div>');
    }
  };

  AvrilThemeJs.init();

}( jQuery, window.avrilConfig ));
	