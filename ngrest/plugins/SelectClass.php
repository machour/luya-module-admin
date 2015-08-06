<?php

namespace admin\ngrest\plugins;

/**
 * @todo rename to SelectModel instead of SelectClass
 *
 * @author nadar
 */
class SelectClass extends \admin\ngrest\plugins\Select
{
    public function __construct($class, $valueField, $labelField, $initValue = null)
    {
        if (is_object($class)) {
            $class = $class::className();
        }

        $this->initValue = $initValue;
        
        foreach ($class::find()->all() as $item) {
            $this->data[] = [
                'value' => (int) $item->$valueField,
                'label' => $item->$labelField,
            ];
        }
    }
}
