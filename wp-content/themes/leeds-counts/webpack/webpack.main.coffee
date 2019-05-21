webpack = require('webpack');
path = require('path')
merge = require('webpack-merge')
ExtractTextPlugin = require('extract-text-webpack-plugin')
# CopyWebpackPlugin = require('copy-webpack-plugin')
CleanWebpackPlugin = require('clean-webpack-plugin')
UglifyJSPlugin = require('uglifyjs-webpack-plugin')
ImageminWebpackPlugin = require('imagemin-webpack-plugin').default
FaviconsWebpackPlugin = require('favicons-webpack-plugin')




module.exports = (options)->

  baseConfig = require('./webpack.common.coffee')(options)

  plugins = [
    new CleanWebpackPlugin([
      path.resolve(__dirname, "../dist/css/*.*")
      path.resolve(__dirname, "../dist/favicons/*.*")
      path.resolve(__dirname, "../dist/fonts/*.*")
      path.resolve(__dirname, "../dist/images/*.*")
      path.resolve(__dirname, "../dist/js/*.*")
    ], { root: path.resolve(__dirname, "..") })

    new ExtractTextPlugin('css/app.css')

    new FaviconsWebpackPlugin(
      logo: './source/favicon/master-favicon.png'
      prefix: 'favicons/'
      emitStats: false
      statsFilename: 'iconstats-[hash].json'
      persistentCache: false
      inject: false
      background: '#fff'
      title: 'New Theme'
      icons:
        android: true
        appleIcon: true
        appleStartup: false
        coast: false
        favicons: true
        firefox: true
        opengraph: false
        twitter: false
        yandex: false
        windows: true
    )

    new webpack.ProvidePlugin(
      $: 'jquery'
      jQuery: 'jquery'
      'window.jQuery': 'jquery'
      'window.$': 'jquery'
    )

  ]

  if options.mode is 'production'

    plugins.push new webpack.DefinePlugin({
      'process.env.NODE_ENV': JSON.stringify('production')
    })

    plugins.push new UglifyJSPlugin
      cache: true
      parallel: true
      uglifyOptions:
        output:
          comments: false

    plugins.push new ImageminWebpackPlugin({ test: /\.(jpe?g|png|gif)$/i })

  merge.smart baseConfig,
    entry: path.resolve(__dirname, "../source/js/app.coffee")
    output:
      filename: 'js/app.js'
      path: path.resolve(__dirname, '../dist')
    plugins: plugins

    watch: options.mode isnt 'production'
    watchOptions:
      aggregateTimeout: 300
      ignored: /node_modules/
