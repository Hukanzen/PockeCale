CMD_MYSQL="mysql -u root"

#create user for U22
SQLUSER='u22'
SQLPASS='under22'

SQL_0="CREATE USER '$SQLUSER'@localhost IDENTIFIED BY '$SQLPASS' ;"

echo $SQL_0 | $CMD_MYSQL
