<?php

class Admin_Form_InserirUsuario extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	
    	$cpf = new Zend_Form_Element_Text('CPF');
    	$cpf->setLabel('CPF:')
    	->setRequired(true)
    	->setAttrib('size', 40)
    	->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			'Errors',
    			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    			array('Label', array('tag' => 'td')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	
    	$nome = new Zend_Form_Element_Text('Nome');
    	$nome->setLabel('Nome:')
    	->setRequired(true)
    	->setAttrib('size', 40)
    	->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			'Errors',
    			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    			array('Label', array('tag' => 'td')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	
    	$endereco = new Zend_Form_Element_Text('Endereco');
    	$endereco->setLabel('Endereço:')
    	->setRequired(true)
    	->setAttrib('size', 40)
    	->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			'Errors',
    			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    			array('Label', array('tag' => 'td')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	
    	$numero = new Zend_Form_Element_Text('Numero');
    	$numero->setLabel('Número:')
    	->setRequired(true)
    	->setAttrib('size', 40)
    	->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			'Errors',
    			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    			array('Label', array('tag' => 'td')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	
    	$data = new Zend_Form_Element_Text('Data_nascimento');
    	$data->setLabel('Data de nascimento:')
    	->setRequired(true)
    	->setAttrib('size', 15)
    	->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			'Errors',
    			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    			array('Label', array('tag' => 'td')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	
    	 
    	$sexo = new Zend_Form_Element_Radio('Sexo');
    	$sexo->setLabel('Sexo:')
    	->setRequired(true)
    	->addMultiOptions(array(
    			'M' => 'Masculino',
    			'F' => 'Feminino'))
    	->setAttrib('size', 15)
    	->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			'Errors',
    			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    			array('Label', array('tag' => 'td')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	
    	$telefone = new Zend_Form_Element_Text('Telefone');
    	$telefone->setLabel('Telefone:')
    	->setRequired(true)
    	->setAttrib('size', 15)
    	->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			'Errors',
    			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    			array('Label', array('tag' => 'td')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	
    	$email = new Zend_Form_Element_Text('E_mail');
    	$email->setLabel('E-mail:')
    	->setRequired(true)
    	->setAttrib('size', 30)
    	->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			'Errors',
    			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    			array('Label', array('tag' => 'td')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	
    	$senha = new Zend_Form_Element_Password('Senha');
    	$senha->setLabel('Senha:')
    	->setRequired(true)
    	->setAttrib('size', 20)
    	->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			'Errors',
    			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    			array('Label', array('tag' => 'td')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	
    	$profissao = new Zend_Form_Element_Text('Profissao');
    	$profissao->setLabel('Profissão:')
    	->setRequired(true)
    	->setAttrib('size', 15)
    	->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			'Errors',
    			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    			array('Label', array('tag' => 'td')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	
    	$perfil = new Zend_Form_Element_Select('Perfil_Id_Perfil');
    	$perfil->setLabel('Perfil:')->setRequired(true)
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			'Errors',
    			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    			array('Label', array('tag' => 'td')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	 
    	$model = new Admin_Model_Perfil();
    	$rows = $model->carregar();
    	
    	foreach ($rows as $row){
    		$perfil->addMultiOption('','Selecione o perfil')
    		->addMultiOption($row['Id_Perfil'],$row['Perfil']);
    	
    	}
    	 
    	$submit = new Zend_Form_Element_Submit('Enviar');
    	$submit->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			'Errors', array(array('data'=>'HtmlTag'), array('tag' => 'td',
    					'colspan'=>'2','align'=>'center')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	
    	$reset = new Zend_Form_Element_Reset('Limpar');
    	$reset->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			'Errors', array(array('data'=>'HtmlTag'), array('tag' => 'td',
    					'colspan'=>'2','align'=>'center')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	 
    	$this->addElements(array($cpf,$nome,$endereco,$numero,$telefone,$sexo,$data,$email,$senha,$profissao,$perfil,$submit,$reset));
    	 
    	$this->setDecorators(array(
    			'FormElements',
    			array(array('data'=>'HtmlTag'),array('tag'=>'table')),
    			'Form'
    	));
    	 
    	$this->setAction('/sga/admin/usuario/inserir');
    }


}

