<?php

namespace CKEditorModule\View\Helper;

use CKEditorModule\Options;
use Zend\View\Helper\AbstractHelper;

class CKEditor extends AbstractHelper
{
    /**
     * An array key mappings to map our internal Options to CKEditor config
     * array options. Keys represent the internal option and value represents
     * the expected CKEditor key.
     * 
     * @var array
     */
    protected static $optionsToConfigMap = array(
        'skin'                         => 'skin',
        'toolbar'                      => 'toolbar',
        'width'                        => 'width',
        'height'                       => 'height',
        'language'                     => 'language',
        'ui_color'                     => 'uiColor',
        'format_tags'                  => 'format_tags',
        'styles_set'                   => 'stylesSet',
        'contents_css'                 => 'contentsCss',
        'filebrowser_browse_url'       => 'filebrowserBrowseUrl',
        'filebrowser_image_browse_url' => 'filebrowserImageBrowseUrl',
        'filebrowser_flash_browse_url' => 'filebrowserFlashBrowseUrl',
        'filebrowser_upload_url'       => 'filebrowserUploadUrl',
        'filebrowser_image_upload_url' => 'filebrowserImageUploadUrl',
        'filebrowser_flash_upload_url' => 'filebrowserFlashUploadUrl'
    );
    
    protected static $optionsToPrependBasePath = array(
        'contents_css',
        'filebrowser_browse_url',
        'filebrowser_image_browse_url',
        'filebrowser_flash_browse_url',
        'filebrowser_upload_url',
        'filebrowser_image_upload_url',
        'filebrowser_flash_upload_url'
    );
    
    /**
     * An options object.
     * 
     * @var \CKEditor\Options
     */
    protected $options = null;
    
    /**
     * Class constructor.
     * 
     * @param \CKEditor\Options $options
     */
    public function __construct(Options $options)
    {
       $this->options = $options;
    }
    
    /**
     * Invoke helper.
     * 
     * @param string $id The DOM ID to apply this editor to.
     * @param array $options An array of options specific to this instance.
     * @return string The HTML output.
     */
    public function __invoke($id, array $options = array())
    {
        return $this->getRenderedEditor($id, $options);
    }
    
    /**
     * Generates output needed for CKEditor.
     * 
     * @param string $id The DOM ID to apply this editor to.
     * @param array $options An array of options specific to this instance.
     * @return string The HTML output.
     */
    public function getRenderedEditor($id, array $options = array())
    {
        $config = clone $this->options;
        $config->setFromArray($options);
        
        $basePath = $this->getView()->basePath($config->getBasePath());
        $editor = new \CKEditor($basePath);
        
        return $editor->replace($id, $this->optionsToCKEditorConfig($config));
    }
    
    /**
     * Translates our internal Options object into a usable config array
     * for CKEditor.
     * 
     * @param \CKEditor\Options $options
     * @return array
     */
    protected function optionsToCKEditorConfig(Options $options)
    {
        $config = array();
        foreach ($options->toArray() as $key => $value) {
            if (!array_key_exists($key, static::$optionsToConfigMap)) {
                continue;
            }
            
            if (in_array($key, static::$optionsToPrependBasePath)) {
                if (is_array($value)) {
                    foreach ($value as &$deepValue) {
                        $deepValue = $this->view->basePath($deepValue);
                    }
                } else {
                    $value = $this->view->basePath($value);
                }
            }
            
            $config[static::$optionsToConfigMap[$key]] = $value;
        }
        
        return $config;
    }
}
