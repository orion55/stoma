DIR="/home/black-lady.ru"
USER=blacklady
MYSQLPASS=1oep1yxHyalN
DATABASE=$USER

clear
echo "mysqldump..."
mysqldump -Q -c -e -u$USER -p$MYSQLPASS $DATABASE | gzip > `date +$DIR/www/src/sql/dump_%Y%m%d_%H%M%S.sql.gz`
