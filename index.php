<?php
	//functions
	require "Include/functions.php";

	$monthTime = getMonthTime();

	echo "<link rel='stylesheet' href='Assets/css/style.css'/>";

	/* header */
	echo "<header>";
	echo " <a href=?month=".prevMonth($monthTime).">Anterior</a>";
	echo " <h1>".date("F Y", $monthTime)."</h1>";
	echo " <a href=?month=".nextMonth($monthTime).">Próximo</a>";
	echo "</header>";

	/* section */
	echo "<section>";
	echo "<table>";
	echo "<thead>";
	echo "<tr>";
	echo "<th>DOM</th>";
	echo "<th>SEG</th>";
	echo "<th>TER</th>";
	echo "<th>QUA</th>";
	echo "<th>QUI</th>";
	echo "<th>SEX</th>";
	echo "<th>SAB</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";

	$inicio_data = strtotime("last sunday", $monthTime);

	//inicia contador for criando linhas dinâmicamente sendo 6 no total para calendario
	for ($row=0; $row < 6; $row++) { 
		
		echo "<tr>";
		
		//inicia contador for novamente criando células de dados em cada linha(td) sendo 7 no total
		for ($column=0; $column < 7; $column++) { 
			
			if(date("Y-m", $inicio_data) !== date("Y-m", $monthTime)) {

				echo "<td class='other-month'>".date("j", $inicio_data)."</td>";

			}else {

				echo "<td>".date("j", $inicio_data)."</td>";

			}

			//incrementa $inicio_data adicionando um dia a mais
			$inicio_data = strtotime("+1 day", $inicio_data);

		}

		echo "</tr>";

	}

	echo "</tbody>";
	echo "</table>";
	echo "</section>";
?>
