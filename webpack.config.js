const defaults = require("@wordpress/scripts/config/webpack.config");
const path = require("path");

module.exports = {
  ...defaults,
  entry: {
    blocks: "./assets/js/blocks.js",
  },
  output: {
    path: path.resolve(__dirname, "assets/dist"),
    filename: "[name].js",
    publicPath: "/assets",
  },
  // externals: {
  //   react: "React",
  //   "react-dom": "ReactDOM",
  // },
};
