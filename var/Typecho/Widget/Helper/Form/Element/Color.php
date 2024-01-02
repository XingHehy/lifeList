<?php

namespace Typecho\Widget\Helper\Form\Element;

use Typecho\Widget\Helper\Form\Element;
use Typecho\Widget\Helper\Layout;

if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}

class Color extends Element
{
    /**
     * 初始化当前输入项
     *
     * @param string|null $name 表单元素名称
     * @param array|null $options 选择项
     * @return Layout|null
     */
    public function input(?string $name = null, ?array $options = null): ?Layout
    {
        $input = new Layout('input', [
            'id' => $name . '-0-' . self::$uniqueId,
            'name' => $name,
            'type' => 'color',
            'class' => 'color'
        ]);
        
        $this->container($input);
        $this->label->setAttribute('for', $name . '-0-' . self::$uniqueId);
        $this->inputs[] = $input;

        return $input;
    }

    /**
     * 设置表单项默认值
     *
     * @param mixed $value 表单项默认值
     */
    protected function inputValue($value)
    {
        if (isset($value)) {
            $this->input->setAttribute('value', htmlspecialchars($value));
        } else {
            $this->input->removeAttribute('value');
        }
    }
}

