README

Setup Instructions

1. Download Required Software

Download and install the following:

Visual Studio

Docker Desktop

Ubuntu

Available in the Microsoft Store

2. Connect VS Code to WSL

After installing the required software, follow these steps:

Open Visual Studio Code.

Install the Remote - WSL extension from the Extensions Marketplace.

Open VS Code Command Palette (Ctrl + Shift + P) and select Remote-WSL: New Window.

Connect to Ubuntu (WSL).

3. Clone the Git Repository

Click Clone Git Repository in VS Code.

Paste the provided repository link.

Wait for the cloning process to complete.

4. Set Up Docker and Run Commands

Open the terminal and run the following command to start Docker containers:

docker compose up -d

Run the following commands to set the correct permissions:

chmod -R 777 storage
chmod -R 777 bootstrap

Execute the Laravel migration command inside the Docker container:

docker exec -it WIAMS php artisan migrate --force
npm run build

5. Setup Complete!

Your development environment is now set up and ready to use.