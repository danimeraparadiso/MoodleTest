<?php

$settings->add(new admin_setting_heading(
            'headerconfig',
            get_string('headerconfig', 'block_userinfo'),
            get_string('descconfig', 'block_userinfo')
        ));
 
$settings->add(new admin_setting_configcheckbox(
            'userinfo/centerIMG',
            get_string('labelallowhtml', 'block_userinfo'),
            get_string('descallowhtml', 'block_userinfo'),
            '0'
        ));
 
$settings->add(new admin_setting_configcheckbox(
            'userinfo/showHeader',
            get_string('labelshowheader', 'block_userinfo'),
            get_string('descshowheader', 'block_userinfo'),
            '0'
        ));