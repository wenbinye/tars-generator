
all: 
	mvn package
	cp target/tars-generator-*-SNAPSHOT-jar-with-dependencies.jar dist/tars-generator-1.0.jar

