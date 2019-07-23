# Login App

Esta aplicación tiene el proposito de entender el funcionamiento de Slim framework, así como entender algunos patrones
de desarrollo como MVC, ADR, contenedor de dependencias, routing, dependencias con composer, namespaces entre otros.

El único propósito es el de aprender y mejorar las habilidades de programación así como toda la parte de testing.

## Instalar la aplicación

Lo primero que se necesita para que la aplicación funcione es tener docker instalado en la máquina donde se va a 
desarrollar.

Se puede encontrar en el [docker.com](https://docs.docker.com/install/).

Antes de inicializar el proyecto, se deberá crear un fichero `.env` en la raíz o simplemente copiar el de `.env.dist`
y poner los valores que se deseen.

Una vez instalado docker simplemente se tendrá que ejecutar `docker-compose up -d` para levantar todos los servicios.

To run the application in development, you can run these commands 

	cd [my-app-name]
	php composer.phar start

Run this command in the application directory to run the test suite

	php composer.phar test

That's it! Now go build something cool.
"# login" 
"# login" 

Y cuando ya esté todo levantado hará falta instalar las dependencias con composer con `docker-compose run php composer install`

