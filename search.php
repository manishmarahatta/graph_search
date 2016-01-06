<html>
<head>
	<meta charset="utf-8">
	<title>Search</title>
</head>
<body>
<?php
//error_reporting(0);
    $str=$_POST['search'];//user entered string 
    echo "<div align='center'>Searched string: <b>".$str."</b></br>";
    echo "</div>";
  

    $link = mysqli_connect( 'localhost', 'root', '');//establish connection to mysql database
    if( ! $link){
        			die( 'Could not connect: ' . mysqli_error() );
    			}

   $db = mysqli_select_db($link,'manish'); //select database
    if(!$db ){
        		die( 'Can\'t select database: ' . mysqli_error() );
    		 }

	$table="show tables"; //query that shows all the tables in a database
	$t_query=mysqli_query($link,$table);
	$total_table=mysqli_num_rows($t_query);
	echo"<div align='center'>Total tables-: <b>".$total_table."</b></div>";
	echo "<br>";


	if(mysqli_num_rows($t_query)>0) //returns total rows 
	{
		while($db_table=mysqli_fetch_array($t_query))
		{
				
			echo"Table: <b>".$db_table[0]."</b></br>";
			echo "<br>";

			

			$col_query="show columns from $db_table[0]"; //list columns in the table
			$col_result=mysqli_query($link,$col_query); // execute query
			$numcol=mysqli_num_rows($col_result); //find total rows

			$fieldnames=array();
			$x=0;
			while($x < $numcol )
			{
				$colname=mysqli_fetch_row($col_result);
				$fieldnames[]=$colname[0];
				$x++;
			}
			for($j=0;$j<count($fieldnames);$j++)
	        {
	            echo"<b>".$fieldnames[$j]."</b> | ";
	        }
					
			echo"</br>";
			echo"<div>";
			$db_query="select * from $db_table[0]";
			$db_qres=mysqli_query($link,$db_query);
			$numfield=mysqli_num_fields($db_qres);
			echo "Search item: ";
			while ($db_array=mysqli_fetch_row($db_qres)) {
				echo "<tr>";
			for($i=0;$i<$numfield;$i++)
			{
				if($db_array[$i]==$str)
				{
					echo"<td><b>".$db_array[$i]." </b></td> "; 
				}
			}

			 echo "</tr></br>";
			 
			}
			 echo"</br>";
			 echo"</br>";
		}
			
	}
	?>


	<?php
	/*
	$query="select * from post where post_by like '%$str%'";
	$result=mysqli_query($link,$query);

	if(mysqli_num_rows($result)>0){
	    while ($row=mysqli_fetch_array($result)) {
	        $id=$row['post_id'];
	        $first=$row['Title'];
	        $second=$row['Post_by'];
	        $third=$row['tag'];
	      ?>
	     <table border="1px" cellspacing="0" cellpadding="5">
	     	
	     		<tr>
	     			<td><?php echo $id ?></td>
	     			<td><?php echo $first ?></td>
	     			<td><?php echo $second ?></td>
	     			<td><?php echo $third ?></td>
	     		</tr>
	     </table>
	    <?php
	        
	     }
	    }

	*/
	/*
	    // Traverse all tables
	    $tables_query = 'SHOW TABLES';
	    $tables_result = mysqli_query( $link,$tables_query );
	    var_dump($tables_result);
	    while( $tables_rows = mysqli_fetch_row( $tables_result ) ) {
	        foreach( $tables_rows as $table ) {

	            // Traverse all columns
	            $columns_query = 'SHOW COLUMNS FROM ' . $table;
	            $columns_result = mysqli_query($link,$columns_query );
	            while( $columns_row = mysqli_fetch_assoc( $columns_result ) ) {

	                $column = $columns_row['Field'];
	                $type = $columns_row['Type'];

	                
	                }
	            }
	        }

	    mysqli_free_result( $columns_result );
	    mysqli_free_result( $tables_result );


	    echo 'Done!';
	*/
	?>
	</body>
	</html>
