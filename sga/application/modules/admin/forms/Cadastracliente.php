<?php

class Admin_Form_Cadastracliente extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	
    	
    	$id = new Zend_Form_Element_Text('Id_Cliente');
    	$id->setLabel('Id:')
    	->setRequired(true)
    	->setAllowEmpty(true)
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			array(array('inner'=>'HtmlTag'),array('tag'=>'div')),
    			array('label',array('tag'=>'p')),
    			array(array('out'=>'HtmlTag'),array('tag'=>'div','class'=>'out'))
    	));
    	
    	$nome = new Zend_Form_Element_Text('Nome');
    	$nome->setLabel('Nome:')
    	->setRequired(true)
    	->setAllowEmpty(true)
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			array(array('inner'=>'HtmlTag'),array('tag'=>'div')),
    			array('label',array('tag'=>'p')),
    			array(array('out'=>'HtmlTag'),array('tag'=>'div','class'=>'out'))
    	));
    	//setDecorators()-> Configura��o do decorator para cada elemento do formul�rio
    	
    	
    		
    		
    		
    		
    	$submit = new Zend_Form_Element_Submit('Enviar');
    	$submit->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			array(array('inner'=>'HtmlTag'),array('tag'=>'div')),
    			array(array('out'=>'HtmlTag'),array('tag'=>'div','class'=>'out'))));
    		
    	$reset = new Zend_Form_Element_Reset('Limpar');
    	
    		
    	$this->addElements(array($id,$nome,$submit));
    		
    		
    	$this->setDecorators(array(
    			'FormElements',
    			array('HtmlTag',array('tag'=>'div','id'=>'meu')),
    			'Form'
    	));
    		
    		
    	$this->setAction('/sga/cliente/inserir');
    	
    	
    	
    	}
    }




