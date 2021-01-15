echo "Compiling necessary stuff..."
# cd ./tainacan-extra-viewmodes/metadata_type/
# npm install
# npm run build
# cd ../../

if [ -z "$1" ]
then
    echo "Done!"
else
    echo "Done. Moving files to destination folder: $1"
    rm -rf $1/tainacan-extra-viewmodes
    cp -r ./tainacan-extra-viewmodes $1
    echo "Cleaning some files not necessary for the plugin to work..."
    # rm -f $1/tainacan-extra-viewmodes/metadata_type/webpack.config.js
    # rm -f $1/tainacan-extra-viewmodes/metadata_type/package.json
    # rm -f $1/tainacan-extra-viewmodes/metadata_type/package-lock.json
    # rm -f $1/tainacan-extra-viewmodes/metadata_type/*.vue
    # rm -f $1/tainacan-extra-viewmodes/metadata_type/metadata-type.js
    # rm -rf $1/tainacan-extra-viewmodes/metadata_type/node_modules
    echo "Done!"
fi