/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package   LiveDashboard
 * @author    pdir / digital agentur - Mathias Arzberger
 * @license   LGPL-3.0+
 * @copyright pdir / digital agentur - Mathias Arzberger 2016
 */
(function() {
    var liveDashboard = {

        /**
         * constructor
         */
        init: function() {

            // this.generateHtml();
            this.sessionTime = ldSessionTimeout;
            this.cover = document.getElementById('ldCover');
            this.screen = document.getElementById('ldScreen');
            this.interval;
            this.timer;
            this.timedCount = 0;

            this.interval = setInterval(function(p){p.showScreen()},this.sessionTime*1000, this);
            this.timer = setInterval(function(p){p.setTimer()},1000, this);
        },

        /* generateHtml
         * @desc generates the html for overlay in the footer
         */
        generateHtml: function() {
            /*
            document.body.innerHTML += '<div id="ldScreen">Achtung: Ihre Session ist abgelaufen.<br><br>' +
                'SessionTime s(sec): <span class="session-time">'+ldSessionTimeout+'</span><br><br>' +
                'TimeLeft: <span class="time-left">-</span><br><br>' +
                '<button onclick="document.getElementById(\'ldCover\').style.display = \'\';document.getElementById(\'ldScreen\').style.display = \'\';">Schließen</button>' +
                '</div><div id="ldCover"></div>'; */
            this.cover = document.getElementById('ldCover');
            this.screen = document.getElementById('ldScreen');
        },

        /* showScreen
         * @desc show session overlay
         */
        showScreen: function() {
            this.cover.style.display = "block";
            this.screen.style.display = "block";
            clearInterval(this.interval);
            clearInterval(this.timer);
        },

        /* setTimer
         * @desc updated the timer
         */
        setTimer: function () {
            var arrElem = document.getElementsByClassName("time-left");
            this.timedCount++;
            var timeLeft = this.sessionTime - this.timedCount;
            for (var i = 0; i < arrElem.length; ++i) {
                var item = arrElem[i];
                item.innerText = timeLeft;
            }
        },
    }

    window.addEvent('domready', function() {
        liveDashboard.init(ldSessionTimeout);
    });

})();