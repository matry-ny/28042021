# Setup dependencies
- `docker-compose up -d` start container
- `docker-compose exec app /bin/bash` enter into container
- `composer install` setup dependencies (exec from fir with file composer.json)

# Kill process
- `netstat -lpn` find PID
- `kill -9 {PID}` kill process