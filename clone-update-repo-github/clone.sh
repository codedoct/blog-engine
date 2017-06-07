#!/bin/bash

RED='\033[0;31m'
GREEN='\033[0;32m'
BROWN='\033[0;33m'
BLUE='\033[0;34m'
PURPLE='\033[0;35m'
NC='\033[0m'
SCRIPTPATH=$(pwd -P)
REPOS=blog-ruby
GITHUB=https://github.com/codedoct

printf "${GREEN}"
echo "------------------------------"
echo "----begin clone repository----"
echo "------------------------------"
printf "${NC}\n"

for i in "${REPOS}"
do
   :
    printf "${GREEN}[Application]${NC} Get $i code\n"

    create_dir "${SCRIPTPATH}/$i"

    git clone ${GITHUB}/$i.git ${SCRIPTPATH}/$i 1>&2
    echo ""   
done

