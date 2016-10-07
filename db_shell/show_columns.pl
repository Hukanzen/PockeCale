$CMD_MYSQL="mysql -u root";

#tables=("User" "Salt" "Group" "Calender" "TimeTable" "Planlist" "Subject")

#for i in `seq 0 6`
#do
#	echo "u22.${tables[$i]}"
#	echo "SHOW COLUMNS FROM u22.${tables[$i]}" | $CMD_MYSQL
#	echo 
#done

$i=0;
foreach (`echo "SELECT table_name FROM information_schema.tables WHERE TABLE_SCHEMA = 'u22';" | $CMD_MYSQL `){
	if(!$i){
		$i++;
		next;
	}
	chomp($_);
	$ntable[$i-1]=$_;
	$i++;
}

#@ntable=sort @ntable;

#for($i=1;$ntable[$i];$i++){
#	print $ntable[$i];
#}
for($i=0;$ntable[$i];$i++){
	print "u22.$ntable[$i]\n";
	$cmd="echo \"SHOW COLUMNS FROM u22.".$ntable[$i]."\"|".$CMD_MYSQL;
	system($cmd);
	print "\n";
	#print $cmd;
}
	#$cmd="SHOW COLUMNS FROM u22.$ntable[$i] | $CMD_MYSQL";
	#print $cmd;
