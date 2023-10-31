<?php

declare(strict_types=1);

namespace RuegenWebDesign\DateselectBundle\Widget;

use Contao\FormSelect;
use Contao\FormSelectMenu;

// Backwards compatibility for Contao 4.13
// The FormSelectMenu class was renamed to FormSelect in Contao 5.0
if (!class_exists(FormSelect::class)) {
    class_alias(FormSelectMenu::class, FormSelect::class);
}

class FormDateSelect extends FormSelect
{
    private ?int $startDate;
    private ?int $endDate;

    public function addAttributes($arrAttributes): void
    {
        parent::addAttributes($arrAttributes);

        $options = [['label' => ($this->placeholder ?? '-'), 'value' => '']];

        if ($this->order_time_from && $this->order_time_until) {
            $joint = mktime(0, 0, 0, intval(date('m', time())), intval(date('d', time())), intval(date('Y', time())));

            $time_ab = explode(".", $this->order_time_from);
            $time_ab = mktime(0, 0, 0, intval($time_ab[1]), intval($time_ab[0]), intval($time_ab[2]));

            if ($joint >= $time_ab - (60 * 60 * 24)) {
                $this->order_time_from = date('d', time()) . '.' . date('m', time()) . '.' . date('Y', time());
            }

            $startDate = date_create($this->order_time_from);
            $endDate = date_create($this->order_time_until);

            if ($this->order_time_from !== $this->order_time_until) {
                while ($startDate <= $endDate) {
                    $time = explode(".", $startDate->format('d.m.Y'));
                    $time = mktime(0, 0, 0, intval($time[1]), intval($time[0]), intval($time[2]));
                    $ordertime = \Contao\Date::parse('d.m.Y', $time);
                    $day = \Contao\Date::parse('l', $time);
                    $dayNumber = \Contao\Date::parse('w', $time);

                    if (!in_array($dayNumber, \StringUtil::deserialize($this->exclude_week_days, true))) {
                        $options[] = ['label' => $day . ', ' . $ordertime, 'value' => $ordertime];
                    }

                    $startDate = date_modify($startDate, '+1 day');
                }
            }
        }

        $this->arrOptions = $options;
    }

    /**
     * Override method to disable the separator option
     */
    protected function isSelected($arrOption)
    {
        if ('' === ($arrOption['value'] ?? null) && '---' === ($arrOption['label'] ?? null)) {
            return ' disabled';
        }

        return parent::isSelected($arrOption);
    }
}
