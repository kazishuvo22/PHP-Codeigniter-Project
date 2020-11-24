<script>
	//functions to get user active time
	var timer;
	var timeStart;
	var timeSpentOnSite = getTimeSpentOnSite();
	var id = "<?php echo $this->session->userdata('id');?>";
	var pageurl = "<?php echo current_url();?>";

	//check if the value inside the variable is number and convert to string
	function getTimeSpentOnSite() {
		timeSpentOnSite = parseInt(timeSpentOnSite);
		timeSpentOnSite = isNaN(timeSpentOnSite) ? 0 : timeSpentOnSite;
		return timeSpentOnSite;
	}
	//start the timer when the body tag loads
	function start_timer() {
		timerStart = Date.now();
		timer = setInterval(function () {
			timeSpentOnSite = getTimeSpentOnSite() + (Date.now() - timerStart);
			timerStart = parseInt(Date.now());
		}, 1000);
	}
	//update to database when the body unloads
	function set_active_time() {
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('Users/set_active_time') ?>",
			dataType: "json",
			data: {
				id: id,
				pageurl: pageurl,
				timeSpentOnSite: timeSpentOnSite,
			},
			success: function (data) {
				alert("I got a view");
			}
		});
	}

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>

</body>
<script src="<?= base_url("assets/js/popper.min.js"); ?>"></script>
<script src="<?= base_url("assets/js/bootstrap.min.js"); ?>"></script>

</html>