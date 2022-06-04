const wpPot = require('wp-pot');
 
wpPot({
  destFile: './languages/simple-todo.pot',
  domain: 'simple-todo',
  package: 'Simple Todo',
  src: './**/*.php'
});