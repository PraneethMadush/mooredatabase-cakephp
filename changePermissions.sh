#!/bin/bash
find . -type f -exec chmod 666 {} \;
find . -type d -exec chmod 777 {} \;
