# Hello World

### Summary

This is an entirely and unnecessarily over-the-top example of a Hello World program. It's somewhat of a playground to test
bits and pieces or scenarios and will be continually updated for this purpose.

### Usage

The application can be run a couple of ways, outlined below

#### CLI

From the project root, run the following

```
./bin/cli
```

Various languages are supported, these can be used by specifying the `locale` argument, like below

```
./bin/cli --locale=de
```

Supported languages can be found in the `i18n` directory.

Obviously, PHP will need to be installed on the system where the above is executed from.

#### Web

The application has a browser interface too that is created via Docker. To run this, execute the following from the project
root

```
docker-compose up
```

Then in a web browser go to http://localhost:8080/

Again, it's possible to specify other locales by using a `locale` URL parameter, e.g. http://localhost:8080/?locale=fr

### SASS

SASS stylesheets can be found in the `resources/scss` directory. Any changes to stylesheets will need to be compiled to CSS, 
this can be done using SASS, like below (for example)
 
```
sass --watch resources/scss/helloworld.scss public/assets/css/helloworld.css
```
