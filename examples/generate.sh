#!/bin/bash

dir=$(dirname $0)
java -jar $dir/../target/tars-generator-*-jar-with-dependencies.jar -f -n 'wenbinye\tars\registry' -o $dir/php/registry -s QueryF=tars.tarsregistry.QueryObj -t $dir/QueryF.tars
java -jar $dir/../target/tars-generator-*-jar-with-dependencies.jar -f -n 'wenbinye\tars\testtaf' -o $dir/php/testtaf -s TestTafService=PHPTest.PHPTcpServer.obj -t $dir/example.tars
