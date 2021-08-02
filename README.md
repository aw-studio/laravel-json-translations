# Laravel Json Translations

The `Laravel Json Translations` package offers a convenient way of providing all translations from the `resources/lang` directory via a route serving a javascript file as JSON object and automatically binds them to the window-object.
This is useful when working with i18n packages in frontend-frameworks like Vue.js. 

## Installation

```bash
composer require aw-studio/laravel-json-translations
```

## Usage

Register the route that will serve the translation file in `routes/web.php` via the availble helper which takes a filename and an array of all locales that should be included in the file as an parameter:

```php
// routes/web.php
use AwStudio\LaravelJsonTranslations\Facades\JsonTranslations;

// this will serev under your-app.com/my-translations.js
JsonTranslations::javascript('my-translations', ['en', 'de']);
```

You can now include a local javascript using the `<script>` tag or simply use the blade-directive in a view where you need to provide the json translations:

```php
@translations('my-translations')
```

If you want to receive raw json e.g. in an api, this can be achieved as follows:

```php
Route::get('json', function () {
    return JsonTranslations::json(['en', 'de']);
});
```

## Vue i18n example

As the json translations are bound to the `window` object 

```js
import Vue from 'vue';
import VueI18n from 'vue-i18n';

const messages = window.i18n;

Vue.use(VueI18n);

const i18n = new VueI18n({
    locale: 'de',
    fallbackLocale: 'en',
    messages
});

export default i18n;
```