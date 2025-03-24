<header>
    <div class="row first-row">
        <div class="row-content">
            <span class="start">
                <time id="beat_timer"></time>
            </span>
            <span class="end">
                <a href="/auth/login">Log in</a>
            </span>
        </div>
    </div>
    <div class="row second-row">
        <div class="row-content">
            <a href="/" class="header-link">
                ByeCorps ID
            </a>
            <div class="header_idcard">

            </div>
        </div>
    </div>
</header>

<script type="text/javascript">
		var time = document.getElementById('beat_timer');

		function convertDatetoBeats(date, toDigits) {
			var UTCHour = date.getUTCHours() + 1;
			var UTCMinute = date.getUTCMinutes();
			var second = date.getUTCSeconds() + (date.getUTCMilliseconds() / 1000);

			return "@" + ( ( ( 3600 * UTCHour ) + ( 60 * UTCMinute ) + second ) / 86.4).toFixed(toDigits)
		}

		var currentTime = new Date();	
		time.innerText = convertDatetoBeats(currentTime, 2);

		setInterval(function () {
			var currentTime = new Date();
            var dateReadout = currentTime.toDateString();
			time.innerText = dateReadout + " " + convertDatetoBeats(currentTime, 2);
		}, 100);
	</script>