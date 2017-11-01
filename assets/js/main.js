//
// do not edit this file for much easy update
// place custom function at assets/js/custom.js
// --------------------------------------------------

var $ = jQuery.noConflict();

(function($) {
  'use strict';

//
// global variable
// --------------------------------------------------

  var $html = $('html');
  var $body = $('body');

//
// ie10 viewport fix
// --------------------------------------------------

  (function() {
    //'use strict';
    if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
      var msViewportStyle = document.createElement('style');

      msViewportStyle.appendChild(
        document.createTextNode(
          '@-ms-viewport{width:auto!important}'
        )
      );

      document.querySelector('head').appendChild(msViewportStyle);
    }
  })();

//
// device detect
// --------------------------------------------------

  var isMobile;
  var isDesktop;

  if ($html.hasClass('desktop')) {
    $html.addClass('is-desktop');
    isMobile = false;
    isDesktop = true;
  } else {
    $html.addClass('is-mobile');
    isMobile = true;
    isDesktop = false;
  }
  if ($html.hasClass('ie9')) {
    var isIE9 = true;
  }

//
// core
// --------------------------------------------------

  function fn_core() {
    $('a[href=#]').on('click', function(e) {
      e.preventDefault();
    });

    // Registration
    $.Velocity
      .RegisterEffect('transition.scaleOut', {
        defaultDuration: _section_animation_duration,
        calls: [
          [ { opacity: 0, scale: [ 1.5, 1 ] } ]
        ]
      })
      .RegisterEffect('transition.scaleIn', {
        defaultDuration: _section_animation_duration,
        calls: [
          [ { opacity: 1, scale: [ 1, 1.5 ] } ]
        ]
      })
      .RegisterEffect('transition.scaleOutIE9', {
        defaultDuration: _section_animation_duration,
        calls: [
          [ { opacity: 0, scale: 1 } ]
        ]
      })
      .RegisterEffect('transition.scaleInIE9', {
        defaultDuration: _section_animation_duration,
        calls: [
          [ { opacity: 1, scale: 1 } ]
        ]
      });

    if (_site_bg_border) {
      $body.addClass('is-site-bg-border');
    }
  }

  fn_core();

//
// site loader
// --------------------------------------------------

  function fn_siteLoader() {
    $('.site-loader').velocity('transition.scaleOut', {
      visibility: 'hidden',
      queue: false,
      delay: 800,
      complete: function() {
        $body.addClass('is-loaded');

        if (!isIE9) {
          $('.section').filter('.is-active').velocity('stop').velocity('transition.scaleIn', {
            visibility: 'visible',
            queue: false,
            delay: 0,
            complete: function() {
              if (_site_bg_border) {
                $('.site-bg-border').velocity('fadeIn', {
                  queue: false,
                  delay: 0,
                  duration: 300
                });
              }
            }
          });
        } else {
          $('.section').filter('.is-active').velocity('stop').velocity('transition.scaleInIE9', {
            visibility: 'visible',
            queue: false,
            delay: 0,
            complete: function() {
              if (_site_bg_border) {
                $('.site-bg-border').velocity('fadeIn', {
                  queue: false,
                  delay: 0,
                  duration: 300
                });
              }
            }
          });
        }
      }
    });
  }

  $(window).on('load', function() {
    fn_siteLoader();
  });

//
// scrollbar
// --------------------------------------------------

  function fn_scrollbar() {
    var $scrollBlock = $('.section');

    $scrollBlock.addClass('scroll-block');

    if (!isMobile) {
      $scrollBlock.perfectScrollbar({
        suppressScrollX: true
      });

      $(window).on('resize', function() {
        $scrollBlock.perfectScrollbar('update');
      });
    }
  }

  fn_scrollbar();

  function fn_parallax() {
    if (_side_bg_effect_parallax && !isMobile && !isIE9) {
      $('.site-bg').parallax();
    }
  }
  $(window).on('load', function() {
    fn_parallax();
  });

//
// nav
// --------------------------------------------------

  function fn_nav() {
    $('.primary-menu-container').clone().appendTo('#nav .col-inner');

    $('.primary-nav-toggle, #nav [data-section]').on('click', function(e) {
      e.preventDefault();

      $body.toggleClass('nav-open');

      if ($body.hasClass('nav-open')) {
        $('#nav').velocity('stop').velocity('transition.scaleIn', {
          visibility: 'visible',
          queue: false,
          delay: 0
        });
      } else {
        $('#nav').velocity('stop').velocity('transition.scaleOut', {
          visibility: 'hidden',
          queue: false,
          delay: 0
        });
      }
    });

    $('[data-section]').each(function() {
      var $this = $(this);
      var id = $this.attr('data-section');

      $this.on('click', function() {
        if ($(id).length) {
          if ($(id).hasClass('is-active')) {
            // hold
          } else {
            $('.form-notify').removeClass('valid error').html('');
            $('.form-group').removeClass('valid error');

            if (!isIE9) {
              $('.section').filter('.is-active').velocity('stop').velocity('transition.scaleOut', {
                display: 'block',
                visibility: 'hidden',
                queue: false,
                delay: 0,
                complete: function() {
                  $(this).removeClass('is-active');

                  $(id).addClass('is-active').velocity('stop').velocity('transition.scaleIn', {
                    display: 'block',
                    visibility: 'visible',
                    queue: false,
                    delay: 0
                  });
                }
              });
            } else {
              $('.section').filter('.is-active').velocity('stop').velocity('transition.scaleOutIE9', {
                display: 'block',
                visibility: 'hidden',
                queue: false,
                delay: 0,
                complete: function() {
                  $(this).removeClass('is-active');

                  $(id).addClass('is-active').velocity('stop').velocity('transition.scaleInIE9', {
                    display: 'block',
                    visibility: 'visible',
                    queue: false,
                    delay: 0
                  });
                }
              });
            }
          }
        }
      });
    });
  }

  fn_nav();

//
// countdown
// --------------------------------------------------

  function fn_countdown() {
    var $countdown = $('#countdown_dashboard');

    if (_countdown) {
      if ($countdown.length) {
        $body.addClass('countdown-on');

        $countdown.countDown({
          targetDate: {
            'day':      _countdown_date[2],
            'month':    _countdown_date[1],
            'year':     _countdown_date[0],
            'hour':     0,
            'min':      0,
            'sec':      0,
            'utc':      _countdown_utc // time set as UTC
          },
          omitWeeks: true // 3-digit days
        });
      }
    } else {
      $countdown.remove();
    }
  }

  fn_countdown();

//
// service
// --------------------------------------------------

  function fn_service() {
    var $carousel = $('#serviceCarousel');

    if ($carousel.length) {
      $carousel.owlCarousel({
        rewind: true,
        margin: 30,
        responsive: {
          0: {
            items: 1
          },
          768: {
            items: 2
          },
          992: {
            items: 3
          }
        }
      });
    }
  }

  fn_service();

//
// contact
// --------------------------------------------------

  function fn_contact() {
    var $form = $('#contactForm');
    var $formNotify = $form.find('.form-notify');

    $form.validate({
      onfocusout: false,
      onkeyup: false,
      onclick: false,
      rules: {
        name: {
          required: true
        },
        email: {
          required: true,
          email: true
        },
        message: {
          required: true
        }
      },
      errorPlacement: function(error, element) {},
      highlight: function(element) {
        $(element).parent('.form-group').addClass('error');
      },
      unhighlight: function(element) {
        $(element).parent('.form-group').removeClass('error');
      },
      submitHandler: function(form) {
        $(form).ajaxSubmit({
          type: 'POST',
          url: 'assets/php/contact.php',
          dataType: 'json',
          cache: false,
          data: $form.serialize(),
          success: function(data) {
            if (data.code === 0) {
              $form.validate().resetForm();
              $form[0].reset();
              $form.find('.form-label').removeClass('error');
              $form.find('button').blur();
              $formNotify.removeClass('valid error').addClass('valid').html('<i class="fa fa-check-square"></i>' + data.message).show();
            } else {
              $formNotify.removeClass('valid error').addClass('error').html(data.message).show();
            }
          },
          error: function(data) {
            $formNotify.removeClass('valid').addClass('error').html('<i class="fa fa-warning"></i>Ocorreu um erro. Por favor, tente mais tarde.').show();
          },
        });
      },
      invalidHandler: function(event, validator) {
        var errors = validator.numberOfInvalids();
        if (errors) {
          var message = errors == 1 ?
          '<i class="fa fa-warning"></i>Faltou 1 campo. Foi destacado.' :
          '<i class="fa fa-warning"></i>Faltaram ' + errors + ' campos. Foram destacados.';
          $formNotify.removeClass('valid error').addClass('error').html(message).show();
        }
      }
    });
  }

  fn_contact();

//
// subscribe
// --------------------------------------------------

  function fn_subscribe() {
    var $btn = $('#subscribeBtn');
    var $btnWidth = $btn.outerWidth();
    var opened = false;

    $body.addClass('subscribe-form-closed');

    $btn.css('width', $btnWidth);

    $btn.on('click', function() {
      if (opened === false) {
        setTimeout(function() {
          $('#subscribeEmail').focus();
        }, 0);

        $btn.velocity('stop').velocity({
          width: '400px'
        }, {
          queue: false,
          delay: 0,
          duration: 200,
          begin: function() {
            $body.removeClass('subscribe-form-closed').addClass('subscribe-form-opening');
          },
          complete: function() {
            opened = true;
            $body.removeClass('subscribe-form-opening').addClass('subscribe-form-opened');
          }
        });
      }
    });

    $(document).mouseup(function(e) {
      var container = $('.subscribe-wrap');

      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if (opened === true) {
          $btn.velocity('stop').velocity({
            width: $btnWidth
          }, {
            queue: false,
            delay: 0,
            duration: 200,
            begin: function() {
              $body.removeClass('subscribe-form-opened').addClass('subscribe-form-closing');
            },
            complete: function() {
              opened = false;
              $body.removeClass('subscribe-form-closing').addClass('subscribe-form-closed');
              $('#subscribeForm')[0].reset();
            }
          });
        }
      }
    });

    var $form = $('#subscribeForm');
    var $formNotify = $form.find('.form-notify');

    // form valid
    $form.validate({
      onfocusout: false,
      onkeyup: false,
      onclick: false,
      rules: {
        email: {
          required: true,
          email: true
        }
      },
      errorPlacement: function(error, element) {},
      highlight: function(element) {
        $(element).parent('.form-group').addClass('error');
      },
      unhighlight: function(element) {
        $(element).parent('.form-group').removeClass('error');
      },
      submitHandler: function(form) {
        $(form).ajaxSubmit({
          type: 'POST',
          url: 'assets/php/subscribe.php',
          dataType: 'json',
          cache: false,
          data: $form.serialize(),
          success: function(data) {
            if (data.code === 0) {
              $form.validate().resetForm();
              $form[0].reset();
              //$form.find('.form-label').removeClass('error');
              $form.find('button').blur();
              $formNotify.removeClass('error').addClass('valid').html('<i class="fa fa-check-square"></i>' + data.message).show();
              $body.removeClass('subscribe-form-open');
            } else {
              $formNotify.removeClass('valid').addClass('error').html('<i class="fa fa-warning"></i>' + data.message).show();
            }
          },
          error: function(data) {
            $formNotify.removeClass('valid').addClass('error').html('<i class="fa fa-warning"></i>Ocorreu um erro. Por favor, tente mais tarde.').show();
          },
        });
      },
      invalidHandler: function(event, validator) {
        var errors = validator.numberOfInvalids();
        if (errors) {
          var message = errors == 1 ?
            '<i class="fa fa-warning"></i>Por favor, digite um email válido.' :
            '<i class="fa fa-warning"></i>Por favor, digite um email válido.';
          $formNotify.removeClass('valid').addClass('error').html(message).show();
        }
      }
    });
  }

  $(window).on('load', function() {
    fn_subscribe();
  });

