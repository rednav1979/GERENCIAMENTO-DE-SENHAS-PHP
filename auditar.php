
<!DOCTYPE html>
<html>
<?php
session_start();
include('verifica_login.php');
?>


 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>



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

<body>

    <section class="hero is-success is-fullheight">
	
        
            <div class="container has-text-centered">			
                
                    <h1 class="title has-text-grey">MENU DE ACESSO</h1>
					<h2 class="title has-text-grey"><font size=4>[Tecnologia da Informação]</font></h2>                   
                    <div class="box">
                    <font size=1>
					<?php 
   include "sql.php";//conexão com o banco de dados
   
   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT * FROM control_passwords ORDER BY endereco_ip")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);


	   

         
	   print'<br>';	
	
	   print'<br>';	
	   	
           print'<table border="1"   bordercolor="#00BFFF" >';
	   print'<tr>';
	   print'<td><b>ID</td>';
	   print'<td><b>IP</td>';
	   print'<td><b>DESCRICAO</td>';
	   print'<td><b>SENHA</td>';
	   print'<td><b>ACESSO</td>';
	   print'<td><b>CRIADOR</td>';
	   print'<td><b>CADASTRADO</td>';	   
	   print'<td><b>IP_CADASTRO</td>';
	   print'<td><b>SOLICITACAO_IP</td>';
	   print'<td><b>SOLICITACAO_USUARIO</td>';
	   print'<td><b>SOLICITACAO_DATA</td>';
	   
	   

           
	   print'</tr></b>';

           for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */
           $id = @mysql_result($sqltudo, $j, "id");/*pegando os valores do banco referente ao evento*/
           $endereco_ip = @mysql_result($sqltudo, $j, "endereco_ip");
           $descricao = @mysql_result($sqltudo, $j, "descricao");		   
		   $senha = @mysql_result($sqltudo, $j, "senha");           
           $forma_acesso = @mysql_result($sqltudo, $j, "forma_acesso");           
           $usu_criacao = @mysql_result($sqltudo, $j, "usu_criacao");
           $data_criacao = @mysql_result($sqltudo, $j, "data_criacao");
		   $ip_criacao = @mysql_result($sqltudo, $j, "ip_criacao");
		   $usu_solicitacao = @mysql_result($sqltudo, $j, "usu_solicitacao");
		   $data_ultima_solicitacao = @mysql_result($sqltudo, $j, "data_ultima_solicitacao");
		   $ip_solicitacao = @mysql_result($sqltudo, $j, "ip_solicitacaoo");
           	       
       	 
	   /*print '<table border=1>';/*monta a tabela de eventos*/

	   print'<tr>';
	   print '<td>'.$id.'	</td>';
	   print '<td>'.$endereco_ip.'</td>';
	   print '<td>'.$descricao.'</td>';
	   print '<td align="center"><a href="sendmail.php?id='.$id.'"><b><font color=red>Solicitar</b></a></td>';	   
	   print '<td>'.$forma_acesso.'</td>';	   
	   print '<td>'.$usu_criacao.'</td>';
	   print '<td>'.$data_criacao.'</td>';	   
	   print '<td>'.$ip_criacao.'</td>';
	   print '<td>'.$ip_solicitacao.'</td>';
	   print '<td>'.$usu_solicitacao.'</td>';
	   print '<td>'.$data_ultima_solicitacao.'</td>';
	   	
	   print '</tr>';	
           }
	   print'</table>';

?>

						
                    </div>
                </div>
            </div>
        </div>
    </section>
	
<a href="menu.php">Voltar</a>
</body>

</html>