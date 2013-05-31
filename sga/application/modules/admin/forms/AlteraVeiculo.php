<?php

class Admin_Form_AlteraVeiculo extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	$marca = new Zend_Form_Element_Text('Marca');
    	$marca->setLabel('Marca:')
    	->setRequired(true)
    	->setAllowEmpty(true)
    	->setAttrib('size', 40)
    	->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    			array('Label', array('tag' => 'td')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	 
    	$modelo = new Zend_Form_Element_Text('Modelo');
    	$modelo->setLabel('Modelo:')
    	->setRequired(true)
    	->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    			array('Label', array('tag' => 'td')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	 
    	 
    	$placa = new Zend_Form_Element_Text('Placa');
    	$placa->setLabel('Placa:')
    	->setRequired(true)
    	->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    			array('Label', array('tag' => 'td')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	 
    	 
    	$cor = new Zend_Form_Element_Text('Cor');
    	$cor->setLabel('Cor:')
    	->setRequired(true)
    	->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    			array('Label', array('tag' => 'td')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	 
    	 
    	$cidade = new Zend_Form_Element_Text('Cidade');
    	$cidade->setLabel('Cidade:')
    	->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    			array('Label', array('tag' => 'td')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	
    	 
    	 
    	$estado = new Zend_Form_Element_Select('Estado_Id_Estado');
    	$estado->setLabel('Estado:')->setRequired(true)
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    			array('Label', array('tag' => 'td')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	 
    	$model = new Admin_Model_Estado();
    	$rows = $model->carregar();
    	
    	foreach ($rows as $row){
    		$estado->addMultiOption('','Selecione o estado')
    		->addMultiOption($row['Id_Estado'],$row['Sigla']);
    		 
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
    	 
    	$this->addElements(array($marca,$modelo,$cor,$estado,$cidade,$placa,$submit));
    	 
    	$this->setDecorators(array(
    			'FormElements',
    			array(array('data'=>'HtmlTag'),array('tag'=>'table')),
    			'Form'
    	));
    	 
    	$this->setAction('/sga/admin/veiculo/alterar');
    }


}

