echo "drop databases u22;" | mysql -u root
sh create_u22_db.sh
mysql -uu22 -punder22 u22 < db_sample
