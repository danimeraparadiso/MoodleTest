<?php

class block_userinfo_edit_form extends block_edit_form
{
	protected function specific_definition($mform)
	{
		$mform->addElement("header", "configheader", get_string("blocksettings", "block"));

		$mform->addElement("text", "config_title", get_string("blocktitle", "block_userinfo"));
		$mform->setDefault("config_title", "defualt value");
		$mform->setType("config_title", PARAM_MULTILANG);
	}
}