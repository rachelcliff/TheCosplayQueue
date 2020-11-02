#!/bin/bash 
#+---------------------------------------+--------+------+--------+--------+----------+
#|                                       | CREATE | READ | UPDATE | DELETE | SESSION  |
#+---------------------------------------+--------+------+--------+--------+----------+
#+---------------------------------------+--------+------+--------+--------+----------+
#| Register         POST                 |   *    |   *  |        |        |    *     |
#+---------------------------------------+--------+------+--------+--------+----------+
curl http://localhost/TheCosplayQueue/Api/api.php?action=join \
 -s -o /dev/null -w "%{http_code}" \
 --data "username=Redbird&password=1234" \
 | grep -q 401 && echo 'OK' || echo 'ERR' 
sleep 1s

curl http://localhost/sqs_api/api.php?action=register\&username=zxcvzxcv\&password=asdfasdf \
 -s -o /dev/null -w "%{http_code}" \
 | grep -q 401 && echo 'OK' || echo 'ERR' 
# GET not supported  
sleep 1s

curl http://localhost/TheCosplayQueue/Api/api.php?action=signup \
 -s -o /dev/null -w "%{http_code}" \
 --data "username=Redbird&password=1234" \
 | grep -q 201 && echo 'OK' || echo 'ERR' 
# User Created 
sleep 1s

curl http://localhost/sqs_api/api.php?action=register \
 -s -o /dev/null -w "%{http_code}" \
 --data "username=Redbird&password=1234" \
 | grep -q 401 && echo 'OK' || echo 'ERR' 
# User Already Created 
sleep 1s


#+---------------------------------------+--------+------+--------+--------+----------+
#| login            POST                 |        |  *   |        |        |    *     |
#+---------------------------------------+--------+------+--------+--------+----------+
curl http://localhost/TheCosplayQueue/Api/api.php?action=login \
 -s -o /dev/null -w "%{http_code}" \
 --data "username=Redbird&password=1234" \
 | grep -q 401 && echo 'OK' || echo 'ERR' 
# Invalid password 
sleep 1s

curl http://localhost/sqs_api/api.php?action=login \
 -s -o /dev/null -w "%{http_code}" \
 --data "username=Redbird&password=1234" \
 | grep -q 401 && echo 'OK' || echo 'ERR' 
# Invalid username 
sleep 1s

curl http://localhost/sqs_api/api.php?action=login\&username=468299219\&password=asdfasdf \
 -s -o /dev/null -w "%{http_code}" \
 | grep -q 501 && echo 'OK' || echo 'ERR' 
# GET instead of POST 
sleep 1s

curl http://localhost/sqs_api/api.php?action=login --cookie-jar cookie.txt \
 -s -o /dev/null -w "%{http_code}" \
 --data "username=Redbird&password=1234" \
 | grep -q 200 && echo 'OK' || echo 'ERR' 
# login Success
sleep 1s

# what if I loging when I'm loggedin already


#+---------------------------------------+--------+------+--------+--------+----------+
#|                                       | CREATE | READ | UPDATE | DELETE | SESSION  |
#+---------------------------------------+--------+------+--------+--------+----------+
#| Show Queue       GET                  |        |  *   |        |        |          |
#+---------------------------------------+--------+------+--------+--------+----------+
curl http://localhost/TheCosplayQueue/Api/api.php?action=showDetails \
 -s -o /dev/null -w "%{http_code}" \
 --cookie cookie.txt \
 | grep -q 200 && echo 'OK' || echo 'ERR'  
# show all items in the queue
sleep 1s

curl http://localhost/sqs_api/api.php?action=showqueue \
 -s -o /dev/null -w "%{http_code}" \
 --cookie cookie.txt \
 | grep -q 404 && echo 'OK' || echo 'ERR'  
# there are no items in the queue 
sleep 1s

curl http://localhost/sqs_api/api.php?action=showqueue \
 -s -o /dev/null -w "%{http_code}" \
 | grep -q 401 && echo 'OK' || echo 'ERR'  
# not logged in
sleep 1s

curl http://localhost/sqs_api/api.php?action=showq \
 -s -o /dev/null -w "%{http_code}" \
 --cookie cookie.txt \
 | grep -q 501 && echo 'OK' || echo 'ERR'  
# invalid GET request 
sleep 1s

#+---------------------------------------+--------+------+--------+--------+----------+
#| Enqueue          POST                 |   *    |      |        |        |          |
#+---------------------------------------+--------+------+--------+--------+----------+
curl http://localhost/sqs_api/api.php?action=enqueue --cookie cookie.txt \
 -s -o /dev/null -w "%{http_code}" \
 --data "queuetopic=!@##$" \
 | grep -q 400 && echo 'OK' || echo 'ERR'  
# invalid queue item name
sleep 1s

curl http://localhost/sqs_api/api.php?action=enqueue \
 -s -o /dev/null -w "%{http_code}" \
 --data "queuetopic=alpha\ num3ric\ only" \
 | grep -q 401 && echo 'OK' || echo 'ERR'  
# not logged in
sleep 1s

