# Simple Todo
A MVC based plugin starter for WordPress
## 1) Getting Started
### 1.1) Find and replace following strings from all project files
- SimpleTodo -> NewPluginName
- simple-todo -> new-plugin-name
- simple_todo_ -> new_plugin_name_
- SIMPLE_TODO_ -> NEW_PLUGIN_NAME_

### 1.2) Run following command in terminal

```shell
composer dump-autoload
```

## 2) Asset Management

### 2.1) Install Node Dependency
```shell
npm install
```

### 2.2) Start Development

### 2.1) Enable Script Debug
Enable Script Debug from wp-config.php
```php
define( 'SIMPLE_TODO_IN_DEVELOPMENT', true );
```
### 2.2) Initialize Vite
```shell
npm run dev
```

### 2.3.1) Build Asset for Production
Build Assets for production
```shell
npm run build
```
### 2.3.2) Disable Script Debug
Disable script debug from wp-config.php to see the production result
```php
define( 'SIMPLE_TODO_IN_DEVELOPMENT', false );
```


### 2.3.4) Test Result
Create a page with following html content.
```html
<div id="root"></div>
```

Now you should see a demo react app.