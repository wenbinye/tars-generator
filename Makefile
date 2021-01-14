### Makefile --- 

## Author: wenbinye@WenbindeMBP
## Version: $Id: Makefile,v 0.0 2021/01/10 14:20:33 wenbinye Exp $
## Keywords: 
## X-URL: 

gen:
	cd src/parse && antlr4 -Dlanguage=PHP -package tars\\parse Tars.g4

.PHONY: gen
