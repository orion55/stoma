DIR="/home/stoma.infoblog72.ru"
USER=stoma
MYSQLPASS=6B0GVURRXm1g
DATABASE=$USER

clear
echo "mysqldump..."
mysqldump -Q -c -e -u$USER -p$MYSQLPASS $DATABASE | gzip > `date +$DIR/www/src/sql/dump_%Y%m%d_%H%M%S.sql.gz`