//
// site background
// --------------------------------------------------

  function fn_siteBg() {
    // mobile
    if (isMobile) {
      if (_bg_style_mobile === 0) {
        $body.addClass('site-bg-color');
      }

      if (_bg_style_mobile == 1 || _bg_style_mobile == 2) {
        fn_siteBgImg();
      }
      else if (_bg_style_mobile == 3 || _bg_style_mobile == 4 || _bg_style_mobile == 5 || _bg_style_mobile == 6) {
        $(window).on('load', function() {
          fn_siteBgSlideshow();
        });
      }
    }

    // desktop
    else {
      if (_bg_style_desktop === 0) {
        $body.addClass('site-bg-color');
      }
      if (_bg_style_desktop == 1 || _bg_style_desktop == 2) {
        fn_siteBgImg();
      }
      else if (_bg_style_desktop == 3 || _bg_style_desktop == 4 || _bg_style_desktop == 5 || _bg_style_desktop == 6) {
        fn_siteBgSlideshow();
      }
      else if (_bg_style_desktop == 7 || _bg_style_desktop == 8 || _bg_style_desktop == 9) {
        fn_siteBgVideo();
      }
      else if (_bg_style_desktop == 10 || _bg_style_desktop == 11 || _bg_style_desktop == 12) {
        fn_siteBgVideoYoutube();
      }
    }
  }
  fn_siteBg();

