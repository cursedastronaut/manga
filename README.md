# Basic Manga File Explorer
## What is it ?
A basic file-explorer manga showcase PHP thing.
## How does it work?
You put your files in `./content` (`./` being the installation directory), and there
will be three kind of pages:
1. **Index**: It will show each folder with a preview (preview must be saved as `./content/.preview-[folder-name].jpg`).
1. **Volumes**: A subfolder showing directories.
1. **Pages**: All pages will be displayed on the screen, with a button at the end for downloading them all as a ZIP archive.

## Installation
1. In your web installation folder (likely `/var/www/html/`), run:
```sh
sudo git clone https://github.com/cursedastronaut/manga.git /var/www/html/manga
```
2. Give read/write permissions to folder `manga`:
```sh
sudo chown -R www-data /var/www/html/manga
```
3. Import your mangas in `manga/content`:
```sh
sudo cp path/to/your/manga/folder /var/www/html/manga/content -r
```
4. Make a preview for each manga: Put a .jpg file in `manga/content` named `.preview-[folder-name].jpg`.