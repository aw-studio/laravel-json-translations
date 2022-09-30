<?php

namespace AwStudio\LaravelJsonTranslations;

use Illuminate\Support\Facades\Route;

class JsonTranslations
{
    /**
     * Register the route for the json translations javascript file.
     *
     * @param  string   $filesname
     * @param  array    $locales
     * @return Response
     */
    public function javascript(string $filesname, array $locales)
    {
        Route::get("/$filesname.js", function () use ($locales) {
            $js = 'window.i18n = ' . $this->json($locales) . ';';

            return response($js, 200)
                ->header('Content-Type', 'text/javascript');
        });
    }

    /**
     * Get translations as json.
     *
     * @param  array  $locales
     * @return string
     */
    public function json(array $locales): string
    {
        $translations = [];
        foreach ($locales as $locale) {
            if (file_exists(resource_path('lang'))) {
                foreach (glob(resource_path('lang/'.$locale.'/*.php')) as $file) {
                    $content = require $file;
                    $key = explode('.', basename($file))[0];

                    $translations[$locale][$key] = $content;
                }
            }
            if (file_exists(base_path('lang'))) {
                foreach (glob(base_path('lang/'.$locale.'/*.php')) as $file) {
                    $content = require $file;
                    $key = explode('.', basename($file))[0];

                    $translations[$locale][$key] = $content;
                }
            }
        }

        return json_encode($translations);
    }
}
