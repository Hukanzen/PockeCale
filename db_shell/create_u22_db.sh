CMD_MYSQL="mysql -u root"

SQLDB='u22'
SQLUSER='u22'

SQL[0]="CREATE DATABASE $SQLDB ;"

SQL[1]="CREATE TABLE ${SQLDB}.User     (UserID VARCHAR(255) NOT NULL PRIMARY KEY,ePassword VARCHAR(255),FirstName TEXT, LastName TEXT,GroupID INT,Sex INT,Type VARCHAR(255), Created TIMESTAMP);"
SQL[2]="CREATE TABLE ${SQLDB}.Salt     (UserID VARCHAR(255) NOT NULL PRIMARY KEY,salt INT);"
SQL[3]="CREATE TABLE ${SQLDB}.Group    (GroupID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,School_Name TEXT,Grade INT,Class TEXT,NumMember INT,School_Type VARCHAR(255));"
SQL[4]="CREATE TABLE ${SQLDB}.Calender (ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,GroupID INT,Date DATE,Contents TEXT);"
SQL[5]="CREATE TABLE ${SQLDB}.TimeTable(ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,GroupID INT,o_Date DATE,o_Class_Time INT,o_Class_ID INT,ch_Content INT,ch_Class_ID INT);"
SQL[6]="CREATE TABLE ${SQLDB}.Planlist (ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,GroupID INT,Submit_Name TEXT,Class_Name TEXT,Dead_Line DATE,Dead_Time TIME);"
SQL[7]="CREATE TABLE ${SQLDB}.Subject  (ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,GroupID INT,Name TEXT);"

SQL_G="GRANT ALL ON ${SQLDB}.* TO '$SQLUSER'@localhost;"




cls_int="Class_1 INT"
for i in `seq 2 8`
do
	cls_int="$cls_int,Class_$i INT"
done

day_w=("Mon" "Tue" "Wed" "Thu" "Fri")
for i in `seq 0 4`
do
	sum=$(( $i + 8 ))
	SQL[$sum]="CREATE TABLE ${SQLDB}.${day_w[$i]}_ClassSchedule (GroupID INT NOT NULL PRIMARY KEY AUTO_INCREMENT, $cls_int)"
done


for i in `seq 0 12`
do
	echo ${SQL[$i]} | $CMD_MYSQL
done

echo $SQL_G | $CMD_MYSQL
