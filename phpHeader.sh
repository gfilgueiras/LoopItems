#!/bin/sh

## **********************************
## Funções                          *
## **********************************
getNamespace() {
    file=$(echo "$1" | tr -d '\r\n\t')
    relative="${file#*app/}"
    path="${relative%.php}"
    path="${path%/*}"
    printf "App\\%s" "\\$(echo "$path" | sed 's|/|\\\\|g')"
}

updateNamespace() {
    file="$1"
    namespace=$(getNamespace "$file")
    declare=$(grep "^declare(strict_types=1);" "$file")
    uses=$(grep "^use " "$file")

    sed -i.bak -E "/^namespace /d;/^use /d" "$file"

    bannerStart=$(grep -n "╔════════" "$file" | tail -1 | cut -d: -f1)
    bannerEnd=$(grep -n "╚════════" "$file" | tail -1 | cut -d: -f1)
    [ -n "$bannerStart" ] && [ -n "$bannerEnd" ] && banner=$(sed -n "${bannerStart},${bannerEnd}p" "$file") && sed -i.bak "${bannerStart},${bannerEnd}d" "$file"

    {
        echo "<?php"
        [ -n "$banner" ] && echo "$banner" && echo "" || echo ""
        [ -n "$declare" ] && echo "$declare" || echo "declare(strict_types=1);"; echo ""
        echo "namespace $namespace;"
        [ -n "$uses" ] && echo "" && echo "$uses"
        grep -v -e "<?php" -e "^declare(strict_types=1);" -e "^namespace " -e "^use " "$file" | sed '/^[[:space:]]*$/N;/^\n$/D'
    } > "$file.tmp"

    mv "$file.tmp" "$file"
    rm -f "$file.bak"
    git add "$file" 2>/dev/null
}

processFile() {
    case "$1" in
        *"/app/"*".php")
            [ -f "$1" ] && updateNamespace "$1"
            ;;
    esac
}

## **********************************
## Executa                          *
## **********************************
processFile "$1"
