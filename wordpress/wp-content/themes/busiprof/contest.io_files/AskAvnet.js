(function () {
    if (window['askAvnetConfig'][0]) {	  
        var configObject = window['askAvnetConfig'][0],
            botId = 'askavnetbot',
            params = [];
	
	    // Iterating through the config object and creating the param array
        for (var key in configObject) {
		    if (key == 'botId' ) {
		        botId = configObject[key];	// Fetching the botId if available		  
		    } else {
		        params.push(encodeURIComponent(key) + '=' + encodeURIComponent(configObject[key]));
			}
		}
	
	    // Inserting the directline token to the param array based on botId
	    if (botId == 'krishnabottest') {		
		    params.push('s=TSMzAyOhjDA.cwA.1d4.0h5BfIuIdkPzpPFoqh77aN9ehR07XZ5NffVtHFlL0rQ');
	    } else if (botId == 'askavnetbotphase2') {
		    params.push('s=Xa-739sLuCg.cwA.mI0.EUogxlpAQaIqV4GHZxtSVbcZbRrtL5dbgD0fg40xhXE');
	    } else { 
	        params.push('s=EnwBm4fiXn8.cwA.TBQ.EWrJH0Ovv8WP9Hh6SNFPvZlj-XsEEkBWArlISllswL8');   // Default token is that of prod
	    }
	
	    // Forming the bot domain and base URL
	    var baseUri = 'https://' + botId + '.azurewebsites.net';
	    var url = baseUri + '/styles/html/chat.html?' + params.join('&');   // Appending all the request parameters to url

	    // Creating chat bot container
        var chatbot = document.createElement('div');
        chatbot.id = 'chatbotOut';
        chatbot.innerHTML = '<object id="chatbotIn" style="box-sizing: border-box;border-radius: 10px;z-index: 9;bottom:5px;right:0;position:fixed;" type="text/html" data="' + url + '"></object>';

	    // Function to apply styles to the bot window and popup
        function css(targetId, rules) {
            var target = document.getElementById(targetId);
            for (var k in rules) {
                target.style[k] = rules[k];
            }
        }

	    // Applying styles to the bot window
        window.addEventListener('message', function (event) {
            if (baseUri == event.origin) {
                if (event.data.hasOwnProperty("OpenChat")) {
                    css('chatbotOut', {'z-index': 99999, 'width': '447px', 'height': '84vh', 'top': '34px', 'display': 'block', 'position': 'fixed','right': '0'});
                    css('chatbotIn', {'z-index': 99999, 'width': '447px', 'height': '97vh'});
                }

                if (event.data.hasOwnProperty("CloseChat")) {
                    css('chatbotOut', {'z-index': 99999, 'width': '105px', 'height': '65px', 'top': '', 'display': 'block', 'position': 'fixed', 'right': '0'});
                    css('chatbotIn', {'z-index': 99999, 'width': '105px', 'height': '65px'});
                }

                if (event.data.hasOwnProperty("introalert")) {
                    css('chatbotOut', {'z-index': 99999, 'width': '420px', 'height': '240px', 'top': '', 'display': 'block', 'position': 'fixed', 'right': '0'});
                    css('chatbotIn', {'z-index': 99999, 'width': '420px', 'height': '240px'});
                }
            }
        });

        // Append the bot to document body
        document.body.appendChild(chatbot);
    }
})(window, document);