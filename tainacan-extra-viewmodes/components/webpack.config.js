let path = require("path");
let webpack = require("webpack");
const { VueLoaderPlugin } = require("vue-loader");

module.exports = {
  mode: "development",
  output: {
    path: path.resolve(__dirname, ""),
    filename: "gallery-view-mode.bundle.js",
  },
  module: {
    rules: [
      {
        test: /\.vue$/,
        loader: "vue-loader"
      },
      {
        test: /\.js$/,
        loader: "babel-loader",
      }
    ],
  },
  plugins: [new VueLoaderPlugin()]
};
