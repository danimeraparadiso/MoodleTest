<?php

require_once('../../config.php');
require_once('userdata.php');

// admin_externalpage_setup('userdata');
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_title("User Data");
$PAGE->set_heading("User Data");
$PAGE->set_url($CFG->wwwroot . '/userdata.php');


echo $OUTPUT->header();

// Actual content goes here
if(isloggedin())
{
	$userdata = new userdata();
	echo $userdata->print_user_data();
}
else
{
	global $CFG;
	header("Location: " . $CFG->wwwroot . "/login/index.php");
}

echo $OUTPUT->footer();

?>