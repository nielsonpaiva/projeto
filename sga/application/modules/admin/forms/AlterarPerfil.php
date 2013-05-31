<?php

class Admin_Form_AlterarPerfil extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	$perfil = new Zend_Form_Element_Text('Perfil');
    	$perfil->setRequired(true)
    	->setAttrib('size', 20)
    	->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    			array('Label', array('tag' => 'td')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	
    	 
    	$submit = new Zend_Form_Element_Submit('Enviar');
    	$submit->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			'Errors', array(array('data'=>'HtmlTag'), array('tag' => 'td',
    					'colspan'=>'2','align'=>'center')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	
    	
    	 
    	$this->addElements(array($perfil,$submit));
    	 
    	$this->setDecorators(array(
    			'FormElements',
    			array(array('data'=>'HtmlTag'),array('tag'=>'table')),
    			'Form'
    	));
    	
    	$this->setAction('/sga/admin/perfil/alterar');
    }


}

