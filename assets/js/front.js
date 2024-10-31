window.salesproofApiKey = (function (d, s, id, k) {
var js;
var fjs;
if (d.getElementById(id)) return k;
fjs = d.getElementsByTagName(s)[0];
js = d.createElement(s);
js.id = id;
js.src = "http://cdn.salesproof.io/notification-host.min.js";
fjs.parentNode.insertBefore(js, fjs);
return k;
}(document, "script", "salesproof-js", "JN81jMU9ljO7aTrkwGenr"));