#!/bin/sh
## ╔═════════════════════════════════════════════════════════════════════════════════════════════════════╗
## ║       _____                                      _____                   _                          ║
## ║      / ___ \       _                            (____ \                 | |                         ║
## ║     | |   | | ____| |_  ___  ____  _   _  ___    _   \ \ ____ _   _ ____| | ___  ____   ____  ____  ║
## ║     | |   | |/ ___)  _)/ _ \|  _ \| | | |/___)  | |   | / _  ) | | / _  ) |/ _ \|  _ \ / _  )/ ___) ║
## ║     | |___| ( (___| |_| |_| | | | | |_| |___ |  | |__/ ( (/ / \ V ( (/ /| | |_| | | | ( (/ /| |     ║
## ║      \_____/ \____)\___)___/| ||_/ \____(___/   |_____/ \____) \_/ \____)_|\___/| ||_/ \____)_|     ║
## ║                             |_|                                                 |_|                 ║
## ║                                                                                                     ║
## ║   Author:      Gustavo Filgueiras <gfilgueirasrj@gmail.com>                                         ║
## ║   Created at:  11/08/2025 19:58:40                                                                  ║
## ║   License:     MIT                                                                                  ║
## ║   Copyright:   2025 Octopus Developer                                                               ║
## ║                                                                                                     ║
## ║   Last update: 11/08/2025 19:58:40                                                                  ║
## ║   User update: Gustavo Filgueiras <gfilgueirasrj@gmail.com>                                         ║
## ║   Project:     Sou Nail Desing                                                                      ║
## ╚═════════════════════════════════════════════════════════════════════════════════════════════════════╝

## ********************************
## Variáveis                        *
## **********************************
currentYear=$(date +%Y)
currentDatetime=$(date +"%d/%m/%Y %H:%M:%S")
bannerLicense="MIT"
bannerCompany="Octopus Developer"
bannerWidth=101
gitAuthorName=$(git config user.name)
gitAuthorEmail=$(git config user.email)
projectName="Sou Nail Desing"

## **********************************
## Funções.                         *
## **********************************
bannerFormatLine() {
    local label="$1"
    local value="$2"
    local text="   ${label} ${value}"
    printf "/* ║%-${bannerWidth}s║ */\n" "$text"
}

updateBanner() {
    local file="$1"
    sed -i.bak -E "s|/\* ║.*Last update:.*║ \*/|$(bannerFormatLine "Last update:" "${currentDatetime}")|" "$file"
    sed -i.bak -E "s|/\* ║.*User update:.*║ \*/|$(bannerFormatLine "User update:" "${gitAuthorName} <${gitAuthorEmail}>")|" "$file"
    sed -i.bak -E "s|/\* ║.*Project:.*║ \*/|$(bannerFormatLine "Project:    " "${projectName}")|" "$file"
    sed -i.bak -E "s|/\* ║.*License:.*║ \*/|$(bannerFormatLine "License:    " "${bannerLicense}")|" "$file"
    sed -i.bak -E "s|/\* ║.*Copyright:.*║ \*/|$(bannerFormatLine "Copyright:  " "${currentYear} ${bannerCompany}")|" "$file"
    rm -f "$file.bak"
    git add "$file"
}

insertBanner() {
    local file="$1"

    if head -n1 "$file" | grep -q '^#!'; then
        bannerToInsert=$(echo "$bannerDisplay" | sed 's/^\/\* /## /; s/ \*\/$//')
    else
        bannerToInsert="$bannerDisplay"
    fi

    if head -n1 "$file" | grep -qE '^(<\?php|#!)'; then
        {
            head -n1 "$file"
            echo "$bannerToInsert"

            tail -n +2 "$file"
        } > "$file.tmp"
    else
        {
            echo "$bannerToInsert"
            echo
            cat "$file"
        } > "$file.tmp"
    fi
    mv "$file.tmp" "$file"
    git add "$file"
}

processFiles() {
    for file in $FILES; do
        [ ! -f "$file" ] && continue

        if head -n 20 "$file" | grep -q "Copyright:  "; then
            updateBanner "$file"
            continue
        fi

        head -n 20 "$file" | grep -Fq "$bannerDisplay" && continue
        insertBanner "$file"
    done
}

## **********************************
## Banner                           *
## **********************************
bannerDisplay="/* ╔═════════════════════════════════════════════════════════════════════════════════════════════════════╗ */
$(bannerFormatLine '    _____                                      _____                   _' '')
$(bannerFormatLine '   / ___ \       _                            (____ \                 | |' '')
$(bannerFormatLine '  | |   | | ____| |_  ___  ____  _   _  ___    _   \ \ ____ _   _ ____| | ___  ____   ____  ____' '')
$(bannerFormatLine '  | |   | |/ ___)  _)/ _ \|  _ \| | | |/___)  | |   | / _  ) | | / _  ) |/ _ \|  _ \ / _  )/ ___)' '')
$(bannerFormatLine '  | |___| ( (___| |_| |_| | | | | |_| |___ |  | |__/ ( (/ / \ V ( (/ /| | |_| | | | ( (/ /| |' '')
$(bannerFormatLine '   \_____/ \____)\___)___/| ||_/ \____(___/   |_____/ \____) \_/ \____)_|\___/| ||_/ \____)_|' '')
$(bannerFormatLine '                          |_|                                                 |_|' '')
$(bannerFormatLine '' '')
$(bannerFormatLine "Author:     " "${gitAuthorName} <${gitAuthorEmail}>")
$(bannerFormatLine "Created at: " "${currentDatetime}")
$(bannerFormatLine "License:    " "${bannerLicense}")
$(bannerFormatLine "Copyright:  " "${currentYear} ${bannerCompany}")
$(bannerFormatLine '' '')
$(bannerFormatLine "Last update:" "${currentDatetime}")
$(bannerFormatLine "User update:" "${gitAuthorName} <${gitAuthorEmail}>")
$(bannerFormatLine "Project:    " "${projectName}")
/* ╚═════════════════════════════════════════════════════════════════════════════════════════════════════╝ */"

# Collect the files
FILES=$(git diff --cached --name-only --diff-filter=ACM | grep -Ei '\.(php|css|js|sh)$')

# Run
processFiles