//
// image background
// --------------------------------------------------

  function fn_siteBgImg() {
    $body.addClass('is-site-bg-img');
    $('.site-bg-video').remove();
  }

//
// slideshow background
// --------------------------------------------------

  function fn_siteBgSlideshow() {
    var $siteBgImg = $('.site-bg-img');

    $('.site-bg-video').remove();

    $body.addClass('is-site-bg-slideshow');
    for (var i = 1; i <= _bg_slideshow_image_amount; i++) {
      $siteBgImg.append('<img src="assets/img/bg/site-bg-slideshow-' + (i < 10 ? '0' + i : i) + '.jpg">');
    }

    if (isMobile) {
      if (_bg_style_mobile == 3 || _bg_style_mobile == 4) {
        fn_ss();
      } else if (_bg_style_mobile == 5 || _bg_style_mobile == 6) {
        fn_kenburnsy();
      }
    }
    else {
      if (_bg_style_desktop == 3 || _bg_style_desktop == 4) {
        fn_ss();
      } else if (_bg_style_desktop == 5 || _bg_style_desktop == 6) {
        fn_kenburnsy();
      }
    }

    function fn_ss() {
      $siteBgImg.ss({
        fullscreen: true,
        duration: _bg_slideshow_duration,
        fadeInDuration: 1500
      });
    }

    function fn_kenburnsy() {
      $siteBgImg.kenburnsy({
        fullscreen: true,
        duration: _bg_slideshow_duration,
        fadeInDuration: 1500
      });
    }
  }

