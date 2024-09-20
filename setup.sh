#!/bin/bash

# Some simple function to print a line (TODO Add some coloring and formatting later)
function printLine {
    echo "$1";
}

function runScript {
    docker exec -it gob-php "$@";
}

# Check if the .env file exists, if not try to copy the .env.example to .env

if ! [ -f ".env" ]; then
    ENVIRONMENT_FILE=".env.example";
    printLine "==[ Copying $ENVIRONMENT_FILE to .env ]=="
    cp $ENVIRONMENT_FILE .env
    local_uid=$(id -u);
    local_gid=$(id -g);

    printLine "" >> ".env"
    printLine "DOCKER_UID=$local_uid" >> ".env"
    printLine "DOCKER_GID=$local_gid" >> ".env"
fi

printLine "==[ DOCKER INIT ]=="
docker-compose up -d --remove-orphans

printLine "==[ COMPOSER INSTALL ]=="
runScript composer install

# Load the env file
export $(cat .env | grep APP | xargs)

# Generate an App key if it doesn't exist
if [ -z ${APP_KEY+x} ] || [ "$APP_KEY" == "" ]; then
    printLine "==[ Generating new app key ]=="
    runScript php artisan key:generate
fi

#printLine "==[ Generating new encryption keys for Laravel Passport ]=="
#runScript php artisan passport:keys

printLine "==[ All checks are passed, starting with the setup ]=="

force="n"
while getopts "f:" opt; do
    case $opt in
        f) force="$OPTARG"
        ;;
        \?) echo "Invalid option -$OPTARG" >&2
        ;;
    esac
done

docker exec --user=root -it gob-php chown -R www-data:www-data .

# Run the database seeder
printLine "==[ Running database seeder ]=="
runScript php artisan db:seed

# Print the AUTH_USER_PASSWORD from the .env file
# Print the AUTH_USER_PASSWORD from the .env file
AUTH_USER_PASSWORD=$(grep '^AUTH_USER_PASSWORD=' .env | cut -d '=' -f2)

if [ -n "$AUTH_USER_PASSWORD" ]; then
    printLine "==[ Email: info@dkdesigns.nl]=="
    printLine "==[ Password: $AUTH_USER_PASSWORD ]=="
else
    printLine "==[ AUTH_USER_PASSWORD is not set in the .env file ]=="
fi
