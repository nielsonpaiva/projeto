<?php

class Admin_Form_InserirFornecedor extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	
    	$cnpj = new Zend_Form_Element_Text('cnpj');
    	$cnpj->setLabel('CNPJ:')
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

    	$razao_social = new Zend_Form_Element_Text('razao_social');
    	$razao_social->setLabel('Razão Social:')  
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

    	$endereco = new Zend_Form_Element_Text('endereco');
    	$endereco->setLabel('Endereço')
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
    	
        $numero = new Zend_Form_Element_Text('numero');
        $numero->setLabel('Número')
               ->setRequired(true)
               ->setAttrib('size', 10)
               ->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
               ->setDecorators(array(
               		'ViewHelper',
               		'Description',
               		'Errors',
               		array(array('data'=>'HtmlTag'), array('tag' => 'td')),
               		array('Label', array('tag' => 'td')),
               		array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
               
        $telefone = new Zend_Form_Element_Text('telefone');
        $telefone->setLabel('Telefone')
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
                 
        $cidade = new Zend_Form_Element_Text('cidade');
        $cidade->setLabel('Cidade:')
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
               
        $email = new Zend_Form_Element_Text('e_mail');
        $email->setLabel('E-mail')
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
              
        $estado = new Zend_Form_Element_Select('estado_id_estado');
        $estado->setLabel('Estado:')->setRequired(true)
        ->setDecorators(array(
        		'ViewHelper',
        		'Description',
        		'Errors',
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
        
        $this->addElements(array($cnpj,$razao_social,$endereco,$telefone,$numero,$cidade,$email,$estado,$submit,$reset));
        

        $this->setDecorators(array(
        		'FormElements',
        		array(array('data'=>'HtmlTag'),array('tag'=>'table')),
        		'Form'
        ));
        
        $this->setAction('/sga/admin/fornecedor/inserir');
              
              
    	         
    }


}

