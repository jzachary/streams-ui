<?php

namespace Streams\Ui\Support;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * Class Normalizer
 *
 * @link   http://pyrocms.com/
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class Normalizer
{

    /**
     * Normalize the input to get rid of shorthand.
     *
     * @param array $input
     * @param string $keyName
     */
    public static function normalize(array $input, $keyName = 'handle')
    {
        foreach ($input as $key => &$item) {

            if (is_numeric($key) && is_string($item)) {
                $item = [
                    $keyName => $item,
                ];
            }

            if (!is_numeric($key) && is_string($item)) {
                $item = [
                    $keyName => $item,
                ];
            }
        }

        return $input;
    }

    /**
     * Fill with key replaces the provided attribute
     * with the key if the attribuet is missing.
     *
     * @param array $input
     * @param $attribute
     * @return array
     */
    public static function fillWithKey(array $input, $attribute)
    {
        foreach ($input as $key => &$item) {
            $item[$attribute] = Arr::pull($item, $attribute, $key);
        }

        return $input;
    }

    /**
     * Fill with key replaces the provided attribute
     * with the key if the attribuet is missing.
     *
     * @param array $input
     * @param $attribute
     * @return array
     */
    public static function fillWithAttribute(array $input, $attribute, $target)
    {
        foreach ($input as &$item) {
            $item[$attribute] = Arr::pull($item, $attribute, Arr::get($item, $target));
        }

        return $input;
    }

    /**
     * Fill with key replaces the provided attribute
     * with the key if the attribuet is missing.
     *
     * @param array $input
     * @param $attribute
     * @return array
     */
    public static function fillWithValue(array $input, $attribute, $value)
    {
        foreach ($input as &$item) {
            $item[$attribute] = Arr::pull($item, $attribute, $value);
        }

        return $input;
    }

    /**
     * Normalize buttons.
     *
     * @param array $buttons
     * @return array
     */
    public static function buttons(array $buttons)
    {
        foreach ($buttons as $key => &$button) {

            /*
             * If the button is a string but the key
             * is numeric then use the button as the
             * button type.
             */
            if (is_numeric($key) && is_string($button)) {
                $button = [
                    'button' => $button,
                ];
            }

            /*
             * If the button AND key are strings then
             * use the key as the button and the
             * button as the text parameters.
             */
            if (!is_numeric($key) && is_string($button)) {
                $button = [
                    'text'   => $button,
                    'button' => $key,
                ];
            }

            /*
             * If the key is not numeric and the button
             * is an array without the button key then
             * use the key as the button's type.
             */
            if (!is_numeric($key) && is_array($button) && !isset($button['button'])) {
                $button['button'] = $key;
            }
        }

        return $buttons;
    }

    /**
     * Normalize HTML attributes.
     *
     * @param array $input
     * @param array $default
     * @return array
     */
    public static function htmlAttributes(array $input, array $default = [])
    {
        return self::attributes($input, $default);
    }

    /**
     * Normalize HTML attributes.
     *
     * @param array $input
     * @param array $default
     * @return array
     */
    public static function attributes(array $input, array $default = [])
    {
        foreach ($input as $key => &$item) {

            /**
             * Make sure attributes exists.
             */
            $item['attributes'] = Arr::get($item, 'attributes', []);

            /**
             * Make sure default parameters exist.
             */
            if ($attributes = array_merge($default, Arr::get($item, 'attributes', []))) {
                $item['attributes'] = $attributes;
            }

            /**
             * Move the HREF if any to attributes.
             */
            if (isset($item['href'])) {
                Arr::set($item['attributes'], 'href', Arr::pull($item, 'href'));
            }

            /**
             * Move the URL if any to attributes.
             */
            if (isset($item['url'])) {
                Arr::set($item['attributes'], 'url', Arr::pull($item, 'url'));
            }

            /**
             * Move the target if any to attributes.
             */
            if (isset($item['target'])) {
                Arr::set($item['attributes'], 'target', Arr::pull($item, 'target'));
            }

            /**
             * Move all data-* keys to attributes.
             */
            foreach ($item as $attribute => $value) {
                if (Str::is('data-*', $attribute)) {
                    Arr::set($item, 'attributes.' . $attribute, Arr::pull($item, $attribute));
                }
            }

            /**
             * Make sure the HREF is absolute.
             */
            if (
                isset($item['attributes']['href']) &&
                is_string($item['attributes']['href']) &&
                !Str::startsWith($item['attributes']['href'], ['http', '{', '//'])
            ) {
                $item['attributes']['href'] = url($item['attributes']['href']);
            }
        }

        return $input;
    }
}
