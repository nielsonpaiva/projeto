<?php

class Admin_Form_Login extends Zend_Form {
	
	public function init() {
		/*
		 * Form Elements & Other Definitions Here ...
		 */
		
		$this->setName ( 'login' ); // nome do form
		
		$login = new Zend_Form_Element_Text ( 'login' ); // campo de texto
		$login->setLabel ( 'Login:' )->setRequired ( true )->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' );
		      
		$login->setDecorators(array(
				'ViewHelper',
				'Description',
				'Errors',
				array(array('data'=>'HtmlTag'), array('tag' => 'td')),
				array('Label', array('tag' => 'td')),
				array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
		));//alinha o label e o input, um em cada coluna 
		
		$senha = new Zend_Form_Element_Password ( 'senha' );
		$senha->setLabel ( 'Senha:' )->setRequired ( true )->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' );
		
		$senha->setDecorators(array(
                   'ViewHelper',
                   'Description',
                   'Errors',
                   array(array('data'=>'HtmlTag'), array('tag' => 'td')),
                   array('Label', array('tag' => 'td')),
                   array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));//alinha o label e o input, um em cada coluna 
		
		$submit = new Zend_Form_Element_Submit ( 'submit' );
		$submit->setLabel ( 'Logar' )->setAttrib ( 'id', 'submitbutton' );
		$submit->setDecorators(array(
				'ViewHelper',
				'Description',
				'Errors', array(array('data'=>'HtmlTag'), array('tag' => 'td',
						'colspan'=>'2','align'=>'center')),
				array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
		
		
		
		));//mescla duas colunas e centraliza o botão
		
		
		$this->addElements ( array ($login, $senha, $submit ) );
		
		$this->setDecorators(array(
				'FormElements',
				array(array('data'=>'HtmlTag'),array('tag'=>'table')),
				'Form'
		));//abre e fecha a tag <table> para o formulário
	
	}

}

