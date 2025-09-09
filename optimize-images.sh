#!/bin/bash

# Instalar dependencias necesarias
npm install -g imagemin-cli imagemin-mozjpeg imagemin-pngquant

# Optimizar JPG/JPEG
find public/image -type f \( -name "*.jpg" -o -name "*.jpeg" \) -exec imagemin {} --plugin=mozjpeg --out-dir=public/image/optimized \;

# Optimizar PNG
find public/image -type f -name "*.png" -exec imagemin {} --plugin=pngquant --out-dir=public/image/optimized \;

# Mover las imágenes optimizadas a su ubicación original
mv public/image/optimized/* public/image/

# Limpiar directorio temporal
rm -rf public/image/optimized 