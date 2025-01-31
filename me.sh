#!/bin/bash

# Define authors
authors=(
    "Rahimfa <rahimzadafarid4@gmail.com>"
    "Utkirbek <utkirbekinamjanov899@gmail.com>"
)

# Create a temporary file for the replace rules
temp_file=$(mktemp)

# Generate replace rules for git-filter-repo
for author in "${authors[@]}"; do
    echo "bekhruzcodes <bekhruzbekmirzaliev744@gmail.com>==$author" >> "$temp_file"
done

# Apply changes to all commits
git filter-repo --replace-refs delete-no-add --force --email-callback '
import random
authors = [
    "rahimzadafarid4@gmail.com",
    "utkirbekinamjanov899@gmail.com"
]
return random.choice(authors)
' --name-callback '
import random
names = ["Rahimfa", "Utkirbek"]
return random.choice(names)
'

# Clean up
rm "$temp_file"

# Set upstream branch if needed
if ! git push --force; then
    echo "Setting upstream branch and pushing..."
    git push --set-upstream origin $(git branch --show-current) --force
fi
