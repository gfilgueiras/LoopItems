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
## ║   Created at:  11/08/2025 20:51:10                                                                  ║
## ║                                                                                                     ║
## ║   Last update: 11/08/2025 23:55:19                                                                  ║
## ║   User update: Gustavo Filgueiras <gfilgueirasrj@gmail.com>                                         ║
## ║   Project:     Base Project Laravel (RVA)                                                           ║
## ║   License:     GNU                                                                                  ║
## ║   Copyright:   2025 Octopus Developer                                                               ║
## ╚═════════════════════════════════════════════════════════════════════════════════════════════════════╝

## **********************************
## Variáveis                        *
## **********************************
root_dir="$(git rev-parse --show-toplevel)"
env_file="$root_dir/.env"
currentYear=$(date +%Y)
currentDatetime=$(date +"%d/%m/%Y %H:%M:%S")
bannerWidth=101
gitAuthorName=$(git config user.name)
gitAuthorEmail=$(git config user.email)
projectName=$(grep -i '^\s*c_PROJECT_FRIENDLY_NAME\s*=' "$env_file" | head -1 | sed -E 's/^\s*c_PROJECT_FRIENDLY_NAME\s*=\s*"?([^"#]*)"?\s*(#.*)?$/\1/' | xargs)
bannerLicense=$(grep -i '^\s*c_PROJECT_LICENSE\s*=' "$env_file" | head -1 | sed -E 's/^\s*c_PROJECT_LICENSE\s*=\s*"?([^"#]*)"?\s*(#.*)?$/\1/' | xargs)
bannerCompany=$(grep -i '^\s*SOFTWARE_FABRIC_NAME\s*=' "$env_file" | head -1 | sed -E 's/^\s*SOFTWARE_FABRIC_NAME\s*=\s*"?([^"#]*)"?\s*(#.*)?$/\1/' | xargs)

# Collect the files
FILES=$(git diff --cached --name-only --diff-filter=ACM | grep -Ei '\.(php|css|js|sh)$')


## **********************************
## Funções.                         *
## **********************************
bannerFormatLine() {
    local file="$1"
    local label="$2"
    local value="$3"
    local text="   ${label} ${value}"

    if [ -n "$file" ] && head -n1 "$file" | grep -q '^#!'; then
        printf "## ║%-${bannerWidth}s║\n" "$text"
    else
        printf "/* ║%-${bannerWidth}s║ */\n" "$text"
    fi
}

updateBanner() {
    local file="$1"
    if head -n1 "$file" | grep -q '^#!'; then
        sed -i.bak -E "s|^## ║.*Last update:.*║|$(bannerFormatLine "$file" "Last update:" "${currentDatetime}")|" "$file"
        sed -i.bak -E "s|^## ║.*User update:.*║|$(bannerFormatLine "$file" "User update:" "${gitAuthorName} <${gitAuthorEmail}>")|" "$file"
        sed -i.bak -E "s|^## ║.*Project:.*║|$(bannerFormatLine "$file" "Project:    " "${projectName}")|" "$file"
        sed -i.bak -E "s|^## ║.*License:.*║|$(bannerFormatLine "$file" "License:    " "${bannerLicense}")|" "$file"
        sed -i.bak -E "s|^## ║.*Copyright:.*║|$(bannerFormatLine "$file" "Copyright:  " "${currentYear} ${bannerCompany}")|" "$file"
    else
        sed -i.bak -E "s|/\* ║.*Last update:.*║ \*/|$(bannerFormatLine "$file" "Last update:" "${currentDatetime}")|" "$file"
        sed -i.bak -E "s|/\* ║.*User update:.*║ \*/|$(bannerFormatLine "$file" "User update:" "${gitAuthorName} <${gitAuthorEmail}>")|" "$file"
        sed -i.bak -E "s|/\* ║.*Project:.*║ \*/|$(bannerFormatLine "$file" "Project:    " "${projectName}")|" "$file"
        sed -i.bak -E "s|/\* ║.*License:.*║ \*/|$(bannerFormatLine "$file" "License:    " "${bannerLicense}")|" "$file"
        sed -i.bak -E "s|/\* ║.*Copyright:.*║ \*/|$(bannerFormatLine "$file" "Copyright:  " "${currentYear} ${bannerCompany}")|" "$file"
    fi
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
    for file in "$1"; do
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
$(bannerFormatLine "$file" '    _____                                      _____                   _' '')
$(bannerFormatLine "$file" '   / ___ \       _                            (____ \                 | |' '')
$(bannerFormatLine "$file" '  | |   | | ____| |_  ___  ____  _   _  ___    _   \ \ ____ _   _ ____| | ___  ____   ____  ____' '')
$(bannerFormatLine "$file" '  | |   | |/ ___)  _)/ _ \|  _ \| | | |/___)  | |   | / _  ) | | / _  ) |/ _ \|  _ \ / _  )/ ___)' '')
$(bannerFormatLine "$file" '  | |___| ( (___| |_| |_| | | | | |_| |___ |  | |__/ ( (/ / \ V ( (/ /| | |_| | | | ( (/ /| |' '')
$(bannerFormatLine "$file" '   \_____/ \____)\___)___/| ||_/ \____(___/   |_____/ \____) \_/ \____)_|\___/| ||_/ \____)_|' '')
$(bannerFormatLine "$file" '                          |_|                                                 |_|' '')
$(bannerFormatLine "$file" '' '')
$(bannerFormatLine "$file" "Author:     " "${gitAuthorName} <${gitAuthorEmail}>")
$(bannerFormatLine "$file" "Created at: " "${currentDatetime}")
$(bannerFormatLine "$file" '' '')
$(bannerFormatLine "$file" "Last update:" "${currentDatetime}")
$(bannerFormatLine "$file" "User update:" "${gitAuthorName} <${gitAuthorEmail}>")
$(bannerFormatLine "$file" "Project:    " "${projectName}")
$(bannerFormatLine "$file" "License:    " "${bannerLicense}")
$(bannerFormatLine "$file" "Copyright:  " "${currentYear} ${bannerCompany}")
/* ╚═════════════════════════════════════════════════════════════════════════════════════════════════════╝ */"

# Run
processFiles "$FILES"
