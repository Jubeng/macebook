# Macebook

Mini-Facebook is a mini social media API to connect with colleagues, friends, and like-minded people.

To further test the application, I suggest to use Postman: https://www.postman.com/downloads/

and download Macebook Collection: https://github.com/Jubeng/macebook/tree/master/public/postman

## For local setup:
1. Clone this repository, https://github.com/Jubeng/macebook.
2. Run `composer install`
3. Create a database for macebook.
4. after that, run `php artisan migrate:fresh` to create table and populate users table or use this SQL file: https://github.com/Jubeng/macebook/blob/master/public/sqlFile/macebook.sql
5. You can now use Postman to use the API.

## Here are the routes the you can use:
Method: GET <br />
URL: https://joventp.online/get-users
<br /><br />
Method: POST <br />
URL: https://joventp.online/follow<br />
Parameters:<br />
follower_id (ex: 1)<br />
followed_id (ex: 2)<br />
<br /><br />
Method: POST<br />
URL: https://joventp.online/unfollow<br />
Parameters:<br />
follower_id  (ex: 1)<br />
followed_id (ex: 2)<br />
<br /><br />
Method: POST<br />
URL: https://joventp.online/follower-search<br />
Parameters:<br />
followed_id  (ex: 2)<br />
name (ex: Leanne)<br />
