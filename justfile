export PORT := '8082'

export UID := `id -u`
export GID := `id -g`

COMPOSE := 'docker-compose -f docker/app.yml -p archbbs'
COMPOSE-RUN := COMPOSE + ' run --rm'
PHP-DB-RUN := COMPOSE-RUN + ' php'
PHP-RUN := COMPOSE-RUN + ' --no-deps php'
MARIADB-RUN := COMPOSE-RUN + ' --no-deps mariadb'

default:
	just --list

# Installs FluxBB
init: start
	{{MARIADB-RUN}} mysqladmin -uroot -hmariadb create fluxbb

# Load a (gzipped) database backup for local testing
import-db-dump file name='fluxbb': start
	{{MARIADB-RUN}} mysqladmin -uroot -hmariadb drop -f {{name}} || true
	{{MARIADB-RUN}} mysqladmin -uroot -hmariadb create {{name}}
	zcat {{file}} | {{MARIADB-RUN}} mysql -uroot -hmariadb {{name}}

start:
	{{COMPOSE}} up -d
	{{MARIADB-RUN}} mysqladmin -uroot -hmariadb --wait=10 ping
	@echo URL: http://localhost:${PORT}

stop:
	{{COMPOSE}} stop

clean:
	{{COMPOSE}} down -v
	git clean -fdqx -e .idea

rebuild: clean
	{{COMPOSE}} build --pull --parallel
	just init
	just stop

compose *args:
	{{COMPOSE}} {{args}}

compose-run *args:
	{{COMPOSE-RUN}} {{args}}

php *args='-h':
	{{PHP-RUN}} php {{args}}

# vim: set ft=make :
