# this will get split out into app.css by the ExtractTextPlugin

import { Foundation } from 'foundation-sites'

import Slider from 'Slider'
import ApplyClassOnScroll from 'ApplyClassOnScroll'
import '../scss/app.scss'

class Theme
  constructor: ()->
    @AJAX_URL = "/wp-content/themes/norfolk-counts/ajax/admin-ajax.php"
    @stories_viewed = [] # This tracks the stories we have viewed in both carousel and via ajax
    @messages = $('.loading-message .messages p') # used by the pre-loader
    $(document).ready @init
    window.jQuery = $

  init: =>
    # Initialize Foundation
    $(document).foundation()

    @setup_events()

    if(window.location.hash is '#debug')
      $(".steps-container, .transition-container").addClass 'hide'
      $(".landing").fadeIn()
      @load_carousel(0).then =>
        @Slider = new Slider(this)

  load_carousel: (first_story)=>
    new Promise (resolve, reject)=>
      $.getJSON @AJAX_URL, {a:"ca",f:first_story}, (response)->
        $("#slider-nav").append response.nav_html
        $("#slider, #other-stories").append response.slider_html
        $("#slider .slide .article-introduction").addClass 'show-headline'
        $("#other-stories .slide").first().remove() #will already be seen in the main slider
        resolve()

  log_ga_from_event: (e)=>
    data = $(e.currentTarget).data()
    link_out = data.linkOut
    category = data.gaCategory
    action = data.gaAction
    label = data.gaLabel
    if(data.fbEvent)
      if data.fbEvent is "ViewContent"
        fbq('track', "ViewContent", {content_name: data.fbEventName}) if fbq?
      if data.fbEvent is "CompleteAction"
        fbq('trackCustom', "CompleteAction", {action: data.fbEventName}) if fbq?
    target = e.currentTarget.attributes.target?.value
    if link_out? and target isnt '_blank'
      href = e.currentTarget.attributes.href.value
      e.preventDefault()
      @log_ga category, action, label, ->
        window.top.location.href = href
    else
      @log_ga category, action, label

  log_ga: (category, action, label, cb = ->)=>
    console.log "LOG: #{category} - #{action} - #{label}"
    if category and action and typeof gtag isnt 'undefined'
      gtag('config', window.GOOGLE_ANALYTICS_ID);
      gtag 'event', action,
        'event_category': category
        'event_label': label
        'event_callback': cb

  preload_main: (first_story)=>
    promises = (@transition_message( 0 * i, message ) for message, i in @messages)
    promises.push @load_carousel( first_story )
    Promise.all promises
    .then @show_landing

  scroll_to_story_tracking: (node)=>
    data = $(node).data()
    fbq('track', "ViewContent", {content_name: data.fbEventName}) if fbq?
    @log_ga data.gaCategory, 'scroll-to', data.gaLabel

  show_landing: ()=>
    $('.transition-container').hide()
    $('.landing').fadeIn()
    @Slider = new Slider( this )
    new ApplyClassOnScroll 'show-headline', 30, '#other-stories .slide .article-introduction', @scroll_to_story_tracking

  setup_events: =>
    $(document)
    .on 'click', '[data-log-ga]', @log_ga_from_event
    .on 'click', '[data-go-step]', @step_transition

  step_transition: (e)=>
    next_step = $(e.currentTarget).data('go-step')
    if next_step is 'transition'
      first_story = parseInt( $(e.currentTarget).data 'first-story' )
      @stories_viewed.push first_story
      $('.steps-container').hide()
      $('.transition-container').fadeIn().queue( ()=>
        @preload_main(first_story)
      )
    else
      $(".step:not(.step-#{next_step})").hide()
      $(".step-#{next_step}").fadeIn()

  transition_message: (delay, elem)->
    new Promise (resolve, reject)->
      setTimeout ->
        $(elem).fadeIn 0
        setTimeout ->
          $(elem).fadeOut 0
          resolve()
        , 0
      , 0



theme = new Theme()
