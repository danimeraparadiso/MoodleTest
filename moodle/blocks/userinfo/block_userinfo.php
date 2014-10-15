<?php

class block_userinfo extends block_base 
{
	protected $centerImage = '';
	protected $showHeader = false;

    public function init() 
    {
        $this->title = get_string('userinfo', 'block_userinfo');
    }

	public function hide_header() 
	{
		$config = get_config('userinfo', 'showHeader');
		if($config == "1")
		{
			$this->showHeader = true;
		}
		/* false = the title is show*/
		return $this->showHeader;
	}

	public function instance_allow_multiple()
	{
		return false;
	}

	public function has_config()
	{
		return true;
	}

    public function specialization()
    {
		if (!empty($this->config->title)) 
		{
		    $this->title = $this->config->title;
		}
		else
		{
			$this->title = get_string('userinfo', 'block_userinfo');
		}
    }

	public function get_content()
	{
		if ($this->content !== null)
		{
			return $this->content;
		}

		$this->content = new stdClass;

        if(isloggedin())
        {
			$this->content->text = $this->print_user_data();
        }

		return $this->content;
	}

	protected function print_user_data()
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
	
		$config = get_config('userinfo', 'centerIMG');
		if($config == "1")
		{
			$this->centerImage = 'display:block;margin-left:auto;margin-right:auto;';
		}

		$editProfileUrl = $CFG->wwwroot . '/user/editadvanced.php?id=' . $USER->id . '&course=' . $COURSE->id;

		$html = <<<HTML
		<a href="$editProfileUrl">
			<img src="$src" alt="" style="$this->centerImage">
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

	public function is_empty()
	{
		$this->get_content();
		return (empty($this->content->text) && empty($this->content->footer));
	}

	public function applicable_formats()
	{
		return array('all' => true);
	}

}