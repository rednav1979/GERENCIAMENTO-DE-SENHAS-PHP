
<!DOCTYPE html>
<html>
<?php
session_start();
include('verifica_login.php');
?>


 <?php

include "sql.php";
       
if(isset($_POST['done'])){   

    $descricao = $_POST['descricao'];
	$senha = $_POST['senha'];
    $forma_acesso = $_POST['forma_acesso'];
    $endereco_ip = $_POST['endereco_ip'];	
    // AUDITORIA 
    $ip_criacao = $_SERVER['REMOTE_ADDR'];
    $usuario = $_SESSION['usuario'];	
	$mensagem_email= $usuario.", cadastrou uma senha para: ".$descricao.", no controle senhas caso deseje verificar utilize o seguinte link a seguir: http://intranet.lotisa.com.br";
    $recebe_email = "ti@lotisa.com.br";
    $cabecalho = "From: ti@lotisa.com.br" . "\r\n" . "Reply-To: ti@lotisa.com.br" . "\r\n";
    mail($recebe_email,"*** NOTIFICAÇÃO DE CADASTRO DE SENHAS ***",$mensagem_email,$cabecalho ) ;   

    if(empty($descricao) || empty($senha) || empty($endereco_ip)){

        $erro = "Atenção, você deve preencher todos os campos";

    }else{        

       $sql = mysql_query("INSERT INTO `control_passwords`(`descricao`, `senha`, `endereco_ip`, `forma_acesso`, `usu_criacao`,`ip_criacao`,`data_criacao`) VALUES ('$descricao', '$senha', '$endereco_ip','$forma_acesso','$usuario','$ip_criacao',now())") or die(mysql_error());

            if($sql){

                $erro2 = "Dados cadastrados com sucesso!";

              } else{

                  $erro = "Não foi possivel cadastrar os dados";

              }

    }

}

?>    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<script language="javascript" type="text/javascript">
function validar() {
var senha = form1.senha.value;
var rep_senha = form1.rep_senha.value;

if (senha != rep_senha) {
alert('Senhas diferentes');
form1.senha.focus();
return false;
}
}

function maiuscula(z){
        v = z.value.toUpperCase();
        z.value = v;
    }
	

	
</script>

<img src=css/logo.png><br>
Hoje, 
<script Language="JavaScript">
<!--
mydate = new Date();
myday = mydate.getDay();
mymonth = mydate.getMonth();
myweekday= mydate.getDate();
weekday= myweekday; 
myear = mydate.getFullYear();

if(myday == 0)
day = " Domingo, " 

else if(myday == 1)
day = " Segunda - Feira, " 

else if(myday == 2)
day = " Terça - Feira, " 

else if(myday == 3)
day = " Quarta - Feira, " 

else if(myday == 4)
day = " Quinta - Feira, " 

else if(myday == 5)
day = " Sexta - Feira, " 

else if(myday == 6)
day = " Sábado, " 

if(mymonth == 0)
month = "Janeiro " 

else if(mymonth ==1)
month = "Fevereiro " 

else if(mymonth ==2)
month = "Março " 

else if(mymonth ==3)
month = "Abril " 

else if(mymonth ==4)
month = "Maio " 

else if(mymonth ==5)
month = "Junho " 

else if(mymonth ==6)
month = "Julho " 

else if(mymonth ==7)
month = "Agosto " 

else if(mymonth ==8)
month = "Setembro " 

else if(mymonth ==9)
month = "Outubro " 

else if(mymonth ==10)
month = "Novembro " 

else if(mymonth ==11)
month = "Dezembro " 

document.write("<font face=arial, size=2>"+ day);
document.write(myweekday+" de "+month+ "</font>");
document.write(myear);
// -->
</script>
<p align=right>
<a href=logout.php>Sair</a>
</p>
<body>

    <section class="hero is-success is-fullheight">
	
        
            <div class="container has-text-centered">			
                <div class="column is-4 is-offset-4">
                    <h1 class="title has-text-grey">TITULO PRINCIAL</h1>
					<h2 class="title has-text-grey"><font size=4>[Tecnologia da Informação]</font></h2>                   
                    <div class="box">
                        <form name="form1" action="init.php" method="POST">
						<?php
if(isset($erro)){
    print '<div style="width:80%; background:red; color:Black; padding: 5px 0px 5px 0px; text-align:center; margin: 0 auto;">'.$erro.'</div>';
}
if(isset($erro2)){
    print '<div style="width:80%; background:green; color:Black; padding: 5px 0px 5px 0px; text-align:center; margin: 0 auto;">'.$erro2.'</div>';
}
?>	
                            <div class="field">
                                <div class="control">
                                    <input name="descricao" class="input is-large" placeholder="descricao" autofocus="" onkeyup="maiuscula(this)">
									<input name="senha" type="password"  class="input is-large" placeholder="senha" autofocus="">
									<input type="password" name="rep_senha" id="rep_senha" class="input is-large" placeholder="rep_senha" autofocus="">
									<input name="endereco_ip"  class="input is-large" placeholder="endereco_ip" autofocus="">
									<select name="forma_acesso" class="input is-large" placeholder="forma_acesso" autofocus="" >
									<option>SELECIONE</option>
									<option>WTS</option>
									<option>SSH</option>
									<option>WEB</option>
									<option>VSPHERE </option>
									<option>DIRETORIODE UNC</option>
									<option>CONSOLE</option>
									</select>
                                </div>
                            </div>
                            
                            <button type="submit" onclick="return validar()" class="button is-block is-link is-large is-fullwidth">CADASTRAR</button><input type="hidden" name="done"  value="" />
                        </form>
						
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	

<br>
<a href="menu.php">Voltar</a>
</body>

</html>