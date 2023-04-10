SET database=divamiblog
SET misc_path=C:/xampp/htdocs/divamiblog/wp-content/themes/DivamiBlog/misc
cd %misc_path%
mysql -u root -e "DROP DATABASE IF EXISTS %database% ;"
echo "removed database"
mysql -u root -e "CREATE DATABASE %database% ; "
mysql -u root %database% < %database%.sql
PAUSE