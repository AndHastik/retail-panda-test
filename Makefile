up: #starts the project
	docker-compose up --build
down: #starts the project
	docker-compose down
bash:
	docker exec -it panda-retail-app bash