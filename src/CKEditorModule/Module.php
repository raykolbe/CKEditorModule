<?php

namespace CKEditorModule;

use Zend\Loader\AutoloaderFactory;
use Zend\Loader\StandardAutoloader;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;

class Module implements
    ConfigProviderInterface,
    ViewHelperProviderInterface,
    AutoloaderProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'ckeditor' => function($sm) {
                    $config = $sm->getServiceLocator()->get('config');
                    return new View\Helper\CKEditor(
                               new Options($config['ckeditor'])
                           );
                }
            )
        );
    }
    
    /**
     * {@inheritDoc}
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    /**
     * {@inheritDoc}
     */
    public function getAutoloaderConfig()
    {
        return array(
            AutoloaderFactory::STANDARD_AUTOLOADER => array(
                StandardAutoloader::LOAD_NS => array(
                    __NAMESPACE__ => __DIR__
                ),
            ),
        );
    }
}
