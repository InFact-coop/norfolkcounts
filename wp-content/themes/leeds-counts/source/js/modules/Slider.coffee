###*
# @file Slider
# Hanlder for the Landing Slider module
###

import 'slick-carousel'
#import Scroll from 'Scroll'
import ApplyClassOnScroll from 'ApplyClassOnScroll'

class Slider

  constructor: (@controller)->

    @slider_bullet = $('.bullet-slider')
    @slider = $('#slider')

    # Init Landing Slider
    @slider.slick
      slidesToShow: 1
      slidesToScroll: 1
      centerMode: true
      arrows: false
      infinite: true
      asNavFor: '.bullet-slider'
      responsive: [
        {
        breakpoint: 2400
        settings:
          centerMode: true
          centerPadding: '10%'
        },
        {
        breakpoint: 1800
        settings:
          centerMode: true
          centerPadding: '7%'
        },
        {
        breakpoint: 1650
        settings:
          centerMode: true
          centerPadding: '60px'
        },
        {
        breakpoint: 1025
        settings:
          centerMode: true
          centerPadding: '60px'
        },
        {
        breakpoint: 769
        settings:
          centerMode: true
          centerPadding: '30px'
          infinite: false
        }
      ]

    # Init Header Bullet Slider
    @slider_bullet.slick
      slidesToScroll: 1
      slidesToShow: 5
      centerMode: true
      dots: false
      focusOnSelect: false
      arrows: true
      asNavFor: '.header-slider'
      responsive: [
        {
        breakpoint: 1024
        settings:
          slidesToShow: 5
          slidesToScroll: 1
        },
        {
        breakpoint: 1023
        settings:
          slidesToShow: 3
          slidesToScroll: 1
        },
        {
        breakpoint: 639
        settings:
          slidesToShow: 10
          slidesToScroll: 1
          centerMode: false
          arrows: true
        }
      ]

    @slider.on 'afterChange', (a, b) =>
      @removeSliderEffectClasses()
      @removeStoryFromOthers(a, b)
      @load_scroll_animation()
      data = @slider.find('.slick-current .article-introduction').data()
      fbq('track', "ViewContent", {content_name: data.fbEventName}) if fbq?
      @controller.log_ga data.gaCategory, data.gaAction, data.gaLabel

    $('.btn-arrow.btn-next').on 'click', (e)=>
      e.preventDefault()
      @slider.slick 'slickNext'

    $('.btn-arrow.btn-prev').on 'click', (e)=>
      e.preventDefault()
      @slider.slick 'slickPrev'

    @init()

  init: =>
    @slider_navigation()
    @load_scroll_animation()
    #@Scroll = new Scroll

  removeSliderEffectClasses: ()=>
    $('.landing-slider .slick-slide').removeClass 'show-right'
    $('.landing-slider .slick-slide').removeClass 'show-left'
    $('.landing-slider .slick-center').removeClass 'move-right'
    $('.landing-slider .slick-center').removeClass 'move-left'
    $('.landing-slider .slick-slide').removeClass 'fade-out'


  removeStoryFromOthers: (a,b)=>
    storyId = $(b.$slides[b.currentSlide]).find("[data-story-id]").data('storyId')
    $("#other-stories .slide[data-story-id=#{storyId}]").remove()


  slider_navigation: =>

    # Move to Slider on Top Carousel titles click
    $(document).on 'click', '[data-slide-go]', (e)=>
      go_to_slide = $(e.currentTarget).data 'slide-go'
      @slider.slick('slickGoTo', go_to_slide, true)

    # Move Slider on Click
    $(document).on 'click', '.landing-slider .slick-slide:not(.slick-active)', (e)=>
      if @slide_position(e.currentTarget) is "right"
        # Move NEXT slider
        @slider.slick('slickNext')
        @removeSliderEffectClasses()
      else
        # Move PREV slider
        @slider.slick('slickPrev')
        @removeSliderEffectClasses()

    # Effect on Hover
    $('.landing-slider').on {
      mouseenter: (e)=>
        if @slide_position(e.currentTarget) is "right"
          $(e.currentTarget).addClass 'show-right'
          $('.landing-slider .slick-center').addClass 'move-left'
          $('.landing-slider .slick-center').prev().addClass 'fade-out'
        else
          $(e.currentTarget).addClass 'show-left'
          $('.landing-slider .slick-center').addClass 'move-right'
          $('.landing-slider .slick-center').next().addClass 'fade-out'
        return
      mouseleave: (e)=>
        @removeSliderEffectClasses()
        return
    }, '.slick-slide:not(.slick-center)'


  slide_position: (slide)=>
    document_width = $(document).width()
    slide_position = $(slide).offset()

    if slide_position.left > document_width / 2
      return "right"
    else
      return "left"


  load_scroll_animation: ()=>
    @class_on_scroll = new ApplyClassOnScroll 'fadeInUp animated', 100, '[data-fadein]'



export default Slider
