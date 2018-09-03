<?php

if (! function_exists('css_url_active')) {

    /**
     * set class name if the current url matches a given one.
     *
     * @param  string $url
     * @return string
     */
    function css_url_active($url, $className = 'active')
    {
        return Request::is($url) ? $className : '';
    }
}

if ( ! function_exists('css_route_active')) {

    /**
     * Generate html element class if route is equals to a given route.
     *
     * @param  string $route
     * @param  string $className
     * @param array $conditions
     * @return string
     */
    function css_route_active($route, $className = 'active', $conditions = [])
    {
        if (empty($conditions)) {
            return Route::currentRouteName() == $route ? $className : '';
        }

        foreach ($conditions as $key => $value) {
            if (request($key) == $value) {
                return Route::currentRouteName() == $route ? $className : '';
            }
        }
    }
}

if (! function_exists('css_resource_active')) {

    /**
     * Generate html element class if route is in a given resource.
     *
     * @param  string $resource
     * @param  array $routes
     * @param  string $className
     *
     * @return string
     */
    function css_resource_active($resource, $routes = [], $className = 'active', $conditions = [])
    {
        $routes = array_merge($routes, ['index', 'store', 'show', 'destroy', 'update', 'edit']);

        if (empty($conditions)) {
            foreach ($routes as $route) {
                if (Route::currentRouteName() == ($resource.'.'.$route)) {
                    return $className;
                }
            }
        }

        foreach ($conditions as $key => $value) {
            if (request($key) == $value) {
                foreach ($routes as $route) {
                    if (Route::currentRouteName() == ($resource.'.'.$route)) {
                        return $className;
                    }
                }
            }
        }

        return '';
    }
}
