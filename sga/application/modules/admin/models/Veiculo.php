<?php

class Admin_Model_Veiculo extends Zend_Db_Table_Abstract
{
	protected $_name = 'Veiculo';
	protected $_primary = 'Id_Veiculo';
	
	public function listarVeiculos(){
	
		
		$sql = $this->select()->setIntegrityCheck(false)
		->from($this->_name,array('Id_Veiculo'))
		->columns(array('Marca','Modelo','Preco','Foto','Cor'))
		->join('Estado','Veiculo.Estado_Id_Estado = Estado.Id_Estado',array('Nome','Sigla'))
		->order("Id_Veiculo desc")
		->group('Veiculo.Id_Veiculo')
		->limit(20);
		 
		return $this->fetchAll($sql)->toArray();
		 
	}
	
	public function listar(){
	
	
		$sql = $this->select()->setIntegrityCheck(false)
		->from($this->_name,array('Id_Veiculo'))
		->columns(array('Id_Veiculo','Marca','Modelo','Cidade','Cor','Preco','Foto'))
		->join('Estado','Veiculo.Estado_Id_Estado = Estado.Id_Estado',array('Nome','Sigla'))
		->join('Fornecedor','Veiculo.Fornecedor_CNPJ = Fornecedor.CNPJ','Razao_Social')
		->order("Id_Veiculo asc")
		->group('Veiculo.Id_Veiculo')
		->limit(20);
			
		return $this->fetchAll($sql)->toArray();
			
	}
public function inserir(Array $dados){
  	try {
  		$dados = self::colunas($dados);
  		return parent::insert($dados);
  	} catch (Exception $e) {
  		echo $e->getMessage();
  	}
  
  }
  
  /**Método que coloca apenas dados referente a tabela do banco
   * @param array $dados os dados a serem verificados
   * return array
   **/
  protected function colunas(Array $dados){
  	$ret = array();
  	foreach ($dados as $coluna=>$valor) {
  		if(in_array($coluna, $this->_getCols()))
  	    $ret[$coluna] = $valor;
  	}
  	
  	return $ret;
  }
  
  
  
  public function busca($id){
  	try{
  		$sql =  $this->select()
  		->where('Id_Veiculo = ?', $id);
  		$row = $this->fetchRow($sql);
  		if(null !== $row)
  			return $row->toArray();
  	}catch(Exception $e){
  		return $e->getMessage();
  	}
  }
  public function delete($id){
  	try {
  		$where = $this->getAdapter()->quoteInto("Id_Veiculo = ?", $id);
  		return parent::delete($where);
  	} catch (Exception $e) {
  		echo $e->getMessage();
  	}
  }
  
  public function upload($filename){
  	try{
  	$imageAdapter = new Zend_File_Transfer_Adapter_Http();
  	$imageAdapter->setDestination('C:\Program Files\Zend\Apache2\htdocs\sga\public\imagem');
  	
  	if(is_uploaded_file($_FILES['foto']['tmp_name'])){
  	
  		if (!$imageAdapter->receive('foto')){
  			$messages = $imageAdapter->getMessages['foto'];
  	
  			//A Imagem Não Foi Recebida Corretamente
  		}else{
  			//Arquivo Enviado Com Sucesso
  			//Realize As Ações Necessárias Com Os Dados
  	
  				
  			$filename = $imageAdapter->getFileName('foto');
  	
  
  		}
  	}
  }catch (Exception $e){
  	echo $e->getMessage();
  }
}

}