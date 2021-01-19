# Tainacan Extra View Modes (Demo Plugin)

This repo contains a plugin that registers a list of Extra View Modes for Tainacan [Tainacan](https://tainacan.org).

Make the script executable:

```sh
chmod u+x build.sh
```

To simply build the necessary `.vue` files into bundled javascript:

```sh
./build.sh
```

To, besides that, move the necessary plugin files to your wordpress plugin directory:

```sh
./build.sh /var/www/html/wp-content/plugins/
```

If you don't like the script you can bundle things by yourself:

```sh
cd tainacan-metadata-type-url/metadata_type
npm install
npm run build
```

But keep in mind that the script also takes care of removing some source files not necessary for the plugin to work, such as `.vue`, `package.json` and `webpack.config.json`.
