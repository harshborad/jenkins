#!/bin/bash 

  

# Exit immediately if a command exits with a non-zero status 

set -e 

  

echo "Installing Java (OpenJDK 17)..." 

sudo apt update 

sudo apt install openjdk-17-jdk -y 

  

echo "Adding Jenkins repository key..." 

curl -fsSL https://pkg.jenkins.io/debian-stable/jenkins.io-2023.key | sudo tee /usr/share/keyrings/jenkins-keyring.asc > /dev/null 

  

echo "Adding Jenkins package repository..." 

echo "deb [signed-by=/usr/share/keyrings/jenkins-keyring.asc] https://pkg.jenkins.io/debian-stable binary/" | sudo tee /etc/apt/sources.list.d/jenkins.list > /dev/null 

  

echo "Updating package list..." 

sudo apt update 

  

echo "Installing Jenkins..." 

sudo apt install jenkins -y 

  

echo "Starting Jenkins service..." 

sudo systemctl start jenkins 

  

echo "Enabling Jenkins to start on boot..." 

sudo systemctl enable jenkins 

  

echo "Jenkins installation complete!" 

echo "Access Jenkins at: http://<your_server_ip>:8080" 

echo "To get the initial admin password, run: sudo cat /var/lib/jenkins/secrets/initialAdminPassword"
