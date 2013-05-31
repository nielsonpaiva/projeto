<?php

class Admin_Form_AlteraFornecedor extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
                     $razao_social = new Zend_Form_Element_Text('Razao_Social');
    	             $razao_social->setLabel('Razão Social')
    	             ->setRequired(true)
    	             ->setAttrib('size', 20)
    	             ->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
    	             ->setDecorators(array(
    	             		'ViewHelper',
    	             		'Description',
    	             		array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    	             		array('Label', array('tag' => 'td')),
    	             		array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	             
    	             $endereco = new Zend_Form_Element_Text('Endereco');
    	             $endereco->setLabel('Endereço')
    	             ->setRequired(true)
    	             ->setAttrib('size', 40)
    	             ->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
    	             ->setDecorators(array(
    	             		'ViewHelper',
    	             		'Description',
    	             		array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    	             		array('Label', array('tag' => 'td')),
    	             		array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	              
    	             $numero = new Zend_Form_Element_Text('Numero');
    	             $numero->setLabel('Número')
    	             ->setRequired(true)
    	             ->setAttrib('size', 10)
    	             ->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
    	             ->setDecorators(array(
    	             		'ViewHelper',
    	             		'Description',
    	             		array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    	             		array('Label', array('tag' => 'td')),
    	             		array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	              
    	             $telefone = new Zend_Form_Element_Text('Telefone');
    	             $telefone->setLabel('Telefone')
    	             ->setRequired(true)
    	             ->setAttrib('size', 20)
    	             ->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
    	             ->setDecorators(array(
    	             		'ViewHelper',
    	             		'Description',
    	             		array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    	             		array('Label', array('tag' => 'td')),
    	             		array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	              
    	             $cidade = new Zend_Form_Element_Text('Cidade');
    	             $cidade->setLabel('Cidade:')
    	             ->setRequired(true)
    	             ->setAttrib('size', 30)
    	             ->addFilter ( 'StripTags' )->addFilter ( 'StringTrim' )->addValidator ( 'NotEmpty' )
    	             ->setDecorators(array(
    	             		'ViewHelper',
    	             		'Description',
    	             		array(array('data'=>'HtmlTag'), array('tag' => 'td')),
    	             		array('Label', array('tag' => 'td')),
    	             		array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	              
    	             $email = new Zend_Form_Element_Text('E_mail');
    	             $email->setLabel('E-mail')
    	             ->setRequired(true)
    	             ->setAttrib('size', 40)
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
    			            'Errors',
    	             		'Description', array(array('data'=>'HtmlTag'), array('tag' => 'td',
    	             				'colspan'=>'2','align'=>'center')),
    	             		array(array('row'=>'HtmlTag'),array('tag'=>'tr'))));
    	             
    	             $this->addElements(array($razao_social,$endereco,$telefone,$numero,$cidade,$email,$estado,$submit));
    	             
    	             
    	             $this->setDecorators(array(
    	             		'FormElements',
    	             		array(array('data'=>'HtmlTag'),array('tag'=>'table')),
    	             		'Form'
    	             ));
    	             
    	             $this->setAction('/sga/admin/fornecedor/alterar');
    }


}

