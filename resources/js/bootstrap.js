window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {
}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */


window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.interceptors.response.use(function (response) {
    if (response.status === 200 && response.data.message) {
        toastr.success("Успешно")
    }
    if (response.status === 201 && response.data.message) {
        toastr.success("Успешно")
    }
    if(response.data.constructor !== Object && response.data.constructor !== Array) {
        return Promise.reject(error)
    }
    return response
}, function (error) {
    // Do something with response error
    // check for errorHandle config

    // if has response show the error
    if (error.response) {
        if (error.response.status === 404 || error.response.status === 400) {
            toastr.error("ErrorCode: " + error.response.data.errorCode);
            var messages = error.response.data.errors;
        }
        if (error.response.status === 500) {
            toastr.error("Обратитесь в техническую поддержку: " + error.response.data.message)
        }
        if (error.response.status === 401) {
            // if you ever get an unauthorized, logout the user
            toastr.error("Время сессии истекло!");
            setTimeout(function () {
                window.location.href = 'admin';
            }, 1500);            // you can also redirect to /login if needed !
        }
        if (error.response.status === 419) {
            // if you ever get an unauthorized, logout the user
            toastr.error("Время сессии истекло!");
            setTimeout(function () {
                window.location.href = 'admin';
            }, 1500);
            // you can also redirect to /login if needed !
        }
    }
    return Promise.reject(error)
});

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });

