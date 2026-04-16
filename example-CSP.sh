#!/bin/bash

# 1. Ask the user for the number
echo -n "Enter the assignment/project number: "
read CSP_NUM

# 2. Define your static variables
NIM="12345"
NAME="johndoe"
DIRECTORY="docs"
OUTPUT_NAME="CSP${CSP_NUM}_${NIM}_${NAME}.zip"

# 3. Define the specific files you want to include
FILE1="github.desktop"
FILE2="github.url"
FILE3="github.txt"
FILE4="README.md"

# 4. Check if the 'docs' directory exists first
if [ ! -d "$DIRECTORY" ]; then
    echo "Error: Directory '$DIRECTORY' not found!"
    exit 1
fi

# 5. Compress the files
# The zip command will only add the files if they exist
echo "Creating $OUTPUT_NAME..."

zip -r "$OUTPUT_NAME" "$FILE1" "$FILE2" "$FILE3" "$FILE4" "$DIRECTORY"

# 6. Success Message
if [ $? -eq 0 ]; then
    echo "------------------------------------------"
    echo "Successfully created: $OUTPUT_NAME"
else
    echo "An error occurred during compression."
fi