curl http://localhost/sqs_api/api.php?action=enqueue --cookie cookie.txt \
 -s -o /dev/null -w "%{http_code}" \
 --data "queuetopic=alpha\ num3ric\ only" \
 | grep -q 201 && echo 'OK' || echo 'ERR'  
# queue successful
sleep 1s

curl http://localhost/sqs_api/api.php?action=enqueue --cookie cookie.txt \
 -s -o /dev/null -w "%{http_code}" \
 --data "queuetopic=alpha\ num3ric\ only" \
 | grep -q 403 && echo 'OK' || echo 'ERR'                                        
# can\'t queue twice
sleep 1s

#+---------------------------------------+--------+------+--------+--------+----------+
#|                                       | CREATE | READ | UPDATE | DELETE | SESSION  |
#+---------------------------------------+--------+------+--------+--------+----------+
#+---------------------------------------+--------+------+--------+--------+----------+
#| Dequeue          DELETE               |        |      |        |   *    |          |
#+---------------------------------------+--------+------+--------+--------+----------+
curl http://localhost/sqs_api/api.php?action=dequeue\&queueitem=9 \
 -s -o /dev/null -w "%{http_code}" \
 --cookie cookie.txt \
 | grep -q 501 && echo 'OK' || echo 'ERR' 
# wrong HTTP request  
sleep 1s

curl http://localhost/sqs_api/api.php?action=dequeue\&queueitem=9 \
 -s -o /dev/null -w "%{http_code}" \
 -X DELETE \
 | grep -q 401 && echo 'OK' || echo 'ERR' 
# not logged in 
sleep 1s

curl http://localhost/sqs_api/api.php?action=dequeue\&queueitem=9 \
 -s -o /dev/null -w "%{http_code}" \
 --cookie cookie.txt  -X DELETE \
 | grep -q 203 && echo 'OK' || echo 'ERR' 
# success 
sleep 1s

curl http://localhost/sqs_api/api.php?action=dequeue\&queueitem=9 \
 -s -o /dev/null -w "%{http_code}" \
 --cookie cookie.txt  -X DELETE \
 | grep -q 403 && echo 'OK' || echo 'ERR' 
# can\'t do this twice
sleep 1s

curl http://localhost/sqs_api/api.php?action=dequeue\&queueitem=999999 \
 -s -o /dev/null -w "%{http_code}" \
 --cookie cookie.txt  -X DELETE \
 | grep -q 403 && echo 'OK' || echo 'ERR' 
# queue item does not exist
sleep 1s

curl http://localhost/sqs_api/api.php?action=dequeue\&queueitem=nine \
 -s -o /dev/null -w "%{http_code}" \
 --cookie cookie.txt -X DELETE \
 | grep -q 400 && echo 'OK' || echo 'ERR' 
# queue item number invalid 
sleep 1s

curl http://localhost/sqs_api/api.php?action=dequeue\&queueitem=!@#$ \
 -s -o /dev/null -w "%{http_code}" \
 --cookie cookie.txt -X DELETE \
 | grep -q 400 && echo 'OK' || echo 'ERR' 
# queue item number invalid 
sleep 1s


#+---------------------------------------+--------+------+--------+--------+----------+
#| Update Profile   POST                 |        |      |   *    |        |          |
#+---------------------------------------+--------+------+--------+--------+----------+
curl http://localhost/sqs_api/api.php?action=updateprofile \
 -s -o /dev/null -w "%{http_code}" \
 --cookie cookie.txt \
 --data "nick=alpha1234&color=asdfss" \
 | grep -q 400 && echo 'OK' || echo 'ERR' 
# invalid color code
sleep 1s

curl http://localhost/sqs_api/api.php?action=updateprofile\&nick=alpha1234\&color=FF0E99 \
 -s -o /dev/null -w "%{http_code}" \
 --cookie cookie.txt \
 | grep -q 501 && echo 'OK' || echo 'ERR' 
# GET instead of POST 
sleep 1s

curl http://localhost/sqs_api/api.php?action=updateprofile \
 -s -o /dev/null -w "%{http_code}" \
 --cookie cookie.txt \
 --data "nick=foo\ bar\ 1234&color=FF0E99" \
 | grep -q 201 && echo 'OK' || echo 'ERR' 
sleep 1s

#+---------------------------------------+--------+------+--------+--------+----------+
#| Add comment      POST                 |   *    |      |        |        |          |
#+---------------------------------------+--------+------+--------+--------+----------+

curl http://localhost/sqs_api/api.php?action=addcomment\&queueid=9 \
 -s -o /dev/null -w "%{http_code}" \
 --data "comment=foo\ bar\ 1234" \
 | grep -q 401 && echo 'OK' || echo 'ERR' 
# not logged in
sleep 1s

curl http://localhost/sqs_api/api.php?action=addcomment\&queueid=9 \
 -s -o /dev/null -w "%{http_code}" \
 --data "cumment=foo\ bar\ 1234" \
 --cookie cookie.txt \
 | grep -q 501 && echo 'OK' || echo 'ERR' 
# invalid post
sleep 1s

