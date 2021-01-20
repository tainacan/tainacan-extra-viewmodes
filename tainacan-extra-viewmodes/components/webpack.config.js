let path = require("path");
let webpack = require("webpack");
const VueLoaderPlugin = require("vue-loader/lib/plugin");

module.exports = {
  output: {
    path: path.resolve(__dirname, ""),
    filename: "gallery-view-mode.bundle.js",
  },
  module: {
    rules: [
      {
        test: /\.vue$/,
        loader: "vue-loader",
      },
      {
        test: /\.js$/,
        loader: "babel-loader",
      }
    ],
  },
  node: {
    fs: 'empty'
  },
  plugins: [new VueLoaderPlugin()]
};
