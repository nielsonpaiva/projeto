<?php

class Admin_Form_UploadImagemVeiculo extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	// Seta a action do formulário
    	$this->setAction('');
    	
    	// Seta o método de envio do formulário como POST
    	$this->setMethod( Zend_Form::METHOD_POST );
    	
    	// Seta o enctype do formulário para upload de arquvos
    	$this->setEnctype( Zend_form::ENCTYPE_MULTIPART );
    	
    	// Inicia aqui a criação e configuração do campo file_image
    	$foto   = new Zend_Form_Element_File('foto');
    	$foto ->setLabel('Selecione a imagem:')
    	->setRequired(true);
    	//->addValidator( new Zend_Validate_File_Extension('jpeg','jpg','gif','png') );
    	
    	// Inicia aqui a criação e configuração do botão de submit
    	$submit = new Zend_Form_Element_Submit('submit');
    	$submit->setLabel('Fazer upload');
    	
    	// Adiciona os elementos ao formulário
    	$this->addElements(array(
    			$foto,
    			$submit
    	));
    }


}

