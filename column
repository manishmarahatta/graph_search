<?php
//error_reporting(0);
	


    $link = mysqli_connect( 'localhost', 'root', '');
    if( ! $link) {
        die( 'Could not connect: ' . mysqli_error() );
    }

   $db = mysqli_select_db($link,'manish');
    if(!$db ) {
        die( 'Can\'t select database: ' . mysqli_error() );
    }

$table="show tables";
$t_query=mysqli_query($link,$table);
print_r(mysqli_num_rows($t_query));
echo "<br>";

if(mysqli_num_rows($t_query)>0)
{
    while($db_table=mysqli_fetch_array($t_query))
    {
            
        echo $db_table[0]."</br>";
        

        $col_query="show columns from $db_table[0]"; //list columns in the table
        $col_result=mysqli_query($link,$col_query); // execute query
        $numcol=mysqli_num_rows($col_result); //find total rows
        var_dump($numcol);
        
        $fieldnames=array();

        $x=0;
        while($x<$numcol)
        {

        $row=mysqli_fetch_array($col_result);
        $fieldnames[]=$row[0];
        $x++;
        }
        for($i=0;$i<count($fieldnames);$i++)
        {
            echo "$fieldnames[$i]";
        }

        
        
    }
}
                


?>
