
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('lightgallery.js');

window.Vue = require('vue');

/**
 * Tooltips
 */
$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

/**
 * Lightgallery
 */
$(function () {
    lightGallery(document.getElementById('lightgallery'), {download: false});
});
