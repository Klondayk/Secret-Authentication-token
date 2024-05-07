
1. Extract the hw2.tar into a folder hw2
2. Go the hw2 folder
3. RUN: docker-compose up -d
	This command starts two php server in two different docker contaiers
	Victim's webpage is accessed via http://localhost:8080/
	Attacker's webpage is accessed via http://127.0.0.1:8081/
	Please do not interchange localhost and 127.0.0.1
	Please use Chrome as Browser. The attack might differ from browser to browser
3.a Victim's page performs a very simple authentication via username and password (no ' in password)
	username: 'Alice'
	password: 'in wonderland'
	If you enter wrong password, it warns you in the screen
	If you enter correct password, it redirects you to dashboard
	The dashboard shows your name and secret authentication token
	After a successful login, you always go to dashboard, not login page, till you logout
	You cannot change anything in Victim's webpage (no change in victim_src)
3.b Attacker's goal is to automatically steal the username and secret authentication token
	To this end, you need to write a malicious website served in http://127.0.0.1:8081/
	A prototype is already given in attacker_src
	In index.php, you can edit the defined parts
	The successful attacker should be able to show the username and secret token of a user's session on Victim's page
	You can only perform XSS attack, not CSRF or any other type
	The token information must be written into token.txt by /attack.php
	The attack should start with user's click on attack href
	If you can find the correct $url, you will be prevailed with a XSS attack
4. RUN: docker-compose down
	This command shuts down the docker containers

PLEASE DO NOT TRY THIS ON ANY WEBSITE!
