import { getAssetDestination } from './vite.helper';

function customConfig( mode ) {

    // Common Config
    const commonConfig = {
        destDir: 'assets/dist/',
        server: {
            cors: true,
            strictPort: true,
            port: 3000
        },
    };

    // Dev Config
    const devConfig = {
        minify: false,
        entryFileNames: commonConfig.destDir + 'js/[name].js',
        assetFileNames: function( assetInfo ) {
            return commonConfig.destDir + getAssetDestination( assetInfo.name, 'development' );
        },
        server: commonConfig.server,
    };

    // Prod Config
    const prodConfig = {
        minify: true,
        entryFileNames: commonConfig.destDir + 'js/[name].min.js',
        assetFileNames: function( assetInfo ) {
            return commonConfig.destDir + getAssetDestination( assetInfo.name, 'production' );
        },
        server: commonConfig.server,
    };

    if ( 'development' == mode ) {
        return devConfig;
    }

    return prodConfig;
}

export default customConfig;