###*
# @file Scroll
###

import 'paroller.js'

class Scroll

  constructor: ->
    #@init()

  init: =>
    $(".landing-slider .slick-center .article-image").paroller(
      factor: -0.14
      type: 'foreground'
      direction: 'vertical'
    )

export default Scroll
