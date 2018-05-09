<?php

class DataAccess{
    private $connection;	
    
    function connect(){
        $bd= "projetopw";
		$user = "root";
        $pwd = "";
        $server = "localhost";
		
        $this->connection = mysqli_connect($server, $user, $pwd, $bd);
        
        //verificar se a conexão está bem aberta        
        if( mysqli_select_db($this->connection, $bd) == false){
            //erro
            die("Não conseguiu ligar-se à base de dados".mysqli_error($this->connection));            
			
        }else{
			
            mysqli_query($this->connection, "set names 'utf8'");
            mysqli_query($this->connection, "set character_set_connection=utf8");
            mysqli_query($this->connection, "set character_set_client=utf8");
            mysqli_query($this->connection, "set character_set_results=utf8");
        }        
    }
    
    function execute($query){
        $res = mysqli_query($this->connection, $query);
        if(!$res){
            die("Comando inválido".mysqli_error($this->connection));
        }else
            return $res;
    }
    
    function disconnect(){
		mysqli_close($this->connection);
    }
	
	   
    function login($email, $password){
        $query = "select *
					from utilizadores 
					where ut_email = '$email' and 
					ut_password = '$password'";
        $this->connect();
        $res = $this->execute($query);
        $this->disconnect();
        return $res;
    }
	
	function inserirUtilizador($name, $email,
							$password, $gender, $birthday, $image, $about){
		$query = "insert into utilizadores 
					(ut_name, ut_email, ut_password, ut_gender, ut_birthday, ut_idTipoUtilizador, ut_image, ut_about)
					values 
                    ('$name','$email','$password','$gender','$birthday', 2, '$image', '$about')";
		$this->connect();
        $this->execute($query);
        $this->disconnect();
    }
    
    function getUtilizador($ut_id){
		$query = "select * from utilizadores where ut_id = '$ut_id'";
		$this->connect();
        $res = $this->execute($query);
		$this->disconnect();
		return $res;
    }

    function saveBasicProfile($ut_id, $ut_name, $ut_gender, $ut_about){
		$query = "update utilizadores 
						set	
						ut_name = '$ut_name',
                        ut_gender = '$ut_gender',
                        ut_about = '$ut_about'
						where ut_id = '$ut_id'";
		//echo $query;
		$this->connect();
        $this->execute($query);
        $this->disconnect();
    }
    
    function changePicture($ut_id, $ut_image){
        $query = "update utilizadores 
						set	
						ut_image = '$ut_image'
                        where ut_id = '$ut_id'";
		//echo $query;
		$this->connect();
        $this->execute($query);
        $this->disconnect();
    }

    function editAdvancedProfile($ut_id, $ut_email, $ut_birthday, $oldPass, $newPass){
        $query = "update utilizadores 
						set	
                        ut_email = '$ut_email',
                        ut_birthday = '$ut_birthday'
                        where ut_id = '$ut_id'";
        $query2 = "select ut_password from utilizadores where ut_id = '$ut_id' ";
		$this->connect();
        $res = $this->execute($query);
        $res2 = $this->execute($query2);
        $row = mysqli_fetch_object($res2);
		$erro = false;
		if ($oldPass == $row->ut_password){
			//se estiver correta, edita-a para a nova pwd
			$query2 = "update utilizadores set
							ut_password  = '$newPass'
							where ut_id = $ut_id";
			$this->execute($query2);			
		}else{
			//else - dá erro!	
			$erro = true;
		}
		$this->disconnect();
		return $erro;
    }

    function getUsers(){
        $query = "select * from utilizadores";
		$this->connect();
		$res = $this->execute($query);
		$this->disconnect();
		return $res;
    }
}
?>