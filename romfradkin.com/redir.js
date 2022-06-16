/* 
window.location.href is the current URL. This is used instead of 
mod_rewrite for switching to https from http, but only when 
on the surface web. If the url is an onion address, it will not redirect. 
This is useful since the onion site does not have an ssl/tls certificate, 
so it gets insecure page warnings when coming from https (which it would  
be auto-directed to). This method avoids those insecure warnings.
*/

let url = window.location.href
if (['http://romfradkin.com', 'http://www.romfradkin.com'].includes(url.substring(0, url.indexOf('.com') + 4))) {
    window.location.replace('https://' + window.location.href.substring(7))
}