var utmSource = getUrlVars()["utm_source"];
if(utmSource) {
    document.cookie = "utm_source=" + utmSource + "; path=/";
}
utmSource = getCookie('utm_source');
console.log("Hello 2=============="+utmSource);
if(utmSource == 'google') {
    jQuery('.source').val('PPC'); 
}  

function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1]; 
    }
    return vars;
}

function getCookie(cname) 
{
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
        c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
        }
    }
    return "";
}