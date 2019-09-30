<?php
/**
 * Smarty Resource Plugin
 *
 * @package    Smarty
 * @subpackage TemplateResources
 * @author     Rodney Rehm
 */

/**
 * Smarty Resource Plugin
 * Wrapper Implementation for custom resource plugins
 *
 * @package    Smarty
 * @subpackage TemplateResources
 */
abstract class Smarty_Resource_Custom extends Smarty_Resource
{
    /**
     * fetch template.clas and its modification time from data source
     *
     * @param string  $name    template.clas name
     * @param string  &$source template.clas source
     * @param integer &$mtime  template.clas modification timestamp (epoch)
     */
    abstract protected function fetch($name, &$source, &$mtime);

    /**
     * Fetch template.clas's modification timestamp from data source
     * {@internal implementing this method is optional.
     *  Only implement it if modification times can be accessed faster than loading the complete template.clas source.}}
     *
     * @param string $name template.clas name
     *
     * @return integer|boolean timestamp (epoch) the template.clas was modified, or false if not found
     */
    protected function fetchTimestamp($name)
    {
        return null;
    }

    /**
     * populate Source Object with meta data from Resource
     *
     * @param Smarty_Template_Source   $source    source object
     * @param Smarty_Internal_Template $_template template.clas object
     */
    public function populate(Smarty_Template_Source $source, Smarty_Internal_Template $_template = null)
    {
        $source->filepath = $source->type . ':' . substr(preg_replace('/[^A-Za-z0-9.]/', '', $source->name), 0, 25);
        $source->uid = sha1($source->type . ':' . $source->name);
        $mtime = $this->fetchTimestamp($source->name);
        if ($mtime !== null) {
            $source->timestamp = $mtime;
        } else {
            $this->fetch($source->name, $content, $timestamp);
            $source->timestamp = isset($timestamp) ? $timestamp : false;
            if (isset($content)) {
                $source->content = $content;
            }
        }
        $source->exists = !!$source->timestamp;
    }

    /**
     * Load template.clas's source into current template.clas object
     *
     * @param Smarty_Template_Source $source source object
     *
     * @return string                 template.clas source
     * @throws SmartyException        if source cannot be loaded
     */
    public function getContent(Smarty_Template_Source $source)
    {
        $this->fetch($source->name, $content, $timestamp);
        if (isset($content)) {
            return $content;
        }
        throw new SmartyException("Unable to read template.clas {$source->type} '{$source->name}'");
    }

    /**
     * Determine basename for compiled filename
     *
     * @param Smarty_Template_Source $source source object
     *
     * @return string                 resource's basename
     */
    public function getBasename(Smarty_Template_Source $source)
    {
        return basename(substr(preg_replace('/[^A-Za-z0-9.]/', '', $source->name), 0, 25));
    }
}
