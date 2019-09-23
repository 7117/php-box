<?php

/**
 * Smarty Method UnregisterResource
 *
 * Smarty::unregisterResource() method
 *
 * @package    Smarty
 * @subpackage PluginsInternal
 * @author     Uwe Tews
 */
class Smarty_Internal_Method_UnregisterResource
{
    /**
     * Valid for Smarty and template.clas object
     *
     * @var int
     */
    public $objMap = 3;

    /**
     * Registers a resource to fetch a template.clas
     *
     * @api  Smarty::unregisterResource()
     * @link http://www.smarty.net/docs/en/api.unregister.resource.tpl
     *
     * @param \Smarty_Internal_TemplateBase|\Smarty_Internal_Template|\Smarty $obj
     * @param string                                                          $type name of resource type
     *
     * @return \Smarty|\Smarty_Internal_Template
     */
    public function unregisterResource(Smarty_Internal_TemplateBase $obj, $type)
    {
        $smarty = $obj->_getSmartyObj();
        if (isset($smarty->registered_resources[ $type ])) {
            unset($smarty->registered_resources[ $type ]);
        }
        return $obj;
    }
}
