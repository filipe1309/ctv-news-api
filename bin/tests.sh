#!/bin/bash

# DevOntheRun Deploy Script

echo "#############################################"
echo "                   TESTS                    "
echo "#############################################"

echo ""
echo "---------------------------------------------"
echo "                   PHPUnit"
echo "---------------------------------------------"
vendor/bin/phpunit --do-not-cache-result

echo ""
echo "---------------------------------------------"
echo "                   PHPCS"
echo "---------------------------------------------"
vendor/bin/phpcs

echo ""
echo "---------------------------------------------"
echo "                   PHPStan"
echo "---------------------------------------------"
vendor/bin/phpstan analyse  --memory-limit=2G
