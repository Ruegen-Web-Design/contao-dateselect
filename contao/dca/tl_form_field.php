<?php

$GLOBALS['TL_DCA']['tl_form_field']['palettes']['dateselect'] = '{type_legend},type,name,label;{fconfig_legend},mandatory,multiple,placeholder,date_format,order_time_from,order_time_until,exclude_week_days;{expert_legend:hide},value,class,accesskey,tabindex;{template_legend:hide},customTpl;{invisible_legend:hide},invisible';

$GLOBALS['TL_DCA']['tl_form_field']['fields']['date_format'] = [
    'exclude'       => true,
    'inputType'     => 'text',
    'eval'          => array('tl_class' => 'w50', 'helpwizard' => true),
    'explanation'   => 'dateFormat',
    'sql'           => "varchar(32) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['order_time_from'] = [
    'exclude'       => true,
    'inputType'     => 'text',
    'eval'          => array('tl_class' => 'w50', 'datepicker' => true),
    'sql'           => "varchar(255) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['order_time_until'] = [
    'exclude'       => true,
    'inputType'     => 'text',
    'eval'          => array('tl_class' => 'w50', 'datepicker' => true),
    'sql'           => "varchar(255) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['exclude_week_days'] = [
    'exclude'       => true,
    'inputType'     => 'checkbox',
    'options'       => array("1", "2", "3", "4", "5", "6", "0"),
    'reference'     => &$GLOBALS['TL_LANG']['DAYS'],
    'eval'          => array('multiple' => true, 'tl_class' => 'w50 clr'),
    'sql'           => 'blob NULL',
];