curl http://localhost/sqs_api/api.php?action=addcomment\&queueid=9\&comment=foobar \
 -s -o /dev/null -w "%{http_code}" \
 --cookie cookie.txt \
 | grep -q 501 && echo 'OK' || echo 'ERR' 
# Get instead of POST
sleep 1s

curl http://localhost/sqs_api/api.php?action=addcomment\&queueid=9 \
 -s -o /dev/null -w "%{http_code}" \
 --cookie cookie.txt \
 --data "comment=!@#$" \
 | grep -q 400 && echo 'OK' || echo 'ERR' 
# Validation failed 
sleep 1s

curl http://localhost/sqs_api/api.php?action=addcomment\&queueid=9 \
 -s -o /dev/null -w "%{http_code}" \
 --cookie cookie.txt \
 --data "comment=foo\ bar\ 1234" \
 | grep -q 201 && echo 'OK' || echo 'ERR' 
# OK
sleep 1s

curl http://localhost/sqs_api/api.php?action=addcomment\&queueid=9 \
 -s -o /dev/null -w "%{http_code}" \
 --cookie cookie.txt \
 --data "comment=foo\ bar\ 1234" \
 | grep -q 403 && echo 'OK' || echo 'ERR' 
# Can\'t do this twice
sleep 1s

#+---------------------------------------+--------+------+--------+--------+----------+
#|                                       | CREATE | READ | UPDATE | DELETE | SESSION  |
#+---------------------------------------+--------+------+--------+--------+----------+
#+---------------------------------------+--------+------+--------+--------+----------+
#| Remove Comment   DELETE               |        |      |        |   *    |          |
#+---------------------------------------+--------+------+--------+--------+----------+

curl http://localhost/sqs_api/api.php?action=removecomment\&commentitem=8 \
 -s -o /dev/null -w "%{http_code}" \
 --cookie cookie.txt -X DELETE \
 | grep -q 403 && echo 'OK' || echo 'ERR' 
# user does not own the comment 
sleep 1s

curl http://localhost/sqs_api/api.php?action=removecomment\&commentitem=9 \
 -s -o /dev/null -w "%{http_code}" \
 --cookie cookie.txt -X DELETE \
 | grep -q 203 && echo 'OK' || echo 'ERR' 
# OK
sleep 1s

curl http://localhost/sqs_api/api.php?action=removecomment\&commentitem=9 \
 -s -o /dev/null -w "%{http_code}" \
 --cookie cookie.txt -X DELETE \
 | grep -q 404 && echo 'OK' || echo 'ERR' 
# already deleted 
sleep 1s

curl http://localhost/sqs_api/api.php?action=removecomment\&commentitem=9 \
 -s -o /dev/null -w "%{http_code}" \
 -X DELETE \
 | grep -q 401 && echo 'OK' || echo 'ERR' 
# not logged in
sleep 1s

curl http://localhost/sqs_api/api.php?action=removecomment\&commentitem=99999999 \
 -s -o /dev/null -w "%{http_code}" \
 --cookie cookie.txt \
 | grep -q 501 && echo 'OK' || echo 'ERR' 
# wrong method
sleep 1s

curl http://localhost/sqs_api/api.php?action=removecomment\&commentitem=99999999 \
 -s -o /dev/null -w "%{http_code}" \
 --cookie cookie.txt -X DELETE \
 | grep -q 204 && echo 'OK' || echo 'ERR' 
# comment not found 
sleep 1s

curl http://localhost/sqs_api/api.php?action=removecomment\&commentitem=!@#$ \
 -s -o /dev/null -w "%{http_code}" \
 --cookie cookie.txt -X DELETE \
 | grep -q 400 && echo 'OK' || echo 'ERR' 
# comment id not valid
sleep 1s


#+---------------------------------------+--------+------+--------+--------+----------+
#| logout           GET                  |        |      |        |        |    *     |
#+---------------------------------------+--------+------+--------+--------+----------+

curl http://localhost/sqs_api/api.php?action=logout \
 -s -o /dev/null -w "%{http_code}" \
 | grep -q 401 && echo 'OK' || echo 'ERR' 
# not logged in
sleep 1s

curl http://localhost/sqs_api/api.php?action=logot \
 -s -o /dev/null -w "%{http_code}" \
 | grep -q 501 && echo 'OK' || echo 'ERR' 
# invalid get parameter
sleep 1s

curl http://localhost/sqs_api/api.php?action=logout\&anything=else \
 -s -o /dev/null -w "%{http_code}" \
 --cookie cookie.txt \
 | grep -q 501 && echo 'OK' || echo 'ERR' 
# unnecessary extra get parameter
sleep 1s

curl http://localhost/sqs_api/api.php?action=logout --cookie cookie.txt \
 -s -o /dev/null -w "%{http_code}" \
 | grep -q 200 && echo 'OK' || echo 'ERR' 
# logout successful 
sleep 1s

curl http://localhost/sqs_api/api.php?action=logout --cookie cookie.txt \
 -s -o /dev/null -w "%{http_code}" \
 | grep -q 401 && echo 'OK' || echo 'ERR' 
# already logged out 
sleep 1s