//
// html5 video background
// --------------------------------------------------

  function fn_siteBgVideo() {
    var $video = $('.site-bg-video');
    var $audio = $('.audio-toggle');

    $body.addClass('is-site-bg-video');

    $video.append('<video id="bgVideo" autoplay loop>' +
                  '<source src="assets/video/video.mp4" type="video/mp4">' +
                  '</video>');

    var bgVideo = document.getElementById('bgVideo');

    if (_bg_style_desktop == 7) {
      bgVideo.muted = true;
      $audio.remove();
    } else if (_bg_style_desktop == 8) {
      $body.addClass('is-audio-on');

      $audio.on('click', function() {
        if ($body.hasClass('is-audio-on')) {
          bgVideo.muted = true;
          $body.removeClass('is-audio-on').addClass('is-audio-off');
        } else if ($body.hasClass('is-audio-off')) {
          bgVideo.muted = false;
          $body.removeClass('is-audio-off').addClass('is-audio-on');
        }
      });
    }
  }

//
// youtube video background
// --------------------------------------------------

  function fn_siteBgVideoYoutube() {
    var $video = $('.site-bg-video');
    var $audio = $('.audio-toggle');

    $body.addClass('is-site-bg-video-youtube');
    if (_bg_style_desktop == 10 || _bg_style_desktop == 12) {
      $video.attr('data-property', '{videoURL: _bg_video_youtube_url, autoPlay: true, loop: _bg_video_youtube_loop, startAt: _bg_video_youtube_start, stopAt: _bg_video_youtube_end, mute: true, quality: _bg_video_youtube_quality, realfullscreen: true, optimizeDisplay: true, addRaster: false, showYTLogo: false, showControls: false, stopMovieOnBlur: false, containment: "self"}');
      $video.YTPlayer();
    } else {
      $video.attr('data-property', '{videoURL: _bg_video_youtube_url, autoPlay: true, loop: _bg_video_youtube_loop, startAt: _bg_video_youtube_start, stopAt: _bg_video_youtube_end, mute: false, quality: _bg_video_youtube_quality, realfullscreen: true, optimizeDisplay: true, addRaster: false, showYTLogo: false, showControls: false, stopMovieOnBlur: false, containment: "self"}');
      $video.YTPlayer();

      $body.addClass('is-audio-on');

      $audio.on('click', function() {
        if ($body.hasClass('is-audio-on')) {
          $video.YTPMute()
          $body.removeClass('is-audio-on').addClass('is-audio-off');
        } else if ($body.hasClass('is-audio-off')) {
          $video.YTPUnmute()
          $body.removeClass('is-audio-off').addClass('is-audio-on');
        }
      });
    }
  }

