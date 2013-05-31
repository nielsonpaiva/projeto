<?php

class Default_Form_SolicitaVeiculo extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	$modalidade = new Zend_Form_Element_Text('modalidade_servico_id_modalidade');
    	$modalidade->setLabel('Modalidade:')
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
    	
    	$veiculo = new Zend_Form_Element_Text('veiculo_id_veiculo');
    	$veiculo->setLabel('Modelo:')
    	->setRequired(true)
    	->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
    	->setDecorators(array(
    			'ViewHelper',
    			'Description',
    			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    			array('Label', array('tag' => 'td')),
    			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	
    	
    	$usuario = new Zend_Form_Element_Text('usuario_id_usuario');
    	$usuario->setLabel('Cliente:')
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

