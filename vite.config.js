import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'
// import path from "path"


// function svgResolverPlugin() {
//   return {
//     name: 'svg-resolver',
//     resolveId(source, importer) {
//       if (source.endsWith('.svg')) {

//         const newPath = path.dirname(importer);

//         console.log( { newPath, source, importer } );

//         return path.resolve( newPath , source);
//       }
//     },
//     load(id) {
//       if (id.endsWith('.svg')) {

//         console.log( { id} );

//         const referenceId = this.emitFile({
//           type: 'asset',
//           name: path.basename(id),
//           source: fs.readFileSync(id)
//         });
//         return `export default import.meta.ROLLUP_FILE_URL_${referenceId};`;
//       }
//     }
//   };
// }

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
    plugins: [ react() ],
    // publicDir: 'assets/dist',
    resolve: {
      alias: ( a, b )  => {
        console.log( { a, b } );
      },
    },
    build: {
      outDir: 'assets',
      emptyOutDir: false,
      assetsDir: 'dist/js',
      polyfillModulePreload: false,
      sourcemap: true,
      minify: minify,
      rollupOptions: {
        input: {
          main: '/assets/src/public/js/main.jsx',
        },
        output: {
          entryFileNames,
          assetFileNames,
          // manualChunks: {
          //   react: ['react']
          // }
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
