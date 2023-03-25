$HOST='luckyswd@attract.company'
$USER='luckyswd@attract.company'
$PASSWD='NNCNUQU&xn3xm0kZiN&aQG5P'

#$serverDIST='./public/wp-content/themes/attract/dist/'

ftp -n $HOST <<END_SCRIPT
quote USER $USER
quote PASS $PASSWD

delete $serverDIST

quit
END_SCRIPT
exit 0


#cd wp-app/wp-content/themes/attract/
#npm i && gulp build
#
#git status
#git config --global user.email "luckyswd@gmail.com"
#git config --global user.name "Denis Shediakov"
#git status
#git add .
#git commit -m "deploy build"
#git push
