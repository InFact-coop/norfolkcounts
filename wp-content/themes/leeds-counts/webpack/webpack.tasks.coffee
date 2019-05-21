###
#
# Typical setup has only one generated JS file but if others are necessary,
# they can be added as additional members of the config array returned below.
#
###
module.exports = (options)->
  [
    require('./webpack.main.coffee')(options)
  ]
