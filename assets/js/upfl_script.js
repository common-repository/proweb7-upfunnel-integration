window.salesproofApiKey = (function(apiKey) {
			if (document.getElementById("salesproof-js-common")) return;
			var assetUrl = "https://cdn.upfunnel.io/";
			var firstJs = document.getElementsByTagName("script")[0];
			var commonJs = document.createElement("script");
			commonJs.id = "salesproof-js-common";
			commonJs.src = assetUrl + "salesproof-common.js";
			var onload = commonJs.onload = function() {
				var hostJs = document.createElement("script");
				hostJs.id = "salesproof-js-host";
				hostJs.src = assetUrl + "salesproof-host.js";
				firstJs.parentNode.insertBefore(hostJs, firstJs);
				commonJs.removeEventListener("onload", onload);
			}
			firstJs.parentNode.insertBefore(commonJs, firstJs);
			return apiKey;
		})(upflObj.upfl_api_key);
		