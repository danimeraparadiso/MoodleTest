<?php 

class userdata
{
	public function print_user_data()
	{
        global $CFG, $USER, $PAGE, $COURSE;
        $moodleVersion = $CFG->version;

		$phpVersion = phpversion();

        $userName = $USER->username;
        $userFirstName = $USER->firstname;
        $userLastName = $USER->lastname;
        $userCountry = $USER->country;
        $userCity = $USER->city;
        $userEmail = $USER->email;

		$user_picture = new user_picture($USER);
		$user_picture->size = 75;
		$src = $user_picture->get_url($PAGE);

		$editProfileUrl = $CFG->wwwroot . '/user/editadvanced.php?id=' . $USER->id . '&course=' . $COURSE->id;

		$html = <<<HTML
		<a href="$editProfileUrl">
			<img src="$src" alt="">
		</a>
		<br><b>Moodle Version</b>: $moodleVersion
		<br><b>PHP Version</b>: $phpVersion
		<br><b>User name</b>: $userName
		<br><b>First name</b>: $userFirstName
		<br><b>Last name</b>: $userLastName
		<br><b>Country</b>: $userCountry
		<br><b>City</b>: $userCity
		<br><b>Email</b>: $userEmail
HTML;

		return $html;
	}
}