//
// background audio
// --------------------------------------------------

  function fn_siteBgAudio() {
    if (_bg_style_mobile == 2 || _bg_style_mobile == 4 || _bg_style_mobile == 6 || _bg_style_desktop == 2 || _bg_style_desktop == 4 || _bg_style_desktop == 6 || _bg_style_desktop == 9 || _bg_style_desktop == 12) {
      $body.append('<audio id="audioPlayer">' +
                   '<source src="assets/audio/audio.mp3" type="audio/mpeg">' +
                   '</audio>');
    }

    if (isMobile) {
      if (_bg_style_mobile == 2 || _bg_style_mobile == 4 || _bg_style_mobile == 6) {
        $body.addClass('is-audio-off');
        fn_siteBgAudioControl();
      }
    } else {
      if (_bg_style_desktop == 2 || _bg_style_desktop == 4 || _bg_style_desktop == 6 || _bg_style_desktop == 9 || _bg_style_desktop == 12) {
        var $audioPlayer = document.getElementById('audioPlayer');

        $body.addClass('is-audio-on');
        $audioPlayer.play();
        fn_siteBgAudioControl();
      }
    }

    function fn_siteBgAudioControl() {
      var $audio = $('.audio-toggle');
      var $audioPlayer = document.getElementById('audioPlayer');

      $audio.on('click', function() {
        var $this = $(this);

        if ($body.hasClass('is-audio-on')) {
          $audioPlayer.pause();
          $body.removeClass('is-audio-on').addClass('is-audio-off');
        } else if ($body.hasClass('is-audio-off')) {
          $audioPlayer.play();
          $body.removeClass('is-audio-off').addClass('is-audio-on');
        }
      });
    }
  }
  fn_siteBgAudio();

