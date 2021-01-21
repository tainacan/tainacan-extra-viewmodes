# Tainacan Extra View Modes (Demo Plugin)

This repo contains a plugin that registers a list of 8 Extra View Modes for Tainacan [Tainacan](https://tainacan.org). This source code is also a good example of how to implement [third party view modes](https://tainacan.github.io/tainacan-wiki/#/plugin-extra-view-modes) for Tainacan, which can be learned in the Tainacan Wiki: https://tainacan.github.io/tainacan-wiki/#/dev/extra-view-modes.

## The Extra View Modes

Mosaic
: A simple and marginless mosaic of item thumbnails.

Frame
: A centered aligned, framed thumbnails view, like gallery expositions.

Exhibition
: A framed record view, where image and metadata are expanded on hover.

Books
: A book cover view, made for library visualizations.

Polaroid
: A framed picture view, similar to polaroid photographs.

Document
: Records with stacked papers style, for displaying published research.

Albums
: Thumbnails displayed as album covers with a disk inside.

Gallery
: A masonry view mode that displays two metadata and opens a slider lightbox.

## Installation

Like any other WordPress plugin, just move the `tainacan-extra-viewmodes` folder to your plugins folder.

## Build it!

Make the script executable:

```sh
chmod u+x build.sh
```

The _Gallery_ view mode is a Vue.js Component, so it needs to be compiled. To simply build the necessary `.vue` files into bundled javascript:

```sh
./build.sh
```

To, besides that, move the necessary plugin files to your wordpress plugin directory:

```sh
./build.sh /var/www/html/wp-content/plugins/
```

If you don't like the script you can bundle things by yourself:

```sh
cd tainacan-extra-viewmodes/components
npm install
npm run build
```

But keep in mind that the script also takes care of removing some source files not necessary for the plugin to work, such as `.vue`, `package.json` and `webpack.config.json`.
