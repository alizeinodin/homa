import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const appBase = document.querySelector('meta[name="app-base"]')?.content || '';
if (appBase) {
    window.axios.defaults.baseURL = appBase;
}
