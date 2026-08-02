(function($) {
  'use strict';
  $(function() {
    var body = $('body');
    var contentWrapper = $('.content-wrapper');
    var scroller = $('.container-scroller');
    var footer = $('.footer');
    var sidebar = $('.sidebar');

    // Add active class to nav-link based on URL dynamically
    function addActiveClass(element) {
      if (current === "") {
        if (element.attr('href').indexOf("index.html") !== -1) {
          element.parents('.nav-item').last().addClass('active');
          if (element.parents('.sub-menu').length) {
            element.closest('.collapse').addClass('show');
            element.addClass('active');
          }
        }
      } else {
        if (element.attr('href').indexOf(current) !== -1) {
          element.parents('.nav-item').last().addClass('active');
          if (element.parents('.sub-menu').length) {
            element.closest('.collapse').addClass('show');
            element.addClass('active');
          }
          if (element.parents('.submenu-item').length) {
            element.addClass('active');
          }
        }
      }
    }

    function normalizePath(path) {
      if (!path) {
        return '';
      }
      path = path.replace(/\/+$/,'');
      return path === '' ? '/' : path;
    }

    function isActivePath(href, current) {
      href = normalizePath(href);
      current = normalizePath(current);

      if (href === '/') {
        return current === '/';
      }

      if (current === href) {
        return true;
      }

      return current.startsWith(href + '/');
    }

    var current = location.pathname;
    $('.nav li a', sidebar).each(function() {
      var $this = $(this);
      var href = $this.attr('href');
      if (!href || href === '#' || href.indexOf('javascript:') === 0) {
        return;
      }

      if (href.indexOf(window.location.origin) === 0) {
        href = href.substring(window.location.origin.length);
      }

      if (isActivePath(href, current)) {
        $this.addClass('active');
        $this.parents('.nav-item').last().addClass('active');

        if ($this.parents('.sub-menu').length) {
          var collapse = $this.closest('.collapse');
          collapse.addClass('show');
          collapse.prev('.nav-link').addClass('active');
          collapse.prev('.nav-link').attr('aria-expanded', 'true');
        }
      }
    });

    // Close other submenu in sidebar on opening any
    sidebar.on('show.bs.collapse', '.collapse', function() {
      sidebar.find('.collapse.show').collapse('hide');
    });

    // Change sidebar
    $('[data-toggle="minimize"]').on("click", function() {
      body.toggleClass('sidebar-icon-only');
    });

    // Checkbox and radios
    $(".form-check label,.form-radio label").append('<i class="input-helper"></i>');

    // Check if #proBanner exists before manipulating its class
    var proBanner = document.querySelector('#proBanner');
    if (proBanner) {
      if ($.cookie('majestic-free-banner') != "true") {
        proBanner.classList.add('d-flex');
        var navbar = document.querySelector('.navbar');
        if (navbar) {
          navbar.classList.remove('fixed-top');
        }
      } else {
        proBanner.classList.add('d-none');
        var navbar = document.querySelector('.navbar');
        if (navbar) {
          navbar.classList.add('fixed-top');
        }
      }
    }

    // Handle the navbar padding and margin based on fixed-top class
    var navbar = document.querySelector('.navbar');
    if (navbar) {
      if (navbar.classList.contains("fixed-top")) {
        document.querySelector('.page-body-wrapper').classList.remove('pt-0');
        navbar.classList.remove('pt-5');
      } else {
        document.querySelector('.page-body-wrapper').classList.add('pt-0');
        navbar.classList.add('pt-5');
        navbar.classList.add('mt-3');
      }
    }

    // Close pro banner and adjust navbar
    var bannerCloseButton = document.querySelector('#bannerClose');
    if (bannerCloseButton) {
      bannerCloseButton.addEventListener('click', function() {
        if (proBanner) {
          proBanner.classList.add('d-none');
          proBanner.classList.remove('d-flex');
        }
        if (navbar) {
          navbar.classList.remove('pt-5');
          navbar.classList.add('fixed-top');
        }
        document.querySelector('.page-body-wrapper').classList.add('proBanner-padding-top');
        navbar.classList.remove('mt-3');
        var date = new Date();
        date.setTime(date.getTime() + 24 * 60 * 60 * 1000); 
        $.cookie('majestic-free-banner', "true", { expires: date });
      });
    }

  });
})(jQuery);
