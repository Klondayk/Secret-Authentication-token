Cross-Site Scripting (XSS) Attack Simulation
This project simulates a Cross-Site Scripting (XSS) attack scenario between two Docker containers: a victim server and an attacker's malicious website. The victim's server hosts a simple authentication system, and the attacker's goal is to steal the username and secret authentication token using XSS.

Setup Instructions
1. Extract and Setup
Extract the contents of hw2.tar into a folder named hw2.
Navigate into the hw2 folder.
2. Start Docker Containers
Run the following command to start the Docker containers:

bash
Копировать код
docker-compose up -d
This command starts two PHP servers in separate Docker containers:

Victim's webpage: Accessible at http://localhost:8080/
Attacker's webpage: Accessible at http://127.0.0.1:8081/
Note:

Use localhost for the victim's page (http://localhost:8080/).
Use 127.0.0.1 for the attacker's page (http://127.0.0.1:8081/).
Ensure you use Chrome as the browser for consistent attack behavior.
3. Victim's Webpage Details
3.a Authentication Details
The victim's webpage performs authentication with the following details:
Username: Alice
Password: in wonderland
Incorrect password results in a warning message.
Successful login redirects to the dashboard, displaying the user's name and a secret authentication token.
After successful login, subsequent visits directly go to the dashboard until logout.
3.b Attacker's Goal
The attacker's objective is to steal the username and secret authentication token using an XSS attack.
Modify the provided prototype in attacker_src/index.php to craft a malicious script that retrieves and sends the token information to /attack.php.
The retrieved token information should be saved into token.txt.
4. Perform Attack
The attack should start with a user's click on an attack link (href) on the attacker's webpage (http://127.0.0.1:8081/).
The XSS attack should be executed based on finding the correct URL ($url) as per the instructions.
5. Shutdown Docker Containers
To stop the Docker containers, run the following command:

bash
Копировать код
docker-compose down
This shuts down both PHP servers and terminates the environment.

Notes
This project specifically focuses on simulating a XSS attack scenario. Other attack vectors such as CSRF are not relevant for this simulation.
Ensure all steps are followed precisely to observe and understand the XSS vulnerability in action.
Security Note: This project is for educational purposes only. Do not deploy or use in a production environment.
