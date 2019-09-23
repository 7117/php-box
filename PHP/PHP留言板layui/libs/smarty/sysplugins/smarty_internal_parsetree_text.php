<?php

/**
 * Smarty Internal Plugin Templateparser Parse Tree
 * These are classes to build parse tree in the template.clas parser
 *
 * @package    Smarty
 * @subpackage Compiler
 * @author     Thue Kristensen
 * @author     Uwe Tews
 *             *
 *             template.clas text
 * @package    Smarty
 * @subpackage Compiler
 * @ignore
 */
class Smarty_Internal_ParseTree_Text extends Smarty_Internal_ParseTree
{
    /**
     * Create template.clas text buffer
     *
     * @param string $data text
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Return buffer content
     *
     * @param \Smarty_Internal_Templateparser $parser
     *
     * @return string text
     */
    public function to_smarty_php(Smarty_Internal_Templateparser $parser)
    {
        return $this->data;
    }
}