//
// background effect
// --------------------------------------------------

  function fn_siteBgEffect() {
    if (_site_bg_effect === 0) {
      $('.site-bg-canvas').remove();
    } else if (_site_bg_effect == 1) {
      fn_siteBgCloud();
    } else if (_site_bg_effect == 2) {
      fn_siteBgConstellation();
    } else if (_site_bg_effect == 3) {
      fn_siteBgParallaxStar();
    }
  }

  function fn_siteBgCloud() {
    var $siteBgEffect = $('.site-bg-effect');

    $body.addClass('is-site-bg-cloud');
    $('.site-bg-canvas').remove();
    $siteBgEffect.css('opacity', _cloud_opacity);

      $siteBgEffect.append(
        '<div class="cloud cloud-01"></div>' +
        '<div class="cloud cloud-02"></div>' +
        '<div class="cloud cloud-03"></div>'
      );

    function fn_cloud_01() {
      $('.cloud-01').velocity({
        translateZ: 0,
        translateX: [ '-100%', '100%' ]
      }, {
        queue: false,
        delay: 0,
        duration: 25000,
        easing: 'linear',
        complete: fn_cloud_01
      });
    }
    fn_cloud_01();

    function fn_cloud_02() {
      $('.cloud-02').velocity({
        translateZ: 0,
        translateX: [ '-100%', '100%' ]
      }, {
        queue: false,
        delay: 0,
        duration: 35000,
        easing: 'linear',
        complete: fn_cloud_02
      });
    }
    fn_cloud_02();

    function fn_cloud_03() {
      $('.cloud-03').velocity({
        translateZ: 0,
        translateX: [ '-100%', '100%' ]
      }, {
        queue: false,
        delay: 0,
        duration: 45000,
        easing: 'linear',
        complete: fn_cloud_03
      });
    }
    fn_cloud_03();
  }

  function fn_siteBgConstellation() {
    var $canvas = $('.site-bg-canvas');

    $body.addClass('is-site-bg-constellation');

    function callCanvas (canvas) {
      var screenpointSplitt = 12000;
      var movingSpeed = 0.2;
      var viewportWidth = $(window).width();
      var viewportHeight = $(window).height();
      var nbCalculated = Math.round(viewportHeight*viewportWidth/screenpointSplitt);

      var $this = $(this),
      ctx = canvas.getContext('2d');
      $this.config = {
        star: {
          color: _constellation_color,
          width: _constellation_width
        },
        line: {
          color: _constellation_color,
          width: 0.4
        },
        position: {
          x: canvas.width * 0.5,
          y: canvas.height * 0.5
        },
        velocity: movingSpeed,
        length: nbCalculated,
        distance: 130,
        radius: 120,
        stars: []
      };

      function Star () {
        this.x = Math.random() * canvas.width;
        this.y = Math.random() * canvas.height;

        this.vx = ($this.config.velocity - (Math.random() * 0.3));
        this.vy = ($this.config.velocity - (Math.random() * 0.3));

        this.radius = Math.random() * $this.config.star.width;
      }

      Star.prototype = {
        create: function(){
          ctx.beginPath();
          ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
          ctx.fill();
        },

        animate: function(){
          var i;
          for(i = 0; i < $this.config.length; i++){

            var star = $this.config.stars[i];

            if(star.y < 0 || star.y > canvas.height){
              star.vx = star.vx;
              star.vy = - star.vy;
            }
            else if(star.x < 0 || star.x > canvas.width){
              star.vx = - star.vx;
              star.vy = star.vy;
            }
            star.x += star.vx;
            star.y += star.vy;
          }
        },

        line: function(){
          var length = $this.config.length,
            iStar,
            jStar,
            i,
            j;

          for(i = 0; i < length; i++){
            for(j = 0; j < length; j++){
              iStar = $this.config.stars[i];
              jStar = $this.config.stars[j];

              if(
                (iStar.x - jStar.x) < $this.config.distance &&
                (iStar.y - jStar.y) < $this.config.distance &&
                (iStar.x - jStar.x) > - $this.config.distance &&
                (iStar.y - jStar.y) > - $this.config.distance
              ) {
                if(
                  (iStar.x - $this.config.position.x) < $this.config.radius &&
                  (iStar.y - $this.config.position.y) < $this.config.radius &&
                  (iStar.x - $this.config.position.x) > - $this.config.radius &&
                  (iStar.y - $this.config.position.y) > - $this.config.radius
                ) {
                  ctx.beginPath();
                  ctx.moveTo(iStar.x, iStar.y);
                  ctx.lineTo(jStar.x, jStar.y);
                  ctx.stroke();
                  ctx.closePath();
                }

              }
            }
          }
        }

      };
      $this.createStars = function () {
        var length = $this.config.length,
          star,
          i;

        ctx.clearRect(0, 0, canvas.width, canvas.height);
        for(i = 0; i < length; i++){
          $this.config.stars.push(new Star());
          star = $this.config.stars[i];
          star.create();
        }

        star.line();
        star.animate();
      };

      $this.setCanvas = function () {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
      };

      $this.setContext = function () {
        ctx.fillStyle = $this.config.star.color;
        ctx.strokeStyle = $this.config.line.color;
        ctx.lineWidth = $this.config.line.width;
        ctx.fill();
      };

      $this.loop = function (callback) {
        callback();
        reqAnimFrame(function () {
          $this.loop(function () {
            callback();
          });
        });
      };

      $this.bind = function () {
        $(window).on('mousemove', function(e){
          $this.config.position.x = e.pageX;
          $this.config.position.y = e.pageY;
        });
      };

      $this.init = function () {
        $this.setCanvas();
        $this.setContext();

        $this.loop(function () {
          $this.createStars();
        });

        $this.bind();
      };

      return $this;
    }

    var reqAnimFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame || function (callback) {
      window.setTimeout(callback, 1000 / 60);
    };

    $(window).on('load', function() {
      setTimeout(function () {
        callCanvas($('canvas')[0]).init();
        $canvas.velocity('transition.fadeIn', {
          duration: 3000
        });
      }, 1000);
    });

    var waitForFinalEvent = (function () {
      var timers = {};
      return function (callback, ms, uniqueId) {
      if (!uniqueId) {
        uniqueId = '';
      }
      if (timers[uniqueId]) {
        clearTimeout (timers[uniqueId]);
      }
      timers[uniqueId] = setTimeout(callback, ms);
      };
    })();

    $(window).resize(function () {
      waitForFinalEvent(function() {
        //callCanvas($('canvas')[0]).init();
        callCanvas($('canvas')[0]).init();
      }, 800, '');
    });
  }

  function fn_siteBgParallaxStar() {
    var $siteBgEffect = $('.site-bg-effect');

    $body.addClass('is-site-bg-parallax-star');
    $('.site-bg-canvas').remove();
    $siteBgEffect.css('opacity', 0);

    $siteBgEffect.append(
      '<div class="parallax-star parallax-star-01"></div>' +
      '<div class="parallax-star parallax-star-02"></div>' +
      '<div class="parallax-star parallax-star-03"></div>'
    );

    function fn_parallaxStar_01() {
      $('.parallax-star-01').velocity({
        translateZ: 0,
        translateY: [ -2000, 0 ]
      }, {
        queue: false,
        delay: 0,
        duration: 70000,
        easing: 'linear',
        complete: fn_parallaxStar_01
      });
    }
    fn_parallaxStar_01();

    function fn_parallaxStar_02() {
      $('.parallax-star-02').velocity({
        translateZ: 0,
        translateY: [ -2000, 0 ]
      }, {
        queue: false,
        delay: 0,
        duration: 85000,
        easing: 'linear',
        complete: fn_parallaxStar_02
      });
    }
    fn_parallaxStar_02();

    function fn_parallaxStar_03() {
      $('.parallax-star-03').velocity({
        translateZ: 0,
        translateY: [ -2000, 0 ]
      }, {
        queue: false,
        delay: 0,
        duration: 100000,
        easing: 'linear',
        complete: fn_parallaxStar_03
      });
    }
    fn_parallaxStar_03();

    $(window).on('load', function() {
      setTimeout(function () {
        $siteBgEffect.velocity({
          translateZ: '0',
          opacity: [_parallax_star_opacity, 0],
        }, {
          display: 'block',
          duration: 3000
        });
      }, 1000);
    });
  }
  fn_siteBgEffect();

})(jQuery);