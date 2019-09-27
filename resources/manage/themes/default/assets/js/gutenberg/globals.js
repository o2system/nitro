// globals.js

window.wp = {
    apiFetch,
    url: { addQueryArgs }
};

window.userSettings = {
    uid: 2, // Among other things, this uid is used to identify and store editor user preferences in localStorage
};

// set your root path
window.wpApiSettings = {
    root: 'YOUR_ROOT_PATH'
};

function apiFetch(options) {
    // Do something with those options like calling an API
    // or actions from your store...
}

/**
 * External dependencies
 */
import { parse, format } from 'url';
import { parse as parseQueryString, stringify } from 'querystring';

/**
 * Appends arguments to the query string of the url
 *
 * @param  {String} url   URL
 * @param  {Object} args  Query Args
 *
 * @return {String}       Updated URL
 */
export function addQueryArgs(url, args) {
    const queryStringIndex = url.indexOf('?');
    const query = queryStringIndex !== -1 ? parse(url.substr(queryStringIndex + 1)) : {};
    const baseUrl = queryStringIndex !== -1 ? url.substr(0, queryStringIndex) : url;

    return baseUrl + '?' + stringify({ ...query, ...args });
}