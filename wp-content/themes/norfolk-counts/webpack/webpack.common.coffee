path = require('path')
ExtractTextPlugin = require('extract-text-webpack-plugin')
Autoprefixer = require('autoprefixer')



module.exports = (options)->
  devtool: if options.mode is 'production' then false else 'cheap-module-eval-source-map'
  resolve:
    extensions: [".js", ".json", ".coffee", ".cjsx"]
    modules: [
      "node_modules"
      path.resolve(__dirname, "../source/js/modules/")
      path.resolve(__dirname, "../source/js/vendor/")
    ]
  module:
    rules: [
      {
        test: /\.(woff2?|ttf|eot)(\?v=\d+\.\d+\.\d+)?$/
        use: [{
          loader: 'file-loader'
          options: {
            name: '[name].[ext]'
            useRelativePath: true
            publicPath: '../fonts'
          }
        }]
      }
      {
        test: /\.(jpe?g|png|gif|svg)$/i
        use: [{
          loader: 'file-loader'
          options: {
            name: '[name].[ext]'
            useRelativePath: true
            publicPath: '../images'
          }
        }]
      }
      {
        test: /\.(coffee|cjsx)$/
        use: [
          {
          loader: 'coffee-loader'
          options:
            transpile:
              plugins: [ 'babel-plugin-transform-object-rest-spread' ]
              presets: [ 'react', 'env' ]
          }
        ]
      }
      {
        test: /\.js$/
        use: [
          {
          loader: 'babel-loader'
          options:
            plugins: [ 'babel-plugin-transform-object-rest-spread' ]
            presets: [ 'react', 'env' ]
          }
        ]
      }
      {
        test: /\.scss$/
        use: ExtractTextPlugin.extract(
          fallback: 'style-loader'
          use: [
            {
              loader: 'css-loader'
              options:
                minimize: options.mode is 'production'
                sourceMap: options.mode isnt 'production'
            }
            {
              loader: 'postcss-loader'
              options: {
                plugins: () => [
                  Autoprefixer
                ]
              }
            }
            {
              loader: 'resolve-url-loader'
              options:
                debug: false
            }
            {
              loader: 'sass-loader'
              options:
                includePaths: [
                  'node_modules/'
                  'node_modules/motion-ui/src'
                  'node_modules/foundation-sites/scss'
                  'node_modules/slick-carousel/slick'
                  'source/scss'
                ]
                sourceMap: true
            }
          ])
      }
    ]
