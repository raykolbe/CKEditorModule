<?php

namespace CKEditorModule;

use Zend\Stdlib\AbstractOptions;

/**
 * Options class with sane defaults to allow setting config options on
 * CKEDITOR (e.g. basePath) and CKEDITOR.config.
 * 
 * @todo Implement all CKEDITOR.config options.
 * @see http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html
 */
class Options extends AbstractOptions
{
    protected $basePath = '/js/ckeditor/';
    protected $skin = 'moono';
    protected $toolbar = 'Full';
    protected $width = 20;
    protected $height = '';
    protected $language = '';
    protected $uiColor = '';
    protected $formatTags = 'p;h1;h2;h3;h4;h5;h6;pre;address;div';
    protected $stylesSet = 'default';
    protected $contentsCss = '/js/ckeditor/contents.css';
    protected $filebrowserBrowseUrl = '';
    protected $filebrowserImageBrowseUrl = '';
    protected $filebrowserFlashBrowseUrl = '';
    protected $filebrowserUploadUrl = '';
    protected $filebrowserImageUploadUrl = '';
    protected $filebrowserFlashUploadUrl = '';
    
    public function getBasePath()
    {
        return $this->basePath;
    }
    
    public function setBasePath($path)
    {
        $this->basePath = $path;
        return $this;
    }
    
    public function getSkin()
    {
        return $this->skin;
    }
    
    public function setSkin($skin)
    {
        $this->skin = $skin;
        return $this;
    }
    
    public function getToolbar()
    {
        return $this->toolbar;
    }
    
    public function setToolbar($toolbar)
    {
        $this->toolbar = $toolbar;
        return $this;
    }
    
    public function getWidth()
    {
        return $this->width;
    }
    
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }
    
    public function getLanguage()
    {
        return $this->language;
    }
    
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }
    
    public function getUiColor()
    {
        return $this->uiColor;
    }
    
    public function setUiColor($color)
    {
        $this->uiColor = $color;
        return $this;
    }
    
    public function getFormatTags()
    {
        return $this->formatTags;
    }
    
    public function setFormatTags($tags)
    {
        $this->formatTags = $tags;
        return $this;
    }
    
    public function getStylesSet()
    {
        return $this->stylesSet;
    }
    
    public function setStylesSet($styles)
    {
        $this->stylesSet = $styles;
        return $this;
    }
    
    public function getContentsCss()
    {
        return $this->contentsCss;
    }
    
    public function setContentsCss($css)
    {
        $this->contentsCss = $css;
        return $this;
    }
    
    public function getFilebrowserBrowseUrl()
    {
        return $this->filebrowserBrowseUrl;
    }
    
    public function setFilebrowserBrowseUrl($url)
    {
        $this->filebrowserBrowseUrl = $url;
        return $this;
    }
    
    public function getFilebrowserImageBrowseUrl()
    {
        return $this->filebrowserImageBrowseUrl;
    }
    
    public function setFilebrowserImageBrowseUrl($url)
    {
        $this->filebrowserImageBrowseUrl = $url;
        return $this;
    }
    
    public function getFilebrowserFlashBrowseUrl()
    {
        return $this->filebrowserFlashBrowseUrl;
    }
    
    public function setFilebrowserFlashBrowseUrl($url)
    {
        $this->filebrowserFlashBrowseUrl = $url;
        return $this;
    }
    
    public function getFilebrowserUploadUrl()
    {
        return $this->filebrowserUploadUrl;
    }
    
    public function setFilebrowserUploadUrl($url)
    {
        $this->filebrowserUploadUrl = $url;
        return $this;
    }
    
    public function getFilebrowserImageUploadUrl()
    {
        return $this->filebrowserImageUploadUrl;
    }
    
    public function setFilebrowserImageUploadUrl($url)
    {
        $this->filebrowserImageUploadUrl = $url;
        return $this;
    }
    
    public function getFilebrowserFlashUploadUrl()
    {
        return $this->filebrowserFlashUploadUrl;
    }
    
    public function setFilebrowserFlashUploadUrl($url)
    {
        $this->filebrowserFlashUploadUrl = $url;
        return $this;
    }
}
