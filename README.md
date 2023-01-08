# makes_cli_app
Makes CLI App

Prerequisites
- You must have installed Docker and Docker Compose on your computer(latest version).
- Tested on Ubuntu for Windows.

Deploy on Local
1. Execute: docker compose build(Just for the first time)
2. After build: docker compose up -d
3. Install dependencies: docker exec app composer install
4. Make the minicli file executable: docker exec app chmod +x minicli
5. Copy the .env configuration file: docker exec app cp .env.example .env (edit the MAIL and AWS conf)
6. Test the minicli framework: docker exec app ./minicli help
7. If everything is ok, you can then start the app: docker exec app ./minicli migrate schema
8. After migrate the database schema: docker exec app ./minicli migrate seed

Login to the app:
- docker compose exec app ./minicli login user=adm password=P@ssw0rd

Query the report seeded:
- docker compose exec app ./minicli report

Send the excel report by mail(must configure the .env MAIL vars first):
- docker compose exec app ./minicli report send email=some@email.com

Save the excel report to an S3 instance(must configure the .env AWS vars first):
- docker compose exec app ./minicli report save

Query the sys logs:
- docker compose exec app ./minicli logs

