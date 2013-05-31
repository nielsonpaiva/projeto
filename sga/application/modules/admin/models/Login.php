<?php

class Admin_Model_Login {
	
	public static function login($login, $senha) {
		$model = new self;
		$dbAdapter = Zend_Db_Table::getDefaultAdapter ();
		// � iniciado o Zend_Auth que utilizar� o banco de dados
		$authAdapter = new Zend_Auth_Adapter_DbTable ( $dbAdapter );
		$authAdapter->setTableName ( 'usuario' )->setIdentityColumn ( 'E_mail' )->setCredentialColumn ( 'Senha' )->setCredentialTreatment ( 'SHA1(?)' );
		// seta os dados para processar o login
		$authAdapter->setIdentity ( $login )->setCredential ( $senha );
		// realiza a jun��o entre aos tabelas 'usu�rio' e 'perfil' no SELECT do
		// Auth_Adapter
		$select = $authAdapter->getDbSelect ();
		$select->join ( array ('p' => 'perfil' ), 'p.Id_Perfil = usuario.Perfil_Id_Perfil', array ('Nome_Perfil' => 'Perfil' ) );
		// inicia o login
		$auth = Zend_Auth::getInstance();
		$resultado = $auth->authenticate ( $authAdapter );
		// verifica se login foi processado com sucesso
		if ($resultado->isValid()) {
			// recupera o objeto do usu�rio, sem a senha,
			$info = $authAdapter->getResultRowObject ( null, 'Senha' );
			
			$usuario = new Admin_Model_Usuario ();
			$usuario->setUserId( $info->Id_Usuario );
			$usuario->setFullName ( $info->Nome );
			$usuario->setUserName ( $info->E_mail );
			$usuario->setRoleId ( $info->Nome_Perfil );
			
			$sessao = $auth->getStorage ();
			$sessao->write ( $usuario );
			// registra os dados na sess�o
			return true;
			
		
		}
		
		throw new Exception ($model->getMessages($resultado));
		// Se o login n�o realizar, retorna a mensagem de erro
	}

	public function getMessages(Zend_Auth_Result $resultado){
	
		switch ($resultado->getCode()){
			case $resultado::FAILURE_IDENTITY_NOT_FOUND:
				$msg = 'Login não encontrado';
				break;
			case $resultado::FAILURE_IDENTITY_AMBIGUOUS:
				$msg = 'Login em duplicidade';
				break;
			case $resultado::FAILURE_CREDENTIAL_INVALID:
				$msg = 'Senha não corresponde';
				break;
			default:
				$msg = 'Login ou Senha não encontrados';
				break;
		}
		return $msg;
	}
	
	
  

}

