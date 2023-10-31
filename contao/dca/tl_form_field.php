<?php

$GLOBALS['TL_DCA']['tl_form_field']['palettes']['dateselect'] = '{type_legend},type,name,label;{fconfig_legend},mandatory,multiple,placeholder,order_time_from,order_time_until,exclude_week_days;{expert_legend:hide},value,class,accesskey,tabindex;{template_legend:hide},customTpl;{invisible_legend:hide},invisible';

$GLOBALS['TL_DCA']['tl_form_field']['fields']['order_time_from'] = [
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => ['tl_class' => 'w50 clr', 'datepicker' => true],
    'sql'       => 'text NULL',
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['order_time_until'] = [
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => ['tl_class' => 'w50', 'datepicker' => true],
    'sql'       => 'text NULL',
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['exclude_week_days'] = [
    'exclude'   => true,
    'inputType' => 'checkbox',
    'options'   => array("1", "2", "3", "4", "5", "6", "0"),
    'reference' => &$GLOBALS['TL_LANG']['DAYS'],
    'eval'      => ['multiple' => true, 'tl_class' => 'w50 clr'],
    'sql'       => ['type' => 'blob'],
];
