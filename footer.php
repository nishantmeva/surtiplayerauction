        <!-- Bootstrap core JS-->
        <script src="js/jquery_1.7.1.min.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
			var myIndex = 0;
			carousel();

			function carousel() {
			var i;
			var x = document.getElementsByClassName("mySlides");
			for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";  
			}
			myIndex++;
			if (myIndex > x.length) {myIndex = 1}    
			x[myIndex-1].style.display = "block";  
			setTimeout(carousel, 2000); // Change image every 2 seconds
			}
		function updateClock(){
			var currentTime = new Date();
			var currentDay = currentTime.getDate();
			var currentMonth = currentTime.getMonth();
			var currentYear = currentTime.getFullYear();
			var currentHours = currentTime.getHours();
			var currentMinutes = currentTime.getMinutes();
			var currentSeconds = currentTime.getSeconds();
			
			// Pad the minutes and seconds with leading zeros, if required
			currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
			currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

			// Choose either "AM" or "PM" as appropriate
			var timeOfDay = (currentHours < 12) ? "AM" : "PM";

			// Convert the hours component to 12-hour format if needed
			currentHours = (currentHours > 12) ? currentHours - 12 : currentHours;

			// Convert an hours component of "0" to "12"
			currentHours = (currentHours == 0) ? 12 : currentHours;

			// Compose the string for display
			var currentTimeString = currentDay + "-" + (currentMonth + 1) + "-" + currentYear + " " + currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
			
			$("#clock").html(currentTimeString);
				
		}

		$(document).ready(function(){
		   setInterval('updateClock()', 1000);
		});

        
		</script>
    </body>
</html>