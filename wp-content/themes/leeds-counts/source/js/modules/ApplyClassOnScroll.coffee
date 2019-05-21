###*
# @file ApplyClassOnScroll.coffee
#
# @class ApplyClassOnScroll
# @params
# klass - string, classname to apply
# offset - float, percent (of viewport) offset from window top above which to apply the class
# selector - string, DOM selector
#
# Utility class, when initialized, attaches an onscroll listener to the document
# that applies klass to elements via the DOM selector set as soon as they are more than
# offset percent from the screen top. The init() method refreshes the cache of elements and
# should be run on page load, or when new content is added.
###

class ApplyClassOnScroll

  constructor: (@klass, @offset, @selector, @callback = ->)->
    unless @klass? && @offset? && @selector?
      throw "ApplyClassOnScroll takes three arguments"
    window.addEventListener "scroll", @scroller
    @debounce = false
    @init()

  init: =>
    @nodes = (node for node in document.querySelectorAll("#{@selector}"))
    @scroller()

  unset_debounce: =>
    @debounce = false

  scroller: =>
    if !@debounce
      @debounce = true
      setTimeout @unset_debounce, 180
      l = @nodes.length
      if l > 0
        for i in [(l - 1)..0]
          node = @nodes[i]
          if( (( node.getBoundingClientRect().top / window.innerHeight ) * 100) < @offset )
            node.className += " #{@klass}"
            @callback node
            @nodes.splice i, 1

export default ApplyClassOnScroll
