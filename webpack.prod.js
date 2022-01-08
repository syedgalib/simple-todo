const common    = require("./webpack.common");
const { merge } = require('webpack-merge');

const MiniCssExtractPlugin   = require("mini-css-extract-plugin");
const WebpackRTLPlugin       = require("webpack-rtl-plugin");
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const FileManagerPlugin      = require('filemanager-webpack-plugin');
const entryList              = require('./webpack-entry-list.js');

// Delete Common Entries
delete common.entry;

// Get all entries
let allEntries = {};
for ( const entryGroup of Object.keys( entryList ) ) {
  allEntries = { ...allEntries, ...entryList[entryGroup] };
}

const prodConfig = {
  mode: "production", // production | development
  watch: false,
  entry: allEntries,
  plugins: [
    new MiniCssExtractPlugin({
      filename: "../css/[name].min.css",
      minify: true,
    }),
    new WebpackRTLPlugin({
      minify: true,
    }),
    new CleanWebpackPlugin({
      dry: false,
      cleanOnceBeforeBuildPatterns: [ '../css/*.map', '../js/*.map' ],
      dangerouslyAllowCleanPatternsOutsideProject: true,
    }),
    new FileManagerPlugin({
      events: {
        onEnd: [
          {
            copy: [
              { source: './app', destination: './__build/simple-todo/simple-todo/app' },
              { source: './assets', destination: './__build/simple-todo/simple-todo/assets' },
              { source: './helper', destination: './__build/simple-todo/simple-todo/helper' },
              { source: './languages', destination: './__build/simple-todo/simple-todo/languages' },
              { source: './template', destination: './__build/simple-todo/simple-todo/template' },
              { source: './vendor', destination: './__build/simple-todo/simple-todo/vendor' },
              { source: './view', destination: './__build/simple-todo/simple-todo/view' },
              { source: './*.php', destination: './__build/simple-todo/simple-todo' },
            ],
          },
          {
            delete: ['./__build/simple-todo/simple-todo/assets/src'],
          },
          {
            archive: [
              { source: './__build/simple-todo', destination: './__build/simple-todo.zip' },
            ],
          },
          {
            delete: ['./__build/simple-todo'],
          },
        ],
      },
    }),
    
  ],

  output: {
    filename: "../js/[name].min.js",
  },
};

const devConfig = {
  mode: "development", // production | development
  watch: true,
  entry: allEntries,
  plugins: [
    new MiniCssExtractPlugin({
      filename: "../css/[name].css",
      minify: false,
    }),
    new WebpackRTLPlugin({
      minify: false,
    }),
  ],
  output: {
    filename: "../js/[name].js",
  },

  devtool: 'source-map'
};

let configs = [];

// Development Build
const _devConfig = merge( common, devConfig );
_devConfig.watch = false;
configs.push( _devConfig );

// Production Build
const _prodConfig = merge( common, prodConfig );
configs.push( _prodConfig );

module.exports = configs;