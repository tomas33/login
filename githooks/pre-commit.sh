result=true
RED='\033[0;31m'
GREEN='\033[0;32m'
NC='\033[0m' # No Color

echo -e "$(tput rev) PHP CS Fixer...$(tput sgr0)"
for path in `git diff-index --diff-filter=d  --cached --name-only HEAD $2`;do
    if [[ ${path} == *.php ]] ; then
        docker exec --user coverfy -w /app/www web_api vendor/bin/php-cs-fixer fix ${path} --config .php_cs
        git add ${path}
    fi
done
