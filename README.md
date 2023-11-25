### For local dev

1) Make directory for docker: <br>
   `mkdir ./storage/docker` <br>

2) Copy .env.example <br>
   `cp .env.example .env` <br>

3) Add host user to .env <br>
   `echo UID=$(id -u) >> .env` <br>
   `echo GID=$(id -g) >> .env` <br>

4) Run services docker <br>
   `docker-compose up -d --build` <br>

5) Install npm dependencies <br>
   `npm i` <br>

6) Migrate Laravel <br>
   `docker exec php-app php artisan migrate`<br>
   `docker exec php-app php artisan migrate:rollback`<br>
   `docker exec php-app php artisan migrate` <br>

7) Install Dropzone <br>
   `npm install --save dropzone` <br>

8) Install Breeze <br>
   `composer require laravel/breeze --dev`<br>
   `php artisan breeze:install vue` <br>

9) DB Seed <br>
   `docker exec php-app php artisan migrate` <br>
   `docker exec php-app php artisan db:seed --class=BlogCategorySeeder`<br>
   `docker exec php-app php artisan db:seed --class=BlogTagSeeder`<br>
   `docker exec php-app php artisan db:seed --class=BlogPostSeeder`<br>
   `docker exec php-app php artisan db:seed --class=BlogPostBlogTagSeeder`<br><br>

10) `npm install --save-dev @rushstack/eslint-patch @vue/eslint-config-prettier eslint eslint-plugin-vue prettier`<br><br>

11) Создайте новый .eslintrc.cjs файл в каталоге вашего проекта: <br>
    `/* eslint-env node */
    require('@rushstack/eslint-patch/modern-module-resolution')

    module.exports = {
    root: true,
    extends: ['plugin:vue/vue3-essential', 'eslint:recommended', '@vue/eslint-config-prettier'],
    parserOptions: {
    ecmaVersion: 'latest'
    },
    rules: {
    'no-console': process.env.NODE_ENV === 'production' ? 'warn' : 'off',
    'no-debugger': process.env.NODE_ENV === 'production' ? 'warn' : 'off',
    'vue/multi-word-component-names': 'off',
    'no-undef': 'off'
    }
    }`
    Здесь у нас есть несколько правил для ESLint:

    Первые два правила предназначены специально для производственных сборок.<br>
    
    no-console - В JavaScript, который предназначен для выполнения в браузере, 
    считается, что лучше избегать использования методов в console. 
    Считается, что такие сообщения предназначены для целей отладки и, 
    следовательно, не подходят для отправки клиенту. 
    Как правило, вызовы, использующие console, должны быть удалены перед запуском в производство.<br><br>

    no-debugger - debuggerИнструкция сообщает исполняющей среде JavaScript остановить выполнение 
    и запустить отладчик в текущей точке кода. Это вышло из моды как хорошая практика 
    с появлением современных средств отладки и разработки. Рабочий код не должен содержать debugger, 
    что приведет к остановке выполнения кода браузером и открытию соответствующего отладчика.<br><br>

    vue/multi-word-component-names - по умолчанию предлагается создавать имена компонентов, 
    используя по крайней мере два слова, такие как MyComponent, 
    но некоторые инерционные компоненты состоят из одного слова, 
    поэтому мы не хотим ложноположительных предупреждений. 
    Однако допустимо отключить это правило.<br><br>

    no-undef - аналогичная причина отключения предупреждения о неопределенных функциях и переменных. 
    Некоторые компоненты доступны по всему миру, о которых линтер не знает 
    при использовании Laravel Breeze starter kit с Vue и стеком инерции.<br><br>

12) Создайте новый .prettierrc.json файл в каталоге вашего проекта:<br>
    `{
    "$schema": "https://json.schemastore.org/prettierrc",
    "semi": false,
    "tabWidth": 2,
    "singleQuote": true,
    "printWidth": 100,
    "trailingComma": "none"
    }`<br>
    Это правила форматирования кода. Вы можете настроить их по своему вкусу. 
    Дополнительные опции можно найти в официальной документации Prettier.<br><br>

13) И, наконец, определите lint команду для вашего package.json файла.<br>
    `"type": "module",
    "scripts": {
    "dev": "vite",
    "build": "vite build",
    "lint": "eslint ./ --ext .vue,.js,.cjs --fix --ignore-path .gitignore"
    },
    "devDependencies": {
    "@inertiajs/vue3": "^1.0.0",`<br><br>

14) Чтобы отформатировать все файлы и обеспечить согласованный стиль кода в вашем проекте, <br>
    выполните эту npm команду: `npm run lint`<br>

