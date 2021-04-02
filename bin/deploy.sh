#!/bin/bash

echo "#############################################"
echo "                   DEPLOY                   "
echo "#############################################"
echo "# [Optional] param: --tag-msg \"TAG_MESSAGE_HERE\""
echo "---------------------------------------------"

TAG_MSG=$2
GIT_BRANCH=$(git branch --show-current)
TAG_NAME=$(echo "$GIT_BRANCH" | tr -d -)

echo "Deploying branch: $GIT_BRANCH ..."


# if arguments [ $# -eq 0 ]
if [ $# -eq 0 ]; then
    echo "Type the tag message:"
    echo "# example: \"$(git tag -n9 | head -n 1 | awk '{for(i=2;i<=NF;++i)printf $i FS}')\""
    read -e tagmsg
    echo "Typed: \"$tagmsg\""
    if [ ! -z "$tagmsg"  -a "$tagmsg" != " " ]; then
        TAG_MSG=$tagmsg
    else
        echo "Tag message missing"
        exit;
    fi
else
    # Verify if param --tag-msg is set && message param is not empty
    if [ $1 != "--tag-msg" ] && [ -z "$2" ]; then
        echo "Wrong tag param"
        exit;
    fi
fi

echo "---------------------------------------------"
echo "Branch to deploy will be: \"$GIT_BRANCH\""
echo "Tag will be: [name]= \"$TAG_NAME\", [msg]= \"$TAG_MSG\""
echo "---------------------------------------------"

read -r -p "Are you sure? [y/N] " response
if [[ "$response" =~ ^([yY][eE][sS]|[yY])$ ]]
then
    echo "---------------------------------------------"
    echo "Deploying..."
    git tag -a $TAG_NAME -m $TAG_MSG && git ps origin $GIT_BRANCH && git ps origin $GIT_BRANCH --tags && git co main && git pl
    echo "Deploy completed!"
else
    echo "Bye =)"
fi




