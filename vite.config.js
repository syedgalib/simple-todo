import react from '@vitejs/plugin-react'
import { defineConfig } from 'vite'
import customConfig from './vite.custom-config'


// https://vitejs.dev/config/
export default defineConfig( ( { command, mode } ) => {
  const config = customConfig( mode );

  console.log( { command, mode } );

  return {
    base: '/wp-content/plugins/simple-todo/',
    plugins: [ react() ],
    build: {
      outDir: '',
      assetsDir: 'dist',
      emptyOutDir: false,
      polyfillModulePreload: false,
      sourcemap: true,
      minify: config.minify,
      rollupOptions: {
        input: {
          main: '/assets/src/public/js/main.jsx',
        },
        output: {
          entryFileNames: config.entryFileNames,
          assetFileNames: config.assetFileNames,
        }
      },
    },
    server: config.server,
  }
})
