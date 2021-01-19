echo "Compiling necessary stuff..."
cd ./tainacan-extra-viewmodes/components/
npm install
npm run build
cd ../../

if [ -z "$1" ]
then
    echo "Done!"
else
    echo "Done. Moving files to destination folder: $1"
    rm -rf $1/tainacan-extra-viewmodes
    cp -r ./tainacan-extra-viewmodes $1
    echo "Cleaning some files not necessary for the plugin to work..."
    rm -f $1/tainacan-extra-viewmodes/components/webpack.config.js
    rm -f $1/tainacan-extra-viewmodes/components/package.json
    rm -f $1/tainacan-extra-viewmodes/components/package-lock.json
    rm -f $1/tainacan-extra-viewmodes/components/*.vue
    rm -f $1/tainacan-extra-viewmodes/components/extra-view-mode.js
    rm -rf $1/tainacan-extra-viewmodes/components/node_modules
    echo "Done!"
fi