#!/bin/sh

CLASSPATH="lib/mysql-connector-java-5.0.5-bin.jar"
SERVLET_CLASSPATH="$HOME/apache-tomcat-5.5.20/common/lib/servlet-api.jar"

clear
../../../bin/shutdown.sh

javac -cp classes -d classes src/com/example/model/*.java
javac -cp $SERVLET_CLASSPATH:classes -d classes src/com/example/web/*.java

../../../bin/startup.sh
