import { defineConfig, splitVendorChunkPlugin } from 'vite'
import react from '@vitejs/plugin-react'

function getAssetDestination( assetName, mode ) {
  const imageFormats = [ 'svg', 'png', 'jpg', 'jpeg' ];
  const fontFormats  = [ 'ttf' ];
  const maybeMin     = ( 'development' == mode ) ? '' : '.min';

  let ext = assetName.match( /\.(.+)$/ );
  ext = ( ext && ext.length > 1 ) ? ext[1] : '';

  if ( 'js' === ext ) {
    return `[name]${maybeMin}[extname]`;
  }

  if ( 'css' === ext ) {
    return `css/[name]${maybeMin}[extname]`;
  }

  if ( imageFormats.includes( ext ) ) {
    return `images/[name][extname]`;
  }
  
  if ( fontFormats.includes( ext ) ) {
    return `fonts/[name][extname]`;
  }

  return `other/[name][extname]`;
}

// https://vitejs.dev/config/
export default defineConfig( ( { command, mode } ) => {

  console.log( { command, mode } );

  // Production Config
  let minify = true;
  let entryFileNames = 'dist/js/[name].min.js';
  let assetFileNames = ( assetInfo ) => {
    return 'dist/' + getAssetDestination( assetInfo.name );
  };

  // Development Config
  if ( 'production' != mode ) {
    // Minify
    minify = false;

    // Entry File Names
    entryFileNames = 'dist/js/[name].js';

    // Asset File Names
    assetFileNames = ( assetInfo ) => {
      return 'dist/' + getAssetDestination( assetInfo.name, 'development' );
    };
  }

  return {
    plugins: [ react(), splitVendorChunkPlugin() ],
    build: {
      outDir: 'assets',
      emptyOutDir: false,
      assetsDir: 'dist/js',
      polyfillModulePreload: false,
      sourcemap: true,
      minify: minify,
      rollupOptions: {
        input: {
          // main: '/assets/src/main.jsx',
          main: '/assets/src/public/js/main.jsx',
        },
        output: {
          entryFileNames,
          assetFileNames,
          manualChunks: {
            react: ['react']
          }
        }
      },
    },
    server: {
      cors: true,
      strictPort: true,
      port: 3000
    },
  }
})
