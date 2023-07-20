# image-cache
A minimal set of php scripts that caches and resizes images for the tool web of Uppsala Makerspace.
A standalone version of the tool web is available at: [Tool web](https://data.uppsalamakerspace.se/tool).

## Prerequisities

1. Have php running as CGI scripts in nginx
2. Have imagemagick and libcurl installed
2. Php libraries for running imagemagick and libcurl

## Nginx configuration
Since we do not have extensions on the images we cache we provide a default media type to be image.

When loading a cached file we try to load it directly, e.g. from:

    https://uppsalamakerspace.se/toolimages/cache/1/34

If it cannot be found, we try to fetch it via the `generate.php` script.

```
location /toolimages {
       default_type image;
       try_files $uri /toolimages/scripts/generate.php;
}
```

## The generate.php script
The script does the following:

1. Extract the two numbers at the end of the URL, e.g. 1 (context) and 34 (entry) in the example above.
2. Fetch the file (with help of curl) from the EntryScape API, e.g: `https://data.uppsalamakerspace.se/store/1/resource/34`.
3. Save the image in the folder `original/1/34`
4. Resize the image (unsing imagemagic) to the preferred size (currently hardcoded in the script to be max width 100px)
5. Save the image in the cache folder, i.e. `cache/1/34`
