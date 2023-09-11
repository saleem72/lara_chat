import Echo from 'laravel-echo';
import './bootstrap';
import axios from 'axios';

const users = [1, 2, 3];
const imageZaki = 'Hello world!'
// window.Echo.channel('.playground').subscribed((event) => {
//     console.log('hello');
// }).listen('.playground', (event) => {
//     console.log(event);
// }).listenToAll((event, data) => {
//     // do what you need to do based on the event name and data
//     console.log(event, data)
//  });


window.Echo.channel('public.playground.1')
    .subscribed((event) => {
        console.log('subscribed');
    })
    .listen('.playground', (e) => {
        console.log(e);
    });



document.getElementById("submit-btn").onclick = () => {
    const uesrName = document.getElementById("user-email").value;
    const uesrPassword = document.getElementById("user-password").value;
    alert('Zaki says hi ' + uesrName + ' ' + uesrPassword);
    // axios.post('auth/login', )
};


